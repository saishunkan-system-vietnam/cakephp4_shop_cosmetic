<?php

namespace App\View\Helper;

use Cake\Http\Session;
use Cake\View\Helper;

class SessionHelper extends Helper{

    public function check($key)
    {
        $session = new Session();
        return $session->check($key);
    }

    public function read($key)
    {
        $session = new Session();
        return $session->read($key);
    }
}
