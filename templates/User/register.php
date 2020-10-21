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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                        Đăng ký
                    </h2>
                </div>
                <div class="card-body">
                    <form action="<?=Router::url('/process-register',true);?>" method="POST">
                        <div>
                            <label class="name">Họ Tên</label><span id="err_name"></span>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="full_name" id="full_name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label><span id="err_email"></span>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="name">Mật khẩu</label><span id="err_password"></span>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password" id="password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="name">Địa chỉ</label><span id="err_address"></span>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="address" id="address">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="name">Số điện thoại</label><span id="err_phone"></span>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="phone" id="phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="name">Giới tính</label>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--red mt-4 submit" type="submit">Đăng ký</button>
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

    <script>
        const regex_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        const regex_phone = /^[0-9]+$/;
        const regex_full_name = /^[A-Za-z\sàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]{2,200}$/;
        const regex_address = /^[0-9A-Za-z\s\-àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]{2,50}$/;
        const regex_password = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        var flag1 = true;
        $("#email").keyup(function () {
            flag1 = true;
            if($(this).val().length == 0)
            {
                $("#err_email").html("");
            }
            if(regex_email.test($(this).val()) == true)
            {
                $.ajax({
                    type: "GET",
                    url: "<?= Router::url('/check-exist-email',true) ?>",
                    data: {
                        email: $(this).val()
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if(response.status == true)
                        {
                            flag1 = false;
                            $("#err_email").html(" *Email này đã tồn tại")
                        }
                        else{
                            $("#err_email").html("");
                        }
                    }
                });
            }
        });

        var flag2 = true;
        $("#phone").keyup(function () {
            flag2 = true;
            if($(this).val().length == 0)
            {
                $("#err_phone").html("");
            }
            if(regex_phone.test($(this).val()) == true)
            {
                $.ajax({
                    type: "GET",
                    url: "<?= Router::url('/check-exist-phone',true) ?>",
                    data: {
                        phone: $(this).val()
                    },
                    dataType: "JSON",
                    success: function (response) {
                        if(response.status == true)
                        {
                            flag2 = false;
                            $("#err_phone").html(" *Số điện thoại này đã tồn tại")
                        }
                        else{
                            $("#err_phone").html("");
                        }
                    }
                });
            }
        });

        $(".submit").click(function (e) {
            var dem = 0;
            if($("#full_name").val().length == 0)
            {
                console.log(1);
                $("#err_name").html(" *Không được bỏ trống họ tên");
                dem++;
            }
            else if(regex_full_name.test($("#full_name").val()) == false)
            {
                console.log(2);
                $("#err_name").html(" *Họ tên không có kí tự đặc biệt hoặc số");
                dem++;
            }else{
                console.log(3);
                $("#err_name").html("");
            }

            if($("#email").val().length == 0)
            {
                console.log(4);
                $("#err_email").html(" *Không được bỏ trống email");
                dem++;
            }else if(regex_email.test($("#email").val()) == false)
            {
                console.log(5);
                $("#err_email").html(" *Định dạng email không đúng");
                dem++;
            }

            if($("#password").val().length == 0)
            {
                console.log(6);
                $("#err_password").html(" *Không được bỏ trống mật khẩu");
                dem++;
            }else if(regex_password.test($("#password").val()) == false)
            {
                console.log(7);
                $("#err_password").html(" *Mật khẩu tối thiểu tám ký tự, ít nhất một chữ cái và một số");
                dem++;
            }
            else{
                console.log(8);
                $("#err_password").html("");
            }

            if($("#address").val().length == 0)
            {
                console.log(9);
                $("#err_address").html(" *Không được bổ trống địa chỉ");
                dem++;
            }else if(regex_address.test($("#address").val()) == false)
            {
                console.log(10);
                $("#err_address").html(" *Địa chỉ này không đúng");
                dem++;
            }else{
                console.log(11);
                $("#err_address").html("");
            }

            if($("#phone").val().length == 0)
            {
                console.log(12);
                $("#err_phone").html(" *Số điện thoại không được bỏ trống");
                dem++;
            }else if(regex_phone.test($("#phone").val()) == false)
            {
                console.log(13);
                console.log("ÁDas");
                $("#err_phone").html(" *Số điện thoại này không đúng");
                dem++;
            }

            console.log(dem,flag1,flag2);

            if(dem > 0 || flag1 == false || flag2 == false)
            {
                e.preventDefault();
            }
        });
    </script>

</body>

</html>
