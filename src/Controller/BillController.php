<?php
declare(strict_types=1);

namespace App\Controller;

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

            $data['data'][]=[
                $bill->id,
                $bill->user->email,
                $bill->user->full_name,
                $bill->user->phone,
                $bill->user->address,
                $total,
                $status,
                '<span>Chi tiết</span>'
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
                foreach ($arr_cart as $id_product => $product) {
                    $product = TableRegistry::getTableLocator()->get('Product')->get($id_product);
                    if(!empty($product->price)){
                        $price = $product->price;
                    }elseif(!empty($product->point))
                    {
                        $price = $product->point;
                    }

                    $billDetail = $billDetailTable->newEmptyEntity();
                    $billDetail->id_bill = $bill->id;
                    $billDetail->id_product = $id_product;
                    $billDetail->amount = $arr_cart[$id_product]['quantity'];
                    $billDetail->price = $arr_cart[$id_product]['quantity'] * $price;
                    $billDetailTable->save($billDetail);
                }
                $this->Flash->set('Đặt hàng thành công');
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
                $this->Flash->set('Đặt hàng thành công');
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
            $bill->status = $status;
            $billTable->save($bill);
            switch ($status) {
                case 0:
                    $status = "<span class='change_status'>Chưa xác nhận</span>";
                break;
                case 1:
                    $status = "<span class='change_status'>Đang xử lí</span>";
                break;
                case 2:
                    $status ="<span class='change_status'>Đang giao hàng</span>";
                break;
                case 3:
                    $userTable = TableRegistry::getTableLocator()->get('User');
                    $user = $userTable->get($id_user);
                    $user->point = $user->point + 5;
                    $userTable->save($user);
                    $status ="Hoàn thành";
                break;
                case 4:
                    $status="Đã hủy";
                break;
            }

            $data = [
                'status'=>200,
                'data'=>$status
            ];
        } catch (\Throwable $th) {
            $data = [
                'status'=>200,
                'message' => $th->getMessage()
            ];
        }
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
