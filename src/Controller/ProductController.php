<?php

namespace App\Controller;

use App\Controller\CommonController;
use Cake\Http\Session;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Text;

class ProductController extends CommonController{

    public function initialize(): void{
        parent::initialize();
        $this->loadComponent('File');
        $this->loadComponent('Curd');
        $this->loadComponent('Product');
        $this->loadComponent('Authen');
        $this->loadComponent('User');
        $this->loadComponent('Transport');
    }

    public function createProduct()
    {
        $trademarkAndCategory = $this->Product->viewAdd();
        $this->set($trademarkAndCategory);
        return $this->render('create_product');
    }

    public function processCreateProduct()
    {
        $infoProduct  = $this->request->getData();
        $file = $infoProduct['image'];
        $fileName = $this->File->uploadImage($file,PRODUCT_PHOTO_PATH); //return file name or null
        if($fileName != null)
        {
            $infoProduct['image'] = $fileName;
            $infoProduct['deleted'] = NOT_DELETED;
            $slug = Text::slug($infoProduct['name'],'-');
            if($this->Product->checkSlugExists($slug) == true)
            {
                $slug = $slug.'-'.uniqid();
            }
            $infoProduct['slug'] = $slug;
            if($this->Product->add($infoProduct)) //return true or false
            {
                $this->Flash->set('Thêm sản phẩm thành công');
                return $this->redirect('/admin/list-product');
            }
        }
        $this->Flash->set('Thêm sản phẩm thất bại');
        return $this->redirect('/admin/list-product');
    }

    public function listProduct()
    {
        return $this->render('list_products');
    }

    public function renderListProduct()
    {
        $params = $this->request->getQuery();
        $products = $this->Product->renderListProduct($params);
        $this->responseJson($products);
    }

    public function showProduct()
    {
        $id = $this->request->getParam('id_product');
        $data = $this->Product->show($id);
        $this->set($data);
        $this->render('show_product');
    }

    public function updateProduct()
    {
        $id_product = $this->request->getParam('id_product');
        $infoProduct     = $this->request->getData();
        $file            = $infoProduct['image'];
        if(!empty($file)){
            $fileName = $this->File->uploadImage($file,PRODUCT_PHOTO_PATH);
            $infoProduct['image'] = $fileName;
        }

        $slug = Text::slug($infoProduct['name']);
        if($this->Product->checkSlugExists($slug))
        {
            $slug = $slug.'-'.uniqid();
        }
        $infoProduct['slug'] = $slug;
        if($this->Product->update($infoProduct,$id_product))
        {
            $this->Flash->set('Sửa sản phẩm thành công');
            return $this->redirect('/admin/list-product');
        }

        $this->Flash->set('Sửa sản phẩm thành công');
        $this->redirect('/admin/list-product');
    }

    public function deleteProduct()
    {
        $id_product = $this->request->getParam('id_product');
        if($this->Product->delete($id_product))
        {
            $this->Flash->set('Xóa sản phẩm thành công!!!');
            return $this->redirect('/admin/list-product');
        }
        $this->Flash->set('Xóa sản phẩm thất bại!!!');
        return $this->redirect('/admin/list-product');
    }

    public function showProductInUser()
    {
        $slug = $this->request->getParam('slug');
        $product = $this->Product->detailProduct($slug);
        if($product != false)
        {
            $this->set('product',$product);
            $this->setView('product_detail');
        }
    }

    public function setView($view)
    {
        $this->viewBuilder()->setLayout('user');
        return $this->render($view);
    }

    public function viewCart()
    {
        $session = new Session();
        $arr_cart = $session->read('arr_cart');
        if(!empty($arr_cart)){
            $arr_id = [];
            foreach ($arr_cart as $id_cart => $value) {
                $arr_id[] = $id_cart;
            }
            $products = $this->Product->getProductsByArrId($arr_id);
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
            $user_id = $this->Authen->guard('User')->getId();
            $transports = $this->Transport->getAll();
            $result = [
                'products' => $data,
                'total_money' => $total_money,
                'total_point' => $total_point,
                'transports' => $transports
            ];
            if($user_id > 0){
                $user = $this->User->getUserInfo($user_id);
                $result['user'] = $user;
            }
            $this->set($result);
            $this->setView('cart');
        }else{
            $this->redirect('/');
        }
    }

