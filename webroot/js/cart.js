$(document).ready(function () {
    $('.icon-plus').click(function () {
        var index = $(".icon-plus").index(this);
        editCart($(this).attr('id_product'),1,index);
    });


    $('.icon-minus').click(function () {
        var index = $(".icon-minus").index(this);
        editCart($(this).attr('id_product'),-1,index);
    });

    function editCart(id_product,quantity,index)
    {
        $.ajax({
            type: "GET",
            url: url_add_to_cart,
            data: {
                id_product: id_product,
                quantity: quantity,
                location: $("#address").val()
            },
            dataType: "JSON",
            success: function (response) {
                var err = 'Xin lỗi bạn vì sự bất tiện này hiện tại server chúng tôi đang lỗi hẹn gặp lại bạn vào khi khác!!!';
                $(".quantity").each(function(){
                    if($(this).attr('id_product') == response.data && response.status == 201)
                    {
                        $(".quantity")[index].innerHTML = parseInt($(".quantity")[index].innerHTML) + quantity;
                        $("#checkout_items").html(parseInt($("#checkout_items").html()) + quantity);
                        $(".column5")[index+1].innerText = response.total;
                        $(".total").html(response.all_total);
                        if($(".quantity")[index].innerHTML == "0")
                        {
                            $(".table100 tbody tr")[index].remove();
                            if($(".table100 tbody tr").length == 2 || $(".table100 tbody tr").length == 1)
                            {
                                $(".all_total").remove();
                                $(".transport_fee td").remove();
                                const home = url_home;
                                $(".limiter .table100").append(`<a href='${home}'>Vui lòng quay lại để thêm sản phẩm vào giỏ hàng</a>`);
                            }
                        }
                    }else if(response.status != 201){
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
                })
            }
        });
    }

    $('.close').click(function(){
        var index = $('.close').index(this);
        $.ajax({
            type: "GET",
            url: url_remove_from_cart,
            data: {
                id_product: $(this).attr('id_product')
            },
            dataType: "JSON",
            success: function (response) {
                if(response.status == true)
                {
                    const quantity = $('.quantity')[index].innerText;
                    $(".table100 tbody tr")[index].remove();
                    $("#checkout_items").html(parseInt($("#checkout_items").html()) - quantity);
                    $(".total").html(response.all_total);
                    if($(".table100 tbody tr").length == 2 || $(".table100 tbody tr").length == 2)
                    {
                        $(".transport_fee td").remove();
                        $(".all_total").remove();
                        const home = url_home;
                        $(".limiter .table100").append(`<a href='${home}'>Vui lòng quay lại để thêm sản phẩm vào giỏ hàng</a>`);
                    }
                }
            }
        });
    });

    $("#address").keyup(function () {
        var string = $(".total").html();
        var total_price = 0;
        if($(this).val() == "Hà Nội")
        {
            $("tbody tr td.column5").each(function () {
                var price = $(this)[0].innerHTML;
                price = price.replace('.','');
                price = price.replace('₫','');
                total_price += parseInt(price);
            })
            $(".transport_fee").remove();
            $(".total").html(formatMoney(total_price,0,'.','.')+"₫");
        }
        else{
            $(".transport_fee").remove();
            $(`<tr class="transport_fee">
                <td colspan="7">
                    Thêm 30.000₫ phí vận chuyển
                </td>
            </tr>`).insertBefore('.tt')
            $("tbody tr td.column5").each(function () {
                var price = $(this)[0].innerHTML;
                price = price.replace('.','');
                price = price.replace('₫','');
                total_price += parseInt(price);
            })
            total_price += 30000;
            $(".total").html(formatMoney(total_price,0,'.','.')+"₫");
        }
    });

    function formatMoney(amount, decimalCount = 2, decimal = ".", thousands = ".") {
        try {
            decimalCount = Math.abs(decimalCount);
            decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

            const negativeSign = amount < 0 ? "-" : "";

            let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
            let j = (i.length > 3) ? i.length % 3 : 0;

            return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
        } catch (e) {
            console.log(e)
        }
    }

    $("#transport").change(function () {
        $.ajax({
            type: "GET",
            url: url_change_transport,
            data: {
                transport_id:$(this).val()
            },
            dataType: "JSON",
            success: function (response) {

            }
        });
    });
});
