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
            <li class="breadcrumb-item active">Thêm thương hiệu</li>
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
                    <h3 class="card-title">Thêm thương hiệu</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= Router::url('/admin/create-trademark',true) ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="trademarkName">Tên thương hiệu</label>
                                <input type="text" class="form-control" name="name" id="trademarkName" placeholder="Enter Trademark">
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
