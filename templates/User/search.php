
<?php

use Cake\Routing\Router;

?>
<div class="main_slider">
    <div class="container">
        <h4 class="p-3">
            Kết quả tìm kiếm cho <?= $this->request->getQuery('q') ?>
        </h4>
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
                                    <img src="<?= Router::url('/images/product/'.$product->image,true) ?>" alt="">
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
                                    if($product->type_product == 0)
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
</script>
