<?php

use Cake\Routing\Router;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V19</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/bootstrap/css/bootstrap.min.css',true) ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/fonts/font-awesome-4.7.0/css/font-awesome.min.css',true) ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/fonts/Linearicons-Free-v1.0.0/icon-font.min.css',true) ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/animate/animate.css',true) ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/css-hamburgers/hamburgers.min.css',true) ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/animsition/css/animsition.min.css',true) ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/select2/select2.min.css',true) ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/daterangepicker/daterangepicker.css',true) ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/css/util.css',true) ?>">
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/css/main-login-user.css',true) ?>">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" action="<?= Router::url('/process-login'); ?>" method="post">
					<span class="login100-form-title p-b-33">
                        User login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 email" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100 password" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
                    <div>
                        <?= $this->Flash->render() ?>
                    </div>
					<div class="container-login100-form-btn m-t-20">
						<button id="submit" class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="<?= Router::url(['_name'=>'forgot_password_user','fullBase' => 'true']) ?>" class="txt2 hov1">
							Username / Password?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="#" class="txt2 hov1">
							Sign up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>



<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/jquery/jquery-3.2.1.min.js',true,true)?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/animsition/js/animsition.min.js',true,true)?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/bootstrap/js/popper.js',true,true)?>"></script>
	<script src="<?= Router::url('/vendor/bootstrap/js/bootstrap.min.js',true,true)?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/select2/select2.min.js',true,true)?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/daterangepicker/moment.min.js',true,true)?>"></script>
	<script src="<?= Router::url('/vendor/daterangepicker/daterangepicker.js',true,true)?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/countdowntime/countdowntime.js',true,true)?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/js/main-user-login.js',true,true)?>"></script>
    <script src="<?= Router::url('/js/validateUserLogin.js',true,true)?>"></script>
</body>
</html>
