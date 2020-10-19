
<?php

use Cake\Routing\Router;
$sessions = $this->request->getSession();
?>
<div class="new_arrivals">
    <div class="container">
        <h4 class="p-3" style="margin-top:150px">
            
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
                                        Hàng dùng thử
                                    </div>
                                </div>
                            </div>
                            <div class="red_button add_to_cart_button" id-product="<?= $product->id ?>">
                                <a href="#">Đăng ký dùng thử</a>
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
    $(document).ready(function () {
        $(".redirectLogin").click(function () {
            window.location.assign("<?= Router::url('/login',true) ?>")
        });

        $(".add_to_cart_button").click(function () {
            var isLogin = <?= $sessions->check('id_user') ? "true" : "false"; ?>;

            const url = "<?= Router::url('/trial-order',true) ?>/"+$(this).attr("id-product");
            if(isLogin == true)
            {
                Swal.fire({
                    title: 'Bạn muốn đặt sản phẩm này?',
                    text: "Mỗi sản phẩm bạn chỉ được đặt 1 số lượng",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đặt hàng',
                    cancelButtonText:'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: url,
                            dataType: "JSON",
                        })
                        .done((response) =>{
                            if(response.status == 201)
                            {
                                Swal.fire(
                                    'Thành công!',
                                    response.message,
                                    'success'
                                )
                            }
                            else{
                                Swal.fire(
                                    'Thất bại!',
                                    response.message,
                                    'warning'
                                )
                            }
                        })
                        .catch((err)=>{
                            Swal.fire(
                                'Lỗi hệ thống!',
                                'Xin lỗi bạn vì sự bất tiện này hiện tại server chúng tôi đang lỗi hẹn gặp lại bạn vào khi khác!!!',
                                'error'
                            )
                        });
                    }
                })
            }
            else{
                window.location.assign("<?= Router::url('/trial-order/register',true) ?>")
            }
        });
    });


</script>
