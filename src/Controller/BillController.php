<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class BillController extends AppController
{
    public function addBill()
    {
        $session = $this->request->getSession();
        $id_user = $session->read('id_user');
        $infoUser = $this->request->getData();
        if(!empty($id_user))
        {
            $arr_cart = $session->read('arr_cart');
            $bill = $this->Bill->newEmptyEntity();
            $infoUser['status'] = 0;
            $bill = $this->Bill->patchEntity($bill, $infoUser);
            $bill = $this->Bill->save($bill);
            $billDetailTable = TableRegistry::getTableLocator()->get('BillDetail');
            if ($bill) {
                foreach ($arr_cart as $id_product => $product) {
                    $priceProduct = TableRegistry::getTableLocator()->get('Product')->get($id_product)->price;
                    $billDetail = $billDetailTable->newEmptyEntity();
                    $billDetail->id_bill = $bill->id;
                    $billDetail->id_product = $id_product;
                    $billDetail->amount = $product['quantity'];
                    $billDetail->price = $product['quantity'] * $priceProduct;

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
        if($this->request->getMethod() == 'GET')
        {
            $this->render('');
        }
    }
}
