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
        <div class="col-lg-11">
            <h4>Thông tin giỏ hàng</h4>
            <div class="limiter">
                <div class="table100 mt-4">
                    <table id="table">
                        <thead>
                            <tr class="table100-head">
                                <th class="column1">Tên sản phẩm</th>
                                <th class="column2">Ảnh</th>
                                <th>Point</th>
                                <th class="column3">Giá</th>
                                <th class="column4">Số lượng</th>
                                <th class="column5">Tổng tiền</th>
                                <th>Tổng point</th>
                                <th class="column6">Point được tặng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $pointAward = 0; foreach ($products as $id_product => $product) : ?>
                                <tr>
                                    <td class="column1"><?= h($product['name']) ?></td>
                                    <td class="column2"><img src="<?= Router::url('/images/product/' . $product['image'], true) ?>" style="width:50px"></td>
                                    <td>
                                        <?= $product['point'] == 0 ? 0 : $product['point']." point" ?>
                                    </td>
                                    <td class="column3">
                                        <?php
                                            if($product['type_product'] == NORMAL_TYPE)
                                            {
                                                echo number_format($product['price'],0,'.','.')."₫";
                                            }
                                            else{
                                                echo 0;
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
                                            if($product['type_product'] == NORMAL_TYPE)
                                            {
                                                echo number_format($product['quantity'] * $product['price'], 0, '.', '.') . "₫";
                                            }else{
                                                echo 0;
                                            }
                                        ?>
                                    </td>
                                    <td class="point" style="min-width: 70px;">
                                        <?php
                                            if($product['type_product'] == GIFT_TYPE)
                                            {
                                                echo $product['point'] * $product['quantity']." point";
                                            }else{
                                                echo 0;
                                            }
                                        ?>
                                    </td>
                                    <td class="column6 point_award" style="min-width: 70px;">
                                        <?php
                                            switch ($product['type_product']) {
                                                case NORMAL_TYPE:
                                                    echo "+".(50 * $product['quantity'])." point";
                                                    $pointAward += 50 * $product['quantity'];
                                                    break;
                                                default:
                                                    echo 0;
                                                break;
                                            }
                                        ?>
                                    </td>
                                    <td class="column7"><img id_product=<?= $id_product ?> class="close" src="<?= Router::url('/images/close-button.png',true) ?>" alt=""></td>
                                </tr>
                            <?php endforeach; ?>
                                <?php if($total_point > 0): ?>
                                <tr class="column8">
                                    <td colspan="6" style="text-align: end;">Point còn lại <span class="text-equal"> = </span></td>
                                    <td class="total_point"><?= $total_point ?></td>
                                    <td class="subtract_result" colspan="2">
                                        <span class="text-minus"> - </span><?= $pointAward ?>
                                        <span class="result"> = </span> <?= $total_point - $pointAward ?> point
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr class="transport_fee">
                                    <td colspan="9" class="money">
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
                                <td class="all_total money" colspan="9">
                                    Tổng tiền:
                                    <span class="total">
                                    <?php
                                        $total_point = $total_point - $pointAward > 0 ? $total_point - $pointAward : 0;
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
        <div class="col-lg-12 mt-5">
            <h4>Thông tin người đặt hàng</h4>
            <form action="<?= Router::url('/bill',true) ?>" method="post">
                <div class="row">
                    <div class="col-lg-5 ml-4">
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
                    </div>
                    <div class="col-lg-5 mt-3" style="margin-left: 4em;">
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" id="address" <?= $this->Authen->guard('User')->check() ? 'disabled' : '' ?>
                            value="<?= !empty($user) ? h($user->address) : '' ?>"
                            class="form-control" name="address" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-group">
                            <label for="address">Hình thức giao hàng</label>
                            <select class="form-control" id="transport" name="transport_id">
                                <?php foreach($transports as $transport): ?>
                                    <option value="<?= $transport->id ?>"><?= $transport->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Hình thức thanh toán</label>
                            <select class="form-control">
                                    <option value="">Thanh toán khi nhận hàng</option>
                                    <option value="">Thanh toán qua ATM</option>
                                    <option value="">Thanh toán qua thẻ tín dụng/thẻ ghi nợ</option>
                            </select>
                        </div>
                        <?php if(!$this->Authen->guard('User')->check()): ?>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" <?= $this->Authen->guard('User')->check() ? 'disabled' : '' ?>
                            class="form-control" name="password" placeholder="Nhập mật khẩu">
                        </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-success float-right">Đặt hàng</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const url_add_to_cart = "<?= Router::url('/change-amount-product-from-cart',true) ?>";
    const url_remove_from_cart = "<?= Router::url('/remove-product-from-cart',true) ?>";
    const url_change_transport = "<?= Router::url('/change-transport',true) ?>";
    const url_home = "<?= Router::url('/',true) ?>";
</script>
<script src="<?= Router::url('/js/cart.js',true) ?>"></script>
