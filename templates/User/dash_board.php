
<?php

use Cake\Routing\Router;

?>
<main role="main" class="pb-3">
    <h1 class="hide">Beautygarden Hệ thống phân phối mỹ phẩm số 1 Việt Nam</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://adminbeauty.hvnet.vn/Upload/Files/banner/He-Thong-Cua-Hang-2.png?width=1170&height=450&v=15042020" alt="&#x110;&#x1ECA;A CH&#x1EC8;" class="img-reponsive">
                        </div>
                        <div class="carousel-item ">
                            <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/banner/website-cover.jpg?width=1170&height=450&v=15042020" alt="banner ch&#xED;nh" class="img-reponsive lazy-load">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="slide-prev slide-all" href="#carouselExampleIndicators" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                    <a class="slide-next slide-all" href="#carouselExampleIndicators" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-products">
                    <div class="head-box">
                        <div class="clr"></div>
                    </div>
                    <div class="body-box">
                        <div class="owl-carousel new-sale">
                            <?php
                            foreach ($products as $product) {
                            ?>
                                <div class="item">
                                    <div class="pd-box ">
                                        <div class="box-images">
                                            <a href="<?= Router::url("/show-product/$product->slug", true) ?>" title="<?= h($product->name) ?>">
                                                <img data-src="<?= Router::url('/images/product/' . $product->image, true) ?>" class="img-reponsive owl-lazy " />
                                            </a>
                                            <button type="button" onclick="LikeThis(this, '8210')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
                                            <div class="sale-off ">30%<br />OFF</div>
                                        </div>
                                        <div class="box-content">
                                            <h3>
                                                <a href="<?= Router::url("/show-product/$product->slug", true) ?>" title="<?= h($product->name) ?>"><?= h($product->name)  ?></a>
                                            </h3>
                                            <div>
                                                <span class="price-drop">155.000₫</span>
                                                <span class="price "><?= number_format("$product->price", 0, ".", ".") ?>₫</span>
                                            </div>
                                        </div>
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
    </div>
</main>
