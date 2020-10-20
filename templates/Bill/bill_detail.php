<?php

use Cake\Routing\Router;
?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết hóa đơn</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chi tiết hóa đơn</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Hóa đơn</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Tên người mua</label>
                                    <input type="text" value="<?= $user->full_name ?>" disabled="disabled" class="form-control" placeholder="Tên người mua">
                                </div>
                                <div class="form-group">
                                    <div class="form-group mt-3">
                                        <label for="">Số điện thoại</label>
                                        <input type="text" value="<?= $user->phone ?>" disabled="disabled" class="form-control" placeholder="Số điện thoại">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="">Tình trạng hóa đơn</label><br>
                                        <button type="button" class="btn btn-primary">
                                            <?php
                                            switch ($bill->status) {
                                                case 0:
                                                    echo "Chưa xác nhận";
                                                    break;
                                                case 1:
                                                    echo "Đang xử lý";
                                                    break;
                                                case 2:
                                                    echo "Đang giao hàng";
                                                    break;
                                                case 3:
                                                    echo "Hoàn thành";
                                                    break;
                                                case 4:
                                                    echo "Hủy";
                                                    break;
                                            }
                                            ?>
                                        </button>
                                    </div>
                                    <div class="price">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" disabled="disabled" value="<?= $user->email ?>" class="form-control" placeholder="Nhập giá">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" disabled="disabled" class="form-control" value="<?= $user->address ?>" placeholder="Nhập số lượng">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Danh sách sản phẩm </label>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Tên sản phẩm</th>
                                                    <th scope="col">Ảnh</th>
                                                    <th scope="col">Điểm</th>
                                                    <th scope="col">Giá</th>
                                                    <th scope="col">Số lượng</th>
                                                    <th scope="col">Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $total_point = 0;
                                                $total_price = 0;
                                                $total = 0; ?>
                                                <?php foreach ($products as $product) : ?>
                                                    <tr>
                                                        <td><?= $product->name ?></td>
                                                        <td><img src="<?= Router::url('/images/product/' . $product->image, true) ?>" style="width:50px" alt=""></td>
                                                        <td>
                                                            <?php
                                                            if ($product->type_product == 0) {
                                                                echo "+50POINT";
                                                            } else {
                                                                echo 0;
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if ($product->price == '' && $product->point == '') {
                                                                echo 0;
                                                            } elseif ($product->price == 0) {
                                                                $total_point += $product->amount * $product->point;
                                                                $total = ($product->amount * $product->point) . " POINT";
                                                                echo $product->point . " POINT";
                                                            } elseif ($product->point == 0) {
                                                                $total_price += $product->amount * $product->price;
                                                                $total = number_format($product->amount * $product->price, 0, '.', '.') . " VNĐ";
                                                                echo number_format(
                                                                    $product->price,
                                                                    0,
                                                                    '.',
                                                                    '.'
                                                                ) . " VNĐ";
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?= $product->amount ?>
                                                        </td>
                                                        <td><?= $total ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td colspan="6" style="text-align: center;">
                                                        Tổng tiền:
                                                        <?php
                                                        if ($total_point == 0 && $total_price == 0) {
                                                            echo 0;
                                                        } elseif ($total_point == 0) {
                                                            echo number_format($total_price, 0, '.', '.') . " VNĐ";
                                                        } elseif ($total_price == 0) {
                                                            echo $total_point . " POINT";
                                                        } else {
                                                            echo number_format($total_price, 0, '.', '.') .
                                                                " VNĐ và " . $total_point . " POINT";
                                                        }

                                                        if($user->address != "Hà Nội")
                                                        {
                                                            echo " và 30.000 phí vận chuyển";
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(".btn-primary").click(function() {
        const id_bill = <?= $bill->id ?>;
        (async () => {
            const {
                value: status
            } = await Swal.fire({
                title: 'Chọn tình trạng',
                input: 'select',
                inputOptions: {
                    0: 'Chưa xác nhận',
                    1: 'Đang xử lí',
                    2: 'Đang giao hàng',
                    3: 'Hoàn thành',
                    4: 'Hủy đơn hàng'
                },
                inputPlaceholder: 'Chọn 1 tình trạng cho đơn hàng',
                showCancelButton: true,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value) {
                            resolve()
                        } else {
                            resolve('Bạn cần chọn 1 tình trạng cho đơn hàng')
                        }
                    })
                }
            })

            if (status) {
                $.ajax({
                    type: "GET",
                    url: "<?= Router::url('/admin/change-status-bill', true) ?>",
                    data: {
                        id_bill: id_bill,
                        status: status,
                        id_user: <?= $user->id ?>
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response.status == 200) {
                            switch (status) {
                                case "0":
                                    $(".btn-primary").html("Chưa xác nhận");
                                    break;
                                case "1":
                                    $(".btn-primary").html("Đang xử lí");
                                    break;
                                case "2":
                                    $(".btn-primary").html("Đang giao hàng");
                                    break;
                                case "3":
                                    $(".btn-primary").html("Hoàn thành");
                                    break;
                                case "4":
                                    $(".btn-primary").html("Hủy đơn hàng");
                                    break;
                            }
                        }
                    }
                });
            }
        })()
    });
</script>
