<?php

use Cake\Routing\Router;
?>
<link rel="stylesheet" href="<?= Router::url('/css/custom-datatable.css',true) ?>">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Hóa đơn</h1>
          <h3 class="flash-session"><?= $this->Flash->render(); ?></h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <table id="list_bills" class="table table-striped table-bordered">
            <thead style="color: #888383;">
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Thiết lập</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<script>
    const url_change_status_bill = "<?= Router::url('/admin/change-status-bill',true) ?>";
    const url_render_list_bills = "<?=Router::url('/admin/render-list-bills','true')?>";
</script>
<script src="<?= Router::url('/js/list_bills.js') ?>"></script>
