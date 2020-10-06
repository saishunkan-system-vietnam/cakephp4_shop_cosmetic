<?php

namespace App\Service;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class CheckInfo extends AppController{


    static function checkInfoExists($table,$info,$oldInfo='',$type)
    {
        $checker = new CheckInfo();
        try {
            $data['status'] = 404;
            $data['isExists'] = false;
            if($info == $oldInfo)
            {
                return $data;
            }
            $person = TableRegistry::getTableLocator()->get($table)->find()
            ->where(["$type"=>$info])->first();
            if(!empty($person)){
                $data['status'] = 200;
                $data['isExists'] = true;
            }
            return $data;
        } catch (\Throwable $th) {
            $data['status']  = 500;
            $data['message'] = $th->getMessage();
            return $data;
        }
    }
}
