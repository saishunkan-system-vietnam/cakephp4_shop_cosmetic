<?php

use Cake\Routing\Router;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= Router::url('/css/create-account-and-bill.css',true) ?>">
</head>
<body>
    <div class="login-page">
    <p>Nhập thêm password để tạo tài khoản hoành thành đơn hàng</p>
        <div class="form">
            <form class="login-form" action="" method="post">
                <input type="password" id="password" name="password" placeholder="password"/>
                <button>login</button>
            </form>
        </div>
    </div>
</body>
</html>
