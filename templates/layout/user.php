<?php
use Cake\Routing\Router;
$session = $this->request->getSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
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
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/bootstrap4/bootstrap.min.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/fonts/font-awesome-4.7.0/css/font-awesome.min.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/plugins/OwlCarousel2-2.2.1/owl.carousel.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/plugins/OwlCarousel2-2.2.1/animate.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/main_styles.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/responsive.css',true) ?>">
<link rel="stylesheet" href="<?= Router::url('/css/layout-user.css') ?>">

<script src="<?= Router::url('/user/js/jquery-3.2.1.min.js',true) ?>"></script>
<script src="<?= Router::url('/user/styles/bootstrap4/popper.js',true) ?>"></script>
<script src="<?= Router::url('/user/styles/bootstrap4/bootstrap.min.js',true) ?>"></script>
<script src="<?= Router::url('/user/plugins/Isotope/isotope.pkgd.min.js',true) ?>"></script>
<script src="<?= Router::url('/user/plugins/OwlCarousel2-2.2.1/owl.carousel.js',true) ?>"></script>
<script src="<?= Router::url('/user/plugins/easing/easing.js',true) ?>"></script>
<script src="<?= Router::url('/user/js/custom.js',true) ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<style>
    .addCartWithAjax{
        display:block;
        width:100%;
    }
</style>
</head>

<body>

<div class="super_container">
	<header class="header trans_300">
		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">Free ship cho đơn hàng ở nội thành hà nội</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">
								<li class="account">
									<a href="#">
                                        <?php
                                            if(!$session->check('id_user'))
                                            {
                                                echo "My Account";
                                            }
                                            else{
                                                echo $session->read('full_name');
                                            }
                                        ?>
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
                                        <?php
                                            if(!$session->check('id_user'))
                                            {
                                        ?>
                                        <li><a href="<?= Router::url('/login',true) ?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
										<li><a href="<?= Router::url('/register',true) ?>"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                        <li><a href="<?= Router::url('/logout',true) ?>"><i class="fa fa-sign-in" aria-hidden="true"></i>Log out</a></li>
                                        <?php
                                            }
                                        ?>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
                            <a href="<?= Router::url('/',true) ?>">
                                <img src="<?= Router::url('/dist/img/AdminLTELogo.jpg',true) ?>" class="rounded-circle" alt="">
                            </a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
                                <li>
                                    <ul>
                                        <form action="<?= Router::url('/',true) ?>" method="get">
                                            <li>
                                                <input type="text" value="<?= h($this->request->getQuery('q')) ?>" style="color: black" name="q" class="form-control" placeholder="Bạn tìm gì...">
                                            </li>
                                            <li>
                                                <button class="btn-search"type="submit">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </li>
                                        </form>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?= Router::url('/',true) ?>">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="<?= Router::url('/gioi-thieu',true) ?>">Giới thiệu</a>
                                </li>
								<li>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                                        <ul class="dropdown-menu">
                                            <?php foreach($categories as $category): ?>
                                            <?php if($category->id_parent == ''): ?>
                                                <li>
                                                    <div class="btn-group dropright">
                                                        <a  class="dropdown-toggle" data-toggle="dropdown">
                                                            <?= $category->name ?>
                                                        </a>
                                                        <div class="dropdown-menu" x-placement="right-start" style="position: absolute; transform: translate3d(111px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <?php foreach ($arr_category as $category_child): ?>
                                                                <?php if($category_child->id_parent == $category->id): ?>
                                                                    <a href="<?= Router::url('/danh-muc/'.$category_child->slug,true) ?>"><?= $category_child->name ?></a>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="<?= Router::url('/gift',true) ?>">Quà tặng</a>
                                </li>
								<li><a href="<?= Router::url('/trial',true) ?>">sản phẩm dùng thử</a></li>
							</ul>
							<ul class="navbar_user">
								<li class="checkout">
									<a href="<?= Router::url('/cart',true) ?>">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items">
                                            <?php
                                                if($session->check('arr_cart'))
                                                {
                                                    $arr_cart = $session->read('arr_cart');
                                                    $quantity = 0;
                                                    foreach ($arr_cart as $cart) {
                                                        $quantity += $cart['quantity'];
                                                    }
                                                    echo $quantity;
                                                }
                                                else{
                                                    echo 0;
                                                }
                                            ?>
                                        </span>
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
                        My Account
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
						<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
					</ul>
				</li>
				<li class="menu_item"><a href="#">home</a></li>
				<li class="menu_item"><a href="#">shop</a></li>
				<li class="menu_item"><a href="#">promotion</a></li>
				<li class="menu_item"><a href="#">pages</a></li>
				<li class="menu_item"><a href="#">blog</a></li>
				<li class="menu_item"><a href="#">contact</a></li>
			</ul>
		</div>
	</div>

    <?= $this->fetch('content') ?>

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
                    Hệ Thống Phân Phối Mỹ Phẩm Chính Hãng
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>
<?php
if($session->check('id_user'))
{
?>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        const id_user = <?= $session->read('id_user')?>;
        const url = <?= "'".Router::url('/',true)."'"; ?>;
        var pusher = new Pusher('576aec32d50bd84ba5f3', {
        cluster: 'ap1'
        });
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            if(data.id_user == id_user)
            {
                $.ajax({
                    type: "POST",
                    url: "<?= Router::url(['_name'=>"autoLogOut",'fullBase'=>true,'id_user'=>$session->read('id_user')]) ?>",
                    dataType: "JSON",
                    success: function (response) {
                        console.log(response);
                    }
                });
                window.location.assign(url);
            }
        });
    </script>
<?php
}
?>
</body>
</html>
