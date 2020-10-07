<?php
namespace App\Controller;

use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;

class UserController extends AppController
{
    public function dashBoard()
    {
        $products = TableRegistry::getTableLocator()->get('Product')->find()->select(['id','name','price','image','slug']);
        $id_user = $this->getSessionUser();
        $user=empty($id_user)? '' : $this->User->find()->where(['id'=>$id_user])->first();
        if(!empty($user)){
            $this->set('user',$user);
        }

        $this->set('products',$products);
        $this->viewBuilder()->setLayout('user');
        return $this->render('dash_board');
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
}
