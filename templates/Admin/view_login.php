<?php

use Cake\Routing\Router;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V11</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= Router::url('/images/icons/favicon.ico','true')?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/bootstrap/css/bootstrap.min.css','true')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/fonts/font-awesome-4.7.0/css/font-awesome.min.css','true')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/fonts/Linearicons-Free-v1.0.0/icon-font.min.css','true')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/animate/animate.css','true')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/css-hamburgers/hamburgers.min.css','true')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/vendor/select2/select2.min.css','true')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/css/util.css','true')?>">
	<link rel="stylesheet" type="text/css" href="<?= Router::url('/css/main.css','true')?>">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form id="form-login" class="login100-form validate-form" action="<?= Router::url('/admin/process-login',true); ?>" method="post">
                    <h3>
                        <?php
                            if(isset($err))
                            {
                                echo $err;
                            }
                        ?>
                    </h3>
					<span class="login100-form-title p-b-55">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 email" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100 password" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember Me
						</label>
					</div>
                    <?= $this->Flash->render() ?>
					<div class="container-login100-form-btn p-t-25">
						<button id="submit" class="login100-form-btn">
							Login
						</button>
                    </div>`
                    <div>
                        <a href="<?= Router::url(['_name' => 'forgot_password', 'fullBase' => 'true']) ?>">Forgot Password</a>
                    </div>
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->
<script src="<?= Router::url('/vendor/jquery/jquery-3.2.1.min.js','true')?>"></script>
<script>
$(document).ready(function () {
    var email = $(".email");
    var password = $(".password");
    var regex_email= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var regex_pass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    let flag = true;
    email.keyup(function(){
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
                    email.css("border","1.5px solid #c91fe8");
                    email.prop('title',"Email không tồn tại");
                    flag = false;
                }
                else if(response.status == 500)
                {
                    email.css("border","1.5px solid #c91fe8");
                    email.prop('title',"Lỗi server");
                    flag = false;
                }
                else{
                    email.css("border","none");
                    email.prop('title',"");
                    flag = true;
                }
            }
        });
    })

    $("#submit").click(function(e){
        if(email.val()=='')
        {
            email.css("border","1.5px solid red");
            email.prop('title',"Email không được để trống");
            e.preventDefault();
        }
        else if(regex_email.test(email.val())==false)
        {
            email.css("border","1.5px solid yellow");
            email.prop('title',"Email không đúng định dạng");
            e.preventDefault();
        }
        else{
            if(flag == false)
            e.preventDefault();
        }

        if(password.val()=='')
        {
            password.css("border","1.5px solid red");
            password.prop('title',"Password không được để trống");
            e.preventDefault();
        }
        else if(regex_pass.test(password.val())==false)
        {
            password.css("border","1.5px solid yellow");
            password.prop('title',"Password tối thiểu tám ký tự, ít nhất một chữ cái và một số");
            e.preventDefault();
        }
        else{
            password.css("border","none");
            password.prop('title',"");
        }
    })
});

</script>
</body>
</html>
