<?php

use App\Middleware\CheckLoginAdminMiddleware;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
$routes->setRouteClass(DashedRoute::class);

//login admin
$routes->connect('/admin/login',
    ['controller' => 'Admin', 'action' => 'getLogin'],
    ['_name'=>'login']
);

$routes->post('/admin/process-login',
    ['controller' => 'Admin', 'action' => 'processLogin'],
    'processLogin'
);

$routes->get('/admin/forgot-password',
    ['controller'=>'Admin','action'=>'forgotPassword'],
    'forgot_password'
);

$routes->get('/admin/check-email-exists',
    ['controller'=>'Admin','action'=>'checkAdminEmailExists'],
    'check_email_exists'
);

$routes->post('/admin/send-email-forgot-password',
    ['controller'=>'Admin','action'=>'sendEmailForgotPassword'],
    'send_email_forgot_password'
);

$routes->scope('/admin', function (RouteBuilder $builder) {
    $builder->registerMiddleware('CheckLoginAdmin',new CheckLoginAdminMiddleware());
    $builder->applyMiddleware('CheckLoginAdmin');

    $builder->get('/',
        ['controller' => 'Admin', 'action' => 'dashBoard'],
        'dashBoard'
    );

    $builder->get('/profile',
        ['controller' => 'Admin', 'action' => 'profile'],
        'profile'
    );

    $builder->post('/update-profile',
        ['controller' => 'Admin', 'action' => 'updateProfile'],
        'update-profile'
    );

    $builder->get('/list-users',
        ['controller'=>'Admin','action'=>'listUsers'],
        'list_users'
    );

    $builder->get('/render-list-user',['controller'=>'Admin','action'=>'renderListUser']);

    $builder->get('/logout',['controller'=>'Admin','action'=>'logOut']);

    $builder->get('/user/:id_user',['controller'=>'Admin','action'=>'userDetail']);

    $builder->post('/update-profile-user',
        ['controller'=>'Admin','action'=>'updateProfileUser'],
        'update_profile_user'
    );

    $builder->get('/check-user-email-exists',
        ['controller'=>'Admin','action'=>'checkUserEmailExistsByAdmin'],
        'checkUserEmailExistsByAdmin'
    );

    $builder->get('/check-user-phone-exists',
        ['controller'=>'Admin','action'=>'checkUserPhoneExistsByAdmin'],
        'checkUserPhoneExistsByAdmin'
    );

    $builder->get('/create-product',
        ['controller'=>'Product','action'=>'createProduct'],
        'createProduct'
    );

    $builder->post('/process-create-product',
        ['controller'=>'Product','action'=>'processCreateProduct'],
        'processCreateProduct'
    );

    $builder->post('/upload-image-ckeditor',
        ['controller'=>'Admin','action'=>'uploadImageCkeditor'],
        'uploadImageCkeditor'
    );

    $builder->connect('/create-trademark',
        ['controller'=>'Admin','action'=>'createTrademark'],
        ['_name'=>'createTrademark']
    );

    $builder->get('/list-trademark',
        ['controller'=>'Admin','action'=>'listTrademark'],
        'listTrademark'
    );

    $builder->get('/render-list-trademark',
        ['controller'=>'Admin','action'=>'renderListTrademark'],
        'renderListTrademark'
    );

    $builder->get('/list-product',
        ['controller'=>'Product','action'=>'listProduct'],
        'listProduct'
    );

    $builder->get('/render-list-product',
        ['controller'=>'Product','action'=>'renderListProduct'],
        'renderListProduct'
    );

    $builder->get('/product/:id_product',
        ['controller'=>'Product','action'=>'showProduct'],
        'showProduct'
    );

    $builder->post('/update-product/:id_product',
        ['controller'=>'Product','action'=>'updateProduct'],
        'updateProduct'
    );

    $builder->get('/product/delete/:id_product',
        ['controller'=>'Product','action'=>'deleteProduct'], // dự định sau khi làm đặt hàng
        'deleteProduct'
    );

    // $builder->get('/test',['controller'=>'Test','action'=>'abc']);

    $builder->fallbacks();
});

$routes->scope('/',function (RouteBuilder $builder){

    $builder->get('/',['controller' => 'User', 'action' =>'dashBoard']);

    $builder->get('/login',['controller'=>'User','action' =>'getLogin']);

    $builder->post('/process-login',['controller'=>'User','action' =>'processLogin']);

    $builder->get('/logout',['controller'=>'User','action'=>'logOut']);

    $builder->get('/register',['controller'=>'User','action'=>'register']);

    $builder->post('/process-register',['controller'=>'User','action'=>'processRegister']);

    $builder->get('/check-exist-email',['controller'=>'User','action'=>'checkExistEmail']);

    $builder->get('/forgot-password',['controller'=>'User','action'=>'forgotPassword'],'forgot_password_user');

    $builder->get('/check-email-exists',['controller'=>'User','action'=>'checkUserEmailExists'],'checkUserEmailExists');

    $builder->post('/send-user-email-forgot-password',
        ['controller'=>'User','action'=>'sendUserEmailForgotPassword'],
        'sendUserEmailForgotPassword'
    );

    $builder->get('/show-product/:id_product',
        ['controller'=>'Product','action'=>'showProduct'],
        'showProductInUser'
    );

    $builder->fallbacks();
});

$routes->scope('/product', function (RouteBuilder $builder) {
    $builder->get('/',['controller'=>'Product','action'=>'index']);
    $builder->fallbacks();
});
