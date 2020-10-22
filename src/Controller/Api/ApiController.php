<?php

namespace App\Controller\Api;

use App\Controller\AppController;

class ApiController extends AppController{

    public function responseJson($data)
    {
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
