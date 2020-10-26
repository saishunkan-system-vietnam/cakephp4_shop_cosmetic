<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class SecurityComponent extends Component{

    public function bcrypt($password)
    {
        $options = ['const'=>12];
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function checkBcrypt($password,$hashed): bool
    {
        return password_verify($password, $hashed);
    }
}
