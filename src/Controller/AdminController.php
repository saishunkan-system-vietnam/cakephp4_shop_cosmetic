<?php

namespace App\Controller;

use App\Service\DataTable;
use Cake\Database\Expression\QueryExpression;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class AdminController extends AppController
{

    public function dashBoard()
    {
        $this->render('dashboard');
    }

    public function getLogin()
    {
        $id_admin = $this->getSessionAdmin();
        if ($id_admin >= 1) {
            $this->redirect('/admin');
        } else {
            $this->viewBuilder()->setLayout('login');
            $this->render('view_login');
        }
    }

    public function processLogin()
    {
        $email    = $this->request->getData('email');
        $password = md5($this->request->getData('password'));
        $admin    = $this->Admin->find()->where(['email' => $email, 'password' => $password])->first();
        if (empty($admin)) {
            $this->Flash->set('Sai email hoặc mật khẩu');
            return $this->redirect('/admin/login');
        }
        $session = $this->request->getSession();
        $session->write('id_admin', $admin['id']);
        $session->write('full_name', $admin['full_name']);
        $session->write('avatar', $admin['avatar']);
        return $this->redirect('/admin');
    }

    public function profile()
    {
        $id_admin = $this->getSessionAdmin();
        if(!empty($id_admin)){
            $admin = $this->Admin->find()->where(['id' => $id_admin])->first();
            $this->set('admin', $admin);
            return $this->render('profile');
        }
    }

    public function updateProfile()
    {
        try {
            $profile    = $this->request->getData();
            $AdminTable = TableRegistry::getTableLocator()->get('Admin');
            $admin      = $AdminTable->get($profile['id_admin']);
            $file       = $profile['avatar'];
            $extFile    = pathinfo($profile['avatar']->getclientFilename(), PATHINFO_EXTENSION);
            $path_img   = WWW_ROOT . "images\avatar";
            if ($file != '') {
                if (in_array(strtolower($extFile), ['jpg', 'png', 'jpeg', 'gif'])) {
                    if (!file_exists($path_img)) {
                        mkdir($path_img, 0755, true);
                    }

                    $date       = date('Ymd');
                    $filename   = $date . "_" . uniqid() . "." . $extFile;
                    $targetFile = WWW_ROOT . "images\avatar" . DS . $filename;
                    $file->moveTo($targetFile);

                    if (file_exists($path_img . DS . $admin->avatar)) {
                        $oldImage = WWW_ROOT . "images\avatar" . DS . $admin->avatar;
                        unlink($oldImage);
                    }
                }
            }

            //change profile
            $admin->avatar    = !empty($filename) ? $filename : $admin->avatar;
            $admin->full_name = $profile['full_name'];
            $admin->phone     = $profile['phone'];
            $admin->gender    = $profile['gender'];
            $AdminTable->save($admin);
            //change session image
            $session = $this->request->getSession();
            $session->write('avatar', $admin->avatar);
            $session->write('full_name', $admin->full_name);
            return $this->redirect('/admin/profile');
        } catch (\Throwable $th) {
            return $this->redirect('/admin/profile');
        }
    }

    public function getSessionAdmin()
    {
        $session  = $this->request->getSession();
        return $session->read('id_admin');
    }

    public function listUsers()
    {
        $this->render('User/list_users');
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
        $hostname = $this->request->host();
        foreach ($dataTable['listData'] as $user) {
            $data['data'][] = [
                $user->id,
                $user->email,
                $user->full_name,
                "<img src='http://" . $hostname . "/images/avatar/$user->avatar' style='width: 70px'>",
                $user->phone,
                $user->address,
                $user->gender == true ? "Nam" : "Nữ",
                $user->deleted == true ? "Đang khóa" : "Đang mở",
                "<a href='".Router::url("/admin/user/$user->id")."'>Chi tiết</a>"
            ];
        }
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }


    // public function test()
    // {
    //     $faker = Factory::create();
    //     for ($i = 0; $i < 100; $i++) {
    //         $adminTable       = $this->getTableLocator()->get('User');
    //         $admin            = $adminTable->newEmptyEntity();
    //         $admin->email     = $faker->unique()->email;
    //         $admin->password  = md5($faker->password);
    //         $admin->avatar    = $faker->unique()->name;
    //         $admin->full_name = $faker->userName;
    //         $admin->phone     = $faker->unique()->e164PhoneNumber;
    //         $admin->address   = $faker->streetAddress;
    //         $admin->gender    = $faker->boolean == true ? 1 : 0;
    //         $admin->deleted   = $faker->boolean == true ? 1 : 0;
    //         $adminTable->save($admin);
    //     }

    //     dd("Ádsa");
    // }

    public function logOut()
    {
        $session = $this->request->getSession();
        $session->destroy();
        return $this->redirect('/admin/login');
    }

    public function forgotPassword()
    {
        $this->viewBuilder()->setLayout('login');
        return $this->render('/admin/forgot_password');
    }

    public function checkEmailExists()
    {
        try {
            $email = $this->request->getQuery()['email'];
            $admin = $this->Admin->find()->where(['email'=>$email])->first();
            if(!empty($admin)){
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

    public function sendEmailForgotPassword()
    {
        $email = $this->request->getData()['email'];
        $adminTable = TableRegistry::getTableLocator()->get('Admin');
        $admin = $adminTable->find()->where(['email' => $email])->first();
        $password = uniqid().rand(1,2);
        $admin->password = md5($password);
        $full_name = $admin->full_name;
        $adminTable->save($admin);

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
        return $this->redirect('/admin/login');
    }

    public function userDetail()
    {
        $id_user = $this->request->getParam('id_user');
        $user    = TableRegistry::getTableLocator()->get('User')->get($id_user);
        $this->set('user',$user);
        return $this->render('User/user_detail');
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
}
