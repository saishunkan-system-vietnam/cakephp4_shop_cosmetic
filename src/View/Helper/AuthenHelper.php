<?php

namespace App\View\Helper;

use Cake\Http\Session;
use Cake\ORM\TableRegistry;
use Cake\View\Helper;

class AuthenHelper extends Helper{

    private $guard;

    public $helpers = ['Authen'];

    public $components = ['Security','DB','Curd'];

    public function initialize(array $config): void
    {
        $this->Security;
        $this->DB;
        $this->Curd;
    }

    public function guard(String $model)
    {
        $this->guard = $model;
        return $this;
    }

    public function check(): bool
    {
        $session = new Session();
        $key = $this->guard."_id";
        if($session->read($key)){
            return true;
        }
        return false;
    }

    public function getData()
    {
        $session = new Session();
        $key = $this->guard."_id";
        if(empty($GLOBALS['userInfo'])){
            $GLOBALS['userInfo'] = TableRegistry::getTableLocator()->get($this->guard)->get($session->read($key));
        }
        return $GLOBALS['userInfo'];
    }

    public function getId()
    {
        $session = new Session();
        return $session->read($this->guard."_id");
    }
}
