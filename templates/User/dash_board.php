
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Beautygarden - Mỹ phẩm chính hãng giá tốt nhất tại Việt Nam</title>
    <meta name="keywords" content="Beauty Garden - Mỹ phẩm chính hãng" />
    <meta name="description" content="Beautygarden - Thương hiệu mỹ phẩm chính hãng với vô số những mặt hàng chăm sóc và làm đẹp cho da bạn có giá tốt nhất trên thị trường mỹ phẩm Việt Nam." />
    <meta name="og:title" content="Beautygarden - Mỹ phẩm chính hãng giá tốt nhất tại Việt Nam" />
    <meta name="og:type" content="website" />
    <meta property="og:site_name" content="beautygarden.vn | Beauty Garden - Mỹ phẩm chính hãng" />
    <meta property="og:description" content="Beautygarden - Thương hiệu mỹ phẩm chính hãng với vô số những mặt hàng chăm sóc và làm đẹp cho da bạn có giá tốt nhất trên thị trường mỹ phẩm Việt Nam." />
    <meta property="og:image" content="https://adminbeauty.hvnet.vn/images/logomoi.png" />
    <meta name="robots" content="index, follow, noodp, noydir" />
    <link rel="canonical" href="https://beautygarden.vn/">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="amphtml" href="">
    <meta name="google-site-verification" content="k2S2Cr4PfQXiRsJ3MiKjGSAgGLbHxTJ8MM2Ul_O7mtM" />
    <link rel="stylesheet" href="https://beautygarden.vn/css/site.min.css?v=jdJWZDlWOMADAch1FaaRDgvjbVoRXOlYo0gJ9BEeSNg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>

<header>
    <div class="head-first">
        <div class="container">

            <div class="box-social hidden-xs">
                <ul class="ul-non ul-social">
                    <li class=""><a href="https://www.facebook.com/BeautyGardenCosmetics/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li class="hidden-sm"><a href="https://www.instagram.com/beautygarden.vn" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li class="hidden-sm"><a href="https://www.pinterest.com/BeautyGardenvn/" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                    <li class="hidden-sm"><a href="https://plus.google.com/u/4/101900698437907415834" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
                <div class="box-pdseen">
                    <a href="#">
                        <i aria-hidden="true" class="fa fa-chevron-down"></i>
                        Sản phẩm bạn đã xem
                    </a>
                    <div class="box-after" id="load-seen">

                    </div>
                </div>
                <div class="clr"></div>
            </div>
            <div class="box-hotline">
                <ul class="ul-non ul-hotline">
                    <li class="">
                        <a href="#" class="pixen-lg just-hl"><span>Mi&#x1EC1;n B&#x1EAF;c</span> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="ul-non ul-lg">
                            <li><a href="javascript:SetBranh('48611')">Miền Nam</a></li>
                            <li><a href="javascript:SetBranh('48610')">Miền Trung</a></li>
                            <li><a href="javascript:SetBranh('48609')">Miền Bắc</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="just-hl"><span>Hotline:</span> 0911 384 114</a></li>
                    <li class="hidden-xs"><a href="#" class="just-hl"><span>Tổng đài tư vấn:</span> 1900 7013</a></li>
                    <li class="hidden-xs">
                        <a href="#" class="pixen-lg"><?php

use Cake\Routing\Router;

