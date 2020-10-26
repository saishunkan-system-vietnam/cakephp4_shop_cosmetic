<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
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
            $product  = ['deleted'=>DELETED];
            $this->DB->table('Product')->update($id, $product);
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
            ['function' =>'route','url'=>'/'.PRODUCT_PHOTO_PATH.'/:image','col'=>'image','tag'=>'img'],
            ['function'=>'num_format','col'=>'price'],
            ['function'=>'point','col'=>'point'],
            'amount',
            'trademark->name',
            'category->name',
            ['function'=>'date','col'=>'created_at'],
            ['function'=>'date','col'=>'updated_at'],
            ['function'=>'route','url'=>'/admin/product/:id','text'=>'Chi tiết','tag'=>'a'],
            ['function'=>'route','url'=>'/admin/product/delete/:id','text'=>'Xóa','tag'=>'a']
        ];
        return $this->DataTable->renderListData('Product',$config)->exportListData($sampleArr);
    }

    public function findProductBySlug(String $slug)
    {
        $product = $this->DB->table('Product')->find(['slug'=>$slug]);
        if($product != false)
        {
            return $product;
        }
        return false;
    }

    public function showProductByCategory(String $slug)
    {
        $category = $this->DB->table('Category')->find(['slug'=>$slug]);
        if($category != false){
            $products = $this->DB->table('Product')
            ->select('id','name','price','image','slug')
            ->where(['id_category'=>$category->id,'deleted'=>NOT_DELETED])
            ->get();
            return ['name_category'=>$category->name,'products'=>$products];
        }
        return false;
    }

    public function getGiftProduct()
    {
        $giftProducts = $this->DB->table('Product')
        ->select('id','name','point','image','slug')
        ->where(['type_product'=>GIFT_TYPE,'deleted'=>NOT_DELETED])
        ->get();
        return ['giftProducts'=>$giftProducts];
    }

    public function detailProduct($slug)
    {
        $product = $this->DB->table('Product')->with('Trademark')->find(['slug'=>$slug]);
        if($product != false)
        {
            $pattern = '/src="(.*)\/images\/product/';
            $product->product_info = preg_replace($pattern, 'src="'.Router::url('/',true).'images/product', $product->product_info);
            return $product;
        }
        return false;
    }

    public function getTrialProduct()
    {
        return $this->DB->table('Product')
        ->select('id','name','image','slug')
        ->where(['type_product'=>TRIAL_TYPE,'deleted'=>NOT_DELETED])
        ->get();
    }
}
