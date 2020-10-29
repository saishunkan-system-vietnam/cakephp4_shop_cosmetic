<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Http\Session;

class AuthenComponent extends Component{

    private $guard;

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

    public function login(Array $account): bool
    {
        $user = $this->DB->table($this->guard)->find(['email'=>$account['email']]);
        if($user != false)
        {
            if($this->Security->checkBcrypt($account['password'],$user->password))
            {
                $key = "$this->guard"."_id";
                $session = new Session();
                $session->write($key,$user->id);
                return true;
            }
            return false;
        }
        return false;
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
        if(empty($GLOBALS['data']))
        {
            $GLOBALS['data'] = $this->DB->table($this->guard)->find(['id'=>$session->read($key)]);
        }
        return $GLOBALS['data'];
    }

    public function register(Array $data): bool
    {
        $data['password'] = $this->Security->bcrypt($data['password']);
        $newData = $this->Curd->add($this->guard,$data);
        if($newData != false)
        {
            $key = $this->guard."_id";
            $session = new Session();
            $session->write($key,$newData->id);
            return true;
        }
        return false;
    }

    public function logOut()
    {
        session_start();
        session_destroy();
    }

    public function getId()
    {
        $session = new Session();
        $key = $this->guard."_id";
        $id = $session->read($key);
        if(!empty($id)){
            return $id;
        }
        return false;
    }
}