echo isset($user)? $user->full_name : "Tài Khoản"; ?> <i class='fa fa-angle-down' aria-hidden='true'></i></a>
                        <?php
                            if(!isset($user))
                            {
                        ?>
                            <ul class="ul-non ul-lg">
                                <li><a href="<?= Router::url('/login',true) ?>">Đăng nhập</a></li>
                                <li><a href="<?= Router::url('/logout',true) ?>">Đăng ký</a></li>
                            </ul>
                        <?php
                            }
                            else{
                        ?>
                            <ul class="ul-non ul-lg">
                                <li><a href="<?= Router::url('/logout',true) ?>">Đăng xuất</a></li>
                            </ul>
                        <?php
                            }
                        ?>
                     </li>
                </ul>
            </div>
            <div class="clr"></div>
        </div>

    </div>
    <div class="head-second">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="box-logo">
                        <a href="/">
                            <img src="https://adminbeauty.hvnet.vn/images/logomoi-compressor.png?v=10042020" alt="Logo beautygarden.vn" class="img-reponsive" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-first col-md-6">
                    <div class="box-Sform" itemscope itemtype="http://schema.org/WebSite">
                        <meta itemprop="url" content="https://beautygarden.vn/" />
                        <form class="form-inline" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
                            <meta itemprop="target" content="https://beautygarden.vn/tim-kiem.html?keyword={query}" />
                            <input type="text" class="form-control my-form" id="inlineFormInputName2" placeholder="Tìm kiếm..." value="" autocomplete="off" onfocus="onfos()" onfocusout="unfos()" onkeydown="autocompateFirst()">
                            <select class="custom-select my-form" id="inlineFormCustomSelectPref">
                                <option selected value="0">Sản phẩm</option>
                                <option value="1">Tin tức</option>
                            </select>
                            <button type="button" class="btn btn-search" onclick="Searching()"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                        <div class="xuhuong">
                            <p>Xu hướng tìm kiếm</p>
                            <ul class="ul-non ul-xuhuong">
                                        <li><a href="/tim-kiem.html?keyword=son">son</a></li>
                                        <li><a href="/tim-kiem.html?keyword=kem duong">kem duong</a></li>
                                        <li><a href="/tim-kiem.html?keyword=innisfree">innisfree</a></li>
                                        <li><a href="/tim-kiem.html?keyword=sua rua mat the face shop">sua rua mat the face shop</a></li>
                                        <li><a href="/tim-kiem.html?keyword=kem chong nang">kem chong nang</a></li>
                                        <li><a href="/tim-kiem.html?keyword=mat na">mat na</a></li>
                                        <li><a href="/tim-kiem.html?keyword=dau tay trang cleansing oil   the face shop 200ml">dau tay trang cleansing oil   the face shop 200ml</a></li>
                                        <li><a href="/tim-kiem.html?keyword=neutrogena">neutrogena</a></li>
                                        <li><a href="/tim-kiem.html?keyword=3ce">3ce</a></li>
                                        <li><a href="/tim-kiem.html?keyword=xit khoang">xit khoang</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-last col-md-6 order-md-last hidden-xs">
                    <div class="box-card">
                        <ul class="ul-non ul-card">

                            <li>
                                <a href="/gio-hang.html" class="shop_cart" title="Giỏ hàng">
                                    <i class="fa fa-shopping-cart "></i>
                                    Giỏ hàng
                                    <span>0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </div>
    <div class="head-three">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-menu">
                        <div class="hidden-md ">
                            <ul class="ul-non menu-mb">
                                <li>
                                    <a href="/gio-hang.html" class="shop_cart_mb" title="Giỏ hàng">
                                        <i class="fa fa-shopping-cart "></i>
                                        <span>0</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/danh-sach-yeu-thich.html" class="like-pd-mb" title="Sản phẩm yêu thích">
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        <span>0</span>
                                    </a>
                                </li>
                            </ul>
                            <a href="tel:0911384114" class="hl-pd-mb" title="Tổng đài">
                                <i class="fa fa-phone"></i>
                                CSKH: 0911.384.114
                            </a>
                            <button type="button" class="btn-pd-mb hidden-xs" onclick="showmenutt()">
                                Categories
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn-mn-mb" onclick="showmenu()">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                            <div class="clr"></div>
                        </div>
                        <ul class="ul-non ul-menu" id="menu">
                            <li class="hidden-md first-li"><button type="button" class="btn-remove" onclick="showmenu()"><i class="fa fa-times" aria-hidden="true"></i></button></li>
                            <li class="li-parent-first hidden-xs hidden-sm">
                                <a href="javascript:void(0)" class="a-parent" id="megaloger" data-show="false"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                <ul class="ul-non ul-menu-lagi" id="ul-megaloger">
                                    <li>
                                        <a href="#" class="">
                                            <div class="img-luna img-icon img-tt"></div>
                                            <span>Thông tin</span>
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <ul class="ul-non ul-mega">
                                            <li><a href="/su-kien-khuyen-mai.html">Sự kiện khuyến mãi</a></li>
                                            <li><a href="/bi-quyet-lam-dep.html">Bí quyết làm đẹp</a></li>
                                            <li><a href="/bao-chi-noi-gi-ve-chung-toi.html">Tin báo chí</a></li>
                                            <li><a href="/review-san-pham">Review sản phẩm</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="">
                                            <div class="img-luna img-icon img-about"></div>
                                            <span>Về chúng tôi</span>
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <ul class="ul-non ul-mega">
                                            <li><a href="/noi-dung/gioi-thieu-beautygarden.html">Giới thiệu Beautygarden</a></li>
                                            <li><a href="/noi-dung/he-thong-cua-hang.html">Hệ thống cửa hàng</a></li>
                                            <li><a href="/noi-dung/chuong-trinh-tich-diem.html">Chương trình tích điểm</a></li>
                                            <li><a href="/noi-dung/bao-mat-thong-tin.html">Bảo mật thông tin</a></li>
                                            <li><a href="/noi-dung/dieu-khoan-su-dung.html">Điều khoản sử dụng</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#" class="">
                                            <div class="img-luna img-icon img-support"></div>
                                            <span>Hỗ trợ</span>
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <ul class="ul-non ul-mega">
                                            <li><a href="/noi-dung/huong-dan-mua-hang.html">Hướng dẫn mua hàng</a></li>
                                            <li><a href="/noi-dung/thanh-toan-van-chuyen.html">Thanh toán vận chuyển</a></li>
                                            <li><a href="/noi-dung/chinh-sach-doi-tra-hang.html">Chính sách đổi trả</a></li>
                                            <li><a href="/noi-dung/giai-dap-thac-mac.html">Giải đáp thắc mắc</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="/lien-he.html" class="">
                                            <div class="img-luna img-icon img-contact"></div>
                                            <span>Liên hệ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/danh-muc/thuc-pham-chuc-nang.html" class="">
                                            <div class="img-luna img-icon img-thucpham"></div>
                                            <span>Thực phẩm chức năng</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                                    <li class="li-parent">
                                        <a href="/danh-muc/trang-diem.html" class="a-parent">
                                            Trang &#x110;i&#x1EC3;m
                                                <i class="fa fa-angle-down hidden-xs hidden-sm" aria-hidden="true"></i>
                                        </a>
                                        <i class="fa fa-angle-right hidden-md ase" aria-hidden="true"></i>

                                            <div class="out-menu ">
                                                <div class="row">
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <a href="/danh-muc/khuon-mat.html" class="title-two">Trang &#x110;i&#x1EC3;m M&#x1EB7;t</a>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/kem-che-khuyet-diem.html">Kem che khuy&#x1EBF;t &#x111;i&#x1EC3;m</a></li>
                                                                                <li><a href="/danh-muc/cushion.html">Cushion</a></li>
                                                                                <li><a href="/danh-muc/kem-nen.html">Kem n&#x1EC1;n</a></li>
                                                                                <li><a href="/danh-muc/kem-bb-cc-dd.html">Kem BB - CC - DD</a></li>
                                                                                <li><a href="/danh-muc/kem-lot.html">Primer - Kem L&#xF3;t</a></li>
                                                                                <li><a href="/danh-muc/phan-phu-phan-nen.html">Ph&#x1EA5;n ph&#x1EE7; - Ph&#x1EA5;n n&#x1EC1;n</a></li>
                                                                                <li><a href="/danh-muc/ma-hong.html">Ph&#x1EA5;n m&#xE1; h&#x1ED3;ng</a></li>
                                                                                <li><a href="/danh-muc/tao-khoi-highlighter.html">T&#x1EA1;o kh&#x1ED1;i - Highlighter</a></li>
                                                                                <li><a href="/danh-muc/xit-khoang-nen.html">X&#x1ECB;t kho&#xE1;ng n&#x1EC1;n</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <a href="/danh-muc/mat.html" class="title-two">Trang &#x110;i&#x1EC3;m M&#x1EAF;t</a>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/phan-mat.html">Ph&#x1EA5;n M&#x1EAF;t</a></li>
                                                                                <li><a href="/danh-muc/phan-mat-lot-mat.html">Eye Primer &#x2013; Kem L&#xF3;t M&#x1EAF;t</a></li>
                                                                                <li><a href="/danh-muc/ke-chan-may.html">K&#x1EBB; M&#xE0;y</a></li>
                                                                                <li><a href="/danh-muc/ke-mat.html">Eyeliner &#x2013; K&#x1EBB; M&#x1EAF;t</a></li>
                                                                                <li><a href="/danh-muc/mascara.html">Mascara</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <a href="/danh-muc/moi.html" class="title-two">Trang &#x110;i&#x1EC3;m M&#xF4;i</a>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/che-khuyet-diem-moi.html">Che khuy&#x1EBF;t &#x111;i&#x1EC3;m m&#xF4;i</a></li>
                                                                                <li><a href="/danh-muc/son-moi.html">Son m&#xF4;i</a></li>
                                                                                <li><a href="/danh-muc/son-duong.html">Son d&#x1B0;&#x1EE1;ng </a></li>
                                                                                <li><a href="/danh-muc/lot-moi-khoa-moi.html">L&#xF3;t m&#xF4;i &#x2013; Kh&#xF3;a m&#xF4;i</a></li>
                                                                                <li><a href="/danh-muc/mat-na-moi.html">Lips Mask &#x2013; M&#x1EB7;t n&#x1EA1; m&#xF4;i</a></li>
                                                                                <li><a href="/danh-muc/son-high-end.html">Son high-end</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                                                        <div>
                                                            <img src="https://adminbeauty.hvnet.vn/Upload/Files/banner/make-up-bg.png?v=10042020 " alt="" class="img-reponsive" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                    </li>
                                    <li class="li-parent">
                                        <a href="/danh-muc/cham-soc-da.html" class="a-parent">
                                            Ch&#x103;m S&#xF3;c Da
                                                <i class="fa fa-angle-down hidden-xs hidden-sm" aria-hidden="true"></i>
                                        </a>
                                        <i class="fa fa-angle-right hidden-md ase" aria-hidden="true"></i>

                                            <div class="out-menu ">
                                                <div class="row">
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <a href="/danh-muc/mask-mat-na.html" class="title-two">Mask - M&#x1EB7;t n&#x1EA1;</a>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/mat-na-lot-mun.html">M&#x1EB7;t n&#x1EA1; l&#x1ED9;t m&#x1EE5;n</a></li>
                                                                                <li><a href="/danh-muc/mask-dat-set.html">Mask &#x110;&#x1EA5;t S&#xE9;t</a></li>
                                                                                <li><a href="/danh-muc/mask-giay.html">Mask Gi&#x1EA5;y</a></li>
                                                                                <li><a href="/danh-muc/mask-dap-rua.html">Mask &#x110;&#x1EAF;p - R&#x1EED;a </a></li>
                                                                                <li><a href="/danh-muc/mask-ngu.html">Mask Ng&#x1EE7;</a></li>
                                                                                <li><a href="/danh-muc/mask-thien-nhien.html">Mask Thi&#xEA;n Nhi&#xEA;n</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <a href="/danh-muc/lam-sach.html" class="title-two">L&#xE0;m s&#x1EA1;ch da </a>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/sua-rua-mat.html">S&#x1EEF;a r&#x1EED;a m&#x1EB7;t</a></li>
                                                                                <li><a href="/danh-muc/tay-trang.html">T&#x1EA9;y trang </a></li>
                                                                                <li><a href="/danh-muc/tay-te-bao-chet-mat.html">T&#x1EA9;y t&#x1EBF; b&#xE0;o ch&#x1EBF;t</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <a href="/danh-muc/duong-da.html" class="title-two">D&#x1B0;&#x1EE1;ng da </a>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/duong-da-mat.html">D&#x1B0;&#x1EE1;ng da m&#x1EB7;t</a></li>
                                                                                <li><a href="/danh-muc/dac-tri.html">H&#x1ED7; tr&#x1EE3;</a></li>
                                                                                <li><a href="/danh-muc/duong-mat.html">D&#x1B0;&#x1EE1;ng v&#xF9;ng m&#x1EAF;t</a></li>
                                                                                <li><a href="/danh-muc/kem-duong-da.html">Kem d&#x1B0;&#x1EE1;ng da</a></li>
                                                                                <li><a href="/danh-muc/serum-essence.html">Essence - Serum - Ampoule</a></li>
                                                                                <li><a href="/danh-muc/lotion-sua-duong.html">Lotion - S&#x1EEF;a d&#x1B0;&#x1EE1;ng</a></li>
                                                                                <li><a href="/danh-muc/nuoc-hoa-hong.html">Toner - N&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng</a></li>
                                                                                <li><a href="/danh-muc/chong-nang.html">Kem ch&#x1ED1;ng n&#x1EAF;ng</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                                                        <div>
                                                            <img src="https://adminbeauty.hvnet.vn/Upload/Files/banner/make-up-bg.png?v=10042020 " alt="" class="img-reponsive" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                    </li>
                                    <li class="li-parent">
                                        <a href="/danh-muc/cham-soc-toc.html" class="a-parent">
                                            Ch&#x103;m S&#xF3;c T&#xF3;c
                                                <i class="fa fa-angle-down hidden-xs hidden-sm" aria-hidden="true"></i>
                                        </a>
                                        <i class="fa fa-angle-right hidden-md ase" aria-hidden="true"></i>

                                            <div class="out-menu ">
                                                <div class="row">
                                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/set-duong-toc.html">Set d&#x1B0;&#x1EE1;ng t&#xF3;c</a></li>
                                                                                <li><a href="/danh-muc/dau-goi.html">D&#x1EA7;u g&#x1ED9;i </a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/dau-xa.html">D&#x1EA7;u x&#x1EA3;</a></li>
                                                                                <li><a href="/danh-muc/kem-u-toc.html">Kem &#x1EE7; t&#xF3;c</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/dau-goi-kho.html">D&#x1EA7;u g&#x1ED9;i kh&#xF4;</a></li>
                                                                                <li><a href="/danh-muc/serum-duong-toc.html">Serum d&#x1B0;&#x1EE1;ng t&#xF3;c</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                    <div class="hide col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                                                        <div>
                                                            <img src="https://adminbeauty.hvnet.vn/Upload/Files/banner/make-up-bg.png?v=10042020 " alt="" class="img-reponsive" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                    </li>
                                    <li class="li-parent">
                                        <a href="/danh-muc/phu-kien.html" class="a-parent">
                                            Ph&#x1EE5; Ki&#x1EC7;n
                                                <i class="fa fa-angle-down hidden-xs hidden-sm" aria-hidden="true"></i>
                                        </a>
                                        <i class="fa fa-angle-right hidden-md ase" aria-hidden="true"></i>

                                            <div class="out-menu menu-outer">
                                                <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/dung-cu-trang-diem.html">D&#x1EE5;ng c&#x1EE5; trang &#x111;i&#x1EC3;m</a></li>
                                                                                <li><a href="/danh-muc/dung-cu-ca-nhan.html">Ph&#x1EE5; ki&#x1EC7;n l&#xE0;m &#x111;&#x1EB9;p</a></li>
                                                                                <li><a href="/danh-muc/son-mong-rua-mong.html">S&#x1A1;n m&#xF3;ng - R&#x1EED;a m&#xF3;ng</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                    <div class="hide col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                                                        <div>
                                                            <img src="https://adminbeauty.hvnet.vn/Upload/Files/banner/make-up-bg.png?v=10042020 " alt="" class="img-reponsive" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                    </li>
                                    <li class="li-parent">
                                        <a href="/danh-muc/nuoc-hoa.html" class="a-parent">
                                            N&#x1B0;&#x1EDB;c Hoa
                                                <i class="fa fa-angle-down hidden-xs hidden-sm" aria-hidden="true"></i>
                                        </a>
                                        <i class="fa fa-angle-right hidden-md ase" aria-hidden="true"></i>

                                            <div class="out-menu menu-outer">
                                                <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/nuoc-hoa-nu.html">N&#x1B0;&#x1EDB;c hoa n&#x1EEF; </a></li>
                                                                                <li><a href="/danh-muc/nuoc-hoa-nam.html">N&#x1B0;&#x1EDB;c hoa nam</a></li>
                                                                                <li><a href="/danh-muc/xit-thom-toan-than.html">X&#x1ECB;t th&#x1A1;m body</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                    <div class="hide col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                                                        <div>
                                                            <img src="https://adminbeauty.hvnet.vn/Upload/Files/banner/make-up-bg.png?v=10042020 " alt="" class="img-reponsive" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                    </li>
                                    <li class="li-parent">
                                        <a href="/danh-muc/tam-duong-the.html" class="a-parent">
                                            Ch&#x103;m S&#xF3;c To&#xE0;n Th&#xE2;n
                                                <i class="fa fa-angle-down hidden-xs hidden-sm" aria-hidden="true"></i>
                                        </a>
                                        <i class="fa fa-angle-right hidden-md ase" aria-hidden="true"></i>

                                            <div class="out-menu ">
                                                <div class="row">
                                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/duong-the-body-lotion.html">D&#x1B0;&#x1EE1;ng th&#x1EC3; - Body Lotion</a></li>
                                                                                <li><a href="/danh-muc/sua-tam.html">S&#x1EEF;a t&#x1EAF;m</a></li>
                                                                                <li><a href="/danh-muc/lotion-kem-duong-toan-than.html">Kem d&#x1B0;&#x1EE1;ng to&#xE0;n  th&#xE2;n - Body Cream</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/duong-da-tay.html">D&#x1B0;&#x1EE1;ng da tay</a></li>
                                                                                <li><a href="/danh-muc/tay-te-bao-chet.html">T&#x1EA9;y t&#x1EBF; b&#xE0;o ch&#x1EBF;t</a></li>
                                                                                <li><a href="/danh-muc/tay-long.html">T&#x1EA9;y l&#xF4;ng</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                                                <div>
                                                                    <ul class="ul-non ul-out">
                                                                                <li><a href="/danh-muc/khu-mui.html">Kh&#x1EED; m&#xF9;i</a></li>
                                                                                <li><a href="/danh-muc/tri-seo-tri-tham-tri-ran-da.html">Gi&#x1EA3;m s&#x1EB9;o &#x2013; Gi&#x1EA3;m th&#xE2;m &#x2013; Gi&#x1EA3;m n&#xE1;m</a></li>
                                                                                <li><a href="/danh-muc/cham-soc-rang-mieng.html">Ch&#x103;m s&#xF3;c r&#x103;ng mi&#x1EC7;ng</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                    <div class="hide col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-xs">
                                                        <div>
                                                            <img src="https://adminbeauty.hvnet.vn/Upload/Files/banner/make-up-bg.png?v=10042020 " alt="" class="img-reponsive" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                    </li>
                            <li class="li-parent">
                                <a href="/san-pham-khuyen-mai.html" class="a-parent">
                                    Khuyến mãi
                                    <i class="fa fas" aria-hidden="true"></i>
                                    <span class="pos-kam">Hot</span>
                                </a>
                            </li>
                            <li class="li-parent">
                                <a href="#" class="a-parent">
                                    Thương hiệu
                                    <i class="fa fa-angle-down hidden-xs hidden-sm" aria-hidden="true"></i>
                                </a>
                                <i class="fa fa-angle-right hidden-md ase" aria-hidden="true"></i>
                                <div class="out-menu">
                                    <div class="row">
                                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                    <div>
                                                        <ul class="ul-non ul-out">
                                                                    <li><a href="/thuong-hieu/3ce.html">3CE</a></li>
                                                                    <li><a href="/thuong-hieu/3wc.html">3W Clinic</a></li>
                                                                    <li><a href="/thuong-hieu/apieu.html">A&#x27;PIEU</a></li>
                                                                    <li><a href="/thuong-hieu/aritaum.html">Aritaum</a></li>
                                                                    <li><a href="/thuong-hieu/avene.html">Avene</a></li>
                                                                    <li><a href="/thuong-hieu/bath-amp-body-works.html">Bath and body works</a></li>
                                                                    <li><a href="/thuong-hieu/benton.html">Benton</a></li>
                                                                    <li><a href="/thuong-hieu/bioderma.html">Bioderma</a></li>
                                                                    <li><a href="/thuong-hieu/careline.html">Careline</a></li>
                                                                    <li><a href="/thuong-hieu/city-color.html">City Color</a></li>
                                                                    <li><a href="/thuong-hieu/cocoon.html">Cocoon</a></li>
                                                                    <li><a href="/thuong-hieu/covergirl.html">Covergirl</a></li>
                                                                    <li><a href="/thuong-hieu/dhc.html">DHC</a></li>
                                                                    <li><a href="/thuong-hieu/drbelmeur.html">Dr.Belmeur</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                    <div>
                                                        <ul class="ul-non ul-out">
                                                                    <li><a href="/thuong-hieu/etude-house.html">Etude House</a></li>
                                                                    <li><a href="/thuong-hieu/evoluderm.html">Evoluderm</a></li>
                                                                    <li><a href="/thuong-hieu/hada-labo.html">Hada Labo</a></li>
                                                                    <li><a href="/thuong-hieu/holika.html">Holika Holika </a></li>
                                                                    <li><a href="/thuong-hieu/Innisfree.html">Innisfree</a></li>
                                                                    <li><a href="/thuong-hieu/kose.html">Kose</a></li>
                                                                    <li><a href="/thuong-hieu/la-girl.html">L.A Girl</a></li>
                                                                    <li><a href="/thuong-hieu/laneige-korea.html">LANEIGE KOREA</a></li>
                                                                    <li><a href="/thuong-hieu/lanopearl.html">Lanopearl</a></li>
                                                                    <li><a href="/thuong-hieu/loreal.html">L&#x27;oreal Paris</a></li>
                                                                    <li><a href="/thuong-hieu/mac.html">MAC</a></li>
                                                                    <li><a href="/thuong-hieu/mamonde.html">Mamonde</a></li>
                                                                    <li><a href="/thuong-hieu/maybeline.html">Maybelline</a></li>
                                                                    <li><a href="/thuong-hieu/missha.html">Missha</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                    <div>
                                                        <ul class="ul-non ul-out">
                                                                    <li><a href="/thuong-hieu/nature-republic.html">Nature Republic</a></li>
                                                                    <li><a href="/thuong-hieu/Neutrogena.html">Neutrogena</a></li>
                                                                    <li><a href="/thuong-hieu/nyx.html">NYX</a></li>
                                                                    <li><a href="/thuong-hieu/ohui.html">Ohui </a></li>
                                                                    <li><a href="/thuong-hieu/paulas-choice.html">Paula&#x27;s Choice</a></li>
                                                                    <li><a href="/thuong-hieu/physician-formula.html">Physician Formula</a></li>
                                                                    <li><a href="/thuong-hieu/play-boy.html">Play Boy </a></li>
                                                                    <li><a href="/thuong-hieu/pony.html">Pony</a></li>
                                                                    <li><a href="/thuong-hieu/rebirth.html">Rebirth </a></li>
                                                                    <li><a href="/thuong-hieu/revlon-korea.html">Revlon</a></li>
                                                                    <li><a href="/thuong-hieu/rimmel.html">Rimmel</a></li>
                                                                    <li><a href="/thuong-hieu/secret-key.html">Secret Key</a></li>
                                                                    <li><a href="/thuong-hieu/shiseido.html">Shiseido</a></li>
                                                                    <li><a href="/thuong-hieu/simple.html">Simple</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                    <div>
                                                        <ul class="ul-non ul-out">
                                                                    <li><a href="/thuong-hieu/sivanna-colors.html">Sivanna Colors</a></li>
                                                                    <li><a href="/thuong-hieu/sk-ii.html">SK - II</a></li>
                                                                    <li><a href="/thuong-hieu/skinfood.html">Skinfood</a></li>
                                                                    <li><a href="/thuong-hieu/stives.html">StIves</a></li>
                                                                    <li><a href="/thuong-hieu/the-body-shop.html">The Body Shop</a></li>
                                                                    <li><a href="/thuong-hieu/the-face-shop.html">The Face Shop</a></li>
                                                                    <li><a href="/thuong-hieu/thuong-hieu-khac.html">Th&#x1B0;&#x1A1;ng Hi&#x1EC7;u Kh&#xE1;c</a></li>
                                                                    <li><a href="/thuong-hieu/tonymoly.html">Tonymoly</a></li>
                                                                    <li><a href="/thuong-hieu/vacosi.html">Vacosi</a></li>
                                                                    <li><a href="/thuong-hieu/vichy.html">Vichy</a></li>
                                                                    <li><a href="/thuong-hieu/victorias-secret.html">Victoria&#x27;s Secret</a></li>
                                                                    <li><a href="/thuong-hieu/w7.html">W7 </a></li>
                                                                    <li><a href="/thuong-hieu/yadah.html">Yadah </a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="ul-non ul-right">
                            <li>
                                <a><i class="fa fa-search" aria-hidden="true"></i></a>
                                <div class="searcf-s">
                                    <form class="form-inline">
                                        <input type="text" class="form-control my-form" id="inlineFormInputName3" placeholder="Tìm kiếm..." autocomplete="off" onfocus="onfos2()" onfocusout="unfos2()">
                                        <button type="button" class="btn btn-search" onclick="SearchingForm()"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                    <div class="xuongform2 pol-lem ">
                                        <p>Xu hướng tìm kiếm</p>
                                        <ul class="ul-non ul-xuhuong ">
                                                    <li><a href="/tim-kiem.html?keyword=son">son</a></li>
                                                    <li><a href="/tim-kiem.html?keyword=kem duong">kem duong</a></li>
                                                    <li><a href="/tim-kiem.html?keyword=innisfree">innisfree</a></li>
                                                    <li><a href="/tim-kiem.html?keyword=sua rua mat the face shop">sua rua mat the face shop</a></li>
                                                    <li><a href="/tim-kiem.html?keyword=kem chong nang">kem chong nang</a></li>
                                                    <li><a href="/tim-kiem.html?keyword=mat na">mat na</a></li>
                                                    <li><a href="/tim-kiem.html?keyword=dau tay trang cleansing oil   the face shop 200ml">dau tay trang cleansing oil   the face shop 200ml</a></li>
                                                    <li><a href="/tim-kiem.html?keyword=neutrogena">neutrogena</a></li>
                                                    <li><a href="/tim-kiem.html?keyword=3ce">3ce</a></li>
                                                    <li><a href="/tim-kiem.html?keyword=xit khoang">xit khoang</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="/gio-hang.html">
                                    <i class="fa fa-shopping-cart "></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="ul-non ul-menu-lagi hidden-md" id="ul-megaloger-mb">
                            <li>
                                <a href="#" class="">
                                    <div class="img-luna img-icon img-tt"></div>
                                    <span>Thông tin</span>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                                <ul class="ul-non ul-mega">
                                    <li><a href="/su-kien-khuyen-mai.html">Sự kiện khuyến mãi</a></li>
                                    <li><a href="/bi-quyet-lam-dep.html">Bí quyết làm đẹp</a></li>
                                    <li><a href="/bao-chi-noi-gi-ve-chung-toi.html">Tin báo chí</a></li>
                                    <li><a href="/review-san-pham">Review sản phẩm</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="">
                                    <div class="img-luna img-icon img-about"></div>
                                    <span>Về chúng tôi</span>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                                <ul class="ul-non ul-mega">
                                    <li><a href="/noi-dung/gioi-thieu-beautygarden.html">Giới thiệu Beautygarden</a></li>
                                    <li><a href="/noi-dung/he-thong-cua-hang.html">Hệ thống cửa hàng</a></li>
                                    <li><a href="/noi-dung/chuong-trinh-tich-diem.html">Chương trình tích điểm</a></li>
                                    <li><a href="/noi-dung/bao-mat-thong-tin.html">Bảo mật thông tin</a></li>
                                    <li><a href="/noi-dung/dieu-khoan-su-dung.html">Điều khoản sử dụng</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="">
                                    <div class="img-luna img-icon img-support"></div>
                                    <span>Hỗ trợ</span>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                                <ul class="ul-non ul-mega">
                                    <li><a href="/noi-dung/huong-dan-mua-hang.html">Hướng dẫn mua hàng</a></li>
                                    <li><a href="/noi-dung/thanh-toan-van-chuyen.html">Thanh toán vận chuyển</a></li>
                                    <li><a href="/noi-dung/chinh-sach-doi-tra-hang.html">Chính sách đổi trả</a></li>
                                    <li><a href="/noi-dung/giai-dap-thac-mac.html">Giải đáp thắc mắc</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="/lien-he.html" class="">
                                    <div class="img-luna img-icon img-contact"></div>
                                    <span>Liên hệ</span>
                                </a>
                            </li>
                            <li>
                                <a href="/danh-muc/thuc-pham-chuc-nang.html" class="">
                                    <div class="img-luna img-icon img-thucpham"></div>
                                    <span>Thực phẩm chức năng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>

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
                        <div class="title-box">
                            <h2>
                                <a href="/san-pham-khuyen-mai.html" title="">
                                    SẢN PHẨM KHUYẾN MÃI
                                </a>
                            </h2>
                        </div>
                        <div class="arrow-slider">
                            <a href="javascript:void(0)" class="sf-pre btn-pre bnts">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </a>
                            <a href="javascript:void(0)" class="sf-nex btn-next bnts">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="countdow-timer">
                            <span class="title">Kết Thúc</span>
                            <div id="count-dow"></div>
                        </div>
                        <div class="clr"></div>
                    </div>
                    <div class="body-box">
                        <div class="owl-carousel slider-sale">
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/serum-tri-munthe-ordinary-niacinamide-10-zinc-1-serum-30ml.html" title="Serum The Ordinary Niacinamide 10% &#x2B; Zinc 1%">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/a4-08102018090743.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5612')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">30%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/serum-tri-munthe-ordinary-niacinamide-10-zinc-1-serum-30ml.html" title="Serum The Ordinary Niacinamide 10% &#x2B; Zinc 1%">Serum The Ordinary Niacinamide 10% &#x2B; Zinc 1%</a>
        </h3>
        <div>
            <span class="price-drop">180,000₫</span>
            <span class="price ">247,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/nuoc-hoa-hong-simple-soothing-facial-toner.html" title="N&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Simple Soothing Facial Toner">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/Simple-Soothing-Facial-Toner.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '489')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">40%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/nuoc-hoa-hong-simple-soothing-facial-toner.html" title="N&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Simple Soothing Facial Toner">N&#x1B0;&#x1EDB;c hoa h&#x1E#x1ED3;ng Simple Soothing Facial Toner</a>
        </h3>
        <div>
            <span class="price-drop">89,000₫</span>
            <span class="price ">147,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/sua-rua-mat-3-trong-1-naruko-tea-tree-purifying-clay-mask-cleanser-in1.html" title="S&#x1EEF;a R&#x1EED;a M&#x1EB7;t 3 trong 1 Naruko Tea Tree ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/avatar-sp-web11-1-recovered-recovered-recovered-recovered-recovered-recovered-14082019021538.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6389')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">20%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/sua-rua-mat-3-trong-1-naruko-tea-tree-purifying-clay-mask-cleanser-in1.html" title="S&#x1EEF;a R&#x1EED;a M&#x1EB7;t 3 trong 1 Naruko Tea Tree ">S&#x1EEF;a R&#x1EED;a M&#x1EB7;t 3 trong 1 Naruko Tea Tree </a>
        </h3>
        <div>
            <span class="price-drop">149,000₫</span>
            <span class="price ">188,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/tinh-dau-duong-toc-miseen-scene-perfect-repair-hair-serum-new-2020.html" title="Tinh D&#x1EA7;u D&#x1B0;&#x1EE1;ng T&#xF3;c Miseen Sc&#xE8;ne Perfect Repair ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/avatar-sp-web11-1-recovered-recovered-recovered-recovered-recovered-recovered-recovered-recovered-recovered-17022020091947.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6809')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">20%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/tinh-dau-duong-toc-miseen-scene-perfect-repair-hair-serum-new-2020.html" title="Tinh D&#x1EA7;u D&#x1B0;&#x1EE1;ng T&#xF3;c Miseen Sc&#xE8;ne Perfect Repair ">Tinh D&#x1EA7;u D&#x1B0;&#x1EE1;ng T&#xF3;c Miseen Sc&#xE8;ne Perfect Repair </a>
        </h3>
        <div>
            <span class="price-drop">172,000₫</span>
            <span class="price ">229,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/phan-phu-dang-nen-shiseido-baby-powder-50gr.html" title="Ph&#x1EA5;n Ph&#x1EE7; Shiseido Baby Powder 50gr">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/1(8).jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '4671')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">30%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/phan-phu-dang-nen-shiseido-baby-powder-50gr.html" title="Ph&#x1EA5;n Ph&#x1EE7; Shiseido Baby Powder 50gr">Ph&#x1EA5;n Ph&#x1EE7; Shiseido Baby Powder 50gr</a>
        </h3>
        <div>
            <span class="price-drop">95,000₫</span>
            <span class="price ">140,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/son-kem-li-black-rouge-air-fit-velvet-tint-ver6-45gr.html" title="Son Kem Black Rouge Air Fit Velvet Tint Ver.6">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/avatar-sp-web11-recovered-recovered-recovered-recovered-recovered-12062020033706.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8106')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">30%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/son-kem-li-black-rouge-air-fit-velvet-tint-ver6-45gr.html" title="Son Kem Black Rouge Air Fit Velvet Tint Ver.6">Son Kem Black Rouge Air Fit Velvet Tint Ver.6</a>
        </h3>
        <div>
            <span class="price-drop">115,000₫</span>
            <span class="price ">172,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/moc-nhu-tinh-chat-thao-duoc-tri-mun.html" title="Tinh Ch&#x1EA5;t Th&#x1EA3;o D&#x1B0;&#x1EE3;c Chuy&#xEA;n D&#xE0;nh Cho Da M&#x1EE5;n">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/a4-10102018090929.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5635')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">50%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/moc-nhu-tinh-chat-thao-duoc-tri-mun.html" title="Tinh Ch&#x1EA5;t Th&#x1EA3;o D&#x1B0;&#x1EE3;c Chuy&#xEA;n D&#xE0;nh Cho Da M&#x1EE5;n">Tinh Ch&#x1EA5;t Th&#x1EA3;o D&#x1B0;&#x1EE3;c Chuy&#xEA;n D&#xE0;nh Cho Da M&#x1EE5;n</a>
        </h3>
        <div>
            <span class="price-drop">55,000₫</span>
            <span class="price ">120,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/son-kem-li-merzy-another-me-bite-the-beat-mellow-tint-45g.html" title="Son Kem Merzy Another Me Bite The Beat Mellow ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/avaWEB.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6542')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">30%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/son-kem-li-merzy-another-me-bite-the-beat-mellow-tint-45g.html" title="Son Kem Merzy Another Me Bite The Beat Mellow ">Son Kem Merzy Another Me Bite The Beat Mellow </a>
        </h3>
        <div>
            <span class="price-drop">109,000₫</span>
            <span class="price ">166,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/tinh-chat-serum-the-ordinary-aha-30-bha-2-peeling-solution-30ml.html" title="Tinh Ch&#x1EA5;t Serum The Ordinary AHA 30% &#x2B; BHA 2% ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/a2-12122018041639.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5857')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">20%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/tinh-chat-serum-the-ordinary-aha-30-bha-2-peeling-solution-30ml.html" title="Tinh Ch&#x1EA5;t Serum The Ordinary AHA 30% &#x2B; BHA 2% ">Tinh Ch&#x1EA5;t Serum The Ordinary AHA 30% &#x2B; BHA 2% </a>
        </h3>
        <div>
            <span class="price-drop">240,000₫</span>
            <span class="price ">314,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/mat-na-cocoon-mat-na-bi-dao-rau-ma-tram-tra-tri-mun-30ml.html" title="M&#x1EB7;t N&#x1EA1; B&#xED; &#x110;ao Cocoon Winter Melon Face Mask ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/ava-mask-watermelon-06032020013416.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6874')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">20%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/mat-na-cocoon-mat-na-bi-dao-rau-ma-tram-tra-tri-mun-30ml.html" title="M&#x1EB7;t N&#x1EA1; B&#xED; &#x110;ao Cocoon Winter Melon Face Mask ">M&#x1EB7;t N&#x1EA1; B&#xED; &#x110;ao Cocoon Winter Melon Face Mask </a>
        </h3>
        <div>
            <span class="price-drop">103,000₫</span>
            <span class="price ">137,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/dau-goi-thao-duoc-co-muc-me-den.html" title="D&#x1EA7;u G&#x1ED9;i M&#x1ED9;c Nhu Th&#x1EA3;o D&#x1B0;&#x1EE3;c C&#x1ECF; M&#x1EF1;c &amp; M&#xE8; &#x110;en ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/co-muc-06072019042203.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6323')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">20%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/dau-goi-thao-duoc-co-muc-me-den.html" title="D&#x1EA7;u G&#x1ED9;i M&#x1ED9;c Nhu Th&#x1EA3;o D&#x1B0;&#x1EE3;c C&#x1ECF; M&#x1EF1;c &amp; M&#xE8; &#x110;en ">D&#x1EA7;u G&#x1ED9;i M&#x1ED9;c Nhu Th&#x1EA3;o D&#x1B0;&#x1EE3;c C&#x1ECF; M&#x1EF1;c &amp; M&#xE8; &#x110;en </a>
        </h3>
        <div>
            <span class="price-drop">219,000₫</span>
            <span class="price ">272,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/dau-xa-moc-nhu-dau-xa-thien-nhien-dau-dua-huong-nhu.html" title="M&#x1ED9;c Nhu d&#x1EA7;u x&#x1EA3; thi&#xEA;n nhi&#xEA;n D&#x1EA7;u d&#x1EEB;a &amp; H&#x1B0;&#x1A1;ng Nhu">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/a2-24062019031559.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6316')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">20%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/dau-xa-moc-nhu-dau-xa-thien-nhien-dau-dua-huong-nhu.html" title="M&#x1ED9;c Nhu d&#x1EA7;u x&#x1EA3; thi&#xEA;n nhi&#xEA;n D&#x1EA7;u d&#x1EEB;a &amp; H&#x1B0;&#x1A1;ng Nhu">M&#x1ED9;c Nhu d&#x1EA7;u x&#x1EA3; thi&#xEA;n nhi&#xEA;n D&#x1EA7;u d&#x1EEB;a &amp; H&#x1B0;&#x1A1;ng Nhu</a>
        </h3>
        <div>
            <span class="price-drop">194,000₫</span>
            <span class="price ">244,000₫</span>
        </div>
    </div>
