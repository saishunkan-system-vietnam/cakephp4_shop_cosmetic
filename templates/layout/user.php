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
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/bootstrap4/bootstrap.min.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/fonts/font-awesome-4.7.0/css/font-awesome.min.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/plugins/OwlCarousel2-2.2.1/owl.carousel.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/plugins/OwlCarousel2-2.2.1/animate.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/main_styles.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/responsive.css',true) ?>">

<script src="<?= Router::url('/user/js/jquery-3.2.1.min.js',true) ?>"></script>
<script src="<?= Router::url('/user/styles/bootstrap4/popper.js',true) ?>"></script>
<script src="<?= Router::url('/user/styles/bootstrap4/bootstrap.min.js',true) ?>"></script>
<script src="<?= Router::url('/user/plugins/Isotope/isotope.pkgd.min.js',true) ?>"></script>
<script src="<?= Router::url('/user/plugins/OwlCarousel2-2.2.1/owl.carousel.js',true) ?>"></script>
<script src="<?= Router::url('/user/plugins/easing/easing.js',true) ?>"></script>
<script src="<?= Router::url('/user/js/custom.js',true) ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<style>
    .dropdown:hover>.dropdown-menu {
  display: block;
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
								<li class="currency">
									<a href="#">
										usd
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="currency_selection">
										<li><a href="#">cad</a></li>
										<li><a href="#">aud</a></li>
										<li><a href="#">eur</a></li>
										<li><a href="#">gbp</a></li>
									</ul>
								</li>
								<li class="language">
									<a href="#">
										English
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="language_selection">
										<li><a href="#">French</a></li>
										<li><a href="#">Italian</a></li>
										<li><a href="#">German</a></li>
										<li><a href="#">Spanish</a></li>
									</ul>
								</li>
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
							<a href="<?= Router::url('/',true) ?>">colo<span>shop</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
                                <li>
                                    <ul>
                                        <form action="<?= Router::url('/',true) ?>" method="get">
                                            <li>
                                                <input type="text" value="<?= $this->request->getQuery('q') ?>" style="color: black" name="q" class="form-control" placeholder="Bạn tìm gì...">
                                            </li>
                                            <li>
                                                <button class="btn btn-light"type="submit">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </li>
                                        </form>
                                    </ul>
                                </li>
								<li>
                                    <div class="dropdown">
                                        <p class="dropdown-toggle" data-toggle="dropdown">Trang điểm</p>
                                        <ul class="dropdown-menu">
                                            <?php foreach($categories as $category): ?>
                                            <?php if($category->id_parent == 2): ?>
                                                <li><a href="<?= Router::url('/danh-muc/'.$category->slug,true) ?>"><?= $category->name ?></a></li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
								<li>
                                    <div class="dropdown">
                                        <p class="dropdown-toggle" data-toggle="dropdown"> Chăm sóc da</p>
                                        <ul class="dropdown-menu">
                                            <?php foreach($categories as $category): ?>
                                            <?php if($category->id_parent == 3): ?>
                                                <li><a href="<?= Router::url('/danh-muc/'.$category->slug,true) ?>"><?= $category->name ?></a></li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
								<li>
                                    <div class="dropdown">
                                        <p class="dropdown-toggle" data-toggle="dropdown"> Chăm sóc tóc</p>
                                        <ul class="dropdown-menu">
                                            <?php foreach($categories as $category): ?>
                                            <?php if($category->id_parent == 4): ?>
                                                <li><a href="<?= Router::url('/danh-muc/'.$category->slug,true) ?>"><?= $category->name ?></a></li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
								<li>
                                    <div class="dropdown">
                                        <p class="dropdown-toggle" data-toggle="dropdown"> Phụ kiện</p>
                                        <ul class="dropdown-menu">
                                            <?php foreach($categories as $category): ?>
                                            <?php if($category->id_parent == 5): ?>
                                                <li><a href="<?= Router::url('/danh-muc/'.$category->slug,true) ?>"><?= $category->name ?></a></li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
								<li>
                                    <div class="dropdown">
                                        <p class="dropdown-toggle" data-toggle="dropdown"> Nước hoa</p>
                                        <ul class="dropdown-menu">
                                            <?php foreach($categories as $category): ?>
                                            <?php if($category->id_parent == 1): ?>
                                                <li><a href="<?= Router::url('/danh-muc/'.$category->slug,true) ?>"><?= $category->name ?></a></li>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
								<li><a href="<?= Router::url('/trial',true) ?>">sản phẩm dùng thử</a></li>
							</ul>
							<ul class="navbar_user">
                                <?php
                                    if($session->check('id_user'))
                                    {
                                ?>
                                    <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                <?php
                                    }
                                ?>
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
						usd
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">cad</a></li>
						<li><a href="#">aud</a></li>
						<li><a href="#">eur</a></li>
						<li><a href="#">gbp</a></li>
					</ul>
				</li>
				<li class="menu_item has-children">
					<a href="#">
						English
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#">French</a></li>
						<li><a href="#">Italian</a></li>
						<li><a href="#">German</a></li>
						<li><a href="#">Spanish</a></li>
					</ul>
				</li>
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
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.html">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2018 All Rights Reserverd. Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#">Colorlib</a> &amp; distributed by <a href="https://themewagon.com">ThemeWagon</a></div>
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
