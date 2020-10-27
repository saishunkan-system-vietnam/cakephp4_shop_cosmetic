<?php
use Cake\Routing\Router;
?>
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" type="text/css" href="css/util-cart.css">
<link rel="stylesheet" type="text/css" href="css/main-cart.css">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/single_styles.css', true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/single_responsive.css', true) ?>">
<link rel="stylesheet" href="<?= Router::url('/css/custom-cart.css',true) ?>">
<script src="<?= Router::url('/vendor/bootstrap/js/popper.js',true) ?>"></script>
<script src="<?= Router::url('/js/main-cart.js',true) ?>"></script>
<style>
.table100{
    text-align: center;
}
</style>
<div class="container single_product_container">
    <div class="row">
        <div class="col">

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="<?= Router::url('/',true) ?>">Trang chủ</a></li>
                    <li>
                        <a href="#">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            Giỏ hàng</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <h4>Thông tin giỏ hàng</h4>
            <div class="limiter">
                <div class="table100 mt-4">
                    <table>
                        <thead>
                            <tr class="table100-head">
                                <th class="column1">Tên sản phẩm</th>
                                <th class="column2">Ảnh</th>
                                <th>Điểm</th>
                                <th class="column3">Giá</th>
                                <th class="column4">Số lượng</th>
                                <th class="column5">Tổng tiền</th>
                                <th class="column6"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $id_product => $product) : ?>
                                <tr>
                                    <td class="column1"><?= h($product['name']) ?></td>
                                    <td class="column2"><img src="<?= Router::url('/images/product/' . $product['image'], true) ?>" style="width:50px"></td>
                                    <td>
                                        <?php
                                            switch ($product['type_product']) {
                                                case NORMAL_TYPE:
                                                    echo "+50POINT";
                                                    break;
                                                case GIFT_TYPE:
                                                    echo "0";
                                                    break;
                                                default:
                                                    echo 0;
                                                break;
                                            }
                                        ?>
                                    </td>
                                    <td class="column3">
                                        <?php
                                            if($product['price'] == '' && $product['point'] == '')
                                            {
                                                echo 0;
                                            }
                                            else{
                                                echo !empty($product['price']) ?
                                                number_format($product['price'], 0, '.', '.') . "₫" :
                                                $product['point']." point";
                                            }
                                        ?>
                                    </td>
                                    <td class="column4">
                                        <?php if($product['price'] != '' || $product['point'] != ''): ?>
                                            <img class="icon-minus" id_product="<?=$id_product ?>" src="<?= Router::url('/images/minus.png',true) ?>" alt="">
                                        <?php endif; ?>
                                        <span class="quantity" id_product="<?= $id_product ?>"><?= $product['quantity'] ?></span>
                                        <?php if($product['price'] != '' || $product['point'] != ''): ?>
                                            <img class="icon-plus" id_product="<?= $id_product ?>" src="<?= Router::url('/images/plus.png',true) ?>" alt="">
                                        <?php endif; ?>
                                    </td>
                                    <td class="column5">
                                        <?php
                                            if($product['price'] == '' && $product['point'] == '')
                                            {
                                                echo 0;
                                            }else{
                                                echo !empty($product['price']) ?
                                                number_format($product['quantity'] * $product['price'], 0, '.', '.') . "₫" :
                                                $product['point'] * $product['quantity']." point";
                                            }
                                        ?>
                                    </td>
                                    <td class="column6"><img id_product=<?= $id_product ?> class="close" src="<?= Router::url('/images/close-button.png',true) ?>" alt=""></td>
                                </tr>
                            <?php endforeach; ?>
                                <tr class="transport_fee">
                                    <td colspan="7">
                                    <?php
                                        foreach ($transports as $transport) {
                                            if($transport->id == 1 )
                                            {
                                                $transport_fee = $transport->price;
                                                break;
                                            }
                                        }
                                        echo "Thêm ".number_format($transport_fee,0,'.','.')."₫"." phí vận chuyển";
                                    ?>
                                    </td>
                                </tr>
                            <tr class="tt">
                                <td class="all_total" colspan="7">
                                    Tổng tiền:
                                    <span class="total">
                                    <?php
                                        if($total_point == 0 && $total_money == 0){
                                            echo "0₫";
                                        }elseif($total_point == 0){
                                            $total_money += $transport_fee;
                                            echo number_format($total_money,0, '.', '.')."₫";
                                        }elseif($total_money == 0){
                                            echo number_format($transport_fee,0, '.', '.')."₫ và $total_point POINT";
                                        }else{
                                            $total_money += $transport_fee;
                                            echo number_format($total_money,0, '.', '.')."₫ và $total_point POINT";
                                        }
                                    ?>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h4>Thông tin người đặt hàng</h4>
            <form action="<?= $this->Authen->guard('User')->check() ? Router::url('/bill',true) : Router::url('/create-account',true)  ?>" method="post">
                <div class="form-group mt-3">
                    <label for="full_name">Họ tên</label>
                    <input type="text" id="full_name" <?= $this->Authen->guard('User')->check() ? 'disabled' : '' ?>
                    value="<?= !empty($user) ? h($user->full_name) : '' ?>"
                    class="form-control" name="full_name" placeholder="Nhập họ tên">
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" <?= $this->Authen->guard('User')->check() ? 'disabled' : '' ?>
                    value="<?= !empty($user) ? h($user->phone) : '' ?>"
                    class="form-control" name="phone" placeholder="Nhập số điện thoại">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="Email" <?= $this->Authen->guard('User')->check() ? 'disabled' : '' ?>
                    value="<?= !empty($user) ? h($user->email) : '' ?>"
                    class="form-control" name="email" placeholder="Nhập email">
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" <?= $this->Authen->guard('User')->check() ? 'disabled' : '' ?>
                    value="<?= !empty($user) ? h($user->address) : '' ?>"
                    class="form-control" name="address" placeholder="Nhập địa chỉ">
                </div>
                <div class="form-group">
                    <label for="address">Hình thức giao hàng</label>
                    <select class="form-control" id="transport">
                        <?php foreach($transports as $transport): ?>
                            <option value="<?= $transport->id ?>"><?= $transport->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if(!$this->Authen->guard('User')->check()): ?>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" id="password" <?= $this->Authen->guard('User')->check() ? 'disabled' : '' ?>
                    class="form-control" name="password" placeholder="Nhập mật khẩu">
                </div>
                <?php endif; ?>
                <button type="submit" class="btn btn-success">Đặt hàng</button>
            </form>
        </div>
    </div>
</div>
<script>
    const url_add_to_cart = "<?= Router::url('/add-to-cart',true) ?>";
    const url_remove_from_cart = "<?= Router::url('/remove-product-from-cart',true) ?>";
    const url_change_transport = "<?= Router::url('/change-transport',true) ?>";
    const url_home = "<?= Router::url('/',true) ?>";
</script>
<script src="<?= Router::url('/js/cart.js',true) ?>"></script>