</div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-products">
                <div class="head-box">
                    <div class="title-box">
                        <h2>
                            <a title="">
                                SẢN PHẨM MỚI VỀ
                            </a>
                        </h2>
                    </div>
                    <div class="arrow-slider">
                        <a href="javascript:void(0)" class="new-pre btn-pre bnts">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                        <a href="javascript:void(0)" class="new-nex btn-next bnts">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="clr"></div>
                </div>
                <div class="body-box">
                    <div class="owl-carousel new-sale">
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/kem-duong-da-vaseline-super-vitamin-whitening-body-serum-380ml.html" title="Kem D&#x1B0;&#x1EE1;ng Da Vaseline Super Vitamin 380ml">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/Avatar-SP-Web(1)(1)-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-(1).jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8210')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">30%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/kem-duong-da-vaseline-super-vitamin-whitening-body-serum-380ml.html" title="Kem D&#x1B0;&#x1EE1;ng Da Vaseline Super Vitamin 380ml">Kem D&#x1B0;&#x1EE1;ng Da Vaseline Super Vitamin 380ml</a>
        </h3>
        <div>
            <span class="price-drop">155,000₫</span>
            <span class="price ">208,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/tinh-chat-duong-trang-khu-mui-vung-duoi-canh-tay-vaseline-underarms-dry-serum-50ml.html" title="Tinh Ch&#x1EA5;t D&#x1B0;&#x1EE1;ng Tr&#x1EAF;ng Kh&#x1EED; M&#xF9;i Vaseline">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/Avatar-SP-Web(1)(1)-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered(4).jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8209')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">40%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/tinh-chat-duong-trang-khu-mui-vung-duoi-canh-tay-vaseline-underarms-dry-serum-50ml.html" title="Tinh Ch&#x1EA5;t D&#x1B0;&#x1EE1;ng Tr&#x1EAF;ng Kh&#x1EED; M&#xF9;i Vaseline">Tinh Ch&#x1EA5;t D&#x1B0;&#x1EE1;ng Tr&#x1EAF;ng Kh&#x1EED; M&#xF9;i Vaseline</a>
        </h3>
        <div>
            <span class="price-drop">75,000₫</span>
            <span class="price ">116,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/tay-da-chet-mamonde-plum-blossom-aqua-peel-peel-100ml.html" title="T&#x1EA9;y Da Ch&#x1EBF;t Mamonde Plum Blossom Aqua Peel Peel">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/Avatar-SP-Web(1)(1)(3).jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8208')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">20%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/tay-da-chet-mamonde-plum-blossom-aqua-peel-peel-100ml.html" title="T&#x1EA9;y Da Ch&#x1EBF;t Mamonde Plum Blossom Aqua Peel Peel">T&#x1EA9;y Da Ch&#x1EBF;t Mamonde Plum Blossom Aqua Peel Peel</a>
        </h3>
        <div>
            <span class="price-drop">150,000₫</span>
            <span class="price ">199,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/co-danh-nen-vacosi-foundation-brush-f06.html" title="C&#x1ECD; &#x110;&#xE1;nh N&#x1EC1;n Vacosi Foundation Brush #F.06 ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/f06.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8205')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">31%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/co-danh-nen-vacosi-foundation-brush-f06.html" title="C&#x1ECD; &#x110;&#xE1;nh N&#x1EC1;n Vacosi Foundation Brush #F.06 ">C&#x1ECD; &#x110;&#xE1;nh N&#x1EC1;n Vacosi Foundation Brush #F.06 </a>
        </h3>
        <div>
            <span class="price-drop">45,000₫</span>
            <span class="price ">65,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/co-trang-diem-vacosi-highlight-diffuser-brush-e10.html" title="C&#x1ECD; Trang &#x110;i&#x1EC3;m Vacosi Highlight Diffuser #E10">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/e10.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8204')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">37%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/co-trang-diem-vacosi-highlight-diffuser-brush-e10.html" title="C&#x1ECD; Trang &#x110;i&#x1EC3;m Vacosi Highlight Diffuser #E10">C&#x1ECD; Trang &#x110;i&#x1EC3;m Vacosi Highlight Diffuser #E10</a>
        </h3>
        <div>
            <span class="price-drop">35,000₫</span>
            <span class="price ">55,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/co-trang-diem-vacosi-short-shaded-brush-e07.html" title="C&#x1ECD; Trang &#x110;i&#x1EC3;m Vacosi Short Shaded Brush #E07">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/e07.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8203')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">36%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/co-trang-diem-vacosi-short-shaded-brush-e07.html" title="C&#x1ECD; Trang &#x110;i&#x1EC3;m Vacosi Short Shaded Brush #E07">C&#x1ECD; Trang &#x110;i&#x1EC3;m Vacosi Short Shaded Brush #E07</a>
        </h3>
        <div>
            <span class="price-drop">35,000₫</span>
            <span class="price ">54,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/co-trang-diem-vacosi-blush-powder-brush-m03.html" title="C&#x1ECD; Trang &#x110;i&#x1EC3;m Vacosi Blush &amp; Powder Brush #M03">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/m03.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8199')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">22%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/co-trang-diem-vacosi-blush-powder-brush-m03.html" title="C&#x1ECD; Trang &#x110;i&#x1EC3;m Vacosi Blush &amp; Powder Brush #M03">C&#x1ECD; Trang &#x110;i&#x1EC3;m Vacosi Blush &amp; Powder Brush #M03</a>
        </h3>
        <div>
            <span class="price-drop">65,000₫</span>
            <span class="price ">83,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/co-tan-phan-mat-vacosi-small-shaded-brush-e03.html" title="C&#x1ECD; T&#xE1;n Ph&#x1EA5;n M&#x1EAF;t Vacosi Small Shaded Brush #E.03">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/e03.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8198')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">51%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/co-tan-phan-mat-vacosi-small-shaded-brush-e03.html" title="C&#x1ECD; T&#xE1;n Ph&#x1EA5;n M&#x1EAF;t Vacosi Small Shaded Brush #E.03">C&#x1ECD; T&#xE1;n Ph&#x1EA5;n M&#x1EAF;t Vacosi Small Shaded Brush #E.03</a>
        </h3>
        <div>
            <span class="price-drop">25,000₫</span>
            <span class="price ">51,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/mat-na-dat-set-laneige-mini-pore-waterclay-mask-25ml.html" title="M&#x1EB7;t N&#x1EA1; &#x110;&#x1EA5;t S&#xE9;t Laneige Mini Pore Waterclay Mask">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/WaterClay-Mask.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8194')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">10%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/mat-na-dat-set-laneige-mini-pore-waterclay-mask-25ml.html" title="M&#x1EB7;t N&#x1EA1; &#x110;&#x1EA5;t S&#xE9;t Laneige Mini Pore Waterclay Mask">M&#x1EB7;t N&#x1EA1; &#x110;&#x1EA5;t S&#xE9;t Laneige Mini Pore Waterclay Mask</a>
        </h3>
        <div>
            <span class="price-drop">260,000₫</span>
            <span class="price ">287,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/nuoc-can-bang-huxley-secret-of-sahara-toner-120ml.html" title="N&#x1B0;&#x1EDB;c C&#xE2;n B&#x1EB1;ng Huxley Secret Of Sahara 120ml">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/Avatar-SP-Web(1)(1)-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered-Recovered(6).jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8193')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">7%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/nuoc-can-bang-huxley-secret-of-sahara-toner-120ml.html" title="N&#x1B0;&#x1EDB;c C&#xE2;n B&#x1EB1;ng Huxley Secret Of Sahara 120ml">N&#x1B0;&#x1EDB;c C&#xE2;n B&#x1EB1;ng Huxley Secret Of Sahara 120ml</a>
        </h3>
        <div>
            <span class="price-drop">295,000₫</span>
            <span class="price ">316,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/mat-na-giay-derladie-witch-hazel-mask-pack-30ml.html" title="M&#x1EB7;t N&#x1EA1; Gi&#x1EA5;y Derladie Witch Hazel Mask Pack 30ml">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/Mask-Derladie.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8192')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">48%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/mat-na-giay-derladie-witch-hazel-mask-pack-30ml.html" title="M&#x1EB7;t N&#x1EA1; Gi&#x1EA5;y Derladie Witch Hazel Mask Pack 30ml">M&#x1EB7;t N&#x1EA1; Gi&#x1EA5;y Derladie Witch Hazel Mask Pack 30ml</a>
        </h3>
        <div>
            <span class="price-drop">30,000₫</span>
            <span class="price ">57,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="item">
                                    <div class="pd-box ">
    <div class="box-images">
            <a href="/dung-dich-ve-sinh-vung-kin-femfresh-wash-250ml.html" title="Dung D&#x1ECB;ch V&#x1EC7; Sinh V&#xF9;ng K&#xED;n FemFresh Wash 250ml">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/dung-d%E1%BB%8Bch-v%E1%BB%87-sinh.jpg?width=350&height=391&v=15042020" class="img-reponsive owl-lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '8191')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">0%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/dung-dich-ve-sinh-vung-kin-femfresh-wash-250ml.html" title="Dung D&#x1ECB;ch V&#x1EC7; Sinh V&#xF9;ng K&#xED;n FemFresh Wash 250ml">Dung D&#x1ECB;ch V&#x1EC7; Sinh V&#xF9;ng K&#xED;n FemFresh Wash 250ml</a>
        </h3>
        <div>
            <span class="price-drop">0₫</span>
            <span class="price hide">0₫</span>
        </div>
    </div>
</div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mar-top-25">
    <div class="row">
        <div class="col-lg-12">
            <div class="box-banner">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/banner-min.jpg?v=1" alt="banner" class="img-reponsive lazy" />
            </div>
        </div>
    </div>
