<?php

use Cake\Routing\Router;
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Thông tin cá nhân</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Thông tin cá nhân</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <h3 class="flash">
            <?= $this->Flash->render('change_password') ?>
            <?= $this->Flash->render('change_profile') ?>
        </h3>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Thông tin cá nhân</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= Router::url(['_name'=>'update-profile'],'true') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_admin" value="<?= $admin->id ?>">
            <div class="card-body">
                <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" id="email" class="form-control" disabled="disabled" value="<?= $admin->email ?>">
                </div>
                <div class="form-group">
                    <label for="full_name">Họ tên</label><span class="err_chanege_profile" id="err_full_name"></span>
                    <input type="text" id="full_name" class="form-control" name="full_name" value="<?= $admin->full_name ?>">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label><span class="err_chanege_profile" id="err_phone"></span>
                    <input type="text" id="phone" class="form-control" name="phone" value="<?= $admin->phone ?>">
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính</label>
                    <select class="form-control" name="gender">
                        <option value="1" <?= $admin->gender==1? 'selected' : ''; ?>>Nam</option>
                        <option value="0" <?= $admin->gender==0? 'selected' : ''; ?>>Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="position">Chức vụ</label>
                    <input type="text" class="form-control" disabled="disabled"
                        value="<?= $admin->level==1? 'Admin' : 'Người viết bài' ?>"
                    >
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh</label><br>
                    <label for="exampleInputFile">
                        <img id="avatar" title="Đổi ảnh"
                        src="<?= Router::url('/images/avatar/'.$admin->avatar,true) ?>"
                        style="width:100px;cursor: pointer;">
                    </label>
                <input accept="image/x-png,image/gif,image/jpeg" type="file" class="custom-file-input" name="avatar" id="exampleInputFile">
                </div>
                <button type="submit" id="submit" class="btn btn-primary">Lưu thay đổi</button>
                <button type="button" class="btn btn-danger">Đổi mật khẩu</button>
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
    .err_chanege_profile{
        color: red;
    }
</style>
<script>
    $(document).ready(function () {
        $("#submit").click(function (e) {
            const full_name=$("#full_name").val();
            const regex_full_name=/^[A-Za-z\sàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]{2,50}$/;
            const regex_phone = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            const phone=$("#phone").val();
            if(full_name.length == 0)
            {
                $("#err_full_name").html(" *Vui lòng nhập Họ tên");
                e.preventDefault();
            }
            else if(regex_full_name.test(full_name) == false)
            {
                $("#err_full_name").html(" *Nhập họ tên không đúng định dạng");
                e.preventDefault();
            }
            else{
                $("#err_full_name").html("");
            }

            if(phone.length == 0)
            {
                $("#err_phone").html(" *Vui lòng nhập số điện thoại");
                e.preventDefault();
            }
            else if(regex_phone.test(phone) == false)
            {
                $("#err_phone").html(" *Đây không phải là số điện thoại");
                e.preventDefault();
            }
            else{
                $("#err_phone").html("");
            }
        });

        $("#phone").on("input", function(){
            if($(this).val().length > 0)
            {
                $("#err_phone").html("");
            }
        })

        $("#full_name").on("input", function(){
            if($(this).val().length > 0)
            {
                $("#err_full_name").html("");
            }
        })

        $("#exampleInputFile").change(function () {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                $('#avatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".btn-danger").click(function () {
            window.location.assign("<?= Router::url('/admin/change-password',true) ?>");
        });

        setTimeout(()=>{
            $(".flash").slideUp("slow");
        },2000)
    });
</script>
