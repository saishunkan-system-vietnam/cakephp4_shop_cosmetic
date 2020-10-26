<?php

namespace App\Controller;

use App\Controller\AppController;

class CommonController extends AppController{

    public function responseJson($data)
    {
        header('Content-Type: application/json');
        print_r(json_encode($data));
        die();
    }
}
