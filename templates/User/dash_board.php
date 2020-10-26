
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
                                            number_format("$product->price",0,".",".")." VNĐ"
                                        ?>
                                    </div>
                                </div>
                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center">
                                    <span>
                                        +50point
                                    </span>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button">
                                <span class="addCartWithAjax" id-product="<?= $product->id ?>">
                                    <a href="#">
                                        add to cart
                                    </a>
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
<?php
    if($this->Flash->render())
    {
?>
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Đặt hàng thành công bạn vui lòng vào email để kiểm tra thông tin hóa đơn',
        showConfirmButton: false,
        timer: 3000,
    })
    </script>
<?php
    }
?>
<script>
    var err = 'Xin lỗi bạn vì sự bất tiện này hiện tại server chúng tôi đang lỗi hẹn gặp lại bạn vào khi khác!!!';
    $(document).ready(function () {
        $(".addCartWithAjax").click(function (e) {
            $.ajax({
                type: "GET",
                url: "<?= Router::url('/add-normal-product-to-cart',true) ?>",
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
