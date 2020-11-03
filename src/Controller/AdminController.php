<?php

namespace App\Controller;

use App\Service\CheckInfo;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class AdminController extends CommonController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authen');
        $this->loadComponent('DataTable');
        $this->loadComponent('Security');
        $this->loadComponent('Admin');
        $this->loadComponent('Mail');
        $this->loadComponent('File');
    }

    public function dashBoard()
    {

        $newOrders = TableRegistry::getTableLocator()->get('Bill')->find()->where(['status'=>0])->count();
        $countUsers = TableRegistry::getTableLocator()->get('User')->find()->count();
        $this->set(['newOrders' => $newOrders,'countUsers' => $countUsers]);
        $this->render('dashboard');
    }

    public function getLogin()
    {
        if ($this->Authen->guard('Admin')->check()) {
            $this->redirect('/admin');
        } else {
            $this->viewBuilder()->setLayout('login');
            $this->render('view_login');
        }
    }

    public function processLogin()
    {
        $email    = $this->request->getData('email');
        $password = $this->request->getData('password');
        if($this->Authen->guard('Admin')->login(['email'=>$email,'password'=>$password]))
        {
            return $this->redirect('/admin');
        }
        $this->Flash->set('Sai email hoặc mật khẩu');
        return $this->redirect('/admin/login');
    }

    public function profile()
    {
        $admin_id = $this->Authen->guard('Admin')->getId();
        if(!empty($admin_id)){
            $admin = $this->Admin->show(['id'=>$admin_id]);
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
            $this->Flash->set('Đổi thông tin thành công',[
                'key' =>'change_profile'
            ]);
            return $this->redirect('/admin/profile');
        } catch (\Throwable $th) {
            return $this->redirect('/admin/profile');
        }
    }

    public function logOut()
    {
        $this->Authen->guard('Admin')->logOut();
        return $this->redirect('/admin/login');
    }

    public function forgotPassword()
    {
        $this->viewBuilder()->setLayout('login');
        return $this->render('forgot_password');
    }

    public function checkAdminEmailExists()
    {
        $email = $this->request->getQuery('email');
        $data = CheckInfo::checkInfoExists('admin',$email,'','email');

        $this->responseJson($data);
    }

    public function checkUserEmailExistsByAdmin()
    {
        $email   = $this->request->getQuery('email');
        $id_user = $this->request->getQuery('id_user');
        $oldEmail = TableRegistry::getTableLocator()->get('user')->get($id_user)->email;
        $data = CheckInfo::checkInfoExists('user', $email,$oldEmail,'email');

        $this->responseJson($data);
    }

    public function checkUserPhoneExistsByAdmin()
    {
        $phone   = $this->request->getQuery('phone');
        $id_user = $this->request->getQuery('id_user');
        $oldPhone = TableRegistry::getTableLocator()->get('user')->get($id_user)->phone;
        $data = CheckInfo::checkInfoExists('user', $phone,$oldPhone,'phone');
        $this->responseJson($data);
    }

    public function sendEmailForgotPassword()
    {
        $email = $this->request->getData()['email'];
        $admin = $this->Admin->show(['email'=>$email]);
        $password = uniqid().rand(1,2);
        $admin->password = $this->Security->bcrypt($password);
        if($this->Admin->update(['password'=>$admin->password], $admin->id))
        {
            $full_name = $admin->full_name;
            $config = ['from'=>'thuanvp012van@gmail.com','subject'=>'Quên mật khẩu ???'];
            $nameAndEmail = [$admin->full_name => $admin->email];
            $viewVars = ['password'=>$password,'full_name'=>$full_name];
            $template = ['template'=> 'mail_forgot_password'];
            $this->Mail->send($config, $nameAndEmail, $viewVars, $template);
            $this->Flash->set('Nhập password trong email được gửi');
            return $this->redirect('/admin/login');
        }
    }

    public function uploadImageCkeditor()
    {
        $file = $this->request->getData()['upload'];
        $file_name = $this->File->uploadImage($file, PRODUCT_PHOTO_PATH);
        if($file_name != null)
        {
            $function_number = $this->request->getQuery('CKEditorFuncNum');
            $targetFile = WWW_ROOT . PRODUCT_PHOTO_PATH . DS . $file_name;
            $message = "Upload ảnh thành công";
            $targetFile = Router::url(DS.PRODUCT_PHOTO_PATH.DS.$file_name,true);
            $data = "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$targetFile', '$message');</script>";
            echo $data;dd();
        }
    }

    public function changePassword()
    {
        if($this->request->is('get'))
        {
            return $this->render('change_password');
        }elseif($this->request->is('post'))
        {
            $password = $this->request->getData('password');
            $admin_id = $this->Authen->guard('Admin')->getId();
            $admin = $this->Admin->show(['id'=>$admin_id]);
            $password = $this->Security->bcrypt($admin->password);
            if($this->Admin->update(['password'=>$password], $admin_id))
            {
                $this->Flash->set('Đổi mật khẩu thành công',[
                    'key' => 'change_password'
                ]);
                $this->redirect('/admin/profile');
            }
        }
    }

    public function passwordCheck()
    {
        $password = $this->request->getData('password');
        $admin = $this->Authen->guard('Admin')->getData();
        if($this->Security->checkBcrypt($password, $admin->password) == false)
        {
            $data = [
                'status' => 404,
                'message' => 'Mật khẩu cũ không đúng'
            ];
        }
        else{
            $data = [
                'status' => 200,
            ];
        }
        $this->responseJson($data);
    }
}
