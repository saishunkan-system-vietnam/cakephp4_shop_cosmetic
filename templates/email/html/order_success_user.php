<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            text-align: center;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h3>
        Xin chào <?= $user->full_name ?>
    </h3>
    <p>Bạn đã hoàn thành các thủ tục đơn hàng bạn vui lòng xem lại hóa đơn gồm các sản phẩm dưới đây nếu có sai xót gì thì ....</p>
    <table border="1" cellspacing="0" cellpadding="0" width="80%">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Point</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Tổng point</th>
        </tr>
        <?php
            $total_point = 0;
            $total_price = 0;
            $pointAward = 0;
            $pointPayable = 0;
            foreach($products as $product):
        ?>
            <tr>
                <td><?= $product->name ?></td>
                <td><?= !empty($product->price) ? number_format($product->price,0,'.','.')." VNĐ" : '0' ?></td>
                <td>
                    <?php
                        if($product->type_product == NORMAL_TYPE)
                        {
                            $pointAward += 50 * $product->amount;
                            echo "+50 POINT";
                        }elseif($product->type_product == GIFT_TYPE){
                            echo "-$product->point POINT";
                        }
                    ?>
                </td>
                <td><?= $product->amount ?></td>
                <td>
                    <?php
                        if($product->type_product == NORMAL_TYPE){
                            $total_price += $product->price * $product->amount;
                            echo number_format($product->price,0,'.','.')." VNĐ";
                        }else{
                            echo 0;
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if($product->type_product == GIFT_TYPE){
                            $total_point += $product->point * $product->amount;
                            echo $product->point." POINT";
                        }else{
                            echo 0;
                        }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td style="text-align: center;" colspan="6">
                Thêm <?= number_format($transport->price,0,'.','.')." VNĐ phí vận chuyển của hình thức $transport->name" ?>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;" colspan="6">Tổng tiền:
            <?php
                $total_price += $transport->price;
                $total_point = $total_point - $pointAward;
                if($total_point == 0)
                {
                    echo number_format($total_price,0, '.', '.')." VNĐ";
                }else{
                    echo number_format($total_price,0, '.', '.')." VNĐ và $total_point POINT";
                }
            ?>
            </td>
        </tr>
    </table>
</body>
</html>
