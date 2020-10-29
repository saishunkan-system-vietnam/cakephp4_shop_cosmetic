<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Http\Session;

class BillComponent extends Component{

    public $components = ['Curd','DB','Authen'];

    public function initialize(array $config): void
    {
        $this->DB;
        $this->Curd;
        $this->Authen;
    }

    public function addBill($transport_id)
    {
        $id_user = $this->Authen->guard('User')->getId();
        $bill = [
            'id_user' => $id_user,
            'id_transport' => $transport_id,
            'status' => UNCONFIRM
        ];
        $bill = $this->Curd->add('Bill',$bill);
        if($bill != false){
            return $bill;
        }
        return false;
    }

    public function addBillDetail($transport_id)
    {
        try {
            $bill = $this->addBill($transport_id);
            if($bill != false)
            {
                $session = new Session();
                $arr_cart = $session->read('arr_cart');
                foreach ($arr_cart as $product_id => $product) {
                    $currentProduct = $this->DB->table('Product')->find(['id'=>$product_id]);
                    $billDetail = [
                        'id_bill' => $bill->id,
                        'id_product' => $product_id,
                        'amount' => $product['quantity'],
                        'price' => $currentProduct->price == null ? 0 : $currentProduct->price,
                        'point' => $currentProduct->point == null ? 0 : $currentProduct->point
                    ];
                    $this->Curd->add('BillDetail',$billDetail);
                }
            }
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function listBills()
    {
        return $this->DB->table('Bill')->with('BillDetail','User','Transport')->get();
    }

    public function show($id)
    {
        return $this->DB->table('Bill')->find(['id'=>$id]);
    }

    public function showBillDetails($id)
    {
        return $this->DB->table('BillDetail')->where(['id_bill'=>$id])->get();
    }

    public function getBillByUserId($user_id)
    {
        return $this->DB->table('Bill')->where(['id_user'=>$user_id])->get();
    }

    public function getBillDetailByArrId(Array $arr_id)
    {
        return $this->DB->table('BillDetail')->where(['id_bill IN'=> $arr_id])->get();
    }
}
