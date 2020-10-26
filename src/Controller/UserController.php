<?php
namespace App\Controller;

use App\Controller\CommonController;
use App\Service\Event;
use Cake\Event\EventInterface;
use Cake\Http\Session;
use Cake\Mailer\Mailer;
use Cake\ORM\TableRegistry;

class UserController extends CommonController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('User');
        $this->loadComponent('Authen');
        $this->loadComponent('Event');
    }

    public function dashBoard()
    {
        $search = $this->request->getQuery('q');
        if(!isset($search)){
            $products = $this->User->getProductNotDeletedAndNormalType();
            $this->set('products',$products);
            $this->viewBuilder()->setLayout('user');
            return $this->render('dash_board');
        }
        else{
            $products = $this->User->searchProductNotDeletedAndNormalType($search);
            if($products != false)
            {
                $this->set('products',$products);
                $this->viewBuilder()->setLayout('user');
                return $this->render('search');
            }
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
        $password =$this->request->getData('password');
        if($this->Authen->guard('User')->login(['email'=>$email,'password'=>$password]))
        {
            return $this->redirect('/');
        }
        $this->set('err',"Sai email hoặc mật khẩu");
        return $this->redirect('/login');
    }

    public function logOut()
    {
        $this->Authen->logOut();
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
            $userInfo = $this->request->getData();
            $userInfo['gender']    = $userInfo['gender'] == true ? 1 : 0;
            $userInfo['avatar'] = ' ';
            $userInfo['point'] = 0;
            $userInfo['deleted'] = 0;
            if($this->Authen->guard('User')->register($userInfo));
            {
                return $this->redirect('/');
            }
        } catch (\Throwable $th) {
            $this->redirect('/register');
        }
    }


    public function checkEmailExists()
    {
        $email    = $this->request->getQuery('email');
        $user     = $this->User->findBySomething(['email'=>$email]);
        $response = false;
        if(!empty($user)){
            $response = true;
        }
        $this->responseJson(['status'=>$response]);
    }

    public function checkExistPhone()
    {
        $phone    = $this->request->getQuery('phone');
        $user     = $this->User->findBySomething(['phone'=>$phone]);
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

    public function sendUserEmailForgotPassword()
    {
        $email = $this->request->getData()['email'];
        if($this->User->sendEmailForgotPassword($email) == true)
        {
            $this->Flash->set('Nhập password trong email được gửi');
        }
        return $this->redirect('/login');
    }

    public function listUsers()
    {
        $this->render('list_users');
    }

    public function renderUserList()
    {
        $params = $this->request->getQuery();
        $users = $this->User->renderUserList($params);
        $this->responseJson($users);
    }

    public function userDetail()
    {
        $user_id = $this->request->getParam('id_user');
        $user    = $this->User->showUser($user_id);
        $this->set('user',$user);
        return $this->render('user_detail');
    }

    public function updateProfileUser()
    {
        try {
            $profile   = $this->request->getData();
            $user_id = $this->request->getParam('user_id');
            if($this->User->updateUser($user_id, $profile) != false)
            {
                return $this->redirect('/admin/user/'.$user_id);
            }
        } catch (\Throwable $th) {
            return $this->redirect('/admin/user/'.$user_id);
        }
    }

    public function lockUser()
    {
        try {
            $id_user = $this->request->getParam('id_user');
            $profile = ['deleted'=>DELETED];
            $this->User->updateUser($id_user, $profile);
            $this->Flash->set("Khóa người dùng thành công");
            $this->Event->pusher(['id_user'=>$id_user],'my-channel','my-event');
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
            $profile = ['deleted'=>NOT_DELETED];
            $this->User->updateUser($id_user, $profile);
            $this->Flash->set("Mở khóa người dùng thành công");
            return $this->redirect('/admin/list-users');
        } catch (\Throwable $th) {
            $this->Flash->set('Lỗi hệ thống');
            return $this->redirect('/admin/list-users');
        }
    }

    public function introduce()
    {
        $this->viewBuilder()->setLayout('user');
        $this->render('introduce');
    }

}
