<?php

use Cake\Routing\Router;
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin của <?= $user->full_name ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thông tin người dùng</li>
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
              <form role="form" action="<?= Router::url(['_name'=>'update_profile_user','fullBase' => true]) ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value=<?= $user->id ?>>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control"
                    id="exampleInputEmail1" placeholder="Enter email" value="<?= $user->email ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Họ tên</label>
                    <input type="text" name="full_name" class="form-control"
                    id="exampleInputPassword1" placeholder="Password" value="<?= $user->full_name ?>">
                  </div>
                  <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control"
                    id="phone" placeholder="Phone" value="<?= $user->phone ?>">
                  </div>
                  <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" class="form-control"
                    id="address" placeholder="Address" value="<?= $user->address ?>">
                  </div>
                  <div class="form-group">
                    <label for="gender">Giới tính</label>
                    <select class="form-control" name="gender">
                        <option value="1" <?= $user->gender == 1 ? 'selected' : '' ?>>Nam</option>
                        <option value="0" <?= $user->gender == 0 ? 'selected' : '' ?>>Nữ</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="gender">Tình trạng</label>
                    <select class="form-control" name="deleted">
                        <option value="0" <?= $user->deleted == 0 ? 'selected' : '' ?>>Mở</option>
                        <option value="1" <?= $user->deleted == 1 ? 'selected' : '' ?>>Khóa</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Ảnh</label>
                    <div class="input-group" style="margin-top:20px">
                      <div class="custom-file">
                        <label for="exampleInputFile">
                            <img style="cursor:pointer" id="avatar"
                            src="<?= Router::url('/images/avatar/'.$user->avatar,true) ?>" width="80px" alt="">
                        </label>
                        <input type="file" class="custom-file-input" name="avatar" id="exampleInputFile">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<script>
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
</script>
