<?php

namespace App\Controller;

use App\Controller\CommonController;
use Cake\Http\Session;
use Cake\ORM\Query;
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
        $this->loadComponent('Bill');
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
        switch ($product->type_product) {
            case NORMAL_TYPE:
                $url = Router::url('/add-normal-product-to-cart',true);
                break;
            case GIFT_TYPE:
                $url = Router::url('/add-gift-product-to-cart',true);
                break;
            case TRIAL_TYPE:
                $url = Router::url('/add-trial-product-to-cart',true);
                break;
        }
        if($product != false)
        {
            $this->set(['product'=>$product,'url'=>$url]);
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
                $total_point = $this->Product->getTotalPoint($arr_cart, $product_id, $quantity);
                if($total_point + $userPoint >= 0)
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
                $total_point = $this->Product->getTotalPointWhenNoNewProductToCart($arr_cart, $product_id, $quantity);
                if($total_point + $userPoint >= 0)
                {
                    $arr_cart[$product_id]['quantity'] = $quantity;
                    $arr_cart[$product_id]['type_product'] = GIFT_TYPE;
                    $data = [
                        'status' => 201,
                        'message' => 'Thêm sản phẩm vào giỏ hàng thành công',
                    ];
                    $bill = [
                        'leftover_point' => $total_point + $userPoint
                    ];
                    $session->write('bill', $bill);
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
                    $bill = [
                        'leftover_point' => $productPoint * $quantity
                    ];
                    $session->write('bill', $bill);
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

    public function addTrialProductToCart()
    {
        try {
            $product_id = $this->request->getQuery('product_id');
            $session = new Session();
            $arr_cart = $session->read('arr_cart');
            if($this->Authen->guard('User')->check())
            {
                $bills = $this->Bill->getBillByUserId($this->Authen->guard('User')->getId());
                $bill_id = [];
                foreach ($bills as $bill) {
                    $bill_id[] = $bill->id;
                }
                $billDetails = $this->Bill->getBillDetailByArrId($bill_id);
                foreach ($billDetails as $billDetail) {
                    $product = $this->Product->findProductById($billDetail->id_product);
                    if($product->type_product == TRIAL_TYPE && $product->id == $product_id)
                    {
                        $data = [
                            'status' => 403,
                            'message' => 'Sản phẩm này chỉ được mua 1 lần'
                        ];
                        return $this->responseJson($data);
                    }
                }
            }
            foreach ($arr_cart as $product) {
                if($product['type_product'] == TRIAL_TYPE)
                {
                    $data = [
                        'status' => 403,
                        'message' => 'Sản phẩm này chỉ được mua 1 lần'
                    ];
                    return $this->responseJson($data);
                }
            }
            $session->destroy();
            $arr_cart[$product_id]['quantity'] = 1;
            $arr_cart[$product_id]['type_product'] = TRIAL_TYPE;
            $session->write('arr_cart', $arr_cart);
            $data = [
                'status' => 201,
                'message' => 'Thêm sản phẩm vào giỏ hàng thành công'
            ];
            return $this->responseJson($data);
        } catch (\Throwable $th) {
            $data = [
                'status' => 500,
                'message' => $th->getMessage()
            ];
            return $this->responseJson($data);
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

    public function changeAmountProductFromCart()
    {
        try {
            $product_id = $this->request->getQuery('product_id');
            $quantity = $this->request->getQuery('quantity');
            $transport_id = $this->request->getQuery('transport_id');
            $session = new Session();
            $arr_cart = $session->read('arr_cart');

            //sum money
            $price_to_pay = 0;
            $point_to_pay = 0;
            $pointAward = 0;
            $currentPrice = 0;
            $currentPoint = 0;
            $currentPointAward = 0;
            foreach ($arr_cart as $id => $product) {
                $infoProduct = $this->Product->findProductById($id);
                if($product['type_product'] == NORMAL_TYPE)
                {
                    $price_to_pay += $infoProduct->price * $product['quantity'];
                    $pointAward += 50 * $product['quantity'];
                    if($product_id == $id)
                    {
                        $currentPrice = $infoProduct->price * ($product['quantity'] + $quantity);
                        $price_to_pay += $infoProduct->price * $quantity;
                        $pointAward += 50 * $quantity;
                        $currentPointAward = 50 * ($product['quantity'] + $quantity);
                    }
                }
                elseif($product['type_product'] == GIFT_TYPE)
                {
                    $point_to_pay += $infoProduct->point * $product['quantity'];
                    if($product_id == $id)
                    {
                        $currentPoint = $infoProduct->point * ($product['quantity'] + $quantity);
                        $point_to_pay += $infoProduct->point * $quantity;
                    }
                }
            }

            $leftoverPoint = $pointAward - $point_to_pay;
            //if user logged
            if($this->Authen->guard('User')->check())
            {
                if($leftoverPoint + $this->Product->getUserPoint() >= 0){
                    $data = [
                        'status' => 201,
                        'point_to_pay' => $point_to_pay,
                        'price_to_pay' =>
                        $this->Product->numberFm($price_to_pay) == 0 ?
                        0 : $this->Product->numberFm($price_to_pay)."₫",
                        'point_award' => $pointAward,
                        'current_price' => $this->Product->numberFm($currentPrice) == 0 ?
                        0 : $this->Product->numberFm($currentPrice)."₫",
                        'current_point' => $currentPoint,
                        'current_point_award' => $currentPointAward,
                        'product_id' => $product_id,
                    ];
                    $arr_cart[$product_id]['quantity'] += $quantity;
                    if($arr_cart[$product_id]['quantity'] <= 0)
                    {
                        unset($arr_cart[$product_id]);
                    }
                    $session->write('arr_cart',$arr_cart);
                }
                else{
                    $data = [
                        'status' => 403,
                        'message' => 'Số point của bạn không đủ'
                    ];
                }
            }
            else{
                if($leftoverPoint >= 0)
                {
                    $data = [
                        'status' => 201,
                        'point_to_pay' => $point_to_pay,
                        'price_to_pay' =>
                        $this->Product->numberFm($price_to_pay) == 0 ?
                        0 : $this->Product->numberFm($price_to_pay)."₫",
                        'point_award' => $pointAward,
                        'current_price' => $this->Product->numberFm($currentPrice) == 0 ?
                        0 : $this->Product->numberFm($currentPrice)."₫",
                        'current_point' => $currentPoint,
                        'current_point_award' => $currentPointAward,
                        'product_id' => $product_id,
                    ];
                    $arr_cart[$product_id]['quantity'] += $quantity;
                    if($arr_cart[$product_id]['quantity'] <= 0)
                    {
                        unset($arr_cart[$product_id]);
                    }
                    $session->write('arr_cart',$arr_cart);
                }
                else{
                    $data = [
                        'status' => 403,
                        'message' => 'Số point của bạn không đủ'
                    ];
                }
            }
            return $this->responseJson($data);
        } catch (\Throwable $th) {
            $data = [
                'status' => 500,
                'message' => $th->getMessage()
            ];
            return $this->responseJson($data);
        }
    }
}
