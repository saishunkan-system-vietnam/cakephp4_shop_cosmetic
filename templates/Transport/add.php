<?php

use Cake\Routing\Router;
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Hình thức vận chuyển</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= Router::url('/admin',true) ?>">Home</a></li>
            <li class="breadcrumb-item active">Hình thức vận chuyển</li>
        </ol>
        </div>
    </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <h3 class="err">
            <?= $this->Flash->render(); ?>
        </h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Thêm hình thức vận chuyển</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= Router::url('/admin/transport/add',true) ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="trademarkName">Tên hình thức vận chuyển</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="parentCategory">Giá</label>
                                <input type="text" class="form-control" name="price">
                            </div>
                            <div class="form-group">
                                <label for="parentCategory">Mô tả</label>
                                <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
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
<script>
    setTimeout(function(){
        $('.err').slideUp();
    },2000);
</script>
