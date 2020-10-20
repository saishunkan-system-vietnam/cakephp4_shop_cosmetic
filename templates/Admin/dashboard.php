<?php

use Cake\Routing\Router;
?>
<!-- JQVMap -->
<script src="<?= Router::url('/plugins/jqvmap/jquery.vmap.min.js', true) ?>"></script>
<script src="<?= Router::url('/plugins/jqvmap/maps/jquery.vmap.usa.js', true) ?>"></script>
<!-- ChartJS -->
<script src="<?= Router::url('/plugins/chart.js/Chart.min.js', true) ?>"></script>
<!-- Sparkline -->
<script src="<?= Router::url('/plugins/sparklines/sparkline.js', true) ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= Router::url('/plugins/jquery-knob/jquery.knob.min.js', true) ?>"></script>
<!-- daterangepicker -->
<script src="<?= Router::url('/plugins/moment/moment.min.js', true) ?>"></script>
<script src="<?= Router::url('/plugins/daterangepicker/daterangepicker.js', true) ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= Router::url('/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', true) ?>"></script>
<!-- Summernote -->
<script src="<?= Router::url('/plugins/summernote/summernote-bs4.min.js', true) ?>"></script>
<!-- AdminLTE App -->
<script src="<?= Router::url('/dist/js/adminlte.js', true) ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= Router::url('/dist/js/pages/dashboard.js', true) ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= Router::url('/dist/js/demo.js', true) ?>"></script>
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
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= $newOrders ?></h3>

                            <p>Đơn hàng mới</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= Router::url('/admin/bill', true) ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $countUsers ?></h3>

                            <p>Số khác hàng hiện tại</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= Router::url('/admin/list-users') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
