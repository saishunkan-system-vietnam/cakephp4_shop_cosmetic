<?php

namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Text;
use Cake\Http\Response;

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
                htmlspecialchars($product->name),
                "<img src='".Router::url('/images/product/'.$product->image,true)."' style='width: 70px'>",
                number_format("$product->price",0,".",".")." VNĐ",
                $product->amount,
                $product->trademark->name,
                $product->type_product->name,
                date("d/m/Y H:i:s",$created_at),
                date("d/m/Y H:i:s",$updated_at),
                "<a href='".Router::url('/admin/product/'.$product->id,true)."'>Chi tiết</a>",
                "<a href='".Router::url('/admin/product/delete/'.$product->id,true)."'>Xóa</a>"
            ];
        }
        $this->response->type('json');
        $this->response->body($data);
        return $this->response;
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
}
