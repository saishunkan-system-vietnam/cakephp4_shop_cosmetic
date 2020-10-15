<?php
namespace App\Controller;

use App\Service\DataTable;
use App\Service\Event;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class UserController extends AppController
{
    public function dashBoard()
    {
        $search = $this->request->getQuery('q');
        if(!isset($search)){
            $products = TableRegistry::getTableLocator()
            ->get('Product')
            ->find()
            ->where(['deleted !='=>1])
            ->select(['id','name','price','image','slug','point','type_product']);
            $id_user = $this->getSessionUser();
            $user=empty($id_user)? '' : $this->User->find()->where(['id'=>$id_user])->first();
            if(!empty($user)){
                $this->set('user',$user);
            }

            $this->set('products',$products);
            $this->viewBuilder()->setLayout('user');
            return $this->render('dash_board');
        }
        else{
            $products = TableRegistry::getTableLocator()
            ->get('Product')
            ->find()
            ->where(['name LIKE'=> "%$search%"]);

            $this->set('products',$products);
            $this->viewBuilder()->setLayout('user');
            return $this->render('search');
        }
    }

    public function getLogin()
    {
        $this->viewBuilder()->setLayout('login');
        return $this->render('login');
    }

    public function processLogin()
    {
        $email    = $this->request->getData('email');
        $password = md5($this->request->getData('password'));
        $user    = $this->User->find()->where(['email' => $email,'password' => $password])->first();
        if(empty($user))
        {
            $this->set('err',"Sai email hoặc mật khẩu");
            return $this->redirect('/login');
        }
        $session = $this->request->getSession();
        $session->write('id_user', $user['id']);
        $session->write('full_name', $user['full_name']);
        $session->write('avatar', $user['avatar']);
        return $this->redirect('/');
    }

    public function logOut()
    {
        $session = $this->request->getSession();
        $session->destroy();
        return $this->redirect('/');
    }

    public function register()
    {
        $this->viewBuilder()->setLayout('login');
        $this->render('register');
    }

    public function processRegister()
    {
        try {
            $request=$this->request->getData();
            $full_name = $request['full_name'];
            $email     = $request['email'];
            $password  = md5($request['password']);
            $address   = $request['address'];
            $phone     = $request['phone'];
            $gender    = $request['gender']==true ? 1 : 0;

            $userTable       = $this->getTableLocator()->get('User');
            $user            = $userTable->newEmptyEntity();
            $user->full_name = $full_name;
            $user->email     = $email;
            $user->password  = $password;
            $user->address   = $address;
            $user->phone     = $phone;
            $user->gender    = $gender;
            $user->deleted   = 0;
            $userTable->save($user);

            $id_user = $this->User->find()->where(['email'=>$email])->first();
            $session = $this->request->getSession();
            $session->write('id_user',$id_user->id);
            return $this->redirect('/');
        } catch (\Throwable $th) {
            $this->redirect('/register');
        }
    }


    public function getSessionUser()
    {
        $session = $this->request->getSession();
        return $session->read('id_user');
    }

    public function checkExistEmail()
    {
        $email    = $this->request->getQuery('email');
        $user     = $this->User->find()->where(['email'=>$email])->first();
        $response = false;
        if(!empty($user)){
            $response = true;
        }
        $this->set(['status' => $response]);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function forgotPassword()
    {
        $this->viewBuilder()->setLayout('login');
        return $this->render('forgot_password');
    }

    public function checkUserEmailExists()
    {
        try {
            $email = $this->request->getQuery()['email'];
            $user = $this->User->find()->where(['email'=>$email])->first();
            if(!empty($user)){
                $data['status'] = 200;
                $data['isExists'] = true;
            }
            else{
                $data['status'] = 404;
                $data['isExists'] = false;
            }

            $this->set($data);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
        } catch (\Throwable $th) {
            $data['status']  = 500;
            $data['message'] = $th->getMessage();
            $this->set($data);
            $this->viewBuilder()->setOption('serialize', true);
            $this->RequestHandler->renderAs($this, 'json');
        }
    }

    public function sendUserEmailForgotPassword()
    {
        $email          = $this->request->getData()['email'];
        $userTable      = TableRegistry::getTableLocator()->get('User');
        $user           = $userTable->find()->where(['email' => $email])->first();
        $password       = uniqid().rand(1,2);
        $user->password = md5($password);
        $full_name      = $user->full_name;
        $userTable->save($user);

        $mailer = new Mailer();
        $mailer->setTransport('gmail');
        $mailer->setEmailFormat('html')
            ->setSubject("Quên mật khẩu ???")
            ->setViewVars(['password'=>$password,'full_name'=>$full_name])
            ->setTo($email)
            ->setFrom('thuanvp012van@gmail.com')
            ->viewBuilder()
            ->setTemplate('mail_forgot_password','default');
        $mailer->deliver();
        $this->Flash->set('Nhập password trong email được gửi');
        return $this->redirect('/login');
    }

    public function listUsers()
    {
        $this->render('list_users');
    }

    public function renderListUser()
    {
        $paramQuery = $this->request->getQuery();
        $columns = [
            'id',
            'email',
            'full_name',
            'avatar',
            'phone',
            'address',
            'gender',
            'deleted'
        ];
        $dataTable = DataTable::input('User',
            $columns,
            $paramQuery,
            ['email','full_name','address','phone']
        );

        $data = [];
        $data["draw"]            = intval($paramQuery['draw']);
        $data["recordsTotal"]    = $dataTable['totalData'];
        $data["recordsFiltered"] = $dataTable['totalData'];
        $data['data']            = [];
        foreach ($dataTable['listData'] as $user) {
            $data['data'][] = [
                $user->id,
                h($user->email),
                h($user->full_name),
                "<img src='".Router::url('/images/avatar/'.$user->avatar,true)."' style='width: 70px'>",
                $user->phone,
                h($user->address),
                $user->gender == true ? "Nam" : "Nữ",
                $user->deleted == true
                ? "<a href='".Router::url(["_name"=>"unLockUser","fullBase"=>true,'id_user'=>$user->id])."'>Mở</a>"
                : "<a href='".Router::url(["_name"=>"lockUser","fullBase"=>true,'id_user'=>$user->id])."'>Khóa</a>",
                "<a href='".Router::url("/admin/user/$user->id")."'>Chi tiết</a>"
            ];
        }
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function userDetail()
    {
        $id_user = $this->request->getParam('id_user');
        $user    = TableRegistry::getTableLocator()->get('User')->get($id_user);
        $this->set('user',$user);
        return $this->render('user_detail');
    }

    public function updateProfileUser()
    {
        try {
            $profile   = $this->request->getData();
            $UserTable = TableRegistry::getTableLocator()->get('User');
            $user      = $UserTable->get($profile['id_user']);
            $file      = $profile['avatar'];
            $extFile   = pathinfo($profile['avatar']->getclientFilename(), PATHINFO_EXTENSION);
            $path_img  = WWW_ROOT . "images\avatar";
            if ($file != '') {
                if (in_array(strtolower($extFile), ['jpg', 'png', 'jpeg', 'gif'])) {
                    if (!file_exists($path_img)) {
                        mkdir($path_img, 0755, true);
                    }

                    $date       = date('Ymd');
                    $filename   = $date . "_" . uniqid() . "." . $extFile;
                    $targetFile = WWW_ROOT . "images\avatar" . DS . $filename;
                    $file->moveTo($targetFile);

                    if (file_exists($path_img . DS . $user->avatar)) {
                        $oldImage = WWW_ROOT . "images\avatar" . DS . $user->avatar;
                        unlink($oldImage);
                    }
                }
            }
            //change profile
            $user->avatar    = !empty($filename) ? $filename : $user->avatar;
            $user->full_name = $profile['full_name'];
            $user->email     = $profile['email'];
            $user->full_name = $profile['full_name'];
            $user->address   = $profile['address'];
            $user->deleted   = $profile['deleted'];
            $user->phone     = $profile['phone'];
            $user->gender    = $profile['gender'];
            $UserTable->save($user);
            //change session image
            return $this->redirect('/admin/user/'.$profile['id_user']);
        } catch (\Throwable $th) {
            return $this->redirect('/admin/profile'.$profile['id_user']);
        }
    }

    public function lockUser()
    {
        try {
            $id_user = $this->request->getParam('id_user');
            $userTable = TableRegistry::getTableLocator()->get('User');
            $user = $userTable->get($id_user);
            $user->deleted = 1;
            $userTable->save($user);
            Event::Pusher(['id_user'=>$id_user],'my-channel','my-event');
            $this->Flash->set("Khóa người dùng thành công");
            return $this->redirect('/admin/list-users');
        } catch (\Throwable $th) {
            $this->Flash->set('Lỗi hệ thống');
            return $this->redirect('/admin/list-users');
        }
    }

    public function unLockUser()
    {
        try {
            $id_user = $this->request->getParam('id_user');
            $userTable = TableRegistry::getTableLocator()->get('User');
            $user = $userTable->get($id_user);
            $user->deleted = 0;
            $userTable->save($user);
            $this->Flash->set("Mở khóa người dùng thành công");
            return $this->redirect('/admin/list-users');
        } catch (\Throwable $th) {
            $this->Flash->set('Lỗi hệ thống');
            return $this->redirect('/admin/list-users');
        }
    }

    public function autoLogOut()
    {
        $session = $this->request->getSession();
        if($session->check('id_user'))
        {
            $session->destroy();
            $data = [
                'status' => '200',
                'message' => 'Lock user account successfully'
            ];
        }
        else{
            $data = [
                'status' => 404,
                'message' => 'Can not found session id'
            ];
        }
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
