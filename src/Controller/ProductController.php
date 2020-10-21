<?php

namespace App\Controller;

use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Text;

class ProductController extends AppController{

    public function createProduct()
    {
        $trademarks = TableRegistry::getTableLocator()->get('Trademark')->find();
        $category = TableRegistry::getTableLocator()->get('Category')->find();
        $this->set(['trademarks'=>$trademarks,'category'=>$category]);
        return $this->render('create_product');
    }

    public function processCreateProduct()
    {
        $infoProduct  = $this->request->getData();
        $name         = $infoProduct['name'];
        $file         = $infoProduct['image'];
        $amount       = $infoProduct['amount'];
        $id_trademark = $infoProduct['trademark'];
        $id_category  = $infoProduct['category'];
        $product_info = $infoProduct['product_info'];
        $type_product = $infoProduct['type_product'];
        $pathImg      = WWW_ROOT . "images\product";
        if(!empty($file)){
            $extFile = pathinfo($file->getclientFilename(), PATHINFO_EXTENSION);
            if(in_array($extFile,['jpg', 'png', 'jpeg', 'gif']))
            {
                if(!file_exists($pathImg))
                {
                    mkdir($pathImg, 0755, true);
                }

                $date       = date('Ymd');
                $filename   = $date . "_" . uniqid() . "." . $extFile;
                $targetFile = WWW_ROOT . "images\product" . DS . $filename;
                $file->moveTo($targetFile);

                $slug = Text::slug($name, '-');
                $otherProduct = $this->Product->find()->where(['slug' => $slug])->first();
                if(!empty($otherProduct))
                {
                    $slug.='-'.uniqid();
                }
                $productTable          = TableRegistry::getTableLocator()->get('Product');
                $product               = $productTable->newEmptyEntity();
                $product->name         = $name;
                $product->image        = $filename;
                $product->price        = '';
                $product->point        = '';
                $product->amount       = $amount;
                $product->product_info = $product_info;
                $product->type_product = $type_product;
                $product->id_trademark = $id_trademark;
                $product->id_category  = $id_category;
                $product->slug         = $slug;

                if(!empty($infoProduct['price'])){
                    $product->price = $infoProduct['price'];
                }
                else if(!empty($infoProduct['point']))
                {
                    $product->point = $infoProduct['point'];
                }

                $productTable->save($product);
            }
        }

        $this->Flash->set('Thêm sản phẩm thành công');
        $this->redirect('/admin/list-product');
    }

    public function listProduct()
    {
        return $this->render('list_products');
    }

