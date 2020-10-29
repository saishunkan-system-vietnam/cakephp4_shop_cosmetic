
<?php

use Cake\Routing\Router;
?>
<div class="new_arrivals">
    <div class="container">
        <h4 class="p-3" style="margin-top:150px">
        </h4>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
                    <?php
                        foreach($giftProducts as $product)
                        {
                    ?>
                        <div class="product-item man">
                            <div class="product discount product_filter">
                                <div class="product_image">
                                    <a href="<?= Router::url("/$product->slug") ?>">
                                        <img src="<?= Router::url('/images/product/'.$product->image,true) ?>" alt="">
                                    </a>
                                </div>
                                <div class="product_bubble d-flex flex-column align-items-center"></div>
                                <div class="product_info">
                                    <h6 class="product_name">
                                        <a href="<?= Router::url(['_name'=>'showProductInUser','fullBase' => 'true','slug'=>$product->slug]) ?>">
                                            <?= h($product->name) ?>
                                        </a>
                                    </h6>
                                    <div class="product_price">
                                        <?= $product->point ?> POINT
                                    </div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button">
                                <span class="addCartWithAjax" id-product="<?= $product->id ?>">
                                    <a href="#"> add to cart</a>
                                </span>
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
<script>
    var err = 'Xin lỗi bạn vì sự bất tiện này hiện tại server chúng tôi đang lỗi hẹn gặp lại bạn vào khi khác!!!';
    $(document).ready(function () {
        $(".addCartWithAjax").click(function (e) {
            $.ajax({
                type: "GET",
                url: "<?= Router::url('/add-gift-product-to-cart',true) ?>",
                data: {
                    product_id: $(this).attr("id-product"),
                    quantity: 1
                },
                dataType: "JSON",
                success: function (response) {
                    if(response.status == 201)
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="<?= Router::url('/js/flyto.min.js',true) ?>"></script>
<script>
    $('.col').flyto({
        item      : '.product_image',
        target    : '.fa-shopping-cart',
        button    : '.add_to_cart_button'
    });
</script>
