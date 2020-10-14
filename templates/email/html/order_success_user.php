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
        Xin chào <?= $user_name ?>
    </h3>
    <p>Bạn đã hoàn thành các thủ tục đơn hàng bạn vui lòng xem lại hóa đơn gồm các sản phẩm dưới đây nếu có sai xót gì thì ....</p>
    <table border="1" cellspacing="0" cellpadding="0" width="80%">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Point</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
        <?php
            $point = 0;
            $price = 0;
            foreach($products as $product):
        ?>
            <tr>
                <td><?= $product->name ?></td>
                <td><?= !empty($product->price) ? number_format($product->price,0,'.','.')." VNĐ" : '0' ?></td>
                <td><?= !empty($product->point) ? $product->point." POINT" : '0' ?></td>
                <td><?= $product->amount ?></td>
                <td>
                    <?php
                        if(!empty($product->price)){
                            $price += $product->price * $product->amount;
                            echo number_format($product->price * $product->amount,0,'.','.')." VNĐ";
                        }
                        elseif(!empty($product->point))
                        {
                            $point += $product->point * $product->amount;
                            echo $product->point * $product->amount." POINT";
                        }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td style="text-align: center;" colspan="5">Tổng tiền:
            <?php
                if($point > 0 && $price >0)
                {
                    echo number_format($price,0,'.','.')." VNĐ và ". $point." POINT";
                }
                elseif($point > 0 && $price == 0)
                {
                    echo $point." POINT";
                }
                else{
                    echo number_format($price,0,'.','.')." VNĐ";
                }
            ?>
            </td>
        </tr>
    </table>
</body>
</html>
