<?php

use Cake\Routing\Router;
?>
<script src="http://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Thêm sản phẩm</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Thêm sản phẩm</li>
        </ol>
        </div>
    </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Sản phẩm</h3>
                    </div>
                    <form role="form" method="POST" enctype="multipart/form-data" action="<?= Router::url(['_name'=>'processCreateProduct','fullBase' => 'true']) ?>">
                    <div class="card-body">
                        <div class="form-group">
                        <label for="name">Tên sản phẩm</label><span class="err err_name"></span>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                        <label for="image">Ảnh</label>
                        <div class="input-group">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="price">Giá</label><span class="err err_price"></span>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                        <label for="amount">Số lượng</label><span class="err err_amount"></span>
                        <input type="number" min="1" class="form-control" name="amount" id="amount" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nhà sản xuất</label>
                        <select class="form-control" name="trademark">
                            <?php foreach ($trademarks as $trademark) {
                            ?>
                                <option value="<?= $trademark->id ?>"><?= $trademark->name ?></option>
                            <?php
                            }?>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Loại sản phẩm</label>
                        <select class="form-control" name="type_product">
                            <?php foreach ($type_products as $type_product) {
                            ?>
                                <option value="<?= $type_product->id ?>"><?= $type_product->name ?></option>
                            <?php
                            }?>
                        </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="content">Bài viết</lab<label for=""></label><span class="err err_content"></span>
                        <textarea name="product_info" id="content" class="form-control ckeditor"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<script>
 CKEDITOR.replace( 'content', {
  height: 300,
  filebrowserUploadUrl: "<?= Router::url(['_name'=>'uploadImageCkeditor','fullBase' => 'true']) ?>"
 });

 $(document).ready(function () {
    $("#submit").click(function (e) {
        const regex_name = /^[A-Za-z0-9\sàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]{2,200}$/;
        const regex_number = /^[0-9]+$/;
        var name = $("#name");
        var price = $("#price");
        var amount = $("#amount");
        var content = $("#content");
        var flag = 0;
        // var image = $("#image");
        if(name.val().length == 0)
        {
            $(".err_name").html(" *Tên sản phẩm không được để trống");
            flag++;
        }
        else if(regex_name.test(name.val()) == false)
        {
            $(".err_name").html(" *Tên sản phẩm không được viết kí tự đặc biệt");
            flag++;
        }
        else{
            $(".err_name").html("");
        }

        if(price.val().length == 0)
        {
            $(".err_price").html(" *Giá không được để trống");
            flag++;
        }
        else if(regex_number.test(price.val()) == false)
        {
            $(".err_price").html(" *Giá chỉ được ghi số");
            flag++;
        }
        else{
            $(".err_price").html("");
        }

        if(amount.val().length == 0)
        {
            $(".err_amount").html(" *Số lượng không được để trống");
            flag++;
        }
        else if(regex_number.test(amount.val()) == false)
        {
            $(".err_amount").html(" *Số lượng chỉ được ghi số");
            flag++;
        }
        else{
            $(".err_amount").html("");
        }

        if(content.val().length == 0)
        {
            $(".err_content").html(" *Bài viết không được để trống");
            flag++;
        }
        else{
            $(".err_content").html("");
        }

        if(flag > 0)
        {
            e.preventDefault();
        }
    });
 });
</script>
