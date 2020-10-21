<?php

use Cake\Routing\Router;
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Đổi mật khẩu</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Đổi mật khẩu</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Đổi mật khẩu</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="submit" role="form" action="" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="oldPassword">Mật khẩu cũ</label><span class="err_change_profile" id="err_old_password"></span>
                    <input type="password" id="oldPassword" class="form-control">
                </div>
                <div class="form-group">
                    <label for="newPassword">Mật khẩu mới</label><span class="err_change_profile" id="err_new_password"></span>
                    <input type="password" id="newPassword" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Nhập lại mật khẩu</label><span class="err_change_profile" id="err_confirm_password"></span>
                    <input type="password" id="confirmPassword" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<style>
    .err_change_profile{
        color: red;
    }
</style>
<script>
    const regex_pass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var oldPassword = $("#oldPassword");
    var newPassword = $("#newPassword");
    var confirmPassword = $("#confirmPassword");

    var flag = true;

    $("#oldPassword").keyup(function () {
        $("#err_old_password").html("");
        if(oldPassword.val().length == 0)
        {
            $("#err_old_password").html("");
        }
        if(regex_pass.test(oldPassword.val()) == true){
            $.ajax({
                type: "POST",
                url: "<?= Router::url('/admin/password-check',true) ?>",
                data: {
                    password: oldPassword.val()
                },
                dataType: "JSON",
            }).then((response) =>{
                if(response.status == 404)
                {
                    $("#err_old_password").html(" *Mật khẩu cũ này không đúng");
                    flag = false;
                }else{
                    flag = true
                }
            })
        }
    });

    $("#submit").on('submit', function (e) {
        var count = 0;
        if(oldPassword.val().length == 0)
        {
            $("#err_old_password").html(" *Vui lòng nhập mật khẩu cũ");
            count++;
        }else if(regex_pass.test(oldPassword.val()) == false)
        {
            $("#err_old_password").html(" *Mật khẩu tối thiểu tám ký tự, ít nhất một chữ cái và một số");
            count++;
        }

        if(newPassword.val().length == 0)
        {
            $("#err_new_password").html(" *Vui lòng nhập mật khẩu mới");
            count++;
        }else if(regex_pass.test(newPassword.val()) == false)
        {
            $("#err_new_password").html(" *Mật khẩu tối thiểu tám ký tự, ít nhất một chữ cái và một số");
            count++;
        }else{
            $("#err_new_password").html("");
        }

        if(confirmPassword.val().length == 0)
        {
            $("#err_confirm_password").html(" *Vui lòng nhập xác nhận mật khẩu mới");
            count++;
        }else if(regex_pass.test(confirmPassword.val()) == false)
        {
            $("#err_confirm_password").html(" *Mật khẩu tối thiểu tám ký tự, ít nhất một chữ cái và một số");
            count++;
        }else{
            if(confirmPassword.val() != newPassword.val())
            {
                $("#err_confirm_password").html(" *Nhập lại mật khẩu không trùng với mật khẩu");
                count++;
            }
            else{
                $("#err_confirm_password").html("");
            }
        }

        if(count > 0 || flag == false)
        {
            e.preventDefault();
        }
    });
</script>
