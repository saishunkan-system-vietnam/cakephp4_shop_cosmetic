<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\SendMail;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

class BillController extends AppController
{
    public function index()
    {
        $this->render('list_bills_admin');
    }

    public function renderBills()
    {
        $inputData = $this->request->getQuery();
        $bills = $this->Bill->find('all')->contain(['BillDetail','User']);
        $data = [];
        $data["draw"] = intval($inputData['draw']);
        $count = 0;
        foreach ($bills as $bill) {
            switch ($bill->status) {
                case 0:
                    $status = "<span id_user='".$bill->user->id."' class='change_status'>Chưa xác nhận</span>";
                break;
                case 1:
                    $status = "<span id_user='".$bill->user->id."' class='change_status'>Đang xử lí</span>";
                break;
                case 2:
                    $status ="<span id_user='".$bill->user->id."' class='change_status'>Đang giao hàng</span>";
                break;
                case 3:
                    $status ="Hoàn thành";
                break;
                case 4:
                    $status="Đã hủy";
                break;
            }
            $total = 0;
            $total_price = 0;
            $total_point = 0;
            foreach ($bill->bill_detail as $value) {
                if(!empty($value->price)){
                    $total_price += $value->price;
                }elseif(!empty($value->point)){
                    $total_point += $value->point;
                }
            }

            if($total_point == 0)
            {
                $total = number_format($total_price,0,'.','.')." VNĐ";
            }
            elseif($total_point > 0 && $total_price > 0){
                $total = number_format($total_price,0,'.','.')." VNĐ và ".$total_point." point";
            }
            elseif($total_point > 0 && $total_price ==0)
            {
                $total = $total_point." point";
            }
            elseif($total_point == 0 && $total_price == 0)
            {
                $total = 0;
            }

            $data['data'][]=[
                $bill->id,
                $bill->user->email,
                $bill->user->full_name,
                $bill->user->phone,
                $bill->user->address,
                $total,
                $status,
                '<span class="detail>Chi tiết</span>'
            ];
            $count++;
        }
        $data["recordsTotal"]    = $count;
        $data["recordsFiltered"] = $count;
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function addBill()
    {
        $session = $this->request->getSession();
        $id_user = $session->read('id_user');
        $infoUser = $this->request->getData();
        if(!empty($id_user))
        {
            $arr_cart = $session->read('arr_cart');
            $bill = $this->Bill->newEmptyEntity();
            $bill->id_user = $id_user;
            $bill->status = 0;
            $bill = $this->Bill->save($bill);
            $billDetailTable = TableRegistry::getTableLocator()->get('BillDetail');
            if ($bill) {
                $products = [];
                $total_point = 0;
                foreach ($arr_cart as $id_product => $product) {
                    $product = TableRegistry::getTableLocator()->get('Product')->get($id_product);
                    $price = 0;
                    $point = 0;
                    if(!empty($product->price)){
                        $price = $product->price;
                    }elseif(!empty($product->point))
                    {
                        $point = $product->point;
                    }

                    $billDetail = $billDetailTable->newEmptyEntity();
                    $billDetail->id_bill = $bill->id;
                    $billDetail->id_product = $id_product;
                    $billDetail->amount = $arr_cart[$id_product]['quantity'];
                    $billDetail->price = $arr_cart[$id_product]['quantity'] * $price;
                    $billDetail->point = $arr_cart[$id_product]['quantity'] * $point;
                    $billDetailTable->save($billDetail);
                    $product->amount = $arr_cart[$id_product]['quantity'];
                    $products[] = $product;
                    $total_point += $arr_cart[$id_product]['quantity'] * $point;
                }

                //update point user
                $userTable = TableRegistry::getTableLocator()->get('User');
                $user = $userTable->get($id_user);
                $user->point = $user->point - $total_point;
                $userTable->save($user);

                //send mail user
                $user = TableRegistry::getTableLocator()->get('User')->get($id_user);
                $config = [
                    'from' => 'thuanvp012van@gmail.com',
                    'subject' => 'Tạo đơn hàng thành công'
                ];
                $receiver = [$user->full_name => $user->email];
                $viewVars = [
                    'user_name' => $user->full_name,
                    'products' => $products,
                ];
                $templateAndLayout = ['template' => 'order_success_user'];
                SendMail::send($config,$receiver,$viewVars,$templateAndLayout);

                //send mail admins
                $config['subject'] = 'Đơn hàng mới';
                $admins = TableRegistry::getTableLocator()->get('Admin')->find();
                $receiver = [];
                foreach ($admins as $admin) {
                    $receiver[$admin->full_name] = $admin->email;
                }

                $viewVars['datetime']= Time::now();
                $viewVars['email']= $user->email;
                $templateAndLayout = ['template' => 'order_success_admin'];
                SendMail::send($config,$receiver,$viewVars,$templateAndLayout);
                $this->Flash->set('Đặt hàng thành công bạn vui lòng kiểm tra email xem thông tin hóa đơn');
                $session->delete('arr_cart');
                return $this->redirect('/');
            }
        }
        else{
            $session->write('infoUser',$infoUser);
            $this->redirect('/create-account');
        }
    }

    public function createAccountUserAndCreateBill()
    {
        $session  = $this->request->getSession();
        if($this->request->getMethod() == 'GET')
        {
            $this->viewBuilder()->setLayout('login');
            $this->render('create_account_and_bill');
        }
        elseif($this->request->getMethod() == 'POST')
        {
            $infoUser = $session->read('infoUser');
            $password = $this->request->getData()['password'];
            $infoUser['password'] = md5($password);
            $infoUser['point']    = 0;
            $infoUser['deleted']  = 0;
            $userTable = TableRegistry::getTableLocator()->get('User');
            $user = $userTable->newEmptyEntity();
            foreach ($infoUser as $key => $value) {
                $user->$key = $value;
            }
            $user = $userTable->save($user);
            if($user != false)
            {
                $arr_cart = $session->read('arr_cart');
                $billTable = $this->Bill;
                $bill = $billTable->newEmptyEntity();
                $bill->id_user = $user->id;
                $bill->status = 0;
                $bill = $billTable->save($bill);

                $billDetailTable = TableRegistry::getTableLocator()->get('BillDetail');
                foreach ($arr_cart as $id_product => $product) {
                    $priceProduct = TableRegistry::getTableLocator()->get('Product')->get($id_product)->price;
                    $billDetail = $billDetailTable->newEmptyEntity();
                    $billDetail->id_bill = $bill->id;
                    $billDetail->id_product = $id_product;
                    $billDetail->amount = $product['quantity'];
                    $billDetail->price = $priceProduct;
                    $billDetailTable->save($billDetail);
                }
                $this->Flash->set('Đặt hàng thành công bạn vui lòng kiểm tra email xem thông tin hóa đơn');
                $session->delete('arr_cart');
                return $this->redirect('/');
            }
            return $this->redirect('/');
        }
    }

    public function changeStatusBill()
    {
        try {
            $id_bill = $this->request->getQuery('id_bill');
            $id_user = $this->request->getQuery('id_user');
            $status = $this->request->getQuery('status');
            $billTable = $this->Bill;

            $bill = $billTable->get($id_bill);
            $old_status_bill = $bill->status;
            $billDetails = TableRegistry::getTableLocator()
            ->get('BillDetail')
            ->find()->where(['id_bill'=>$id_bill]);
            $bill->status = $status;
            $billTable->save($bill);
            switch ($status) {
                case 0:
                    $data = "<span class='change_status'>Chưa xác nhận</span>";
                    if($old_status_bill > 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, -($product->amount));
                        }
                    }
                break;
                case 1:
                    $data = "<span class='change_status'>Đang xử lí</span>";
                    if($old_status_bill <= 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, $product->amount);
                        }
                    }
                break;
                case 2:
                    $data ="<span class='change_status'>Đang giao hàng</span>";
                    if($old_status_bill <= 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, $product->amount);
                        }
                    }
                break;
                case 3:
                    $billDetailTable = TableRegistry::getTableLocator()->get('BillDetail');
                    $billDetails = $billDetailTable->find()->where(['id_bill'=>$id_bill]);
                    $plus_points = 0;
                    foreach ($billDetails as $billDetail) {
                        if($billDetail->point > 0)
                        {
                            $plus_points += 50;
                        }
                    }
                    $userTable = TableRegistry::getTableLocator()->get('User');
                    $user = $userTable->get($id_user);
                    $user->point = $user->point + $plus_points;
                    $userTable->save($user);
                    $data ="Hoàn thành";
                    if($old_status_bill <= 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, $product->amount);
                        }
                    }
                break;
                case 4:
                    $data="Đã hủy";
                    foreach ($billDetails as $product) {
                        if($product->point > 0)
                        {
                            $userTable = TableRegistry::getTableLocator()->get('User');
                            $user = $userTable->get($id_user);
                            $user->point += $product->amount * $product->point;
                            $userTable->save($user);
                        }
                        $this->changeAmountProduct($product->id_product, -$product->amount);
                    }
                break;
            }

            $data = [
                'status'=>200,
                'data'=>$data
            ];
        } catch (\Throwable $th) {
            $data = [
                'status'=>500,
                'message' => $th->getMessage()
            ];
        }
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function changeAmountProduct(int $id_product, int $amount)
    {
        $productTable = TableRegistry::getTableLocator()->get('Product');
        $product = $productTable->get($id_product);
        $product->amount = $product->amount - $amount;
        $productTable->save($product);
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
            $this->set($data);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
        }else{
            $this->Flash->set('Đăng ký mua hàng dùng thử');
            $this->redirect('/register');
        }
    }
}
