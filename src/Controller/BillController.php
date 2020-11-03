<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class BillController extends CommonController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authen');
        $this->loadComponent('Bill');
        $this->loadComponent('Mail');
        $this->loadComponent('Product');
        $this->loadComponent('Transport');
        $this->loadComponent('Admin');
        $this->loadComponent('User');
    }

    public function index()
    {
        $this->Bill->listBills();
        $this->render('list_bills_admin');
    }

    public function renderBills()
    {
        $inputData = $this->request->getQuery();
        $bills = $this->Bill->listBills();
        $data = [];
        $data["draw"] = intval($inputData['draw']);
        $count = 0;
        foreach ($bills as $bill) {

            //get status bill
            switch ($bill->status) {
                case UNCONFIRMED:
                    $status = "<span id_user='".$bill->id."' class='change_status'>Chưa xác nhận</span>";
                break;
                case PROCESSING:
                    $status = "<span id_user='".$bill->id."' class='change_status'>Đang xử lí</span>";
                break;
                case SHIPPING:
                    $status ="<span id_user='".$bill->id."' class='change_status'>Đang giao hàng</span>";
                break;
                case FINISH:
                    $status ="Hoàn thành";
                break;
                case CANCEL:
                    $status="Đã hủy";
                break;
            }

            //calculate point, price
            $total = 0;
            $total_price = $bill->transport->price;
            $total_point = 0;
            $point_to_pay = 0;
            foreach ($bill->bill_detail as $value) {
                if(!empty($value->price)){
                    $total_price += $value->amount * $value->price;
                    $point_to_pay += 50 * $value->amount;
                }elseif(!empty($value->point)){
                    $total_point += $value->amount * $value->point;
                }
            }
            $total_point = $total_point - $point_to_pay;
            $total_point = $total_point <= 0 ? 0 : $total_point;
            if($total_point == 0)
            {
                $total = number_format($total_price,0,'.','.')." VNĐ";
            }
            else{
                $total = number_format($total_price,0,'.','.')." VNĐ và $total_point POINT";
            }

            $data['data'][]=[
                $bill->id,
                $bill->user->email,
                $bill->user->full_name,
                $bill->user->phone,
                $bill->user->address,
                $total,
                $status,
                "<a href='".Router::url('/admin/bill-detail/'.$bill->id,true)."'>Chi tiết</a>"
            ];
            $count++;
        }
        $data["recordsTotal"]    = $count;
        $data["recordsFiltered"] = $count;
        return $this->responseJson($data);
    }

    public function addBill()
    {
        $user_id = $this->Authen->guard('User')->getId();
        $infoUser = $this->request->getData();
        $transport_id = $infoUser['transport_id'];
        if($user_id == false)
        {
            //process register user
            unset($infoUser['transport_id']);
            $infoUser['gender'] = MALE;
            $infoUser['point'] = 0;
            $infoUser['deleted'] = 0;
            $register = $this->Authen->guard('User')->register($infoUser);
        }

        //process add bill
        if((isset($register) && $register == true) || $user_id > 0)
        {
            $bill = $this->Bill->addBillDetail($transport_id); // return bill or false
            if($bill != false)
            {

                //config send mail user
                $config = ['from' => 'thuanvp012van@gmail.com','subject' => 'Đặt đơn hàng thành công'];
                $user = $this->Authen->guard('User')->getData();
                $nameAndEmail = [$user->name=>$user->email];
                $products = $this->Product->getProductFromCart();
                $transport = $this->Transport->show($transport_id);
                $viewVars = ['user'=>$this->Authen->guard('User')->getData(),'products'=>$products,'transport'=>$transport];
                $templateAndLayout = ['template' => 'order_success_user'];
                $this->Mail->send($config, $nameAndEmail, $viewVars, $templateAndLayout);

                //config send mail admin
                $admins = $this->Admin->getAll();
                $config['subject'] = 'Có đơn hàng mới';
                $nameAndEmail = [];
                foreach ($admins as $admin) {
                    $nameAndEmail[$admin->full_name] = $admin->email;
                }
                $templateAndLayout['template'] = 'order_success_admin';
                $this->Mail->send($config, $nameAndEmail, $viewVars, $templateAndLayout);
                $this->Product->deleteCart();
                $this->Flash->set(true,['key'=>'orderSuccessfully']);
                return $this->redirect('/');
            }
        }
        return $this->Flash->set(false,['key'=>'orderFailure']);
    }

    public function changeStatusBill()
    {
        try {
            $id_bill = $this->request->getQuery('id_bill');
            $id_user = intval($this->request->getQuery('id_user'));
            $status = $this->request->getQuery('status');
            $bill = $this->Bill->show($id_bill);
            $old_status_bill = $bill->status;
            $billDetails = $this->Bill->showBillDetails($bill->id);
            $this->Bill->changeStatus($status, $bill->id);
            switch ($status) {
                case UNCONFIRMED:
                    $data = "<span id_user='$id_user' class='change_status'>Chưa xác nhận</span>";
                    if($old_status_bill > 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, -($product->amount),$id_user);
                        }
                    }
                break;
                case PROCESSING:
                    $data = "<span id_user='$id_user'  class='change_status'>Đang xử lí</span>";
                    if($old_status_bill <= 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, $product->amount,$id_user);
                        }
                    }
                break;
                case SHIPPING:
                    $data ="<span id_user='$id_user'  class='change_status'>Đang giao hàng</span>";
                    if($old_status_bill <= 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, $product->amount,$id_user);
                        }
                    }
                break;
                case FINISH:
                    $billDetails = $this->Bill->showBillDetails($id_bill);
                    $plus_points = 0;
                    foreach ($billDetails as $billDetail) {
                        if($billDetail->point > 0)
                        {
                            $plus_points += 50;
                        }
                    }
                    $data ="Hoàn thành";
                    if($old_status_bill <= 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, $product->amount,$id_user);
                        }
                    }
                break;
                case CANCEL:
                    $data="Đã hủy";
                    foreach ($billDetails as $product) {
                        if($old_status_bill != UNCONFIRMED)
                        {
                            $this->changeAmountProduct($product->id_product, -$product->amount,$id_user);
                        }
                    }
                break;
            }

            $data = [
                'status'=>200,
                'data'=>$data
            ];
            return $this->responseJson($data);
        } catch (\Throwable $th) {
            $data = [
                'status'=>500,
                'message' => $th->getMessage()
            ];
            return $this->responseJson($data);
        }
    }

    public function changeAmountProduct(int $product_id, int $amount, int $user_id)
    {
        $product = $this->Product->findProductById($product_id);
        $user = $this->User->getUserInfo($user_id);
        if($product->type_product == NORMAL_TYPE)
        {
            $user->point = $user->point + $amount * 50;
            $this->User->updateUser($user->id, ['point' => $user->point]);
        }elseif($product->type_product == GIFT_TYPE){
            $user->point = $user->point - $amount * $product->point;
            $this->User->updateUser($user->id, ['point' => $user->point]);
        }
        $product->amount = $product->amount - $amount;
        $this->Product->update(['amount'=>$product->amount], $product->id);
    }

    public function trialOrder()
    {
        $session = $this->request->getSession();
        if($session->check('id_user'))
        {
            $id_product = $this->request->getParam('id_product');
            $billTable = TableRegistry::getTableLocator()->get('Bill');
            $bills = $billTable->find()->where(['id_user'=>$session->read('id_user')]);
            $billDetailTable = TableRegistry::getTableLocator()->get('BillDetail');
            foreach ($bills as $bill) {
                $billDetails = $billDetailTable->find()->where(['id_bill'=>$bill->id]);
                foreach ($billDetails as $billDetail) {
                    if($billDetail->id_product == $id_product)
                    {
                        $data = [
                            'status' => '403',
                            'message' => 'Bạn chỉ được đặt sản phẩm này một lần'
                        ];
                        $this->set($data);
                        $this->viewBuilder()->setOption('serialize', true);
                        return $this->RequestHandler->renderAs($this, 'json');
                    }
                }
            }

            $bill = $billTable->newEmptyEntity();
            $bill->id_user = $session->read('id_user');
            $bill->status = 0;
            $bill = $billTable->save($bill);
            $billDetail = $billDetailTable->newEmptyEntity();
            $billDetail->id_bill = $bill->id;
            $billDetail->id_product = $id_product;
            $billDetail->amount = 1;
            $billDetailTable->save($billDetail);
            $data = [
                'status' => '201',
                'message' => 'Đặt hàng thành công'
            ];
            return $this->responseJson($data);
        }else{
            $this->Flash->set('Đăng ký mua hàng dùng thử');
            $this->redirect('/register');
        }
    }

    public function showBillDetail()
    {
        $id_bill = $this->request->getParam('id_bill');
        $bill = $this->Bill->show($id_bill);
        $transport = $this->Transport->show($bill->id_transport);
        $user = $this->User->getUserInfo($bill->id_user);
        $billDetails = $this->Bill->showBillDetails($bill->id);
        $arr = [];
        foreach ($billDetails as $product) {
            $arr[] = $product->id_product;
        }
        $products = $this->Product->getProductsByArrId($arr);
        foreach ($products as $product) {
            foreach ($billDetails as $billDetail) {
                if($product->id == $billDetail->id_product) {
                    $product->amount = $billDetail->amount;
                }
            }
        }

        $this->set(['products'=>$products,'user'=>$user,'bill'=>$bill,'transport'=>$transport]);
        $this->render('bill_detail');
    }
}