    public function renderListProduct()
    {
        $productTable = TableRegistry::getTableLocator()->get('Product');
        $inputData    = $this->request->getQuery();
        $search       = $inputData['search']['value'];
        $limit        = $inputData['length'];
        $start        = $inputData['start'];
        $page         = ceil($start / $limit) + 1;
        $products     = $productTable->find('all')
        ->where(['product.name LIKE'=>"%$search%",'deleted'=>0])
        ->limit($limit)
        ->page($page);
        $products = $products->contain(['Trademark','Category']);

        $totalProduct = $productTable->find()->count();
        $data=[];
        $data["draw"]            = intval($inputData['draw']);
        $data["recordsTotal"]    = $totalProduct;
        $data["recordsFiltered"] = $totalProduct;
        $data['data']            = [];
        foreach ($products as $product) {
            $created_at = strtotime($product->created_at);
            $updated_at = strtotime($product->updated_at);
            $data['data'][]=[
                $product->id,
                h($product->name),
                "<img src='".Router::url('/images/product/'.$product->image,true)."' style='width: 70px'>",
                !empty($product->price) ? number_format("$product->price",0,".",".")." VNĐ" : '',
                $product->point,
                h($product->amount),
                h($product->trademark->name),
                h($product->category->name),
                date("d/m/Y H:i:s",$created_at),
                date("d/m/Y H:i:s",$updated_at),
                "<a href='".Router::url('/admin/product/'.$product->id,true)."'>Chi tiết</a>",
                "<a href='".Router::url('/admin/product/delete/'.$product->id,true)."'>Xóa</a>"
            ];
        }
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function showProduct()
    {
        $id_product = $this->request->getParam('id_product');
        $product = $this->Product->find()->where(['id'=>$id_product])->first();
        $trademarks    = TableRegistry::getTableLocator()->get('Trademark')->find();
        $type_products = TableRegistry::getTableLocator()->get('Category')->find();

        $pattern = '/src="(.*)\/images\/product/';
        $product->product_info = preg_replace($pattern, 'src="'.Router::url('/',true).'images/product', $product->product_info);

        $this->set(['product'=>$product,'trademarks'=>$trademarks,'type_products'=>$type_products]);
        $this->render('show_product');
    }

    public function updateProduct()
    {
        $id_product = $this->request->getParam('id_product');
        $infoProduct     = $this->request->getData();
        $name            = $infoProduct['name'];
        $file            = $infoProduct['image'];
        $price           = $infoProduct['price'];
        $amount          = $infoProduct['amount'];
        $id_trademark    = $infoProduct['trademark'];
        $id_type_product = $infoProduct['type_product'];
        $product_info    = $infoProduct['product_info'];
        $pathImg         = WWW_ROOT . "images\product";
        if(!empty($file)){
            $extFile = pathinfo($file->getclientFilename(), PATHINFO_EXTENSION);
            if(in_array($extFile,['jpg', 'png', 'jpeg', 'gif']))
            {
                if(!file_exists($pathImg))
                {
                    mkdir($pathImg, 0755, true);
                }

                $date       = date('Ymd');
                $filename   = $date . "_" . uniqid() . "." . $extFile;
                $targetFile = WWW_ROOT . "images\product" . DS . $filename;
                $file->moveTo($targetFile);
            }
        }
        $productTable             = TableRegistry::getTableLocator()->get('Product');
        $product                  = $productTable->get($id_product);
        $product->name            = $name;
        $product->image           = !empty($filename) ? $filename : $product->image;
        $product->price           = $price;
        $product->amount          = $amount;
        $product->product_info    = $product_info;
        $product->id_trademark    = $id_trademark;
        $product->id_type_product = $id_type_product;
        $productTable->save($product);

        $this->Flash->set('Sửa sản phẩm thành công');
        $this->redirect('/admin/list-product');
    }

    public function deleteProduct()
    {
        $id_product = $this->request->getParam('id_product');
        $productTable = TableRegistry::getTableLocator()->get('Product');

        $product = $productTable->get($id_product);
        $product->deleted = 1;
        $productTable->save($product);

        $this->Flash->set('Xóa sản phẩm thành công!!!');
        $this->redirect('/admin/list-product');
    }

    public function showProductInUser()
    {
        $slug = $this->request->getParam('slug');
        $product = $this->Product->find()->contain(['Trademark'])->where(['slug' => $slug])->first();
        if(!empty($product)){
            $pattern = '/src="(.*)\/images\/product/';
            $product->product_info = preg_replace($pattern, 'src="'.Router::url('/',true).'images/product', $product->product_info);
            $this->set('product',$product);
            $this->setView('product_detail');
        }else{
            $this->viewBuilder()->setLayout('login');
            $this->render('../Error/404');
        }
    }

    public function setView($view)
    {
        $this->viewBuilder()->setLayout('user');
        return $this->render($view);
    }

    public function viewCart()
    {
        $session = $this->request->getSession();
        $arr_cart = $session->read('arr_cart');
        if(!empty($arr_cart)){
            $products=[];
            foreach ($arr_cart as $key => $value) {
                $products[] = $key;
            }

            $products = $this->Product->find()->select(['id','name','image','price','point','type_product'])->where(['id In'=>$products]);
            $data=[];
            $total_money = 0;
            $total_point = 0;
            foreach ($products as $product) {
                foreach ($arr_cart as $key_cart => $cart) {
                    if($product->id == $key_cart)
                    {
                        $data[$product->id]['name'] = $product->name;
                        $data[$product->id]['image'] = $product->image;
                        $data[$product->id]['price'] = $product->price;
                        $data[$product->id]['point'] = $product->point;
                        $data[$product->id]['type_product'] = $product->type_product;
                        $data[$product->id]['quantity'] = $cart['quantity'];
                        switch ($product->type_product) {
                            case 0:
                                $total_money += $product->price * $cart['quantity'];
                                break;
                            case 1:
                                $total_point += $product->point * $cart['quantity'];
                                break;
                        }
                    }
                }
            }
            // dd($total_money);
            $id_user = $session->read('id_user');
            if($id_user > 0){
                $user = TableRegistry::getTableLocator()->get('user')->get($id_user);
                $this->set(['products'=>$data,'user'=>$user,'total_money'=>$total_money,'total_point'=>$total_point]);
            }
            else{
                $this->set(['products'=>$data,'total_money'=>$total_money,'total_point'=>$total_point]);
            }
            $this->setView('cart');
        }else{
            $this->redirect('/');
        }
    }

    public function addToCart()
    {
        try {
            $id_product = $this->request->getQuery()['id_product'];
            $quantity = $this->request->getQuery()['quantity'];
            $session = $this->request->getSession();
            $product = $this->Product->find()->where(['id'=>$id_product])->first();
            $arr_cart = [];
            $total = 0;
            if($session->check('arr_cart'))
            {
                if(!empty($this->request->getQuery('trial'))){
                    $session->delete('arr_cart');
                }
                else{
                    $arr_cart = $session->read('arr_cart');
                    foreach ($arr_cart as $cart) {
                        if(!empty($cart['trial']))
                        {
                            $data = [
                                'status' => 403,
                                'message' => 'Sản phẩm dùng thử không được đặt cùng các sản phẩm khác'
                            ];
                            $this->set($data);
                            $this->viewBuilder()->setOption('serialize', true);
                            return $this->RequestHandler->renderAs($this, 'json');
                        }
                    }
                }
            }

            if($product->type_product == 2)
            {
                $id_user = $session->read('id_user');
                if(!empty($id_user)){
                    if(array_key_exists($product->id, $arr_cart))
                    {
                        $data = [
                            'status' => 403,
                            'message' => 'Sản phẩm dùng thử chỉ đặt được 1 lần'
                        ];
                        $this->set($data);
                        $this->viewBuilder()->setOption('serialize', true);
                        return $this->RequestHandler->renderAs($this, 'json');
                    }
                    $billTable = TableRegistry::getTableLocator()->get('Bill');
                    $bills = $billTable->find()
                    ->contain('BillDetail')
                    ->where(['id_user'=>$id_user]);
                    foreach ($bills as $bill) {
                        foreach($bill->bill_detail as $bill_detail)
                        {
                            if($bill_detail->id_product == $id_product)
                            {
                                $data = [
                                    'status' => 403,
                                    'message' => 'Sản phẩm dùng thử chỉ đặt được 1 lần'
                                ];
                                $this->set($data);
                                $this->viewBuilder()->setOption('serialize', true);
                                return $this->RequestHandler->renderAs($this, 'json');
                            }
                        }
                    }
                }else{
                    if(array_key_exists($product->id, $arr_cart))
                    {
                        $data = [
                            'status' => 403,
                            'message' => 'Sản phẩm dùng thử chỉ đặt được 1 lần'
                        ];
                        $this->set($data);
                        $this->viewBuilder()->setOption('serialize', true);
                        return $this->RequestHandler->renderAs($this, 'json');
                    }
                }
            }

            if(!empty($arr_cart[$id_product]))
            {
                //check amount product
                if($arr_cart[$id_product]['quantity'] + $quantity <= $product->amount)
                {
                    $arr_cart[$id_product]['quantity'] += $quantity;
                    if(!empty($product->price))
                    {
                        $total = $arr_cart[$id_product]['quantity'] * $product->price;
                    }
                    elseif(!empty($product->point))
                    {
                        $id_user = $session->read('id_user');
                        $user = TableRegistry::getTableLocator()->get('User')->get($id_user);
                        $total = $arr_cart[$id_product]['quantity'] * $product->point;
                        if($user->point < $total)
                        {
                            $data = [
                                'status' => 403,
                                'message' => 'Số point của bạn không đủ'
                            ];
                            $this->set($data);
                            $this->viewBuilder()->setOption('serialize', true);
                            return $this->RequestHandler->renderAs($this, 'json');
                        }
                    }

                    if($arr_cart[$id_product]['quantity'] <= 0)
                    {
                        unset($arr_cart[$id_product]);
                        $total = 0;
                    }
                }
                else{
                    $data = [
                        'status' => 418,
                        'message' => 'Số lượng sản phẩm này không đủ cho bạn'
                    ];
                    $this->set($data);
                    $this->viewBuilder()->setOption('serialize', true);
                    return $this->RequestHandler->renderAs($this, 'json');
                }
            }
            else{
                if(!empty($product->point))
                {
                    $id_user = $session->read('id_user');
                    $user = TableRegistry::getTableLocator()->get('User')->get($id_user);
                    $total = $quantity * $product->point;
                    if($user->point < $total)
                    {
                        $data = [
                            'status' => 403,
                            'message' => 'Số point của bạn không đủ'
                        ];
                        $this->set($data);
                        $this->viewBuilder()->setOption('serialize', true);
                        return $this->RequestHandler->renderAs($this, 'json');
                    }
                }

                if($quantity > 0)
                {
                    $arr_cart[$id_product]['quantity'] = $quantity;
                    if(!empty($this->request->getQuery('trial'))){
                        $arr_cart[$id_product]['trial'] = true;
                    }
                    $total = 0;
                }
            }

            if(!empty($product->price))
            {
                $total = number_format($total,0,'.','.')."₫";
            }
            elseif(!empty($product->point))
            {
                $total = $total." point";
            }
            $session->write('arr_cart', $arr_cart);

            //calculate all total
            $total_point = 0;
            $total_money = 0;
            $all_total = 0;
            $array_id_product = [];
            if(!empty($arr_cart))
            {
                foreach ($arr_cart as $id_product => $product) {
                    $array_id_product[] = $id_product;
                }
                $products = $this->Product->find()->select(['id','price','point','type_product'])->where(['id IN'=>$array_id_product]);
                foreach ($products as $product) {
                    switch ($product->type_product) {
                        case 0:
                            $total_money += $product->price * $arr_cart[$product->id]['quantity'];
                            break;
                        case 1:
                            $total_point += $product->point * $arr_cart[$product->id]['quantity'];
                            break;
                    }
                }


                if($total_money == 0 && $total_point == 0)
                {
                    $all_total = 0;
                }elseif($total_money == 0)
                {
                    if($this->request->getQuery('location')!="Hà Nội")
                    {
                        $all_total = "30.000₫ và ".$total_point." POINT";
                    }
                    else{
                        $all_total = $total_point." POINT";
                    }
                }elseif($total_point == 0)
                {
                    if($this->request->getQuery('location')!="Hà Nội")
                    {
                        $total_money += 30000;
                    }
                    $all_total = number_format($total_money,0,'.','.')."₫";
                }else{
                    if($this->request->getQuery('location')!="Hà Nội")
                    {
                        $total_money += 30000;
                    }
                    $all_total = number_format($total_money,0,'.','.')."₫ và ".$total_point." POINT";
                }
            }

            $data=[
                'status'=>201,
                'data'=>$id_product,
                'total' => $total,
                'all_total'=>$all_total
            ];

            $this->set($data);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
        } catch (\Throwable $th) {
            $data=[
                'status'=>500,
                'message'=>$th->getMessage()
            ];
            $this->set($data);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
        }
    }

    public function removeProductFromCart()
    {
        try {
            $id_product = $this->request->getQuery()['id_product'];
            $session = $this->request->getSession();
            $arr_cart = $session->read('arr_cart');
            unset($arr_cart[$id_product]);
            $session->write('arr_cart', $arr_cart);

            //calculate all total
            $total_point = 0;
            $total_money = 0;
            $all_total = 0;
            $array_id_product = [];
            if(!empty($arr_cart))
            {
                foreach ($arr_cart as $id_product => $product) {
                    $array_id_product[] = $id_product;
                }
                $products = $this->Product->find()->select(['id','price','point','type_product'])->where(['id IN'=>$array_id_product]);
                foreach ($products as $product) {
                    switch ($product->type_product) {
                        case 0:
                            $total_money += $product->price * $arr_cart[$product->id]['quantity'];
                            break;
                        case 1:
                            $total_point += $product->point * $arr_cart[$product->id]['quantity'];
                            break;
                    }
                }

                if($total_money == 0 && $total_point == 0)
                {
                    $all_total = 0;
                }elseif($total_money == 0)
                {
                    if($this->request->getQuery('location')!="Hà Nội")
                    {
                        $all_total = "30.000₫ và ".$total_point." POINT";
                    }
                    else{
                        $all_total = $total_point." POINT";
                    }
                }elseif($total_point == 0)
                {
                    if($this->request->getQuery('location')!="Hà Nội")
                    {
                        $total_money += 30000;
                    }
                    $all_total = number_format($total_money,0,'.','.')."₫";
                }else{
                    if($this->request->getQuery('location')!="Hà Nội")
                    {
                        $total_money += 30000;
                    }
                    $all_total = number_format($total_point,0,'.','.')."₫ và ".$total_point." POINT";
                }
            }

            $data['status'] = true;
            $data['all_total'] = $all_total;
            $this->set($data);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
        } catch (\Throwable $th) {

            $data['status'] = false;
            $this->set($data);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
        }
    }

    public function trial()
    {
        $products = $this->Product->find()->where(['type_product'=>2]);
        $this->set('products', $products);
        $this->viewBuilder()->setLayout('user');
        $this->render('trial');
    }

    public function showProductByCategory()
    {
        $slug = $this->request->getParam('slug');
        $categoryTable = TableRegistry::getTableLocator()->get('Category');
        $category = $categoryTable->find()->where(['slug'=>$slug])->first();
        if(!empty($category))
        {
            $products = $this->Product->find()->where(['id_category'=>$category->id,'type_product'=>0]);
            $this->set(['products'=>$products,'name_category'=>$category->name]);
            $this->viewBuilder()->setLayout('user');
            $this->render('list_product_by_category');
        }
        else{
            $this->viewBuilder()->setLayout('login');
            $this->render('../Error/404');
        }
    }

    public function listGift()
    {
        $giftProducts = $this->Product->find()->where(['type_product'=>1]);
        $this->set(['giftProducts'=>$giftProducts]);
        $this->viewBuilder()->setLayout('user');
        $this->render('gift');
    }
}
