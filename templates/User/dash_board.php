
<?php

use Cake\Routing\Router;
$session = $this->request->getSession();
?>
<!-- Slider -->

<div class="main_slider" style="background-image:url(images/slider_1.jpg)">
    <div class="container fill_height">
        <div class="row align-items-center fill_height">
            <div class="col">
                <div class="main_slider_content">
                    <h6>Spring / Summer Collection 2017</h6>
                    <h1>Get up to 30% Off New Arrivals</h1>
                    <div class="red_button shop_now_button"><a href="#">shop now</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                    <?php
                        foreach($products as $product)
                        {
                    ?>
                        <div class="product-item man">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <a href="<?= Router::url(['_name'=>'showProductInUser','fullBase' => 'true','slug'=>$product->slug]) ?>"><img src="<?= Router::url('/images/product/'.$product->image,true) ?>" alt=""></a>
                                </div>
                                <div class="product_bubble d-flex flex-column align-items-center"></div>
                                <div class="product_info">
                                    <h6 class="product_name">
                                        <a href="<?= Router::url(['_name'=>'showProductInUser','fullBase' => 'true','slug'=>$product->slug]) ?>">
                                            <?= h($product->name) ?>
                                        </a>
                                    </h6>
                                    <div class="product_price">
                                        <?=
                                            !empty($product->price) ?
                                            number_format("$product->price",0,".",".")." VNĐ" : $product->point." point"
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button">
                                <?php
                                    if($product->type_product == 0 || ($product->type_product == 1 && $session->check('id_user')))
                                    {
                                ?>
                                    <span class="addCartWithAjax" id-product="<?= $product->id ?>">
                                        <a href="#">
                                            add to cart
                                        </a>
                                    </span>
                                <?php
                                    }
                                    else{
                                ?>
                                    <span class="redirectLogin">
                                        <a href="#">
                                            đăng nhập
                                        </a>
                                    </span>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    if($this->Flash->render())
    {
?>
    <script>
        alert("Đặt hàng thành công");
    </script>
<?php
    }
?>
<script>
    $(document).ready(function () {
        $(".redirectLogin").click(function () {
            window.location.assign("<?= Router::url('/login',true) ?>")
        });
    });

    var err = 'Xin lỗi bạn vì sự bất tiện này hiện tại server chúng tôi đang lỗi hẹn gặp lại bạn vào khi khác!!!';
    $(document).ready(function () {
        $(".addCartWithAjax").click(function (e) {
            $.ajax({
                type: "GET",
                url: "<?= Router::url('/add-to-cart',true) ?>",
                data: {
                    id_product: $(this).attr("id-product"),
                    quantity: 1
                },
                dataType: "JSON",
                success: function (response) {
                    if(response.status == 201 && response.data > 0)
                    {
                        $("#checkout_items").html(parseInt($("#checkout_items").html())+1);
                    }else{
                        err = response.message;
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: err
                        })
                    }
                }
            })
            .catch(function(){
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi server',
                    text: err
                })
            })
        });
    });
</script>
