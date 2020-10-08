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
                    <label for="email">Email</label><span class="err" id="err_email"></span>
                    <input type="email" name="email" class="form-control"
                    id="email" placeholder="Enter email" value="<?= $user->email ?>">
                  </div>
                  <div class="form-group">
                    <label for="full_name">Họ tên</label><span class="err" id="err_full_name"></span>
                    <input type="text" name="full_name" class="form-control"
                    id="full_name" placeholder="Password" value="<?= $user->full_name ?>">
                  </div>
                  <div class="form-group">
                    <label for="phone">Số điện thoại</label><span class="err" id="err_phone"></span>
                    <input type="text" name="phone" class="form-control"
                    id="phone" placeholder="Phone" value="<?= $user->phone ?>">
                  </div>
                  <div class="form-group">
                    <label for="address">Địa chỉ</label><span class="err" id="err_address"></span>
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
                  <button type="submit" id="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<script>
    var email = $('#email');
    var phone = $("#phone");
    var full_name = $("#full_name");
    var address = $("#address");
    var err   = [];
    const regex_address = /^[0-9A-Za-z\s\-àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]{2,50}$/;
    const regex_full_name = /^[A-Za-z\sàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]{2,50}$/;
    const regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const regex_phone = /((09|03|07|08|05)+([0-9]{8}))/;

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

    email.keyup(function(){
        if(regex_email.test(email.val()) == true){
            $.ajax({
                type: "GET",
                url: "<?= Router::url(['_name'=>'checkUserEmailExistsByAdmin','fullBase' => 'true']) ?>",
                data: {
                    email:email.val(),
                    id_user:<?= $user->id; ?>
                },
                dataType: "JSON",
                success: function (response) {
                    if(response.isExists == true)
                    {
                        $("#err_email").html(" *Email này đã có người dùng");
                    }
                    else
                    {
                        $("#err_email").html("");
                    }
                }
            });
        }
    });

    phone.keyup(function(){
        if(regex_phone.test(phone.val()) == true)
        {
            $.ajax({
                type: "GET",
                url: "<?= Router::url(['_name'=>'checkUserPhoneExistsByAdmin','fullBase' => 'true']) ?>",
                data: {
                    phone:phone.val(),
                    id_user:<?= $user->id; ?>
                },
                dataType: "JSON",
                success: function (response) {
                    if(response.isExists == true)
                    {
                        $("#err_phone").html(" *Số điện thoại này đã có người dùng");
                    }
                    else
                    {
                        $("#err_phone").html("");
                    }
                }
            });
        }
    })

    $(document).ready(function () {
        $("#submit").click(function (e) {
            //full_name
            if(full_name.val().length == 0)
            {
                $("#err_full_name").html(" *Họ tên không được để trống");
            }
            else if(regex_full_name.test(full_name.val()) == false){
                $("#err_full_name").html(" *Họ tên nhập không đúng định dạng");
            }
            else{
                $("#err_full_name").html("");
            }

            //email
            if(email.val().length == 0)
            {
                $("#err_email").html(" *Email không được để trống");
            }
            else if(regex_email.test(email.val()) == false){
                $("#err_email").html(" *Email này không đúng định dạng");
            }

            //phone
            if(phone.val().length == 0)
            {
                $("#err_phone").html(" *Số điện thoại không được để trống");
            }else if(regex_phone.test(phone.val()) == false)
            {
                $("#err_phone").html(" *Số điện thoại này không đúng địng dạng");
            }

            //address
            if(address.val().length == 0)
            {
                $("#err_address").html(" *Địa chỉ không được để trống");
            }else if(regex_address.test(address.val()) == false)
            {
                $("#err_address").html(" *Địa chỉ này không đúng địng dạng");
            }
            else{
                $("#err_address").html("");
            }
            $(".err").each(function(){
                if($(this).html() != '')
                {
                    e.preventDefault();
                }
            })
        });
    });
</script>
