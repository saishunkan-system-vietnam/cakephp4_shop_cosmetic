<?php

use Cake\Routing\Router;

$session = $this->request->getSession();
?>

<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/single_styles.css', true) ?>">
<link rel="stylesheet" type="text/css" href="<?= Router::url('/user/styles/single_responsive.css', true) ?>">
<style>
    .product_details p {
        text-align: center;
    }

    .product_details img {
        display: block;
        margin: auto;
    }

    .product_details .title {
        font-size: 23px
    }
</style>
<div class="container single_product_container">
    <div class="row">
        <div class="col">

            <!-- Breadcrumbs -->

            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li>
                        <a href="categories.html">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            Giới thiệu Beauty Shop
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <p style="font-size:25px">Beauty Shop là hệ thống phân phối Mỹ phẩm chính hãng hàng đầu Việt Nam</p>
            <div class="single_product_image">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.651586256173!2d105.79302821540253!3d21.046622492543055!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3abea8ced1%3A0xb680deb2d22b3fcd!2sHoa%20Binh%20Tower!5e0!3m2!1sen!2s!4v1603158958355!5m2!1sen!2s" width="1140" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                </iframe>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="product_details">
                <p class="title">
                    Cung cấp mỹ phẩm làm đẹp chính hãng – chất lượng tốt – giá tốt nhất thị trường
                </p>
                <br>
                <img src="<?= Router::url('/images/icon-img.png', true) ?>" alt="">
                <br>
                <p>
                    Với mục tiêu mang đến cơ hội trải nghiệm các sản phẩm làm đẹp chất lượng tốt – giá tốt nhất thị trường, góp phần đắp đầy những vẻ đẹp khuyết thiếu, truyền cảm hứng dùng mỹ phẩm và giúp vẻ đẹpViệt tỏa sáng, Beauty Garden luôn không ngừng phấn đấu để hoàn thiện chất lượng dịch vụ của chính mình.
                </p>
                <p>
                    Gần 7 năm kinh nghiệm hoạt động trong lĩnh vực mỹ phẩm làm đẹp, hiện đội ngũ nhân viên của Beauty Garden đã lên đến 150 người cùng hệ thống cửa hàng trải khắp ba miền đất nước. Beauty Garden đang dần khẳng định được vị thế của mình trên thương trường và chiếm được tin yêu của đông đảo quý khách hàng.
                </p>
                <p class="title">
                    BEAUTY SHOP CÓ NHỮNG GÌ?
                </p>
                <p>
                    Phân phối mỹ phẩm chính hãng có xuất xứ nguồn gốc rõ ràng: Hàng nhập khẩu, hàng nhập khẩu từ Mỹ, Pháp, Anh, Nhật, Hàn, Thái Lan,...
                </p>
                <p>
                    Sản phẩm đa dạng: makeup, chăm sóc da, chăm sóc tóc, thực phẩm chức năng, phụ kiện làm đẹp,... đảm bảo phục vụ nhu cầu làm đẹp của chị em.
                </p>
            </div>
        </div>
    </div>

</div>
