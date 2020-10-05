<?php

use Cake\Routing\Router;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V10</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/bootstrap/css/bootstrap.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/animate/animate.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/css-hamburgers/hamburgers.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/animsition/css/animsition.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/select2/select2.min.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/daterangepicker/daterangepicker.css') ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/css/util-forgot-password.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/css/main-forgot-password.css') ?>">
<!--===============================================================================================-->

    <style>
        .err{
            color: red;
            visibility: hidden;
        }
    </style>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-50 p-b-90">
				<form action="<?= Router::url(['_name'=>'send_email_forgot_password','fullBase' => 'true']) ?>" method="post" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-51">
						Quên mật khẩu
					</span>
                    <div class="login100-form-title">
                        <p>
                            Nhập email vào đây chúng tôi sẽ gửi cho bạn mật khẩu
                        </p>
                    </div>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Email is required">
						<input class="input100 email" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
                    </div>
                    <div><p class="err">asdas</p></div>
					<div class="container-login100-form-btn m-t-17">
						<button id="send_mail" class="login100-form-btn">
							Gửi mail
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/animsition/js/animsition.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/bootstrap/js/popper.js') ?>"></script>
	<script src="<?= Router::url('/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/daterangepicker/moment.min.js') ?>"></script>
	<script src="<?= Router::url('/vendor/daterangepicker/daterangepicker.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/vendor/countdowntime/countdowntime.js') ?>"></script>
<!--===============================================================================================-->
	<script src="<?= Router::url('/js/main-forgot-password.js') ?>"></script>
    <script>
        var email = $(".email");
        var regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var err = $(".err");
        var flag = true;
        var status = true;
        email.keyup(function(){
            if(regex_email.test(email.val()) == false)
            {
                err.html("*Email không đúng địng dạng");
                err.css('visibility','inherit');
                flag = false;
            }
            else{
                $.ajax({
                    type: "GET",
                    url: "<?= Router::url(['_name'=>'check_email_exists','fullBase' => 'true']) ?>",
                    data: {
                        email:email.val()
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if(response.isExists == false)
                        {
                            err.html("*Email này không tồn tại");
                            err.css('visibility','inherit');
                            flag = false;
                        }
                        else if(response.status == 500)
                        {
                            err.html("*Lỗi server");
                            err.css('visibility','inherit');
                            flag = false;
                        }
                        else{
                            err.html("abc");
                            err.css('visibility','hidden');
                            flag = true;
                        }
                    }
                });
            }
        });

        $("#send_mail").click(function(e){
            if(email.val().length==0)
            {
                err.html("*Email không được để trống");
                err.css('visibility','inherit');
                flag = false;
            }

            if(flag == false)
            {
                e.preventDefault();
            }
        })
    </script>
</body>
</html>
