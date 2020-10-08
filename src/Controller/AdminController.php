<?php

namespace App\Controller;

use App\Service\CheckInfo;
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

    public function checkAdminEmailExists()
    {
        $email = $this->request->getQuery('email');
        $data = CheckInfo::checkInfoExists('admin',$email,'','email');

        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function checkUserEmailExistsByAdmin()
    {
        $email   = $this->request->getQuery('email');
        $id_user = $this->request->getQuery('id_user');
        $oldEmail = TableRegistry::getTableLocator()->get('user')->get($id_user)->email;
        $data = CheckInfo::checkInfoExists('user', $email,$oldEmail,'email');

        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function checkUserPhoneExistsByAdmin()
    {
        $phone   = $this->request->getQuery('phone');
        $id_user = $this->request->getQuery('id_user');
        $oldPhone = TableRegistry::getTableLocator()->get('user')->get($id_user)->phone;
        $data = CheckInfo::checkInfoExists('user', $phone,$oldPhone,'phone');

        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
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

    public function uploadImageCkeditor()
    {
        $file = $this->request->getData()['upload'];
        $pathImg = WWW_ROOT . "images\product";
        if(isset($file)){
            $extFile = pathinfo($file->getclientFilename(), PATHINFO_EXTENSION);
            if(in_array($extFile,['jpg', 'png', 'jpeg', 'gif']))
            {
                if(!file_exists($pathImg))
                {
                    mkdir($pathImg, 0755, true);
                }

                $date       = date('Ymd');
                $filename   = $date . "_" . uniqid() . "." . $extFile;
                $targetFile = WWW_ROOT . "images\product" . DS . $filename;
                $file->moveTo($targetFile);
                $function_number = $this->request->getQuery('CKEditorFuncNum');
                $message = 'Image uploaded successfully';
                $data = "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, 'http://localhost/cakephp4_shop_cosmetic_m/images/product/$filename', '$message');</script>";
                echo $data;
            }
        }
        dd();
    }

    public function createTrademark()
    {
        if($this->request->getMethod() == "GET")
        {
            return $this->render('Trademark/create_trademark');
        }
        elseif($this->request->getMethod() == "POST")
        {
            $trademarkName  = $this->request->getData()['name'];
            $trademarkTable = TableRegistry::getTableLocator()->get('trademark');
            $trademark      = $trademarkTable->newEmptyEntity();

            $trademark->name=$trademarkName;
            $trademarkTable->save($trademark);

            $this->Flash->set('Thêm thương hiệu thành công');
            return $this->redirect('/admin/list-trademark');
        }
    }

    public function listTrademark()
    {
        return $this->render('Trademark/list_trademark');
    }

    public function renderListTrademark()
    {
        $paramUrl = $this->request->getQuery();
        $columns = [
            'id',
            'name',
            'created_at',
            'updated_at'
        ];

        $dataTable = DataTable::input('Trademark',$columns,$paramUrl,['name']);
        $data = [];
        $data["draw"]            = $paramUrl['draw'];
        $data["recordsTotal"]    = $dataTable['totalData'];
        $data["recordsFiltered"] = $dataTable['totalData'];
        $data['data']            = [];
        foreach ($dataTable['listData'] as $trademark) {
            $created_at = strtotime($trademark->created_at);
            $updated_at = strtotime($trademark->updated_at);
            $data['data'][] = [
                $trademark->id,
                $trademark->name,
                date('d/m/Y H:i:s', $created_at),
                date('d/m/Y H:i:s', $updated_at),
                "<a href='".Router::url('')."'>Chi tiết</a>"
            ];
        }
        $this->set($data);
        $this->viewBuilder()->setOption('serialize', true);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