</div>
<div class="back-gray pad-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-products-category">
                    <div class="head-box-category">
                        <a href="/bestseller/top-100-san-pham-ban-chay.html" class="left-head">
                            <img src="https://adminbeauty.hvnet.vn/images/sh11-128.png?v=17042020" alt="type icon" />
                            <h2>
                                TOP 100 BÁN CHẠY
                            </h2>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                        <button class="btn-ct hidden-md" onclick="showcate(this)" data-id="topsale"><i class="fa fa-bars" aria-hidden="true"></i></button>
                        <div class="clr"></div>
                    </div>
                    <div class="body-box-category">
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/phan-phu-trong-suot-innisfree-no-sebum-mineral-powder.html" title="Ph&#x1EA5;n Ph&#x1EE7; Innisfree No-Sebum Mineral Powder">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/phan-phu-trong-suot-Innisfree-No-Sebum-Mineral-Powder-beauty-garden-1.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '2445')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">9%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/phan-phu-trong-suot-innisfree-no-sebum-mineral-powder.html" title="Ph&#x1EA5;n Ph&#x1EE7; Innisfree No-Sebum Mineral Powder">Ph&#x1EA5;n Ph&#x1EE7; Innisfree No-Sebum Mineral Powder</a>
        </h3>
        <div>
            <span class="price-drop">110,000₫</span>
            <span class="price ">120,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/nuoc-hoa-hong-xuat-xu-tu-nhat-naturie-skin-conditioner.html" title="N&#x1B0;&#x1EDB;c Hoa H&#x1ED3;ng Naturie Skin Conditioner 500ml">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/nuoc-hoa-hong-Naturie-Skin-Conditioner.png?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '2923')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">10%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/nuoc-hoa-hong-xuat-xu-tu-nhat-naturie-skin-conditioner.html" title="N&#x1B0;&#x1EDB;c Hoa H&#x1ED3;ng Naturie Skin Conditioner 500ml">N&#x1B0;&#x1EDB;c Hoa H&#x1ED3;ng Naturie Skin Conditioner 500ml</a>
        </h3>
        <div>
            <span class="price-drop">230,000₫</span>
            <span class="price ">253,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/sua-rua-mat-chong-lao-hoa-senka-perfect-whip-collagen-in.html" title="S&#x1EEF;a R&#x1EED;a M&#x1EB7;t Senka Perfect Whip Collagen In">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/01(8).jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5272')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">18%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/sua-rua-mat-chong-lao-hoa-senka-perfect-whip-collagen-in.html" title="S&#x1EEF;a R&#x1EED;a M&#x1EB7;t Senka Perfect Whip Collagen In">S&#x1EEF;a R&#x1EED;a M&#x1EB7;t Senka Perfect Whip Collagen In</a>
        </h3>
        <div>
            <span class="price-drop">120,000₫</span>
            <span class="price ">145,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/sua-rua-mat-simple-kind-to-skin-moisturising-facial-wash-150ml-tuyp.html" title="Simple Kind To Skin Moisturising Facial Wash">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/suaruamatsimple.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5155')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">17%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/sua-rua-mat-simple-kind-to-skin-moisturising-facial-wash-150ml-tuyp.html" title="Simple Kind To Skin Moisturising Facial Wash">Simple Kind To Skin Moisturising Facial Wash</a>
        </h3>
        <div>
            <span class="price-drop">130,000₫</span>
            <span class="price ">155,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/kem-lot-kiem-dau-che-lo-chan-long-maybelline-pore-eraser-baby-skin-primer.html" title="Kem L&#xF3;t Ki&#x1EC1;m D&#x1EA7;u Maybelline Baby Skin Primer">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/01(9).jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5273')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">24%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/kem-lot-kiem-dau-che-lo-chan-long-maybelline-pore-eraser-baby-skin-primer.html" title="Kem L&#xF3;t Ki&#x1EC1;m D&#x1EA7;u Maybelline Baby Skin Primer">Kem L&#xF3;t Ki&#x1EC1;m D&#x1EA7;u Maybelline Baby Skin Primer</a>
        </h3>
        <div>
            <span class="price-drop">140,000₫</span>
            <span class="price ">183,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/xit-khoang-evoluderm-atomiseur-eau-pure-spray-mist.html" title="X&#x1ECB;t Kho&#xE1;ng Evoluderm Atomiseur Eau Pure Spray">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/xit-khoang-evoluderm.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '4651')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">17%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/xit-khoang-evoluderm-atomiseur-eau-pure-spray-mist.html" title="X&#x1ECB;t Kho&#xE1;ng Evoluderm Atomiseur Eau Pure Spray">X&#x1ECB;t Kho&#xE1;ng Evoluderm Atomiseur Eau Pure Spray</a>
        </h3>
        <div>
            <span class="price-drop">100,000₫</span>
            <span class="price ">120,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/phan-nuoc-lime-real-cover-pink-cushion.html" title="Ph&#x1EA5;n n&#x1B0;&#x1EDB;c Lime Real Cover Pink Cushion ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/phan-nuoc-Lime-Real-Cover-Pink-Cushion-beauty-garden-1(3).jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '2120')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">8%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/phan-nuoc-lime-real-cover-pink-cushion.html" title="Ph&#x1EA5;n n&#x1B0;&#x1EDB;c Lime Real Cover Pink Cushion ">Ph&#x1EA5;n n&#x1B0;&#x1EDB;c Lime Real Cover Pink Cushion </a>
        </h3>
        <div>
            <span class="price-drop">290,000₫</span>
            <span class="price ">312,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/nuoc-hoa-hong-se-khit-lo-chan-long-thayers-witch-hazel-toner.html" title="N&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Thayers Witch Hazel Toner">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/nuoc-hoa-hong-thayer.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '2088')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">8%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/nuoc-hoa-hong-se-khit-lo-chan-long-thayers-witch-hazel-toner.html" title="N&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Thayers Witch Hazel Toner">N&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Thayers Witch Hazel Toner</a>
        </h3>
        <div>
            <span class="price-drop">264,000₫</span>
            <span class="price ">286,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/sua-rua-mat-tra-xanh-nhat.html" title="S&#x1EEF;a r&#x1EED;a m&#x1EB7;t Tr&#xE0; Xanh Nh&#x1EAD;t ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/Sua-rua-mat-tra-xanh-nhat-beauty-garden(1).jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '2049')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">14%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/sua-rua-mat-tra-xanh-nhat.html" title="S&#x1EEF;a r&#x1EED;a m&#x1EB7;t Tr&#xE0; Xanh Nh&#x1EAD;t ">S&#x1EEF;a r&#x1EED;a m&#x1EB7;t Tr&#xE0; Xanh Nh&#x1EAD;t </a>
        </h3>
        <div>
            <span class="price-drop">150,000₫</span>
            <span class="price ">174,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/nuoc-hoa-hong-tri-mun-some-by-mi-aha-bha-pha-30-days-miracle-toner-150ml.html" title="N&#x1B0;&#x1EDB;c Hoa H&#x1ED3;ng Some By Mi AHA-BHA-PHA Toner">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/01(73).jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5433')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">10%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/nuoc-hoa-hong-tri-mun-some-by-mi-aha-bha-pha-30-days-miracle-toner-150ml.html" title="N&#x1B0;&#x1EDB;c Hoa H&#x1ED3;ng Some By Mi AHA-BHA-PHA Toner">N&#x1B0;&#x1EDB;c Hoa H&#x1ED3;ng Some By Mi AHA-BHA-PHA Toner</a>
        </h3>
        <div>
            <span class="price-drop">240,000₫</span>
            <span class="price ">262,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/dau-xa-kich-thich-moc-toc-ogx-thick-and-full-biotin-and-collagen.html" title="D&#x1EA7;u x&#x1EA3; OGX Thick and Full Biotin and Collagen">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/dau-xa-kich-thich-moc-toc-OGX-Thick-And-Full-Biotin-And-Collagen.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '3081')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">11%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/dau-xa-kich-thich-moc-toc-ogx-thick-and-full-biotin-and-collagen.html" title="D&#x1EA7;u x&#x1EA3; OGX Thick and Full Biotin and Collagen">D&#x1EA7;u x&#x1EA3; OGX Thick and Full Biotin and Collagen</a>
        </h3>
        <div>
            <span class="price-drop">220,000₫</span>
            <span class="price ">247,000₫</span>
        </div>
    </div>
</div>
                                </div>
                                <div class="col-2-ct">
                                    <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/kem-duong-da-innisfree-green-tea-balancing-cream-ex-50ml.html" title="Kem D&#x1B0;&#x1EE1;ng Da Innisfree Green Tea Balancing EX">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/kem%20duong%20da%20innisfree.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5459')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">6%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/kem-duong-da-innisfree-green-tea-balancing-cream-ex-50ml.html" title="Kem D&#x1B0;&#x1EE1;ng Da Innisfree Green Tea Balancing EX">Kem D&#x1B0;&#x1EE1;ng Da Innisfree Green Tea Balancing EX</a>
        </h3>
        <div>
            <span class="price-drop">290,000₫</span>
            <span class="price ">308,000₫</span>
        </div>
    </div>
</div>
                                </div>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="back-gray pad-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-products-category">
                            <div class="head-box-category">
                                <a href="/danh-muc/trang-diem.html" class="left-head">
                                    <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/trangdiem.png?v=17042020" alt="Trang &#x110;i&#x1EC3;m Icon" class="lazy" />
                                    <h2>
                                        Trang &#x110;i&#x1EC3;m
                                    </h2>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                                        <ul class="ul-non ul-category" id="cate2">
                                                <li class="active"><a href="javascript:void(0)" onclick="ShowPDCT(this,''+1243+'')" data-id="2">Trang &#x110;i&#x1EC3;m M&#x1EB7;t</a></li>
                                                <li class=""><a href="javascript:void(0)" onclick="ShowPDCT(this,''+1246+'')" data-id="2">Trang &#x110;i&#x1EC3;m M&#xF4;i</a></li>
                                        </ul>
                                <button class="btn-ct hidden-md" onclick="showcate(this)" data-id="cate2"><i class="fa fa-bars" aria-hidden="true"></i></button>
                                <div class="clr"></div>
                            </div>
                            <div class="body-box-category" id="show2">
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/phan-phu-trong-suot-innisfree-no-sebum-mineral-powder.html" title="Ph&#x1EA5;n Ph&#x1EE7; Innisfree No-Sebum Mineral Powder">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/phan-phu-trong-suot-Innisfree-No-Sebum-Mineral-Powder-beauty-garden-1.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '2445')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">9%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/phan-phu-trong-suot-innisfree-no-sebum-mineral-powder.html" title="Ph&#x1EA5;n Ph&#x1EE7; Innisfree No-Sebum Mineral Powder">Ph&#x1EA5;n Ph&#x1EE7; Innisfree No-Sebum Mineral Powder</a>
        </h3>
        <div>
            <span class="price-drop">110,000₫</span>
            <span class="price ">120,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/phan-phu-dang-nen-shiseido-baby-powder-50gr.html" title="Ph&#x1EA5;n Ph&#x1EE7; Shiseido Baby Powder 50gr">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/1(8).jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '4671')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">30%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/phan-phu-dang-nen-shiseido-baby-powder-50gr.html" title="Ph&#x1EA5;n Ph&#x1EE7; Shiseido Baby Powder 50gr">Ph&#x1EA5;n Ph&#x1EE7; Shiseido Baby Powder 50gr</a>
        </h3>
        <div>
            <span class="price-drop">95,000₫</span>
            <span class="price ">140,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/kem-che-khuyet-diem-the-saem-cover-perfection-tip-concealer.html" title="Kem Che Khuy&#x1EBF;t &#x110;i&#x1EC3;m The Saem Cover Perfection">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/kem-che-khuyet-diem-The-Saem-Cover-Perfection-Tip-Concealer1.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '3464')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">20%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/kem-che-khuyet-diem-the-saem-cover-perfection-tip-concealer.html" title="Kem Che Khuy&#x1EBF;t &#x110;i&#x1EC3;m The Saem Cover Perfection">Kem Che Khuy&#x1EBF;t &#x110;i&#x1EC3;m The Saem Cover Perfection</a>
        </h3>
        <div>
            <span class="price-drop">80,000₫</span>
            <span class="price ">99,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/kem-lot-trang-diem-the-face-shop-air-cotton-make-up-base.html" title="Kem L&#xF3;t Trang &#x110;i&#x1EC3;m The Face Shop Air Cotton ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/a1-28032019100725.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6091')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">22%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/kem-lot-trang-diem-the-face-shop-air-cotton-make-up-base.html" title="Kem L&#xF3;t Trang &#x110;i&#x1EC3;m The Face Shop Air Cotton ">Kem L&#xF3;t Trang &#x110;i&#x1EC3;m The Face Shop Air Cotton </a>
        </h3>
        <div>
            <span class="price-drop">80,000₫</span>
            <span class="price ">102,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/xit-khoang-phap-evoluderm.html" title="X&#x1ECB;t kho&#xE1;ng Ph&#xE1;p Evoluderm 400ml">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/xit-khoang-phap-EvoLuderm-eau-pure-beauty-garden-1(1).jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '798')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">13%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/xit-khoang-phap-evoluderm.html" title="X&#x1ECB;t kho&#xE1;ng Ph&#xE1;p Evoluderm 400ml">X&#x1ECB;t kho&#xE1;ng Ph&#xE1;p Evoluderm 400ml</a>
        </h3>
        <div>
            <span class="price-drop">170,000₫</span>
            <span class="price ">194,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/xit-khoang-vichy-eau-thermale150ml 2017.html" title="X&#x1ECB;t Kho&#xE1;ng Vichy Eau Thermale 2017 150ml ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/xit-khoang-Vichy-Eau-Thermale-beauty-garden-1.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '2534')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">7%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/xit-khoang-vichy-eau-thermale150ml 2017.html" title="X&#x1ECB;t Kho&#xE1;ng Vichy Eau Thermale 2017 150ml ">X&#x1ECB;t Kho&#xE1;ng Vichy Eau Thermale 2017 150ml </a>
        </h3>
        <div>
            <span class="price-drop">290,000₫</span>
            <span class="price ">311,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/phan-tuoi-duc-essence-soft-touch-mousse-make-up.html" title="Ph&#x1EA5;n T&#x1B0;&#x1A1;i &#x110;&#x1EE9;c Essence Soft Touch Mousse Make-up">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/phan-tuoi.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5150')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">12%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/phan-tuoi-duc-essence-soft-touch-mousse-make-up.html" title="Ph&#x1EA5;n T&#x1B0;&#x1A1;i &#x110;&#x1EE9;c Essence Soft Touch Mousse Make-up">Ph&#x1EA5;n T&#x1B0;&#x1A1;i &#x110;&#x1EE9;c Essence Soft Touch Mousse Make-up</a>
        </h3>
        <div>
            <span class="price-drop">160,000₫</span>
            <span class="price ">180,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/kem-lot-kiem-dau-che-lo-chan-long-maybelline-pore-eraser-baby-skin-primer.html" title="Kem L&#xF3;t Ki&#x1EC1;m D&#x1EA7;u Maybelline Baby Skin Primer">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/01(9).jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5273')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">24%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/kem-lot-kiem-dau-che-lo-chan-long-maybelline-pore-eraser-baby-skin-primer.html" title="Kem L&#xF3;t Ki&#x1EC1;m D&#x1EA7;u Maybelline Baby Skin Primer">Kem L&#xF3;t Ki&#x1EC1;m D&#x1EA7;u Maybelline Baby Skin Primer</a>
        </h3>
        <div>
            <span class="price-drop">140,000₫</span>
            <span class="price ">183,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/xit-khoang-evoluderm-atomiseur-eau-pure-spray-mist.html" title="X&#x1ECB;t Kho&#xE1;ng Evoluderm Atomiseur Eau Pure Spray">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/xit-khoang-evoluderm.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '4651')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">17%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/xit-khoang-evoluderm-atomiseur-eau-pure-spray-mist.html" title="X&#x1ECB;t Kho&#xE1;ng Evoluderm Atomiseur Eau Pure Spray">X&#x1ECB;t Kho&#xE1;ng Evoluderm Atomiseur Eau Pure Spray</a>
        </h3>
        <div>
            <span class="price-drop">100,000₫</span>
            <span class="price ">120,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/phan-nuoc-lime-real-cover-pink-cushion.html" title="Ph&#x1EA5;n n&#x1B0;&#x1EDB;c Lime Real Cover Pink Cushion ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/phan-nuoc-Lime-Real-Cover-Pink-Cushion-beauty-garden-1(3).jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '2120')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">8%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/phan-nuoc-lime-real-cover-pink-cushion.html" title="Ph&#x1EA5;n n&#x1B0;&#x1EDB;c Lime Real Cover Pink Cushion ">Ph&#x1EA5;n n&#x1B0;&#x1EDB;c Lime Real Cover Pink Cushion </a>
        </h3>
        <div>
            <span class="price-drop">290,000₫</span>
            <span class="price ">312,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/che-khuyet-diem-maybelline-instant-age-rewind-eraser-dark-circles-concealer.html" title="B&#xFA;t Che Khuy&#x1EBF;t &#x110;i&#x1EC3;m Maybelline Instant Age">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/but-che-khuyet-diem.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5258')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">10%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/che-khuyet-diem-maybelline-instant-age-rewind-eraser-dark-circles-concealer.html" title="B&#xFA;t Che Khuy&#x1EBF;t &#x110;i&#x1EC3;m Maybelline Instant Age">B&#xFA;t Che Khuy&#x1EBF;t &#x110;i&#x1EC3;m Maybelline Instant Age</a>
        </h3>
        <div>
            <span class="price-drop">210,000₫</span>
            <span class="price ">231,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/xit-khoang-jonzac-eau-thermale-thermal-spring-water.html" title="X&#x1ECB;t kho&#xE1;ng Jonzac Spring Water">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/avatar-sp-web11-1-recovered-recovered-recovered-recovered-03082019114518.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6371')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">15%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/xit-khoang-jonzac-eau-thermale-thermal-spring-water.html" title="X&#x1ECB;t kho&#xE1;ng Jonzac Spring Water">X&#x1ECB;t kho&#xE1;ng Jonzac Spring Water</a>
        </h3>
        <div>
            <span class="price-drop">160,000₫</span>
            <span class="price ">187,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                <div class="clr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="back-gray pad-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-products-category">
                            <div class="head-box-category">
                                <a href="/danh-muc/cham-soc-da.html" class="left-head">
                                    <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/chamsocda.png?v=17042020" alt="Ch&#x103;m S&#xF3;c Da Icon" class="lazy" />
                                    <h2>
                                        Ch&#x103;m S&#xF3;c Da
                                    </h2>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                                        <ul class="ul-non ul-category" id="cate3">
                                                <li class="active"><a href="javascript:void(0)" onclick="ShowPDCT(this,''+1271+'')" data-id="3">D&#x1B0;&#x1EE1;ng da </a></li>
                                                <li class=""><a href="javascript:void(0)" onclick="ShowPDCT(this,''+1270+'')" data-id="3">L&#xE0;m s&#x1EA1;ch da </a></li>
                                                <li class=""><a href="javascript:void(0)" onclick="ShowPDCT(this,''+2188+'')" data-id="3">Mask - M&#x1EB7;t n&#x1EA1;</a></li>
                                        </ul>
                                <button class="btn-ct hidden-md" onclick="showcate(this)" data-id="cate3"><i class="fa fa-bars" aria-hidden="true"></i></button>
                                <div class="clr"></div>
                            </div>
                            <div class="body-box-category" id="show3">
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/serum-tri-munthe-ordinary-niacinamide-10-zinc-1-serum-30ml.html" title="Serum The Ordinary Niacinamide 10% &#x2B; Zinc 1%">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/a4-08102018090743.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5612')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">30%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/serum-tri-munthe-ordinary-niacinamide-10-zinc-1-serum-30ml.html" title="Serum The Ordinary Niacinamide 10% &#x2B; Zinc 1%">Serum The Ordinary Niacinamide 10% &#x2B; Zinc 1%</a>
        </h3>
        <div>
            <span class="price-drop">180,000₫</span>
            <span class="price ">247,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/goi-sample-so-natural-red-peel-tingle-serum.html" title="G&#xF3;i Sample So&#x27; Natural Red Peel Tingle Serum">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/a1-20042019091156.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6171')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">34%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/goi-sample-so-natural-red-peel-tingle-serum.html" title="G&#xF3;i Sample So&#x27; Natural Red Peel Tingle Serum">G&#xF3;i Sample So&#x27; Natural Red Peel Tingle Serum</a>
        </h3>
        <div>
            <span class="price-drop">35,000₫</span>
            <span class="price ">53,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/nuoc-hoa-hong-simple-soothing-facial-toner.html" title="N&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Simple Soothing Facial Toner">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/Simple-Soothing-Facial-Toner.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '489')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">40%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/nuoc-hoa-hong-simple-soothing-facial-toner.html" title="N&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Simple Soothing Facial Toner">N&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Simple Soothing Facial Toner</a>
        </h3>
        <div>
            <span class="price-drop">89,000₫</span>
            <span class="price ">147,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/nuoc-hoa-hong-xuat-xu-tu-nhat-naturie-skin-conditioner.html" title="N&#x1B0;&#x1EDB;c Hoa H&#x1ED3;ng Naturie Skin Conditioner 500ml">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/nuoc-hoa-hong-Naturie-Skin-Conditioner.png?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '2923')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">10%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/nuoc-hoa-hong-xuat-xu-tu-nhat-naturie-skin-conditioner.html" title="N&#x1B0;&#x1EDB;c Hoa H&#x1ED3;ng Naturie Skin Conditioner 500ml">N&#x1B0;&#x1EDB;c Hoa H&#x1ED3;ng Naturie Skin Conditioner 500ml</a>
        </h3>
        <div>
            <span class="price-drop">230,000₫</span>
            <span class="price ">253,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/kem-chong-nang-3w-intensive-uv.html" title="Kem ch&#x1ED1;ng n&#x1EAF;ng 3W Intensive UV">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/3W-Intensive-UV-Sunblock-cream-beauty-garden.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '2066')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">23%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/kem-chong-nang-3w-intensive-uv.html" title="Kem ch&#x1ED1;ng n&#x1EAF;ng 3W Intensive UV">Kem ch&#x1ED1;ng n&#x1EAF;ng 3W Intensive UV</a>
        </h3>
        <div>
            <span class="price-drop">70,000₫</span>
            <span class="price ">90,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/tober-diep-ca-dokudami-natural-skin-lotion-500ml.html" title="Toner Di&#x1EBF;p C&#xE1; Dokudami Natural Skin Lotion ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/Toner-di%E1%BA%BFp-c%C3%A1.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6668')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">11%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/tober-diep-ca-dokudami-natural-skin-lotion-500ml.html" title="Toner Di&#x1EBF;p C&#xE1; Dokudami Natural Skin Lotion ">Toner Di&#x1EBF;p C&#xE1; Dokudami Natural Skin Lotion </a>
        </h3>
        <div>
            <span class="price-drop">150,000₫</span>
            <span class="price ">168,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/tinh-chat-serum-the-ordinary-hyaluronic-acid-2-b5-serum-30ml.html" title="Tinh Ch&#x1EA5;t The Ordinary Hyaluronic Acid 2% &#x2B; B5">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/q1-11122018104905.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5850')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">10%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/tinh-chat-serum-the-ordinary-hyaluronic-acid-2-b5-serum-30ml.html" title="Tinh Ch&#x1EA5;t The Ordinary Hyaluronic Acid 2% &#x2B; B5">Tinh Ch&#x1EA5;t The Ordinary Hyaluronic Acid 2% &#x2B; B5</a>
        </h3>
        <div>
            <span class="price-drop">250,000₫</span>
            <span class="price ">275,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/tinh-chat-duong-trang-va-mo-tham-dear-klairs-freshly-juiced-vitamin-drop.html" title="Tinh Ch&#x1EA5;t D&#x1B0;&#x1EE1;ng Tr&#x1EAF;ng V&#xE0; M&#x1EDD; Th&#xE2;m Dear Klairs ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/avatar-sp-web11-1-recovered-recovered-recovered-28082019082745.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6420')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">9%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/tinh-chat-duong-trang-va-mo-tham-dear-klairs-freshly-juiced-vitamin-drop.html" title="Tinh Ch&#x1EA5;t D&#x1B0;&#x1EE1;ng Tr&#x1EAF;ng V&#xE0; M&#x1EDD; Th&#xE2;m Dear Klairs ">Tinh Ch&#x1EA5;t D&#x1B0;&#x1EE1;ng Tr&#x1EAF;ng V&#xE0; M&#x1EDD; Th&#xE2;m Dear Klairs </a>
        </h3>
        <div>
            <span class="price-drop">280,000₫</span>
            <span class="price ">305,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/kem-duong-dang-gel-naturie-hatomugi-skin-conditioning.html" title="Kem D&#x1B0;&#x1EE1;ng Naturie Skin Conditioning Gel 180gr ">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/kem-duong-dang-gel-Gel-Naturie-Hatomugi-Skin-Conditioning.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '3023')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">10%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/kem-duong-dang-gel-naturie-hatomugi-skin-conditioning.html" title="Kem D&#x1B0;&#x1EE1;ng Naturie Skin Conditioning Gel 180gr ">Kem D&#x1B0;&#x1EE1;ng Naturie Skin Conditioning Gel 180gr </a>
        </h3>
        <div>
            <span class="price-drop">245,000₫</span>
            <span class="price ">272,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/moc-nhu-tinh-chat-thao-duoc-tri-mun.html" title="Tinh Ch&#x1EA5;t Th&#x1EA3;o D&#x1B0;&#x1EE3;c Chuy&#xEA;n D&#xE0;nh Cho Da M&#x1EE5;n">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/a4-10102018090929.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5635')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off ">50%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/moc-nhu-tinh-chat-thao-duoc-tri-mun.html" title="Tinh Ch&#x1EA5;t Th&#x1EA3;o D&#x1B0;&#x1EE3;c Chuy&#xEA;n D&#xE0;nh Cho Da M&#x1EE5;n">Tinh Ch&#x1EA5;t Th&#x1EA3;o D&#x1B0;&#x1EE3;c Chuy&#xEA;n D&#xE0;nh Cho Da M&#x1EE5;n</a>
        </h3>
        <div>
            <span class="price-drop">55,000₫</span>
            <span class="price ">120,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/tinh-chat-te-bao-goc-chong-lao-hoa-tre-hoa-lan-da-eldas-eg-tox-program.html" title="Tinh Ch&#x1EA5;t T&#x1EBF; B&#xE0;o G&#x1ED1;c Eldas">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/01(6).jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '5270')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">27%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/tinh-chat-te-bao-goc-chong-lao-hoa-tre-hoa-lan-da-eldas-eg-tox-program.html" title="Tinh Ch&#x1EA5;t T&#x1EBF; B&#xE0;o G&#x1ED1;c Eldas">Tinh Ch&#x1EA5;t T&#x1EBF; B&#xE0;o G&#x1ED1;c Eldas</a>
        </h3>
        <div>
            <span class="price-drop">55,000₫</span>
            <span class="price ">75,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                            <div class="col-2-ct">
                                                <div class="pd-box pd-box-category">
    <div class="box-images">
            <a href="/xit-mun-lung-potion-28-days-transforming-acne-clearing-body-spray-100ml.html" title="X&#x1ECB;t M&#x1EE5;n L&#x1B0;ng Potion 28 Days Transforming Acne">
                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/hinhpotion-18072019102935.jpg?width=350&height=391&v=15042020" class="img-reponsive lazy " />
            </a>
        <button type="button" onclick="LikeThis(this, '6341')" class="btn-addlike "><i class="fa fa-heart-o heart_new"></i></button>
        <div class="sale-off hide">10%<br />OFF</div>
    </div>
    <div class="box-content">
        <h3>
            <a href="/xit-mun-lung-potion-28-days-transforming-acne-clearing-body-spray-100ml.html" title="X&#x1ECB;t M&#x1EE5;n L&#x1B0;ng Potion 28 Days Transforming Acne">X&#x1ECB;t M&#x1EE5;n L&#x1B0;ng Potion 28 Days Transforming Acne</a>
        </h3>
        <div>
            <span class="price-drop">235,000₫</span>
            <span class="price ">260,000₫</span>
        </div>
    </div>
