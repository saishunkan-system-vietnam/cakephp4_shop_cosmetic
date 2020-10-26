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

        } catch (\Throwable $th) {

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
        $this->viewBuilder()->setLayout('user');
        $this->render('trial');
    }

    public function showProductByCategory()
    {
        $slug = $this->request->getParam('slug');
        $productAndCategory = $this->Product->showProductByCategory($slug);
        if($productAndCategory != false)
        {
            $this->set($productAndCategory);
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
        $giftProducts = $this->Product->getGiftProduct();
        $this->set($giftProducts);
        $this->viewBuilder()->setLayout('user');
        $this->render('gift');
    }
}
