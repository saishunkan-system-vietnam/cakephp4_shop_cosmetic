<?php

use Cake\Routing\Router;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?= Router::url('/vendor/select2/select2.min.css',true) ?>" rel="stylesheet" media="all">
    <link href="<?= Router::url('/vendor/datepicker/daterangepicker.css',true) ?>" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= Router::url('/css/main-user-register.css',true) ?>" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">
                        <?php
                            $flash = $this->Flash->render();
                            echo !empty($flash) ? $flash : "Đăng ký"
                        ?>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="<?= Router::url('/process-register',true) ?>" method="POST">
                        <div class="form-row">
                            <div class="name">Họ Tên</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="full_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Mật khẩu</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Địa chỉ</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="address">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Số điện thoại</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Giới tính</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">Chọn giới tính</option>
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red" type="submit">Đăng ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?= Router::url('/vendor/jquery/jquery-3.2.1.min.js',true) ?>"></script>
    <!-- Vendor JS-->
    <script src="<?= Router::url('/vendor/select2/select2.min.js',true) ?>"></script>
    <script src="<?= Router::url('/vendor/datepicker/moment.min.js',true) ?>"></script>
    <script src="<?= Router::url('/vendor/datepicker/daterangepicker.js',true) ?>"></script>

    <!-- Main JS-->
    <script src="<?= Router::url('/js/global.js',true) ?>"></script>

</body>

</html>