</div>
                                            </div>
                                <div class="clr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<div class="pad-30">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-brand">
                    <h2>THƯƠNG HIỆU NỔI BẬT</h2>
                    <div class="sroll-box">
                        <a href="javascript:void(0)" class="brand-pre bnts-brand">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                        <div class="owl-carousel box-img">
                                    <div class="item">
                                        <a href="/thuong-hieu/drbelmeur.html" title="Dr.Belmeur" class="brand-img">
                                                <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/og_image.jpg?width=137&height=100&v=17042020" class="img-reponsive lazyslide" alt="Dr.Belmeur" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/thuong-hieu-khac.html" title="Th&#x1B0;&#x1A1;ng Hi&#x1EC7;u Kh&#xE1;c" class="brand-img">
                                                <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/thuong-hieu-khac.png?width=137&height=100&v=17042020" class="img-reponsive lazyslide" alt="Th&#x1B0;&#x1A1;ng Hi&#x1EC7;u Kh&#xE1;c" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/vichy.html" title="Vichy" class="brand-img">
                                                <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/Capture.PNG?width=137&height=100&v=17042020" class="img-reponsive lazyslide" alt="Vichy" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/cocoon.html" title="Cocoon" class="brand-img">
                                                <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/banner/logococoon.jpg?width=137&height=100&v=17042020" class="img-reponsive lazyslide" alt="Cocoon" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/vacosi.html" title="Vacosi" class="brand-img">
                                                <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/vacosi.jpg?width=137&height=100&v=17042020" class="img-reponsive lazyslide" alt="Vacosi" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/avene.html" title="Avene" class="brand-img">
                                                <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/avene.jpg?width=137&height=100&v=17042020" class="img-reponsive lazyslide" alt="Avene" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/play-boy.html" title="Play Boy " class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/play-boy.gif?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Play Boy " />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/pony.html" title="Pony" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/pony.jpg?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Pony" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/paulas-choice.html" title="Paula&#x27;s Choice" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/paulas-choice.jpg?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Paula&#x27;s Choice" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/nyx.html" title="NYX" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/nyx.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="NYX" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/bioderma.html" title="Bioderma" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/bioderma.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Bioderma" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/laneige-korea.html" title="LANEIGE KOREA" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/laneige-korea.jpg?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="LANEIGE KOREA" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/revlon-korea.html" title="Revlon" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/revlon-korea.jpg?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Revlon" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/victorias-secret.html" title="Victoria&#x27;s Secret" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/victorias-secret.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Victoria&#x27;s Secret" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/city-color.html" title="City Color" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/city-color.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="City Color" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/apieu.html" title="A&#x27;PIEU" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/apieu.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="A&#x27;PIEU" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/stives.html" title="StIves" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/stives.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="StIves" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/ohui.html" title="Ohui " class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/ohui.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Ohui " />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/the-body-shop.html" title="The Body Shop" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/the-body-shop.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="The Body Shop" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/physician-formula.html" title="Physician Formula" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/physician-formula.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Physician Formula" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/rimmel.html" title="Rimmel" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/rimmel.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Rimmel" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/covergirl.html" title="Covergirl" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/covergirl.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Covergirl" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/kose.html" title="Kose" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/kose.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Kose" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/nature-republic.html" title="Nature Republic" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/nature-republic.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Nature Republic" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/simple.html" title="Simple" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/simple.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Simple" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/yadah.html" title="Yadah " class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/yadah.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Yadah " />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/lanopearl.html" title="Lanopearl" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/lanopearl.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Lanopearl" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/rebirth.html" title="Rebirth " class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/rebirth.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Rebirth " />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/aritaum.html" title="Aritaum" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/0003078_aritaum_420.jpeg?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Aritaum" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/careline.html" title="Careline" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/careline.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Careline" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/mac.html" title="MAC" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/mac.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="MAC" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/shiseido.html" title="Shiseido" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/shiseido.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Shiseido" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/missha.html" title="Missha" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/missha.jpg?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Missha" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/la-girl.html" title="L.A Girl" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/la-girl.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="L.A Girl" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/evoluderm.html" title="Evoluderm" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/evoluderm.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Evoluderm" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/benton.html" title="Benton" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/benton.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Benton" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/dhc.html" title="DHC" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/dhc.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="DHC" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/mamonde.html" title="Mamonde" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/mamonde.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Mamonde" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/sivanna-colors.html" title="Sivanna Colors" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/sivanna-colors.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Sivanna Colors" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/maybeline.html" title="Maybelline" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/maybeline.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Maybelline" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/secret-key.html" title="Secret Key" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/secret-key.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Secret Key" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/bath-amp-body-works.html" title="Bath and body works" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/bath-amp-body-works.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Bath and body works" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/loreal.html" title="L&#x27;oreal Paris" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/loreal.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="L&#x27;oreal Paris" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/3wc.html" title="3W Clinic" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/3wc.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="3W Clinic" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/tonymoly.html" title="Tonymoly" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/tonymoly.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Tonymoly" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/w7.html" title="W7 " class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/w7.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="W7 " />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/holika.html" title="Holika Holika " class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/holika.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Holika Holika " />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/3ce.html" title="3CE" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/3ce.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="3CE" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/etude-house.html" title="Etude House" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/etude-house.jpg?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Etude House" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/skinfood.html" title="Skinfood" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/skinfood.jpg?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Skinfood" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/sk-ii.html" title="SK - II" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/sk-ii.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="SK - II" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/Innisfree.html" title="Innisfree" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/innisfree.jpg?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Innisfree" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/the-face-shop.html" title="The Face Shop" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/the-face-shop.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="The Face Shop" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/hada-labo.html" title="Hada Labo" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/hada-labo.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Hada Labo" />
                                        </a>
                                    </div>
                                    <div class="item">
                                        <a href="/thuong-hieu/Neutrogena.html" title="Neutrogena" class="brand-img">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/neutrogena.png?width=137&height=100&v=17042020" class="img-reponsive owl-lazy" alt="Neutrogena" />
                                        </a>
                                    </div>
                        </div>
                        <a href="javascript:void(0)" class="brand-nex bnts-brand">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pad-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-litmit">
                    <h2>THÔNG TIN NỔI BẬT</h2>
                    <div class="arrow-slider caner">
                        <a href="javascript:void(0)" class="news-pre btn-pre bnts">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                        <a href="javascript:void(0)" class="news-nex btn-next bnts">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="box-tent">
                    <div class="owl-carousel box-tintuc">
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="/bi-quyet-lam-dep/top-5-cach-vua-lam-dep-da-vua-phong-ngua-dich-benh-co-vyt.html" title="Top 5 c&#xE1;ch v&#x1EEB;a l&#xE0;m &#x111;&#x1EB9;p da, v&#x1EEB;a ph&#xF2;ng ng&#x1EEB;a d&#x1ECB;ch b&#x1EC7;nh &#x201C;C&#xF4; V&#xFD;t&#x201D;">
                                                        <img data-cument="https://adminbeauty.hvnet.vn/Upload/files/bi-quyet-cham-soc-da-cua-teen-ban-ron-la-gi-02-30032020105737.jpg?width=268&height=179&v=18042020" alt="Top 5 c&#xE1;ch v&#x1EEB;a l&#xE0;m &#x111;&#x1EB9;p da, v&#x1EEB;a ph&#xF2;ng ng&#x1EEB;a d&#x1ECB;ch b&#x1EC7;nh &#x201C;C&#xF4; V&#xFD;t&#x201D;" class="img-reponsive lazyslide" />
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <a href="/bi-quyet-lam-dep/top-5-cach-vua-lam-dep-da-vua-phong-ngua-dich-benh-co-vyt.html" title="Top 5 c&#xE1;ch v&#x1EEB;a l&#xE0;m &#x111;&#x1EB9;p da, v&#x1EEB;a ph&#xF2;ng ng&#x1EEB;a d&#x1ECB;ch b&#x1EC7;nh &#x201C;C&#xF4; V&#xFD;t&#x201D;">
                                                    Top 5 c&#xE1;ch v&#x1EEB;a l&#xE0;m &#x111;&#x1EB9;p da, v&#x1EEB;a ph&#xF2;ng ng&#x1EEB;a d&#x1ECB;ch b&#x1EC7;nh &#x201C;C&#xF4; V&#xFD;t&#x201D;
                                                </a>
                                                <p>
                                                    B&#xED; quy&#x1EBF;t v&#x1EEB;a gi&#xFA;p l&#xE0;m &#x111;&#x1EB9;p da l&#x1EA1;i ph&#xF2;ng ng&#x1EEB;a d&#x1ECB;ch b&#x1EC7;nh &quot;C&#xF4; V&#xFD;t&quot; h&#x1EEF;u hi&#x1EC7;u, c&#xF9;ng nhau t&#xEC;m hi&#x1EC3;u v&#xE0; kh&#xE1;m ph&#xE1; trong b&#xE0;i vi&#x1EBF;t ngay sau &#x111;&#xE2;y!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="/bi-quyet-lam-dep/top-3-nuoc-rua-tay-diet-khuan-tot-nhat-hien-nay.html" title="TOP 3 N&#x1AF;&#x1EDA;C R&#x1EEC;A TAY DI&#x1EC6;T KHU&#x1EA8;N T&#x1ED0;T NH&#x1EA4;T HI&#x1EC6;N NAY">
                                                        <img data-cument="https://adminbeauty.hvnet.vn/Upload/files/Untitled-1.jpg?width=268&height=179&v=18042020" alt="TOP 3 N&#x1AF;&#x1EDA;C R&#x1EEC;A TAY DI&#x1EC6;T KHU&#x1EA8;N T&#x1ED0;T NH&#x1EA4;T HI&#x1EC6;N NAY" class="img-reponsive lazyslide" />
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <a href="/bi-quyet-lam-dep/top-3-nuoc-rua-tay-diet-khuan-tot-nhat-hien-nay.html" title="TOP 3 N&#x1AF;&#x1EDA;C R&#x1EEC;A TAY DI&#x1EC6;T KHU&#x1EA8;N T&#x1ED0;T NH&#x1EA4;T HI&#x1EC6;N NAY">
                                                    TOP 3 N&#x1AF;&#x1EDA;C R&#x1EEC;A TAY DI&#x1EC6;T KHU&#x1EA8;N T&#x1ED0;T NH&#x1EA4;T HI&#x1EC6;N NAY
                                                </a>
                                                <p>
                                                    Gi&#x1EEF;a t&#xEC;nh tr&#x1EA1;ng c&#x1A1;n b&#xE3;o Corona &#x111;ang tr&#xE0;n ng&#x1EAD;p, &#x111;&#x1EC3; c&#xF3; th&#x1EC3; b&#x1EA3;o v&#x1EC7; b&#x1EA3;n th&#xE2;n c&#xF9;ng gia &#x111;&#xEC;nh t&#x1ED1;t nh&#x1EA5;t, B&#x1ED9; Y T&#x1EBF; khuy&#x1EBF;n c&#xE1;o c&#x1EA7;n ph&#x1EA3;i gi&#x1EEF; v&#x1EC7; sinh th&#xE2;n th&#x1EC3; v&#xE0; r&#x1EED;a tay th&#x1B0;&#x1EDD;ng xuy&#xEA;n. &#x110;&#x1ED3;ng h&#xE0;nh c&#xF9;ng b&#x1EA1;n v&#x1B0;&#x1EE3;t qua d&#x1ECB;ch b&#x1EC7;nh, Beauty Garden xin gi&#x1EDB;i thi&#x1EC7;u &#x111;&#x1EBF;n c&#xE1;c b&#x1EA1;n m&#x1ED9;t s&#x1ED1; lo&#x1EA1;i n&#x1B0;&#x1EDB;c r&#x1EED;a tay di&#x1EC7;t khu&#x1EA9;n t&#x1ED1;t nh&#x1EA5;t, &#x111;&#x1B0;&#x1EE3;c &#x1B0;a chu&#x1ED9;ng nh&#x1EA5;t hi&#x1EC7;n nay.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="/bi-quyet-lam-dep/dang-ki-beauty-garden-zalo-offical-account-nhan-ngay-quyen-loi-dac-biet.html" title="&#x110;&#x102;NG K&#xCD; BEAUTY GARDEN ZALO OFFICAL ACCOUNT - NH&#x1EAC;N NGAY QUY&#x1EC0;N L&#x1EE2;I &#x110;&#x1EB6;C BI&#x1EC6;T">
                                                        <img data-cument="https://adminbeauty.hvnet.vn/Upload/files/anhr-hihihi-19062019113819.jpg?width=268&height=179&v=18042020" alt="&#x110;&#x102;NG K&#xCD; BEAUTY GARDEN ZALO OFFICAL ACCOUNT - NH&#x1EAC;N NGAY QUY&#x1EC0;N L&#x1EE2;I &#x110;&#x1EB6;C BI&#x1EC6;T" class="img-reponsive lazyslide" />
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <a href="/bi-quyet-lam-dep/dang-ki-beauty-garden-zalo-offical-account-nhan-ngay-quyen-loi-dac-biet.html" title="&#x110;&#x102;NG K&#xCD; BEAUTY GARDEN ZALO OFFICAL ACCOUNT - NH&#x1EAC;N NGAY QUY&#x1EC0;N L&#x1EE2;I &#x110;&#x1EB6;C BI&#x1EC6;T">
                                                    &#x110;&#x102;NG K&#xCD; BEAUTY GARDEN ZALO OFFICAL ACCOUNT - NH&#x1EAC;N NGAY QUY&#x1EC0;N L&#x1EE2;I &#x110;&#x1EB6;C BI&#x1EC6;T
                                                </a>
                                                <p>
                                                    Sau g&#x1EA7;n 5 n&#x103;m ho&#x1EA1;t &#x111;&#x1ED9;ng, Beauty Garden &#x111;&#xE3; c&#xF3; nh&#x1EEF;ng b&#x1B0;&#x1EDB;c ti&#x1EBF;n d&#xE0;i r&#x1ED9;ng v&#x1EDB;i 6 c&#x1EED;a h&#xE0;ng tr&#xEA;n kh&#x1EAF;p 3 mi&#x1EC1;n &#x111;&#x1EA5;t n&#x1B0;&#x1EDB;c. V&#x1EDB;i mong mu&#x1ED1;n kh&#xF4;ng ch&#x1EC9; ch&#x103;m s&#xF3;c kh&#xE1;ch h&#xE0;ng t&#x1ED1;t tr&#xEA;n &quot;m&#x1EB7;t tr&#x1EAD;n&quot; Fanpage v&#xE0; Website, BeautyGarden c&#xF2;n mong mu&#x1ED1;n &#x111;&#x1B0;&#x1EE3;c h&#x1ED7; tr&#x1EE3; kh&#xE1;ch h&#xE0;ng &#x1EDF; m&#x1ECD;i l&#xFA;c m&#x1ECD;i n&#x1A1;i, gi&#xFA;p kh&#xE1;ch h&#xE0;ng d&#x1EC5; d&#xE0;ng k&#x1EBF;t n&#x1ED1;i, chia s&#x1EBB;, t&#xEC;m ki&#x1EBF;m th&#xF4;ng tin m&#x1ED9;t c&#xE1;ch ti&#x1EC7;n l&#x1EE3;i v&#xE0; nhanh ch&#xF3;ng.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="/review/review-danh-gia-mat-na-giay-innisfree-its-real-squeeze-mask.html" title="Review &#x111;&#xE1;nh gi&#xE1; m&#x1EB7;t n&#x1EA1; gi&#x1EA5;y Innisfree It&#x27;s Real Squeeze Mask">
                                                        <img data-cument="https://adminbeauty.hvnet.vn/Upload/files/2M8A9937%20(2).jpg?width=268&height=179&v=18042020" alt="Review &#x111;&#xE1;nh gi&#xE1; m&#x1EB7;t n&#x1EA1; gi&#x1EA5;y Innisfree It&#x27;s Real Squeeze Mask" class="img-reponsive lazyslide" />
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <a href="/review/review-danh-gia-mat-na-giay-innisfree-its-real-squeeze-mask.html" title="Review &#x111;&#xE1;nh gi&#xE1; m&#x1EB7;t n&#x1EA1; gi&#x1EA5;y Innisfree It&#x27;s Real Squeeze Mask">
                                                    Review &#x111;&#xE1;nh gi&#xE1; m&#x1EB7;t n&#x1EA1; gi&#x1EA5;y Innisfree It&#x27;s Real Squeeze Mask
                                                </a>
                                                <p>
                                                    Beauty Garden s&#x1EBD; review m&#x1EB7;t n&#x1EA1; gi&#x1EA5;y Innisfree It&#x27;s Real Squeeze Mask m&#x1ED9;t d&#xF2;ng m&#x1EB7;t gi&#x1EA5;y chi&#x1EBF;t xu&#x1EA5;t t&#x1EEB; thi&#xEA;n nhi&#xEA;n an to&#xE0;n v&#xE0; nh&#x1EB9; nh&#xE0;ng cho l&#xE0;n da c&#x1EE7;a b&#x1EA1;n.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="/bi-quyet-lam-dep/goc-tuyen-dung-beauty-garden-tim-nguoi-than.html" title="G&#xD3;C TUY&#x1EC2;N D&#x1EE4;NG - BEAUTY GARDEN T&#xCC;M NG&#x1AF;&#x1EDC;I TH&#xC2;N">
                                                        <img data-cument="https://adminbeauty.hvnet.vn/Upload/files/web-min(1).jpg?width=268&height=179&v=18042020" alt="G&#xD3;C TUY&#x1EC2;N D&#x1EE4;NG - BEAUTY GARDEN T&#xCC;M NG&#x1AF;&#x1EDC;I TH&#xC2;N" class="img-reponsive lazyslide" />
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <a href="/bi-quyet-lam-dep/goc-tuyen-dung-beauty-garden-tim-nguoi-than.html" title="G&#xD3;C TUY&#x1EC2;N D&#x1EE4;NG - BEAUTY GARDEN T&#xCC;M NG&#x1AF;&#x1EDC;I TH&#xC2;N">
                                                    G&#xD3;C TUY&#x1EC2;N D&#x1EE4;NG - BEAUTY GARDEN T&#xCC;M NG&#x1AF;&#x1EDC;I TH&#xC2;N
                                                </a>
                                                <p>
                                                    &#x110;&#x1EA1;i gia &#x111;&#xEC;nh Beauty Garden &#x201C;ph&#x1EA5;t c&#x1EDD;&#x201D; t&#xEC;m ng&#x1B0;&#x1EDD;i th&#xE2;n!! &quot;Ng&#x1B0;&#x1EDD;i th&#x1B0;&#x1A1;ng&quot; n&#xE0;o &#x111;ang t&#xEC;m ki&#x1EBF;m m&#x1ED9;t m&#xF4;i tr&#x1B0;&#x1EDD;ng l&#xE0;m vi&#x1EC7;c tr&#x1EBB; trung, n&#x103;ng &#x111;&#x1ED9;ng, c&#xF3; nhi&#x1EC1;u c&#x1A1; h&#x1ED9;i th&#x103;ng ti&#x1EBF;n trong t&#x1B0;&#x1A1;ng lai th&#xEC; &#x111;&#x1EEB;ng ng&#x1EA7;n ng&#x1EA1;i g&#x1EED;i h&#x1ED3; s&#x1A1; cho ch&#xFA;ng m&#xEC;nh nh&#xE9;! Beauty Garden TP. H&#x1ED3; Ch&#xED; Minh c&#x1EA7;n b&#x1EA1;n!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="/review/review-dau-tay-trang-muji-mild-cleansing-oil-nhat-ban.html" title="Review d&#x1EA7;u t&#x1EA9;y trang Muji Mild Cleansing Oil Nh&#x1EAD;t B&#x1EA3;n">
                                                        <img data-src="https://adminbeauty.hvnet.vn/Upload/files/dautaytrangmuji.jpg?width=268&height=179&v=18042020" alt="Review d&#x1EA7;u t&#x1EA9;y trang Muji Mild Cleansing Oil Nh&#x1EAD;t B&#x1EA3;n" class="img-reponsive owl-lazy" />
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <a href="/review/review-dau-tay-trang-muji-mild-cleansing-oil-nhat-ban.html" title="Review d&#x1EA7;u t&#x1EA9;y trang Muji Mild Cleansing Oil Nh&#x1EAD;t B&#x1EA3;n">
                                                    Review d&#x1EA7;u t&#x1EA9;y trang Muji Mild Cleansing Oil Nh&#x1EAD;t B&#x1EA3;n
                                                </a>
                                                <p>
                                                    D&#x1EA7;u t&#x1EA9;y trang l&#xE0; lo&#x1EA1;i m&#x1EF9; ph&#x1EA9;m l&#xE0;m &#x111;&#x1EB9;p kh&#xF4;ng th&#x1EC3; thi&#x1EBF;u c&#x1EE7;a m&#x1ED7;i c&#xF4; n&#xE0;ng, nh&#x1EA5;t l&#xE0; nh&#x1EEF;ng c&#xF4; n&#xE0;ng m&#xEA; makeup. H&#xF4;m nay, Beauty Garden s&#x1EBD; gi&#x1EDB;i thi&#x1EC7;u th&#xEA;m cho c&#xE1;c n&#xE0;ng m&#x1ED9;t d&#xF2;ng t&#x1EA9;y trang c&#x1EF1;c ch&#x1EA5;t l&#x1B0;&#x1EE3;ng &#x111;&#x1EBF;n t&#x1EEB; Nh&#x1EAD;t B&#x1EA3;n, &#x111;ang &#x111;&#x1B0;&#x1EE3;c ph&#xE1;i &#x111;&#x1EB9;p c&#x1EA3; th&#x1EBF; gi&#x1EDB;i s&#x103;n l&#xF9;ng. C&#xF9;ng tham kh&#x1EA3;o b&#xE0;i review d&#x1EA7;u t&#x1EA9;y trang Muji Mild Cleansing Oil.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="/review/review-cac-dong-serum-cua-timeless.html" title="Review c&#xE1;c d&#xF2;ng serum c&#x1EE7;a Timeless">
                                                        <img data-src="https://adminbeauty.hvnet.vn/Upload/files/3_3.jpg?width=268&height=179&v=18042020" alt="Review c&#xE1;c d&#xF2;ng serum c&#x1EE7;a Timeless" class="img-reponsive owl-lazy" />
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <a href="/review/review-cac-dong-serum-cua-timeless.html" title="Review c&#xE1;c d&#xF2;ng serum c&#x1EE7;a Timeless">
                                                    Review c&#xE1;c d&#xF2;ng serum c&#x1EE7;a Timeless
                                                </a>
                                                <p>
                                                    Timeless l&#xE0; th&#x1B0;&#x1A1;ng hi&#x1EC7;u m&#xE0; c&#xE1;ch &#x111;&#xE2;y kho&#x1EA3;ng 2 n&#x103;m t&#x1EA1;i Vi&#x1EC7;t Nam ch&#x1B0;a ai bi&#x1EBF;t &#x111;&#x1EBF;n, nh&#x1B0;ng th&#x1EDD;i gian g&#x1EA7;n &#x111;&#xE2;y n&#xF3; l&#x1EA1;i l&#xE0; m&#x1ED9;t c&#xE1;i t&#xEA;n &#x111;&#x1B0;&#x1EE3;c t&#xEC;m ki&#x1EBF;m nhi&#x1EC1;u nh&#x1EA5;t tr&#xEA;n c&#xE1;c trang m&#x1EA1;ng t&#xEC;m ki&#x1EBF;m v&#x1EC1; t&#x1EEB; kh&#xF3;a &#x201C;Serum&#x201D;. V&#xEC; sao serum Timless l&#x1EA1;i &#x111;&#x1B0;&#x1EE3;c y&#xEA;u th&#xED;ch &#x111;&#x1EBF;n nh&#x1B0; v&#x1EAD;y? H&#xE3;y theo ch&#xE2;n Beauty Garden t&#xEC;m hi&#x1EC3;u nh&#xE9;!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="/review/review-phan-nuoc-april-skin-cuc-hot.html" title="Review April Skin Magic Snow Cushion c&#x1EF1;c hot">
                                                        <img data-src="https://adminbeauty.hvnet.vn/Upload/files/4_5.jpg?width=268&height=179&v=18042020" alt="Review April Skin Magic Snow Cushion c&#x1EF1;c hot" class="img-reponsive owl-lazy" />
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <a href="/review/review-phan-nuoc-april-skin-cuc-hot.html" title="Review April Skin Magic Snow Cushion c&#x1EF1;c hot">
                                                    Review April Skin Magic Snow Cushion c&#x1EF1;c hot
                                                </a>
                                                <p>
                                                    &#x110;&#xE2;y l&#xE0; lo&#x1EA1;i ph&#x1EA5;n n&#x1B0;&#x1EDB;c &#x111;&#x1B0;&#x1EE3;c cho l&#xE0; ph&#x1EA5;n n&#x1B0;&#x1EDB;c &#x201C;ma thu&#x1EAD;t&#x201D; hay ph&#x1EA5;n n&#x1B0;&#x1EDB;c &#x201C;ph&#xF9; th&#x1EE7;y&#x201D;,&#x2026;. C&#xF3; r&#x1EA5;t nhi&#x1EC1;u bi&#x1EC7;t danh &#x111;&#x1B0;&#x1EE3;c &#x201C;ph&#x1EE7;&#x201D; l&#xEA;n n&#xF3;, v&#xE0; t&#x1EA1;i sao l&#x1EA1;i nh&#x1B0; v&#x1EAD;y? M&#xEC;nh &#x111;&#xE3; t&#xEC;m &#x111;&#x1B0;&#x1EE3;c n&#xF3; trong m&#x1ED9;t l&#x1EA7;n &#x111;&#x1EBF;n c&#x1EED;a h&#xE0;ng m&#x1EF9; ph&#x1EA9;m ch&#xED;nh h&#xE3;ng Beauty Garden &#x111;&#x1EC3; &#x201C;truy t&#xEC;m&#x201D; ph&#x1EA5;n n&#x1B0;&#x1EDB;c h&#x1EE3;p v&#x1EDB;i da m&#xEC;nh. H&#xE3;y c&#xF9;ng m&#xEC;nh kh&#xE1;m ph&#xE1; xem b&#xEA;n trong s&#x1EA3;n ph&#x1EA9;m n&#xE0;y nh&#x1B0; th&#x1EBF; n&#xE0;o nha.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="/review/review-nuoc-hoa-hong-evoluderm-lotion-tonique-chat-luong-cho-moi-loai-da.html" title="Review n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Evoluderm Lotion Tonique ch&#x1EA5;t l&#x1B0;&#x1EE3;ng cho m&#x1ECD;i lo&#x1EA1;i da">
                                                        <img data-src="https://adminbeauty.hvnet.vn/Upload/files/2M8A8716.JPG?width=268&height=179&v=18042020" alt="Review n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Evoluderm Lotion Tonique ch&#x1EA5;t l&#x1B0;&#x1EE3;ng cho m&#x1ECD;i lo&#x1EA1;i da" class="img-reponsive owl-lazy" />
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <a href="/review/review-nuoc-hoa-hong-evoluderm-lotion-tonique-chat-luong-cho-moi-loai-da.html" title="Review n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Evoluderm Lotion Tonique ch&#x1EA5;t l&#x1B0;&#x1EE3;ng cho m&#x1ECD;i lo&#x1EA1;i da">
                                                    Review n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Evoluderm Lotion Tonique ch&#x1EA5;t l&#x1B0;&#x1EE3;ng cho m&#x1ECD;i lo&#x1EA1;i da
                                                </a>
                                                <p>
                                                    S&#x1EED; d&#x1EE5;ng n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng &#x111;&#x1EC3; ch&#x103;m s&#xF3;c da t&#x1EEB; l&#xE2;u &#x111;&#xE3; tr&#x1EDF; th&#xE0;nh th&#xF3;i quen c&#x1EE7;a nhi&#x1EC1;u ch&#x1ECB; em ch&#xFA;ng m&#xEC;nh. V&#x1EAD;y trong s&#x1ED1; c&#xE1;c d&#xF2;ng n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng b&#x1EA1;n t&#x1EEB;ng d&#xF9;ng, b&#x1EA1;n &#x111;&#xE3; bi&#x1EBF;t &#x111;&#x1EBF;n d&#xF2;ng n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Evoluderm ch&#x1B0;a nh&#x1EC9;? M&#x1ED9;t d&#xF2;ng n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng c&#xF3; gi&#xE1; b&#xEC;nh d&#xE2;n nh&#x1B0;ng ch&#x1EA5;t l&#x1B0;&#x1EE3;ng th&#xEC; h&#x1EB3;n s&#x1EBD; khi&#x1EBF;n nhi&#x1EC1;u ng&#x1B0;&#x1EDD;i b&#x1EA5;t ng&#x1EDD;.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="/review/review-nuoc-hoa-hong-khong-con-thayers-alcohol-free-witch-hazel-toner.html" title="Review n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng kh&#xF4;ng c&#x1ED3;n Thayers Alcohol Free Witch Hazel Toner">
                                                        <img data-src="https://adminbeauty.hvnet.vn/Upload/files/1472453808_20160824_194734-1.jpg?width=268&height=179&v=18042020" alt="Review n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng kh&#xF4;ng c&#x1ED3;n Thayers Alcohol Free Witch Hazel Toner" class="img-reponsive owl-lazy" />
                                                </a>
                                            </div>
                                            <div class="news-content">
                                                <a href="/review/review-nuoc-hoa-hong-khong-con-thayers-alcohol-free-witch-hazel-toner.html" title="Review n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng kh&#xF4;ng c&#x1ED3;n Thayers Alcohol Free Witch Hazel Toner">
                                                    Review n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng kh&#xF4;ng c&#x1ED3;n Thayers Alcohol Free Witch Hazel Toner
                                                </a>
                                                <p>
                                                    N&#xE0;ng n&#xE0;o &#x111;ang c&#x1EA7;n m&#x1ED9;t s&#x1EA3;n ph&#x1EA9;m n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng m&#xE0; ng&#x1EA1;i c&#x1ED3;n th&#xEC; h&#xE3;y c&#xF9;ng Beauty Garden xem review n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng Thayers Alcohol Free Witch Hazel Toner &#x111;&#x1EC3; ch&#x103;m s&#xF3;c da kh&#x1ECF;e v&#xE0; &#x111;&#x1EB9;p h&#x1A1;n nh&#xE9;! Ch&#x1EAF;c ch&#x1EAF;n c&#xE1;c n&#xE0;ng s&#x1EBD; ph&#x1EA3;i b&#x1EA5;t ng&#x1EDD; tr&#x1B0;&#x1EDB;c d&#xF2;ng n&#x1B0;&#x1EDB;c hoa h&#x1ED3;ng &#x111;ang &#x111;&#x1B0;&#x1EE3;c r&#x1EA5;t nhi&#x1EC1;u c&#xF4; g&#xE1;i y&#xEA;u th&#xED;ch hi&#x1EC7;n nay.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pad-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="h2-customer">

                    <h2>
                        <i class="fa fa-quote-left left" aria-hidden="true"></i>
                        ý kiến khách hàng
                        <i class="fa fa-quote-right right" aria-hidden="true"></i>
                    </h2>

                </div>

                <div class="box-tent">
                    <a href="javascript:void(0)" class="customer-pre bnts-customer">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </a>
                    <div class="owl-carousel box-customer">
                                <div class="item">
                                    <div class="box-inner">
                                        <div class="img-customer">
                                                <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/16112702_10208156288561212_4378727832274056704_o.jpg?width=60&height=60&v=18042020" alt="Ho&#xE0;ng Nhung" class="img-reponsive lazyslide" />
                                        </div>
                                        <a href="https://www.facebook.com/nhugpu/posts/10208235169173178:0" title="Ho&#xE0;ng Nhung" target="_blank">
                                            Gi&#xE1; c&#x1EA3; c&#x1EF1;c d&#x1EC5; ch&#x1ECB;u tr&#xEA;n th&#x1ECB; tr&#x1B0;&#x1EDD;ng m&#x1EF9; ph&#x1EA9;m hi&#x1EC7;n nay. Ch&#x1ECB; nh&#xE2;n vi&#xEA;n h&#xF4;m qua t&#x1B0; v&#x1EA5;n cho m&#xEC;nh r&#x1EA5;t k&#x1EF9;, n&#xEA;n nghe t&#x1B0; v&#x1EA5;n xong mua mu&#x1ED1;n l&#x1EE7;ng c&#x1EA3; t&#xFA;i. S&#x1EBD; l&#xE0; kh&#xE1;ch h&#xE0;ng trung th&#xE0;nh c&#x1EE7;a Beauty Garden.&#xD;&#xA;
                                            <span>Xem chi tiết</span>
                                        </a>
                                        <p><b>Ho&#xE0;ng Nhung</b></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-inner">
                                        <div class="img-customer">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/10406510_213960282128214_4383007999217281369_n.jpg?width=60&height=60&v=18042020" alt="EL Nin&#xF4; " class="img-reponsive owl-lazy" />
                                        </div>
                                        <a href="https://www.facebook.com/permalink.php?story_fbid=522792847911621&amp;id=100005427304915&amp;substory_index=0" title="EL Nin&#xF4; " target="_blank">
                                            H&#xF4;m nay &#x111;&#x1EBF;n shop mua son cho b&#x1EA1;n g&#xE1;i m&#xEC;nh c&#x1EA3;m th&#x1EA5;y r&#x1EA5;t h&#xE0;i l&#xF2;ng v&#x1EC1; b&#x1EA1;n nh&#xE2;n vi&#xEA;n b&#xE1;n h&#xE0;ng , b&#x1EA1;n &#x1EA5;y &#x111;&#xE3; gi&#xFA;p m&#xEC;nh mua &#x111;&#xFA;ng m&#xE0;u son b&#x1EA1;n m&#xEC;nh th&#xED;ch.&#xD;&#xA;Shop &#x111;a d&#x1EA1;ng h&#xE0;ng ho&#xE1; , trang tr&#xED; &#x111;&#x1EB9;p v&#xE0; gi&#xE1; r&#x1EBB; s&#x1EBD; b&#x1EA3;o b&#x1EA1;n g&#xE1;i m&#xEC;nh qua mua h&#xE0;ng th&#x1B0;&#x1EDD#x1EDD;ng xuy&#xEA;n. Mong shop lu&#xF4;n lu&#xF4;n c&#xF3; nh&#x1EEF;ng b&#x1EA1;n nh&#xE2;n vi&#xEA;n t&#x1B0; v&#x1EA5;n nh&#x1B0; b&#x1EA1;n n&#x1EEF; &#x1EA5;y!
                                            <span>Xem chi tiết</span>
                                        </a>
                                        <p><b>EL Nin&#xF4; </b></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-inner">
                                        <div class="img-customer">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/18221904_274323839695722_4187200371973568146_n.jpg?width=60&height=60&v=18042020" alt="Minh Anh" class="img-reponsive owl-lazy" />
                                        </div>
                                        <a href="https://www.facebook.com/daominhanh21101996/posts/193127467815360:0" title="Minh Anh" target="_blank">
                                            Hai l&#x1EA7;n em &#x111;&#x1EBF;n shop mua t&#x1EA9;y da ch&#x1EBF;t ST.IVES v&#xE0; s&#x1EEF;a r&#x1EED;a m&#x1EB7;t. Em &#x111;&#x1EC1;u r&#x1EA5;t th&#xED;ch m&#x1EA5;y ch&#x1ECB; t&#x1B0; v&#x1EA5;n r&#x1EA5;t nhi&#x1EC7;t t&#xEC;nh. &#x110;&#x1EB7;c bi&#x1EC7;t m&#x1EA5;y ch&#x1ECB; lu&#xF4;n t&#x1B0;&#x1A1;i c&#x1B0;&#x1EDD;i k&#x1EC3; c&#x1EA3; ch&#x1ECB; t&#x1B0; v&#x1EA5;n v&#xE0; ch&#x1ECB; thu ng&#xE2;n. Em s&#x1EBD; lu&#xF4;n &#x1EE7;ng h&#x1ED9; shop.
                                            <span>Xem chi tiết</span>
                                        </a>
                                        <p><b>Minh Anh</b></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-inner">
                                        <div class="img-customer">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/17798924_1054472354697871_498115013455581690_n.jpg?width=60&height=60&v=18042020" alt="Linh &#x110;&#x1EAD;u" class="img-reponsive owl-lazy" />
                                        </div>
                                        <a href="https://www.facebook.com/dieu.linh.39794/posts/959429147535526:0" title="Linh &#x110;&#x1EAD;u" target="_blank">
                                            H&#xF4;m nay &#x111;&#x1EBF;n mua SP c&#x1EE7;a shop r&#x1EA5;t chi l&#xE0; th&#xED;ch ch&#x1ECB; nh&#xE2;n vi&#xEA;n &#x111;&#xF3;, do da m&#xEC;nh b&#x1ECB; kh&#xF4; n&#xEA;n ch&#x1ECB; t&#x1B0; v&#x1EA5;n r&#x1EA5;t k&#x1EF9; l&#x1B0;&#x1EE1;ng l&#x1EA1;i hay c&#x1B0;&#x1EDD;i n&#x1EEF;a , ch&#x1ECB; nhi&#x1EC7;t t&#xEC;nh gh&#xEA; c&#x1A1; , sp c&#x1EE7;a shop e v&#x1EC1; d&#xF9;ng th&#xED;ch l&#x1EAF;m lu&#xF4;n &#x1EA1; . C&#x1EA3;m &#x1A1;n ch&#x1ECB; nhi&#x1EC1;u nh&#xE9; , l&#x1EA7;n sau s&#x1EBD; qua v&#xE0; b&#x1EA3;o ch&#x1ECB; t&#x1B0; v&#x1EA5;n ak . Ch&#x1ECB; hay c&#x1B0;&#x1EDD;i.&#xD;&#xA;
                                            <span>Xem chi tiết</span>
                                        </a>
                                        <p><b>Linh &#x110;&#x1EAD;u</b></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-inner">
                                        <div class="img-customer">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/17991991_636655289857415_2024600740020971408_n.jpg?width=60&height=60&v=18042020" alt="Th&#xE1;i Ph&#x1B0;&#x1A1;ng Th&#x1EA3;o" class="img-reponsive owl-lazy" />
                                        </div>
                                        <a href="https://www.facebook.com/yeu.bo.7/posts/573879736134971:0" title="Th&#xE1;i Ph&#x1B0;&#x1A1;ng Th&#x1EA3;o" target="_blank">
                                            Y&#xEA;u Shop. m&#xE3;i &#x1EE7;ng h&#x1ED9; shop. &#x110;&#x1ED3; &#x111;a d&#x1EA1;ng, g&#x1EA7;n nh&#x1B0; l&#xE0; c&#xE1;i g&#xEC; m&#xEC;nh mu&#x1ED1;n mua shop &#x111;&#x1EC1;u c&#xF3; h&#x1EBF;t, m&#xE0; k&#x1EC3; c&#x1EA3; m&#xEC;nh ch&#x1B0;a c&#x1EA7;n mua g&#xEC; th&#xEC; &#x111;&#x1EBF;n shop ki&#x1EC3;u g&#xEC; c&#x169;ng ph&#x1EA3;i khu&#xE2;n 1 c&#xE1;i g&#xEC; &#x111;&#xF3; v&#x1EC1; v&#xEC; h&#xE0;ng l&#xFA;c n&#xE0;o c&#x169;ng tuy&#x1EC7;t v&#x1EDD;i, gi&#xE1; th&#xEC; y&#xEA;u ko th&#x1EC3; t&#x1EA3;.
                                            <span>Xem chi tiết</span>
                                        </a>
                                        <p><b>Th&#xE1;i Ph&#x1B0;&#x1A1;ng Th&#x1EA3;o</b></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-inner">
                                        <div class="img-customer">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/17264338_119423171922471_2018974082884941836_n.jpg?width=60&height=60&v=18042020" alt="Ti&#xEA;u D&#x1B0;&#x1A1;ng" class="img-reponsive owl-lazy" />
                                        </div>
                                        <a href="https://www.facebook.com/duong.tieu.58726/posts/122954438236011:0" title="Ti&#xEA;u D&#x1B0;&#x1A1;ng" target="_blank">
                                            &#x110;&#xE3; mua v&#xE0; c&#x1EF1;c k&#x1EF3; h&#xE0;i l&#xF2;ng. &#x1EDE; &#x110;&#xE0; N&#x1EB5;ng mu&#x1ED1;n t&#xEC;m m&#x1ED9;t n&#x1A1;i c&#xF3; r&#x1EA5;t nhi&#x1EC1;u m&#x1EF9; ph&#x1EA9;m l&#xE0;m &#x111;&#x1EB9;p nh&#x1B0; n&#xE0;y th&#x1EAD;t s&#x1EF1; l&#xE0; r&#x1EA5;t kh&#xF3;.&#xD;&#xA;
                                            <span>Xem chi tiết</span>
                                        </a>
                                        <p><b>Ti&#xEA;u D&#x1B0;&#x1A1;ng</b></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-inner">
                                        <div class="img-customer">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/12651218_945171965579673_4150068264542304142_n.jpg?width=60&height=60&v=18042020" alt="Nguy&#x1EC5;n Hi&#x1EC7;n" class="img-reponsive owl-lazy" />
                                        </div>
                                        <a href="https://www.facebook.com/hientakao/posts/1179142738849260:0" title="Nguy&#x1EC5;n Hi&#x1EC7;n" target="_blank">
                                            S&#x1EA3;n ph&#x1EA9;m ch&#xED;nh h&#xE3;ng nhi&#x1EC1;u kinh kh&#x1EE7;ng, t&#x1EDB;i mua cho v&#x1EE3; m&#xF3;n qu&#xE0; sinh nh&#x1EAD;t m&#xE0; kh&#xF4;ng bi&#x1EBF;t ch&#x1ECD;n lo&#x1EA1;i g&#xEC; may m&#xE0; nh&#x1EDD; m&#x1EA5;y em t&#x1B0; v&#x1EA5;n nhi&#x1EC7;t t&#xEC;nh. C&#x1EA3;m &#x1A1;n Beauty Garden.
                                            <span>Xem chi tiết</span>
                                        </a>
                                        <p><b>Nguy&#x1EC5;n Hi&#x1EC7;n</b></p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-inner">
                                        <div class="img-customer">
                                                <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/16602746_659432207573110_1651129273927689767_n-compressor.jpg?width=60&height=60&v=18042020" alt="Nguy&#x1EC5;n Th&#x1ECB; Tuy&#x1EBF;t Trinh" class="img-reponsive owl-lazy" />
                                        </div>
                                        <a href="https://www.facebook.com/zuize.zin/posts/663035820546082:0" title="Nguy&#x1EC5;n Th&#x1ECB; Tuy&#x1EBF;t Trinh" target="_blank">
                                            Th&#xED;ch mua &#x111;&#x1ED3; &#x1EDF; shop v&#xEC; nh&#xE2;n vi&#xEA;n si&#xEA;u cute, h&#xF4;m tr&#x1B0;&#x1EDB;c m&#xEC;nh gh&#xE9; chi nh&#xE1;nh Ph&#xFA; Nhu&#x1EAD;n &#x111;&#x1B0;&#x1EE3;c ch&#x1ECB; nh&#xE2;n vi&#xEA;n t&#x1B0; v&#x1EA5;n nhi&#x1EC7;t t&#xEC;nh v&#xE0; ch&#x1EC9; th&#xEA;m nhi&#x1EC1;u b&#xED; quy&#x1EBF;t d&#x1B0;&#x1EE1;ng da . Y&#xEA;u Shop...
                                            <span>Xem chi tiết</span>
                                        </a>
                                        <p><b>Nguy&#x1EC5;n Th&#x1ECB; Tuy&#x1EBF;t Trinh</b></p>
                                    </div>
                                </div>

                    </div>
                    <a href="javascript:void(0)" class="customer-nex bnts-customer">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pad-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-litmit">
                    <h2>HỆ THỐNG CỬA HÀNG</h2>
                    <div class="arrow-slider caner">
                        <a href="javascript:void(0)" class="shop-pre btn-pre bnts">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                        <a href="javascript:void(0)" class="shop-nex btn-next bnts">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="box-tent">
                    <div class="owl-carousel box-shop">
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                        <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/banner/cuahangcantho.jpg?width=268&height=178&v=17042020" alt="" class="img-reponsive lazyslide" />
                                                    <div class="map-eage">
                                                        <i class="fa fa-map-marker"></i>
                                                        <p>154 Nguy&#x1EC5;n Vi&#x1EC7;t H&#x1ED3;ng, P.An Ph&#xFA;, Ninh Ki&#x1EC1;u, C&#x1EA7;n Th&#x1A1;</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="news-content shop-content">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                    Chi Nh&#xE1;nh C&#x1EA7;n Th&#x1A1;
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                        <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/banner/cuahangxuanthuy.jpg?width=268&height=178&v=17042020" alt="" class="img-reponsive lazyslide" />
                                                    <div class="map-eage">
                                                        <i class="fa fa-map-marker"></i>
                                                        <p>165C Xu&#xE2;n Th&#x1EE7;y, C&#x1EA7;u Gi&#x1EA5;y, H&#xE0; N&#x1ED9;i</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="news-content shop-content">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                    Chi Nh&#xE1;nh Xu&#xE2;n Th&#x1EE7;y H&#xE0; N&#x1ED9;i
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                        <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/St-bmt.jpg?width=268&height=178&v=17042020" alt="" class="img-reponsive lazyslide" />
                                                    <div class="map-eage">
                                                        <i class="fa fa-map-marker"></i>
                                                        <p>87 Hai B&#xE0; Tr&#x1B0;ng, P.Th&#x1EAF;ng L&#x1EE3;i, Tp.Bu&#xF4;n Ma Thu&#x1ED9;t</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="news-content shop-content">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                    Chi Nh&#xE1;nh Bu&#xF4;n Ma Thu&#x1ED9;t - &#x110;&#x103;kL&#x103;k
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                        <img data-cument="https://adminbeauty.hvnet.vn/Upload/Files/st-tp-hcm.jpg?width=268&height=178&v=17042020" alt="" class="img-reponsive lazyslide" />
                                                    <div class="map-eage">
                                                        <i class="fa fa-map-marker"></i>
                                                        <p>17 Nguy&#x1EC5;n S&#x1A1;n, P.Ph&#xFA; Th&#x1EA1;nh, Q.T&#xE2;n Ph&#xFA;, TP H&#x1ED3; Ch&#xED; Minh</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="news-content shop-content">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                    Chi Nh&#xE1;nh T&#xE2;n Ph&#xFA; - TP H&#x1ED3; Ch&#xED; Minh
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                        <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/da-2.jpg?width=268&height=178&v=17042020" alt="" class="img-reponsive owl-lazy" />
                                                    <div class="map-eage">
                                                        <i class="fa fa-map-marker"></i>
                                                        <p>94 &#xC2;u C&#x1A1;, P.H&#xF2;a Kh&#xE1;nh B&#x1EAF;c, Q.Li&#xEA;n Chi&#x1EC3;u, TP. &#x110;&#xE0; N&#x1EB5;ng</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="news-content shop-content">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                    Chi Nh&#xE1;nh &#x110;&#xE0; N&#x1EB5;ng 2
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                        <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/beautygardenquan9.jpg?width=268&height=178&v=17042020" alt="" class="img-reponsive owl-lazy" />
                                                    <div class="map-eage">
                                                        <i class="fa fa-map-marker"></i>
                                                        <p>435 L&#xEA; V&#x103;n Vi&#x1EC7;t, T&#x103;ng Nh&#x1A1;n Ph&#xFA; A, Qu&#x1EAD;n 9, TP H&#x1ED3; Ch&#xED; Minh</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="news-content shop-content">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                    Chi Nh&#xE1;nh Qu&#x1EAD;n 9 - TP H&#x1ED3; Ch&#xED; Minh
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                        <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/beautygardenpleiku.jpg?width=268&height=178&v=17042020" alt="" class="img-reponsive owl-lazy" />
                                                    <div class="map-eage">
                                                        <i class="fa fa-map-marker"></i>
                                                        <p>79 Hai B&#xE0; Tr&#x1B0;ng, Ph&#x1B0;&#x1EDD;ng Di&#xEA;n H&#x1ED3;ng, TP Pleiku, Gia Lai</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="news-content shop-content">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                    Chi Nh&#xE1;nh Pleiku - Gia Lai
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="box-news">
                                        <div class="bor-s">
                                            <div class="news-img">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                        <img data-src="https://adminbeauty.hvnet.vn/Upload/Files/hanoi.jpg?width=268&height=178&v=17042020" alt="" class="img-reponsive owl-lazy" />
                                                    <div class="map-eage">
                                                        <i class="fa fa-map-marker"></i>
                                                        <p>152 Ch&#xF9;a B&#x1ED9;c, &#x110;&#x1ED1;ng &#x110;a, H&#xE0; N&#x1ED9;i </p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="news-content shop-content">
                                                <a href="javascript:void(0)" data-url="" onclick="OpenMoal(this)">
                                                    Chi Nh&#xE1;nh H&#xE0; N&#x1ED9;i
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="10/2/2020 11:59:00 PM" data-id="True" id="Prosale" />

    </main>

