<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Http\Session;
use Cake\Routing\Router;

class ProductComponent extends Component{

    public $components = ['DB','DataTable','Curd','Authen'];

    public function initialize(array $config): void
    {
        $this->Curd;
        $this->DB;
        $this->DataTable;
        $this->Authen;
    }

    public function show($id)
    {
        $product = $this->DB->table('Product')->find(['id'=>$id]);
        $trademarks = $this->DB->table('Trademark')->getAll();
        $categories = $this->DB->table('Category')->where(['id_parent >'=>0])->getAll();
        $pattern = '/src="(.*)\/images\/product/';
        $product->product_info = preg_replace($pattern, 'src="'.Router::url('/',true).'images/product', $product->product_info);
        return ['product'=>$product,'trademarks'=>$trademarks,'categories'=>$categories];
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

    public function getUserPoint()
    {
        $user_id = $this->Authen->guard('User')->getId();
        if($user_id != false)
        {
            return $this->DB->table('User')->select('point')->find(['id'=>$user_id])->point;
        }
        return 0;
    }

    public function getProductPoint($id)
    {
        return $this->DB->table('Product')->find(['id'=>$id])->point;
    }

    public function getProductsByArrId($arr_id)
    {
        return $this->DB->table('Product')
        ->select('id','name','image','price','point','type_product')
        ->where(['id In'=>$arr_id])->get();
    }

    public function getProductFromCart()
    {
        $session = new Session();
        $arr_cart = $session->read('arr_cart');
        $arr_product_id = [];
        foreach ($arr_cart as $product_id => $product) {
            $arr_product_id[] = $product_id;
        }
        $arr_product = $this->getProductsByArrId($arr_product_id);
        $products = [];
        foreach ($arr_cart as $product_id => $productInCart) {
            foreach ($arr_product as $product) {
                if($product_id == $product->id)
                {
                    $products[] = (object)[
                        'name' => $product->name,
                        'price' => $product->price == null ? 0 : $product->price,
                        'point' => $product->point == null ? 0 : $product->point,
                        'type_product' => $product->type_product,
                        'amount' => $productInCart['quantity']
                    ];
                }
            }
        }
        return $products;
    }

    public function getTotalPointWhenNoNewProductToCart(Array $arr_cart,Int $newProductId, Int $numberOfProduct = 1): int
    {
        $total_point = 0;
        foreach ($arr_cart as $id => $cart) {
            if($cart['type_product'] == NORMAL_TYPE){
                $total_point += 50 * $cart['quantity'];
            }elseif($cart['type_product'] == GIFT_TYPE){
                $productPoint = $this->getProductPoint($id);
                $total_point = $total_point - $productPoint * $cart['quantity'];
            }
        }
        $newProductPoint = $this->getProductPoint($newProductId);
        $total_point -= $newProductPoint * $numberOfProduct;
        return $total_point;
    }

    public function getTotalPoint(Array $arr_cart,Int $newProductId, Int $numberOfProduct = 1): Int
    {
        $total_point = 0;
        foreach ($arr_cart as $id => $cart) {
            if($cart['type_product'] == NORMAL_TYPE){
                $total_point += 50 * $cart['quantity'];
                if($id == $newProductId)
                {
                    $total_point += 50;
                }
            }elseif($cart['type_product'] == GIFT_TYPE){
                $productPoint = $this->getProductPoint($id);
                $total_point = $total_point - $productPoint * $cart['quantity'];
                if($id == $newProductId)
                {
                    $total_point = $total_point - $productPoint * $numberOfProduct;
                }
            }
        }
        return $total_point;
    }

    public function findProductById($id)
    {
        return $this->DB->table('Product')->find(['id'=>$id]);
    }

    public function numberFm(Int $number)
    {
        return number_format($number,0,'.','.');
    }

    public function calculateTotalPriceAndLeftoverPointProduct($transport_fee): Array
    {
        $session = new Session();
        $arr_cart = $session->read('arr_cart');
        $total_price = 0;
        $total_point = 0;
        $point_award = 0;
        foreach ($arr_cart as $product_id => $product) {
            $currentProduct = $this->findProductById($product_id);
            if($product['type_product'] == NORMAL_TYPE)
            {
                $total_price += $currentProduct->price * $product['quantity'];
                $point_award += 50 * $product['quantity'];
            }elseif($product['type_product'] == GIFT_TYPE){
                $total_point += $currentProduct->point * $product['quantity'];
            }
        }
        $total_price += $transport_fee;
        $leftover_point = $total_point - $point_award;
        return ['total_price'=>$total_price,'leftover_point' => $leftover_point];
    }

    public function deleteCart(): void
    {
        $session = new Session();
        $session->delete('arr_cart');
    }
}
