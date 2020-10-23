<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class ProductComponent extends Component{

    public $components = ['DB','DataTable','Curd'];

    public function initialize(array $config): void
    {
        $this->Curd;
        $this->DB;
        $this->DataTable;
    }

    public function show($id)
    {
        $product = $this->DB->table('Product')->find(['id'=>$id]);
        $trademarks = $this->DB->table('Trademark')->getAll();
        $type_products = $this->DB->table('Category')->getAll();
        $pattern = '/src="(.*)\/images\/product/';
        $product->product_info = preg_replace($pattern, 'src="'.Router::url('/',true).'images/product', $product->product_info);
        return ['product'=>$product,'trademarks'=>$trademarks,'type_products'=>$type_products];
    }

    public function update($infoProduct,$primaryKey)
    {
        if($this->Curd->update('Product',$infoProduct,$primaryKey))
            return true;
        return false;
    }

    public function viewAdd()
    {
        $trademarks = $this->DB->all('Trademark');
        $categories = $this->DB->table('Category')->where(['id_parent >'=>0])->getAll();
        return ['trademarks'=>$trademarks,'categories'=>$categories];
    }

    public function add($infoProduct)
    {
        if($this->Curd->add('Product',$infoProduct))
            return true;
        return false;
    }

    public function delete($id)
    {
        try {
            $productTable = $this->DB->table('Product')->query;
            $product = $productTable->get($id);
            $product->deleted = DELETED;
            $productTable->save($product);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function checkSlugExists(String $slug)
    {
        if($this->DB->table('Product')->find(['slug'=>$slug]) != null)
            return true;
        return false;
    }

    public function renderListProduct($id)
    {
        $config = [
            'params' => $id,
            'where' => ['deleted'=>0],
            'selectColumns' =>['id','name','image','amount','price','point','created_at','updated_at'],
            'searchColumns'=>['name'],
            'contains' => [
                'Trademark'=>['selectColumns'=>['id','name']],
                'Category'=>['selectColumns'=>['id','name']]
            ]
        ];
        $sampleArr = [
            'id',
            'name',
            ['function' =>'route','url'=>PRODUCT_PHOTO_PATH,'col'=>'image','card'=>'img'],
            ['function'=>'num_format','col'=>'price'],
            ['function'=>'point','col'=>'point'],
            'amount',
            'trademark->name',
            'category->name',
            ['function'=>'date','col'=>'created_at'],
            ['function'=>'date','col'=>'updated_at'],
            ['function'=>'route','url'=>'admin/product','text'=>'Chi tiết','card'=>'a','col'=>'id'],
            ['function'=>'route','url'=>'admin/product/delete','text'=>'Xóa','card'=>'a','col'=>'id']
        ];
        return $this->DataTable->renderListData('Product',$config)->exportListData($sampleArr);
    }
}
