<?php

use Cake\Routing\Router;
?>
<link rel="stylesheet" href="<?= Router::url('/css/custom-datatable.css') ?>">
<style>
    .change_status{
        cursor:pointer;
        color:#442dff;
    }
</style>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Danh sách hóa đơn</h1>
          <h3><?= $this->Flash->render() ?></h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Danh sách hóa đơn</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
        <table id="list_bills" class="display dataTable">
            <thead style="color: #888383;">
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>tên</th>
                    <th>số điện thoại</th>
                    <th>địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>tình trạng</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot style="color: #888383;">
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>tên</th>
                    <th>số điện thoại</th>
                    <th>địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>tình trạng</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
  </section>
</div>
 <script>
    const url_change_status_bill = "<?= Router::url('/admin/change-status-bill',true) ?>";
    const url_render_list_bills = "<?=Router::url('/admin/render-list-bills','true')?>";
</script>
<script src="<?= Router::url('/js/list_bills.js') ?>"></script>
