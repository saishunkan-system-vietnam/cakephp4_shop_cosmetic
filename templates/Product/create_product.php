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
                        <label for="name">Tên sản phẩm</label>
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
                        <label for="price">Giá</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                        <label for="amount">Số lượng</label>
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
                        <label for="content">Bài viết</lab<label for=""></label>
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
        var name = $("#name");
        const regex_name = /^[A-Za-z\sàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]{2,100}$/;
        var price = $("#price");
        const regex_number = /[0-9]+/;
        var amount = $("#amount");
        alert(name.val());
        e.preventDefault();
        if(name.val().length == 0)
        {
            alert("asdasd");
            e.preventDefault();
        }
        else if(regex_name.test(name.val()) == false)
        {
            e.preventDefault();
        }
        else{

        }

        if(price.val().length == 0)
        {
            e.preventDefault();
        }
        else if(regex_number.test(price.val()) == false)
        {
            e.preventDefault();
        }
        else{

        }

        if(amount.val().length == 0)
        {
            e.preventDefault();
        }
        else if(regex_number.test(amount.val()) == false)
        {
            e.preventDefault();
        }
        else{

        }
    });
 });
</script>
