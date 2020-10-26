<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class UserComponent extends Component{

    public $components = ['DataTable','DB','Mail','Security','File'];

    public function initialize(array $config): void
    {
        $this->DataTable;
        $this->DB;
        $this->Mail;
        $this->Security;
    }

    public function renderUserList($params)
    {
        $config = [
            'params'=> $params,
            'selectColumns'=>['id','email','full_name','avatar','phone','address','gender','deleted'],
            'searchColumns'=>['email','full_name','address'],
        ];
        $sampleArr = [
            'id',
            'email',
            'full_name',
            ['function'=>'route','url'=>'/'.AVATAR_PATH.'/:avatar','tag'=>'img','attr'=>['onerror'=>'imgError(this)']],
            'phone',
            'address',
            ['function'=>'dissection','col'=>'gender','text'=>[MALE=>'Nam',FEMALE=>'Nữ'],'tag'=>null],
            [
                'function'=>'dissection',
                'col'=>'deleted',
                'text'=>[DELETED=>'Khóa',NOT_DELETED=>'Mở'],
                'tag'=>'a',
                'url'=>[NOT_DELETED=>'/admin/lock-user/:id',DELETED=>'/admin/unlock-user/:id']
            ],
            ['function'=>'route','col'=>'id','url'=>'/admin/user/:id','text'=>'Chi tiết','tag'=>'a']
        ];
        return $this->DataTable->renderListData('User',$config)->exportListData($sampleArr);
    }

    public function searchProductNotDeletedAndNormalType($search)
    {
        try {
            $products = $this->DB->table('Product')
            ->where(['deleted'=>NOT_DELETED,'type_product'=>NORMAL_TYPE,'name LIKE'=>"%$search%"])
            ->select('id','name','price','image','slug')
            ->get();
            return $products;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getProductNotDeletedAndNormalType()
    {
        try {
            $products = $this->DB->table('Product')
            ->where(['deleted'=>NOT_DELETED,'type_product'=>NORMAL_TYPE])
            ->select('id','name','price','image','slug')
            ->get();
            return $products;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getUserInfo($user_id)
    {
        return $this->DB->table('User')->find(['id'=>$user_id]);
    }

    public function findBySomething($condition)
    {
        return $this->DB->table('User')->find($condition);
    }

    public function sendEmailForgotPassword(String $email) : bool
    {
        try {
            $userTable = $this->DB->table('User');
            $user = $userTable->find(['email'=>$email]);
            $password = uniqid().rand(1,2);
            $user->password = $this->Security->bcrypt($password);
            if($userTable->save($user))
            {
                $config = [
                    'from'=> 'thuanvp012van@gmail.com',
                    'subject' => 'Quên mật khẩu ???',
                ];

                $nameAndEmail = [$user->full_name=>$email];
                $viewVars = ['password'=>$password,'full_name'=>$user->full_name];
                $templateAndLayout = [
                    'template' => 'mail_forgot_password',
                ];
                $this->Mail->send($config,$nameAndEmail,$viewVars,$templateAndLayout);
                return true;
            }
            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function showUser($user_id)
    {
        return $this->DB->table('User')->find(['id'=>$user_id]);
    }

    public function updateUser($user_id, $profile)
    {
        $userTable = $this->DB->table('User');
        $file = !empty($profile['img']) ? $profile['img'] : '';
        $user = $userTable->find(['id'=>$user_id]);
        if(!empty($file)){
            $fileName = $this->File->uploadImage($file,AVATAR_PATH);
            if($fileName != null){
                $oldFilePath = AVATAR_PATH.'/'.$user->avatar;
                if($this->File->deleteFile($oldFilePath))
                {
                    $profile['avatar'] = $fileName;
                }
            }
        }
        unset($profile['img']);
        return $this->DB->table('User')->update($user_id, $profile);
    }
}
