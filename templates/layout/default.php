<?php
use Cake\Routing\Router;
$session = $this->getRequest()->getSession();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Beauty Shop</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= Router::url('/images/ico/apple-icon-57x57.png') ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= Router::url('/images/ico/apple-icon-60x60.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Router::url('/images/ico/apple-icon-72x72.png') ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Router::url('/images/ico/apple-icon-76x76.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= Router::url('/images/ico/apple-icon-114x114.png') ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= Router::url('/images/ico/apple-icon-120x120.png') ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= Router::url('/images/ico/apple-icon-144x144.png') ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= Router::url('/images/ico/apple-icon-152x152.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Router::url('/images/ico/apple-icon-180x180.png') ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= Router::url('/images/ico/android-icon-192x192.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Router::url('/images/ico/favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= Router::url('/images/ico/favicon-96x96.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Router::url('/images/ico/favicon-16x16.png') ?>">
    <link rel="manifest" href="<?= Router::url('/images/ico/manifest.json') ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= Router::url('/images/ico/ms-icon-144x144.png') ?>">
    <meta name="theme-color" content="#ffffff">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= Router::url('/plugins/fontawesome-free/css/all.min.css',true); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= Router::url('/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',true) ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= Router::url('/plugins/icheck-bootstrap/icheck-bootstrap.min.css',true) ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= Router::url('/plugins/jqvmap/jqvmap.min.css',true) ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= Router::url('/dist/css/adminlte.min.css',true) ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= Router::url('/plugins/overlayScrollbars/css/OverlayScrollbars.min.css',true) ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= Router::url('/plugins/daterangepicker/daterangepicker.css',true) ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= Router::url('/plugins/summernote/summernote-bs4.css',true) ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= Router::url('/dist/css/adminlte.min.css',true) ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script src="<?= Router::url('/plugins/jquery/jquery.min.js',true) ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= Router::url('/plugins/jquery-ui/jquery-ui.min.js',true) ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= Router::url('/plugins/bootstrap/js/bootstrap.bundle.min.js',true) ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?= Router::url('/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',true) ?>"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="<?= Router::url('/dist/js/adminlte.min.js',true) ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        #logout{
            display:none;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= Router::url('/admin',true) ?>" class="brand-link">
                <img src="<?= Router::url('/dist/img/AdminLTELogo.jpg',true) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Beauty Shop</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div id="profile_user" class="user-panel mt-3 pb-3 mb-3">
                   <div class="d-flex">
                        <div class="image">
                            <img src="<?= Router::url('/images/avatar/'.$session->read('avatar'),true) ?>" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="<?= Router::url('/admin/profile',true) ?>" style="font-size: 14px;" class="d-block"><?= $session->read('full_name') ?></a>
                        </div>
                   </div>
                   <div id="logout">
                       <a href="<?= Router::url('/admin/logout',true) ?>">Đăng xuất</a>
                   </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Sản phẩm
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Router::url(['_name'=>'listProduct','fullBase' => 'true']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Router::url(['_name'=>'createProduct','fullBase' => 'true']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm sản phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Người dùng
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Router::url(['_name' => 'list_users', 'fullBase' => 'true']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách người dùng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-industry"></i>
                                <p>
                                    Thương hiệu
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Router::url(['_name'=>'listTrademark','fullBase' => 'true']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách thương hiệu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Router::url(['_name'=>'createTrademark','fullBase' => 'true']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm thương hiệu</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-scroll"></i>
                                <p>
                                    Hóa đơn
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Router::url(['_name'=>'bill','fullBase' => 'true']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách hóa đơn</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fab fa-buffer"></i>
                                <p>
                                    Danh mục
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Router::url('/admin/category',true) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách danh mục</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Router::url('/admin/category/add',true) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm danh mục</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->fetch('content') ?>
    </div>
    <!-- AdminLTE for demo purposes -->
    <!-- jQuery -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(document).ready(function () {
            $("#profile_user").hover(function () {
                $("#logout").slideToggle();
            });
        });
    </script>

</body>

</html>
