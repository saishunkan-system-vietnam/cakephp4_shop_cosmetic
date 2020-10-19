<?php

use Cake\Routing\Router;
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Thương hiệu</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh mục</li>
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
                    <h3 class="card-title">Thêm danh mục</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= Router::url('/category/add',true) ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="trademarkName">Tên danh mục</label>
                                <input type="text" class="form-control" name="name" id="trademarkName" placeholder="Enter Category">
                            </div>
                            <div class="form-group">
                                <label for="parentCategory">Danh mục cha</label>
                                <select name="id_parent" id="parentCategory" class="form-control">
                                    <option value="">Không dùng danh mục cha</option>
                                    <?php
                                        foreach ($categories as $category)
                                        {
                                    ?>
                                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
