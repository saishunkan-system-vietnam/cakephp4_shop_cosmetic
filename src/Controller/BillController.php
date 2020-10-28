<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\SendMail;
use Cake\Http\Session;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class BillController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authen');
    }

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
                    $total_price += $value->amount * $value->price;
                }elseif(!empty($value->point)){
                    $total_point += $value->amount * $value->point;
                }
            }


            $user = TableRegistry::getTableLocator()->get('User')->find()->where(['id'=>$bill->id_user])->first();

            if($total_point == 0)
            {
                if($user->address != "Hà Nội")
                {
                    $total_price += 30000;
                }
                $total = number_format($total_price,0,'.','.')." VNĐ";
            }
            elseif($total_point > 0 && $total_price > 0){
                if($user->address != "Hà Nội")
                {
                    $total_price += 30000;
                }
                $total = number_format($total_price,0,'.','.')." VNĐ và ".$total_point." point";
            }
            elseif($total_point > 0 && $total_price ==0)
            {
                $total = $total_point." point";
                if($user->address != "Hà Nội")
                {
                    $total." và 30.000 VNĐ phí vận chuyển";
                }
            }
            elseif($total_point == 0 && $total_price == 0)
            {
                $total = "30.000 VNĐ phí vận chuyển";
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
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
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
        if($register == true || $user_id > 0)
        {
            
        }
    }

    public function changeStatusBill()
    {
        try {
            $id_bill = $this->request->getQuery('id_bill');
            $id_user = intval($this->request->getQuery('id_user'));
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
                    $data = "<span id_user='$id_user' class='change_status'>Chưa xác nhận</span>";
                    if($old_status_bill > 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, -($product->amount),$id_user);
                        }
                    }
                break;
                case 1:
                    $data = "<span id_user='$id_user'  class='change_status'>Đang xử lí</span>";
                    if($old_status_bill <= 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, $product->amount,$id_user);
                        }
                    }
                break;
                case 2:
                    $data ="<span id_user='$id_user'  class='change_status'>Đang giao hàng</span>";
                    if($old_status_bill <= 0)
                    {
                        foreach ($billDetails as $product) {
                            $this->changeAmountProduct($product->id_product, $product->amount,$id_user);
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
                            $this->changeAmountProduct($product->id_product, $product->amount,$id_user);
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
                        $this->changeAmountProduct($product->id_product, -$product->amount,$id_user);
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

    public function changeAmountProduct(int $id_product, int $amount, int $id_user)
    {
        $productTable = TableRegistry::getTableLocator()->get('Product');
        $product = $productTable->get($id_product);
        if($product->type_product == 0)
        {
            $userTable = TableRegistry::getTableLocator()->get('User');
            $user = $userTable->find()->where(['id'=>$id_user])->first();
            $user->point = $user->point + $amount * 50;
            $userTable->save($user);
        }
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

    public function showBillDetail()
    {
        $id_bill = $this->request->getParam('id_bill');
        $bill = $this->Bill->get($id_bill);
        $user = TableRegistry::getTableLocator()->get('User')->find()->where(['id'=>$bill->id_user])->first();
        $billDetailTable = TableRegistry::getTableLocator()->get('BillDetail');
        $billDetails = $billDetailTable->find()->where(['id_bill'=>$bill->id]);
        $arr = [];
        foreach ($billDetails as $product) {
            $arr[] = $product->id_product;
        }
        $products = TableRegistry::getTableLocator()
        ->get('Product')
        ->find()
        ->select(['id','name','image','price','point','type_product'])
        ->where(['id IN'=>$arr]);
        foreach ($products as $product) {
            foreach ($billDetails as $billDetail) {
                if($product->id == $billDetail->id_product) {
                    $product->amount = $billDetail->amount;
                }
            }
        }

        $this->set(['products'=>$products,'user'=>$user,'bill'=>$bill]);
        $this->render('bill_detail');
    }
}
