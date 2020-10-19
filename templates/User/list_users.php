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
          <h1 class="m-0 text-dark">Dashboard</h1>
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
        <table id="list_user" class="table table-striped table-bordered">
            <thead style="color: #888383;">
                <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Giới tính</th>
                    <th>Tình trạng</th>
                    <th></th>
                </tr>
            </thead>
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
        });

        setTimeout(function () {
            $(".flash-session").slideUp("slow");
        },2000);
    });

    function imgError(image){
        image.onerror = "";
        image.src = "<?= Router::url('/images/unnamed.png') ?>";
        return true;
    }
</script>
