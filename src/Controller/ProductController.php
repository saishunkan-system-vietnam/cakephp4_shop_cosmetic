<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Text;

class ProductController extends AppController{

    public function createProduct()
    {
        $trademarks = TableRegistry::getTableLocator()->get('Trademark')->find();
        $type_products = TableRegistry::getTableLocator()->get('TypeProduct')->find();
        $this->set(['trademarks'=>$trademarks,'type_products'=>$type_products]);
        return $this->render('create_product');
    }

    public function processCreateProduct()
    {
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

                $slug = Text::slug($name, '-');
                $otherProduct = $this->Product->find()->where(['slug' => $slug]);
                if(!empty($otherProduct))
                {
                    $slug.='-'.uniqid();
                }
                $productTable             = TableRegistry::getTableLocator()->get('Product');
                $product                  = $productTable->newEmptyEntity();
                $product->name            = $name;
                $product->image           = $filename;
                $product->price           = $price;
                $product->amount          = $amount;
                $product->product_info    = $product_info;
                $product->id_trademark    = $id_trademark;
                $product->id_type_product = $id_type_product;
                $product->slug            = $slug;
                $productTable->save($product);
            }
        }
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
        $products = $productTable->find('all')
        ->where(['product.name LIKE'=>"%$search%",'deleted'=>0]);
        $products = $products->contain(['Trademark','TypeProduct']);

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
                number_format("$product->price",0,".",".")." VNĐ",
                h($product->amount),
                h($product->trademark->name),
                h($product->type_product->name),
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
        $type_products = TableRegistry::getTableLocator()->get('TypeProduct')->find();
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
        $this->set('product',$product);
        $this->setView('product_detail');
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

            $products = $this->Product->find()->select(['id','name','image','price'])->where(['id In'=>$products]);
            $data=[];
            foreach ($products as $product) {
                foreach ($arr_cart as $key_cart => $cart) {
                    if($product->id == $key_cart)
                    {
                        $data[$product->id]['name'] = $product->name;
                        $data[$product->id]['image'] = $product->image;
                        $data[$product->id]['price'] = $product->price;
                        $data[$product->id]['quantity'] = $cart['quantity'];
                    }
                }
            }
            $this->set($data);
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
            $arr_cart = [];
            if($session->check('arr_cart'))
            {
                $arr_cart = $session->read('arr_cart');
            }

            if(!empty($arr_cart[$id_product]))
            {
                $arr_cart[$id_product]['quantity'] += $quantity;
            }
            else{
                $arr_cart[$id_product]['quantity'] = $quantity;
            }
            $session->write('arr_cart', $arr_cart);
            $data=[
                'status'=>201,
                'data'=>$id_product
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
}