<footer class="border-top footer text-muted">
    <div class="footer-first">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="box-info">
                        <span> HỆ THỐNG CỬA HÀNG</span>
                        <ul class="ul-non ul-info">
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.506146063703!2d106.67983231483649!3d10.772492462211874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2168dde56b%3A0x6ae5a065a26dccde!2sBeauty%20Garden!5e0!3m2!1svi!2s!4v1586850406286!5m2!1svi!2s" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Quận 3 Tp.HCM
                                    </b>
                                    - Số 71, Đường số 3, Cư Xá Đô Thành, P4, Q3 - 0911 784 114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.181426292888!2d106.67897581469529!3d10.797412592307257!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528d6c415c955%3A0x1528b3de647ab027!2zMjgwIFBoYW4gxJDDrG5oIFBow7luZywgUGjGsOG7nW5nIDEsIFBow7ogTmh14bqtbiwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1587613114689!5m2!1svi!2s" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Q.Phú Nhuận Tp.HCM
                                    </b>
                                    - 280 Phan Đình Phùng, P.3, Q.Phú Nhuận - 0911 384 114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7837.118984785582!2d106.79197800000001!3d10.844984!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x37fb819462e9c33b!2zQmVhdXR5IEdhcmRlbiAoSOG7hyBUaOG7kW5nIE3hu7kgUGjhuqltIENow61uaCBow6NuZyAp!5e0!3m2!1sen!2sus!4v1586851454403!5m2!1sen!2sus" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Q.9 Tp.HCM
                                    </b>
                                    - 435 Lê Văn Việt, Tăng Nhơn Phú A, Q.9 - 0911.484.114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.796294140641!2d106.632957!3d10.780787!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f0dfa4d3a4f%3A0x472bcdd9525c3fd7!2sBeauty%20Garden%20-%20T%C3%A2n%20Ph%C3%BA!5e0!3m2!1svi!2sus!4v1586851550998!5m2!1svi!2sus" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Q.Tân Phú Tp.HCM
                                    </b>
                                    - 17 Nguyễn Sơn, Phú Thạnh, Q.Tân Phú 0911.174.114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7449.167865570996!2d105.82476!3d21.009309!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac81dd101bfd%3A0x6921dcee87047a3b!2sBeauty%20Garden!5e0!3m2!1svi!2sus!4v1586851632428!5m2!1svi!2sus" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Hà Nội
                                    </b>
                                    - 152 Chùa Bộc, Đống Đa, Hà Nội - 0911 584 114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.9120606482597!2d105.78411161482066!3d21.0362043929002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4a748ee167%3A0x4d8a95bdb7a8a30!2zTmfDtSAxNjVDLCBYdcOibiBUaOG7p3ksIEThu4tjaCBW4buNbmcgSOG6rXUsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1592129556282!5m2!1svi!2s" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Hà Nội
                                    </b>
                                    - 165C Xuân Thủy, Cầu Giấy, Hà Nội - 0911.464.114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7668.437362101784!2d108.219277!3d16.054138!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xaaf85194723f8da0!2sBeauty%20Garden!5e0!3m2!1svi!2sus!4v1586851719328!5m2!1svi!2sus" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Đà Nẵng
                                    </b>
                                    - 268 Trưng Nữ Vương, P.Bình Thuận, Q.Hải Châu - 0911 684 114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7667.797888151916!2d108.14820200000001!3d16.070733!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142190b6f039953%3A0x6f63baf0fc4f133d!2zQmVhdXR5IEdhcmRlbiAoSOG7hyBUaOG7kW5nIE3hu7kgUGjhuqltIENow61uaCBIw6NuZyk!5e0!3m2!1svi!2sus!4v1586851763324!5m2!1svi!2sus" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Đà Nẵng
                                    </b>
                                    - 94 Âu Cơ, P.Hòa Khánh Bắc, Q.Liên Chiểu, TP. Đà Nẵng - 0911.794.114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7743.299855649141!2d107.994139!3d13.979431!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316c1f2a95123ddf%3A0x165c680e2d90bcbf!2sBeauty%20Garden%20(chi%20nh%C3%A1nh%20Gia%20Lai)!5e0!3m2!1sen!2sus!4v1586851872004!5m2!1sen!2sus" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Gia Lai
                                    </b>
                                    - 79 Hai Bà Trưng, P.Diên Hồng, Tp.Pleiku - 0911.520.114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3892.449104911124!2d108.044288!3d12.684084!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x88ad5f499d631d80!2sBeauty%20Garden%20-%20Bu%C3%B4n%20Ma%20Thu%E1%BB%99t!5e0!3m2!1svi!2sus!4v1586851943823!5m2!1svi!2sus" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Đắk Lắk
                                    </b>
                                    - 87 Hai Bà Trưng, P.Thắng Lợi, TP.Buôn Ma Thuột - 0911.074.114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" data-url="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.835329599595!2d105.77405951471812!3d10.03044397526167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a088218097e8ad%3A0x9d8ae3002404b305!2zMTU0IE5ndXnhu4VuIFZp4buHdCBI4buTbmcsIFh1w6JuIEtow6FuaCwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1592129658474!5m2!1svi!2s" onclick="OpenMoal(this)">
                                    <b>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Cần Thơ
                                    </b>
                                    - 154 Nguyễn Việt Hồng, P.An Phú, Ninh Kiều, Cần Thơ - 0911.504.114
                                    <div class="map-mages img-luna"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="box-info">
                        <span> VỀ CHÚNG TÔI</span>
                        <ul class="ul-non ul-infos">
                            <li><a href="/noi-dung/he-thong-cua-hang.html">Hệ thống cửa hàng</a></li>
                            <li><a href="/noi-dung/gioi-thieu-beautygarden.html">Giới thiệu Beautygarden</a></li>
                            <li><a href="/noi-dung/lien-ket.html">Liên kết</a></li>
                            <li><a href="/noi-dung/bao-mat-thong-tin.html">Bảo mật thông tin</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="box-info">
                        <span> HỖ TRỢ</span>
                        <ul class="ul-non ul-info ul-infos">
                            <li><a href="/noi-dung/giai-dap-thac-mac.html">Giải đáp thắc mắc</a></li>
                            <li><a href="/noi-dung/huong-dan-mua-hang.html">Hướng dẫn mua hàng</a></li>
                            <li><a href="/noi-dung/thanh-toan-van-chuyen.html">Thanh toán & Vận chuyển</a></li>
                            <li><a href="/noi-dung/chinh-sach-doi-tra-hang.html">Chính sách đổi trả hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="box-info">
                        <span> ĐĂNG KÝ NHẬN THÔNG TIN KHUYẾN MÃI</span>
                        <div>
                            <form class="example form-inline">
                                <input type="text" class="form-control ip-send" id="sendmail" placeholder="Vui lòng nhập email..." name="search2">
                                <button type="button" class="btn btn-send" onclick="sendmailfooter()">GỬI</button>
                            </form>
                        </div>
                        <span class="non-back"> LIÊN KẾT</span>
                        <ul class="ul-non ul-sofooter">
                            <li><a href="https://www.facebook.com/BeautyGardenCosmetics/" target="_blank" class="a-fb" ><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.instagram.com/beautygarden.vn/" target="_blank" class="a-it"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="https://www.pinterest.com/BeautyGardenvn/" target="_blank" class="a-pn"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            <li><a href="https://plus.google.com/u/4/101900698437907415834" target="_blank" class="a-gg"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                        <div class="clr"></div>
                        <div class="mar-top-10">
                            <a href="https://www.dmca.com/Protection/Status.aspx?ID=31bbc2bc-e92e-4421-ab72-4d4e9809c626&amp;refurl=https://beautygarden.vn/" title="DMCA.com Protection Status" class="dmca-badge" target="_blank">
                                <div class="img-luna img-dmca"></div>
                            </a>
                            <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-md-6 ">
                    <div class="box-info">
                        <span> WEBSITE THUỘC QUYỀN</span>
                        <ul class="ul-non ul-infos">
                            <li>CÔNG TY CỔ PHẦN BEAUTY GARDEN</li>
                            <li>ĐKKD số: 0314635748</li>
                            <li>Do Sở KH&ĐT Tp. HCM Cấp ngày 21/09/2017</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="box-info">
                        <span> TRỤ SỞ CHÍNH</span>
                        <ul class="ul-non ul-infos">
                            <li><a >Địa chỉ: 255 Bình Lợi, P. 13, Q. Bình Thạnh. Tp.HCM</a></li>
                            <li><a >Tel: 02 873 000 283 - Email: info@beautygarden.vn</a></li>
                            <li><a >Website: www.beautygarden.vn</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="box-info">
                        <a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=38375" target="_blank">
                            <div class="img-luna img-ct"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-second">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p class="p-naio">Hệ Thống Phân Phối Mỹ Phẩm Chính Hãng</p>
                </div>
                <div class="col-lg-6">
                    <div>
                        <p class="p-pokm">
                            <b>Xu hướng tìm kiếm:</b>

        <span><a href="/tim-kiem.html?keyword=son">son</a>, </span>
        <span><a href="/tim-kiem.html?keyword=kem duong">kem duong</a>, </span>
        <span><a href="/tim-kiem.html?keyword=innisfree">innisfree</a>, </span>
        <span><a href="/tim-kiem.html?keyword=sua rua mat the face shop">sua rua mat the face shop</a>, </span>
        <span><a href="/tim-kiem.html?keyword=kem chong nang">kem chong nang</a>, </span>
        <span><a href="/tim-kiem.html?keyword=mat na">mat na</a>, </span>
        <span><a href="/tim-kiem.html?keyword=dau tay trang cleansing oil   the face shop 200ml">dau tay trang cleansing oil   the face shop 200ml</a>, </span>
        <span><a href="/tim-kiem.html?keyword=neutrogena">neutrogena</a>, </span>
        <span><a href="/tim-kiem.html?keyword=3ce">3ce</a>, </span>
        <span><a href="/tim-kiem.html?keyword=xit khoang">xit khoang</a>, </span>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    <div class="overlay"></div>
    <div class="overlay-tt"></div>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <button type="button" class="btn-res" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <div id="load-iframe">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalBranh" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="load-branh">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://beautygarden.vn/js/site.min.js?v=FUlDSDE-So_E1TbAzFTt_o_iNGH1YrmIfm9aUJ6vIZ4"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>
    <script>
        fbq('track', 'CompleteRegistration');
    </script>

    <script>
        $(document).ready(function () {
            Killer();
        });
        function Killer() {
            var isSale = $("#Prosale").attr("data-id");
            if (isSale == "True") {
                var date = $("#Prosale").val();
                var datekiller = Date.parse(date);
                LoadDateCounter(datekiller);
            }
        }
        function LoadDateCounter(datekiller) {
            // Set the date we're counting down to
            var countDownDate = datekiller;

            // Update the count down every 1 second
            var x = setInterval(function () {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = ("0" + Math.floor(distance / (1000 * 60 * 60 * 24))).slice(-2);
                var hours = ("0" + Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).slice(-2);
                var minutes = ("0" + Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).slice(-2);
                var seconds = ("0" + Math.floor((distance % (1000 * 60)) / 1000)).slice(-2);

                // Output the result in an element with id="demo"
                var dax = "<div class=\"cd-days\">" + days + " Days</div> : ";
                var hourx = "<div class=\"cd-days\">" + hours + " Hrs</div> : ";
                var minutx = "<div class=\"cd-days\">" + minutes + " Mins</div> : ";
                var seconx = "<div class=\"cd-days\">" + seconds + " Secs</div>";
                document.getElementById("count-dow").innerHTML = dax + hourx + minutx + seconx;

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("count-dow").innerHTML = "EXPIRED";
                }
            }, 1000);
        }
    </script>
    <script>
        $(function () {
            $('#carouselExampleIndicators').on('slide.bs.carousel', function (ev) {
                var lazy;
                lazy = $(ev.relatedTarget).find("img.lazy-load");
                lazy.attr("src", lazy.data('src'));
                lazy.removeAttr("data-src");
                lazy.removeClass("lazy-load");
            });
        });
    </script>
    <script>
        var owls = $('.slider-sale');
        owls.owlCarousel({
            margin: 10,
            loop: true,
            lazyLoad: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });
        $('.sf-nex').click(function () {
            owls.trigger('next.owl.carousel');
        });
        $('.sf-pre').click(function () {
            owls.trigger('prev.owl.carousel');
        });


        var owlnew = $('.new-sale');
        owlnew.owlCarousel({
            margin: 10,
            lazyLoad: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });
        $('.new-nex').click(function () {
            owlnew.trigger('next.owl.carousel');
        });
        $('.new-pre').click(function () {
            owlnew.trigger('prev.owl.carousel');
        });

        var owlbrand = $('.box-img');
        owlbrand.owlCarousel({
            margin: 40,
            lazyLoad: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                }
            }
        });

        $('.brand-nex').click(function () {
            owlbrand.trigger('next.owl.carousel');
        });
        $('.brand-pre').click(function () {
            owlbrand.trigger('prev.owl.carousel');
        });

        var owlnews = $('.box-tintuc');
        owlnews.owlCarousel({
            margin: 5,
            lazyLoad: true,
            autoplayTimeout: 8000,
            responsive: {
                0: {
                    items: 1
                },
                375: {
                    items: 1
                },
                480: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });

        $('.news-nex').click(function () {
            owlnews.trigger('next.owl.carousel');
        });
        $('.news-pre').click(function () {
            owlnews.trigger('prev.owl.carousel');
        });

        var owlcustomer = $('.box-customer');
        owlcustomer.owlCarousel({
            margin: 0,
            lazyLoad: true,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                375: {
                    items: 1
                },
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('.customer-nex').click(function () {
            owlcustomer.trigger('next.owl.carousel');
        });
        $('.customer-pre').click(function () {
            owlcustomer.trigger('prev.owl.carousel');
        });

        var owlshop = $('.box-shop');
        owlshop.owlCarousel({
            margin: 10,
            lazyLoad: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                375: {
                    items: 1
                },
                480: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });

        $('.shop-nex').click(function () {
            owlshop.trigger('next.owl.carousel');
        });
        $('.shop-pre').click(function () {
            owlshop.trigger('prev.owl.carousel');
        });
    </script>
    <script>
        $('#carouselExampleIndicators').on("slide", function (e) {

            //SCROLLING LEFT
            var prevItem = $('.active.item', this).prev('.item');

            //Account for looping to LAST image
            if (!prevItem.length) {
                prevItem = $('.active.item', this).siblings(":last");
            }

            //Get image selector
            prevImage = prevItem.find('img');

            //Remove class to not load again - probably unnecessary
            if (prevImage.hasClass('lazy-load')) {
                prevImage.removeClass('lazy-load');
                prevImage.attr('src', prevImage.data('lazy-load-src'));
            }

            //SCROLLING RIGHT
            var nextItem = $('.active.item', this).next('.item');

            //Account for looping to FIRST image
            if (!nextItem.length) {
                nextItem = $('.active.item', this).siblings(":first");
            }

            //Get image selector
            nextImage = nextItem.find('img');

            //Remove class to not load again - probably unnecessary
            if (nextImage.hasClass('lazy-load')) {
                nextImage.removeClass('lazy-load');
                nextImage.attr('src', nextImage.data('data-src'));
            }

        });
    </script>

    <script type="application/ld+json">
        {
        "@context":"http://schema.org",
        "@type":"Organization",
        "name":"Beautygarden",
        "url":"https://beautygarden.vn/",
        "logo":"https://beautygarden.vn/images/logomoi.png",
        "sameAs":["https://www.facebook.com/BeautyGardenCosmetics","","https://www.instagram.com/beautygarden.cosmetics"],
        "contactPoint": [{ "@type": "ContactPoint","telephone": "+84 0911384114","contactType": "customer service","contactOption": "TollFree","areaServed": "VN"},{"@type": "ContactPoint","telephone": "+84 0911384114","contactType": "sales","contactOption": "TollFree","areaServed": "VN"}]
        }
    </script>

    <script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "LocalBusiness",
        "priceRange":"$$",
        "image":"https://beautygarden.vn/images/logomoi.png",
        "name" : "CÔNG TY TNHH HVNET",
        "telephone":"+84 0912 999 847",
        "address": {"@type": "PostalAddress","streetAddress": "255 Bình Lợi, P.13, Q.Bình Thạnh","addressLocality": "Hà Nội"}
        }
    </script>


    <script>
        window.onload = function (e) {
            CheckBrand();
            SetFistUrl();
        };
        var loadding = 1;
        $(".box-pdseen").hover(function () {
            $('.box-after').css("display", "block").css("visibility", "visible");
            if (loadding == 1) {
                LoadDataProductSeen();
                loadding = 2;
            }
        }, function () {
            $('.box-after').css("display", "none").css("visibility", "hidden");
        });

        function LoadProducts() {
            $('.slider-productseen').owlCarousel({
                margin: 5,
                //loop: true,
                lazyLoad: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 12
                    }
                }
            });
        }

        function LoadDataProductSeen() {
            $.ajax({
                url: '/Ajax/CallProductSeen',
                datatype: 'application/json',
                type: 'POST',
                success: function (result) {
                    $("#load-seen").html(result);
                    LoadProducts();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus + ", " + errorThrown);
                }
            });
        }

        /*Kiểm tra khách hàng đã chọn vùng miền chưa*/
        function CheckBrand() {
            $.ajax({
                url: '/Ajax/CheckIdBranch',
                datatype: 'application/json',
                type: 'POST',
                success: function (result) {
                    if (result.success == false) {
                        $("#ModalBranh").modal('show');
                        var _rs = HtmlBranh();
                        $("#load-branh").html(_rs);
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus + ", " + errorThrown);
                }
            });
        }
        function HtmlBranh() {
            var html = "";
            html += "<div class=\"branh-box\">";
            html += "<div class=\"title-btans\"><span><b>CHỌN KHU VỰC GẦN BẠN NHẤT</b></span></div>";
            html += "<div class=\"ties-oi\"><span>Bạn có thể chọn lại khu vực ở đầu trang</span></div>";
            html += "<button type=\"button\" onclick=\"SetBranh('48611')\">Miền Nam</button>";
            html += "<button type=\"button\" onclick=\"SetBranh('48610')\">Miền Trung </button>";
            html += "<button type=\"button\" onclick=\"SetBranh('48609 ')\">Miền Bắc </button>";
            html += "</div>";
            return html;
        }

        /*hàm chọn vùng miền*/
        function SetBranh(e) {
            $.ajax({
                url: '/Ajax/AddIdBranch',
                datatype: 'application/json',
                data: { 'Id': e },
                type: 'POST',
                success: function (result) {
                    location.reload();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus + ", " + errorThrown);
                }
            });
        }

        function SetFistUrl() {

            $.ajax({
                url: '/Ajax/AddFirstLink',
                datatype: 'application/json',
                data: { 'url': window.location.href },
                type: 'POST',
                success: function (result) {
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus + ", " + errorThrown);
                }
            });
        }
    </script>
    <script>
        $(function () {
            $('.lazy').lazy({
                effect: "fadeIn",
                effectTime: 1500,
                threshold: 0
            });
        });
    </script>
</body>
</html>
