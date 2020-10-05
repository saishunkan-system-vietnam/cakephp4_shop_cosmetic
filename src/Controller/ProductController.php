<?php

namespace App\Controller;

use Cake\Controller\Controller;

class ProductController extends Controller{

    public function index()
    {
       $products = $this->Product->find();
       $this->set('products',$products);
       return $this->render('index');
    }

}
