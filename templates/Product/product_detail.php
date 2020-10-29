<?php

use Cake\Routing\Router;
?>

<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/single_styles.css',true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/single_responsive.css',true) ?>">
	<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="<?= Router::url('/') ?>">Home</a></li>
						<li>
                            <a href="categories.html">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <?= h($product->name) ?>
                            </a>
                        </li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-12 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(images/product/<?= $product->image ?>)"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?= h($product->name) ?></h2>
					</div>
                    <div class="product_price mt-3">
                        <?php
                            if($product->type_product == NORMAL_TYPE)
                            {
                                echo number_format($product->price,0,'.','.')."VNĐ";
                            }elseif($product->type_product == GIFT_TYPE){
                                echo $product->point." POINT";
                            }else{
                                echo "Dùng thử";
                            }
                        ?>
                    </div>
                    <span> còn lại (<span><?= $product->amount ?></span>) sản phẩm</span>
                    <div class="mt-2">
                        <p>Thương hiệu: <?= $product->trademark->name ?></p>
                    </div>
                    <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center mt-3">
                        <span>Số lượng:</span>
                        <div class="quantity_selector">
                            <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            <span id="quantity_value">1</span>
                            <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </div>
                        <div class="btn btn-danger text-uppercase ml-3" id="add_to_cart">add to cart</div>
                    </div>
				</div>
			</div>
		</div>

	</div>

	<!-- Tabs -->

	<div class="tabs_section_container">

		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Tab Description -->

					<div id="tab_1" class="tab_container active">
							<div class="col-lg-9 desc_col">
								<h4>Thông tin thêm</h4>
                                <?= $product->product_info ?>
					</div>

					<!-- Tab Additional Info -->

					<div id="tab_2" class="tab_container">
						<div class="row">
							<div class="col additional_info_col">
								<div class="tab_title additional_info_title">
									<h4>Additional Information</h4>
								</div>
								<p>COLOR:<span>Gold, Red</span></p>
								<p>SIZE:<span>L,M,XL</span></p>
							</div>
						</div>
					</div>

					<!-- Tab Reviews -->

					<div id="tab_3" class="tab_container">
						<div class="row">

							<!-- User Reviews -->

							<div class="col-lg-6 reviews_col">
								<div class="tab_title reviews_title">
									<h4>Reviews (2)</h4>
								</div>

								<!-- User Review -->

								<div class="user_review_container d-flex flex-column flex-sm-row">
									<div class="user">
										<div class="user_pic"></div>
										<div class="user_rating">
											<ul class="star_rating">
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
											</ul>
										</div>
									</div>
									<div class="review">
										<div class="review_date">27 Aug 2016</div>
										<div class="user_name">Brandon William</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>

								<!-- User Review -->

								<div class="user_review_container d-flex flex-column flex-sm-row">
									<div class="user">
										<div class="user_pic"></div>
										<div class="user_rating">
											<ul class="star_rating">
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
											</ul>
										</div>
									</div>
									<div class="review">
										<div class="review_date">27 Aug 2016</div>
										<div class="user_name">Brandon William</div>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
							</div>

							<!-- Add Review -->

							<div class="col-lg-6 add_review_col">

								<div class="add_review">
									<form id="review_form" action="post">
										<div>
											<h1>Add Review</h1>
											<input id="review_name" class="form_input input_name" type="text" name="name" placeholder="Name*" required="required" data-error="Name is required.">
											<input id="review_email" class="form_input input_email" type="email" name="email" placeholder="Email*" required="required" data-error="Valid email is required.">
										</div>
										<div>
											<h1>Your Rating:</h1>
											<ul class="user_star_rating">
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star" aria-hidden="true"></i></li>
												<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
											</ul>
											<textarea id="review_message" class="input_review" name="message"  placeholder="Your Review" rows="4" required data-error="Please, leave us a review."></textarea>
										</div>
										<div class="text-left text-sm-right">
											<button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">submit</button>
										</div>
									</form>
								</div>

							</div>

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>
<script>
    $(document).ready(function () {
        var quantity_value = $("#quantity_value");
        $(".quantity_selector .plus").click(function () {
            if(parseInt(quantity_value.html()) < 10)
            {
                quantity_value.html(parseInt(quantity_value.html())+1);
            }
        });

        $(".quantity_selector .minus").click(function () {
            if(parseInt(quantity_value.html()) > 0)
            {
                quantity_value.html(parseInt(quantity_value.html())-1);
            }
        });

        $("#add_to_cart").click(function () {
            var err = 'Xin lỗi bạn vì sự bất tiện này hiện tại server chúng tôi đang lỗi hẹn gặp lại bạn vào khi khác!!!';
            $.ajax({
                type: "GET",
                url: "<?= $url ?>",
                data: {
                    product_id:<?= $product->id ?>,
                    quantity:parseInt(quantity_value.html())
                },
                dataType: "JSON",
                success: function (response) {
                    if(response.status == 201)
                    {
                        $("#checkout_items").html(parseInt($("#checkout_items").html()) + parseInt(quantity_value.html()));
                        Swal.fire({
                            icon: 'success',
                            title: 'Thêm sản phẩm',
                            text: "Thêm sản phẩm thành công vui lòng vào giỏ hàng kiểm tra sản phẩm và tiến hành đặt hàng",
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true
                        })
                    }else{
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
                }
            })
            .catch(()=>{
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi',
                    text: err
                })
            });
        });
    });
</script>
