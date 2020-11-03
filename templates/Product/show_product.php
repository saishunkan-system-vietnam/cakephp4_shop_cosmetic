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
        <h1>Sửa sản phẩm</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Sửa sản phẩm</li>
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
                    <form role="form" method="POST" enctype="multipart/form-data"
                    action="<?= Router::url(['_name'=>'updateProduct','fullBase' => 'true','id_product'=>$product->id]) ?>">
                    <div class="card-body">
                        <div class="form-group">
                        <label for="name">Tên sản phẩm</label><span class="err err_name"></span>
                        <input type="text" name="name" class="form-control" value='<?= $product->name ?>'
                        id="name" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                        <label for="image">Ảnh</label>
                        <div class="input-group">
                            <label for="image">
                                <img style="cursor: pointer" src="<?= Router::url('/images/product/'.$product->image,true) ?>" width="70px" alt="">
                            </label>
                            <input type="file" class="custom-file-input"
                            id="image" name="image_product">
                        </div>
                        <div class="form-group">
                        <label for="price">Giá</label><span class="err err_price"></span>
                        <input type="text" class="form-control" value="<?= $product->price ?>"
                        id="price" name="price" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                        <label for="amount">Số lượng</label><span class="err err_amount"></span>
                        <input type="text" min="1" class="form-control" value="<?= $product->amount ?>"
                        name="amount" id="amount" placeholder="Enter email">
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
                        <select class="form-control" name="id_category">
                            <?php foreach ($categories as $category) {
                            ?>
                                <option <?= $product->id_category == $category->id ? 'selected' : ''?> value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php
                            }?>
                        </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="content">Bài viết</label><span class="err err_content"></span>
                        <textarea name="product_info" id="content"
                        class="form-control ckeditor"><?= $product->product_info ?></textarea>
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
  height: 700,
  filebrowserUploadUrl: "<?= Router::url(['_name'=>'uploadImageCkeditor','fullBase' => 'true']) ?>"
 });
</script>
<script src="<?= Router::url('/js/validateUpdateProduct.js') ?>"></script>
