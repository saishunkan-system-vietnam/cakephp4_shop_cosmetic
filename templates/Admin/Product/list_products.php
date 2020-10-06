<?php

use Cake\Routing\Router;
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
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
        <table id="list_user" class="display dataTable">
            <thead style="color: #888383;">
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>tên</th>
                    <th>ảnh</th>
                    <th>số điện thoại</th>
                    <th>địa chỉ</th>
                    <th>giới tính</th>
                    <th>tình trạng</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot style="color: #888383;">
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>tên</th>
                    <th>ảnh</th>
                    <th>số điện thoại</th>
                    <th>địa chỉ</th>
                    <th>giới tính</th>
                    <th>tình trạng</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
 <script>
    $(document).ready(function () {
        $("#list_user").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "<?=Router::url('/admin/render-list-user','true')?>"
        })
    });
</script>