    public function addNormalProductToCart()
    {
        try {
            $params = $this->request->getQuery();
            $product_id = $params['product_id'];
            $quantity = $params['quantity'];
            $session = new Session();
            $cart = $session->read('arr_cart');
            if(!empty($cart[$product_id])){
                $cart[$product_id]['quantity'] += $quantity;
            }else{
                $cart[$product_id]['quantity'] = $quantity;
                $cart[$product_id]['type_product'] = NORMAL_TYPE;
            }
            $session->write('arr_cart',$cart);
            $data=[
                'status'=>201,
                'message'=>'Thêm sản phẩm vào giỏ hàng thành công'
            ];
            return $this->responseJson($data);
        } catch (\Throwable $th) {
            $data=[
                'status'=>500,
                'message'=>'Hiện tại server chúng tôi đang gặp vấn đề hẹn gặp bạn vào 1 lần gần nhất'
            ];
            $this->responseJson($data);
        }
    }

    public function addGiftProductToCart()
    {
        try {
            $params = $this->request->getQuery();
            $product_id = $params['product_id'];
            $quantity = $params['quantity'];
            $session = new Session();
            $arr_cart = $session->read('arr_cart');
            $userPoint = $this->Product->getUserPoint();
            if(!empty($arr_cart[$product_id])){
                $total_point = $this->Product->getTotalPoint($arr_cart, $product_id);
                if($total_point <= $userPoint)
                {
                    $arr_cart[$product_id]['quantity'] += $quantity;
                    $data = [
                        'status' => 201,
                        'message' => 'Thêm sản phẩm vào giỏ hàng thành công',
                    ];
                }else{
                    $data = [
                        'status' => 403,
                        'message' => 'Số point của bạn không đủ'
                    ];
                }
            }
            elseif(empty($arr_cart[$product_id]) && !empty($arr_cart)){
                $total_point = $this->Product->getTotalPointWhenNoNewProductToCart($arr_cart,$product_id);
                if($total_point <= $userPoint)
                {
                    $arr_cart[$product_id]['quantity'] = $quantity;
                    $arr_cart[$product_id]['type_product'] = GIFT_TYPE;
                    $data = [
                        'status' => 201,
                        'message' => 'Thêm sản phẩm vào giỏ hàng thành công',
                    ];
                }else{
                    $data = [
                        'status' => 403,
                        'message' => 'Số point của bạn không đủ'
                    ];
                }
            }else{
                $productPoint = $this->Product->getProductPoint($product_id);
                if($productPoint * $quantity <= $userPoint)
                {
                    $arr_cart[$product_id]['quantity'] = $quantity;
                    $arr_cart[$product_id]['type_product'] = GIFT_TYPE;
                    $data = [
                        'status' => 201,
                        'message' => 'Thêm sản phẩm vào giỏ hàng thành công',
                    ];
                }else{
                    $data = [
                        'status' => 403,
                        'message' => 'Số point của bạn không đủ'
                    ];
                }
            }
            $session->write('arr_cart', $arr_cart);
            $this->responseJson($data);
        } catch (\Throwable $th) {
            $data = [
                'status' => 500,
                'message' => 'Lỗi server'
            ];
            $this->responseJson($data);
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
        $products = $this->Product->getTrialProduct();
        $this->set('products', $products);
        $this->render('trial','user');
    }

    public function showProductByCategory()
    {
        $slug = $this->request->getParam('slug');
        $productAndCategory = $this->Product->showProductByCategory($slug);
        if($productAndCategory != false)
        {
            $this->set($productAndCategory);
            $this->render('list_product_by_category','user');
        }

        else{
            $this->render('../Error/404','login');
        }
    }

    public function listGift()
    {
        $giftProducts = $this->Product->getGiftProduct();
        $this->set($giftProducts);
        $this->render('gift','user');
    }
}
