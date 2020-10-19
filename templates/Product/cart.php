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
<script src="<?= Router::url('/vendor/bootstrap/js/popper.js') ?>"></script>
<script src="<?= Router::url('/js/main-cart.js') ?>"></script>
<div class="container single_product_container">
    <div class="row">
        <div class="col">

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li>
                        <a href="categories.html">
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
                                    <td class="column3">
                                        <?=
                                            !empty($product['price']) ?
                                            number_format($product['price'], 0, '.', '.') . "₫" :
                                            $product['point']." point"
                                        ?>
                                    </td>
                                    <td class="column4">
                                        <img class="icon-minus" id_product="<?=$id_product ?>" src="<?= Router::url('/images/minus.png',true) ?>" alt="">
                                        <span class="quantity" id_product="<?= $id_product ?>"><?= $product['quantity'] ?></span>
                                        <img class="icon-plus" id_product="<?= $id_product ?>" src="<?= Router::url('/images/plus.png',true) ?>" alt="">
                                    </td>
                                    <td class="column5">
                                        <?=
                                            !empty($product['price']) ?
                                            number_format($product['quantity'] * $product['price'], 0, '.', '.') . "₫" :
                                            $product['point'] * $product['quantity']." point"
                                        ?>
                                    </td>
                                    <td class="column6"><img id_product=<?= $id_product ?> class="close" src="<?= Router::url('/images/close-button.png',true) ?>" alt=""></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h4>Thông tin người đặt hàng</h4>
            <?= $this->Form->create(null, [
                'url' => '/bill',
                'type' => 'post'
            ]); ?>
            <div class="form-group mt-3">
                <label for="full_name">Họ tên</label>
                <input type="text" id="full_name" value="<?= !empty($user) ? h($user->full_name) : '' ?>" class="form-control" name="full_name" placeholder="Nhập họ tên">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" id="phone" value="<?= !empty($user) ? h($user->phone) : '' ?>" class="form-control" name="phone" placeholder="Nhập số điện thoại">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="Email" value="<?= !empty($user) ? h($user->email) : '' ?>" class="form-control" name="email" placeholder="Nhập email">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" id="address" value="<?= !empty($user) ? h($user->address) : '' ?>"class="form-control" name="address" placeholder="Nhập địa chỉ">
            </div>
            <button type="submit" class="btn btn-success">Đặt hàng</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.icon-plus').click(function () {
            editCart($(this).attr('id_product'),1);
        });


        $('.icon-minus').click(function () {
            editCart($(this).attr('id_product'),-1);
        });

        function editCart(id_product,quantity)
        {
            $.ajax({
                type: "GET",
                url: "<?= Router::url('/add-to-cart',true) ?>",
                data: {
                    id_product: id_product,
                    quantity: quantity
                },
                dataType: "JSON",
                success: function (response) {
                    var err = 'Xin lỗi bạn vì sự bất tiện này hiện tại server chúng tôi đang lỗi hẹn gặp lại bạn vào khi khác!!!';
                    $(".quantity").each(function(){
                        if($(this).attr('id_product') == response.data && response.status == 201)
                        {
                            var index = $(".quantity").index(this);
                            $(this).html(parseInt($(this).html()) + quantity);
                            $("#checkout_items").html(parseInt($("#checkout_items").html()) + quantity);
                            $(".column5")[index+1].innerText = response.total;
                            if($(this).html() == "0")
                            {
                                $(".table100 tbody tr")[index].remove();

                                if($(".table100 tbody tr").length == 0)
                                {
                                    const home = "<?= Router::url('/',true) ?>";
                                    $(".limiter .table100").append(`<div>
                                        <a href='`+home+`'>Vui lòng quay lại để thêm sản phẩn vào giỏ hàng</a>
                                    </div>`);
                                }
                            }
                        }else if(response.status != 201){
                            if(response.status != 500)
                            {
                                err = response.message
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: err
                            })
                        }
                    })
                }
            });
        }

        $('.close').click(function(){
            var index = $('.close').index(this);
            $.ajax({
                type: "GET",
                url: "<?= Router::url('/remove-product-from-cart',true) ?>",
                data: {
                    id_product: $(this).attr('id_product')
                },
                dataType: "JSON",
                success: function (response) {
                    if(response.status == true)
                    {
                        const quantity = $('.quantity')[index].innerText;
                        $(".table100 tbody tr")[index].remove();
                        $("#checkout_items").html(parseInt($("#checkout_items").html()) - quantity);
                        if($(".table100 tbody tr").length == 0)
                        {
                            const home = "<?= Router::url('/',true) ?>";
                            $(".limiter .table100").append(`<div>
                                <a href='`+home+`'>Vui lòng quay lại để thêm sản phẩn vào giỏ hàng</a>
                            </div>`);
                        }
                    }
                }
            });
        });
    });
</script>
