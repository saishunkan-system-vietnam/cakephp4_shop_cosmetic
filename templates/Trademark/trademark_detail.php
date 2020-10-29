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
            <li class="breadcrumb-item"><a href="<?= Router::url('/admin') ?>">Home</a></li>
            <li class="breadcrumb-item active">Thương hiệu</li>
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
                    <h3 class="card-title">Thương hiệu</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= Router::url('/admin/update-trademark/'.$trademark->id,true) ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="trademarkName">Tên thương hiệu</label>
                                <input type="text" class="form-control"
                                name="name" value="<?= $trademark->name ?>" id="name" >
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
