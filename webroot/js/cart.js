var err = 'Xin lỗi bạn vì sự bất tiện này hiện tại server chúng tôi đang lỗi hẹn gặp lại bạn vào khi khác!!!';
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
                product_id: id_product,
                quantity: quantity,
                transport_id: $("#transport").val()
            },
            dataType: "JSON",
            success: function (response) {
                $(".quantity").each(function(){
                    if($(this).attr('id_product') == parseInt(response.product_id) && response.status == 201)
                    {
                        $(".quantity")[index].innerHTML = parseInt($(".quantity")[index].innerHTML) + quantity;
                        $(".column5")[index+1].innerText = response.current_price;
                        $(".point")[index].innerText = response.current_point == 0 ? 0 : response.current_point+' point';
                        $(".point_award")[index].innerText =
                        response.current_point_award == 0 ? 0 : '+'+response.current_point_award+' point';
                        $(".total_point").html(response.point_to_pay);
                        $(".subtract_result").html(`
                            <span class="text-minus"> - </span>${response.point_award}
                            <span class="result"> = </span> ${response.point_to_pay - response.point_award} point
                        `);

                        if(response.point_to_pay - response.point_award > 0)
                        {
                            $(".column8").remove();
                            $(`
                                <tr class="column8">
                                    <td colspan="6" style="text-align: end;">Point còn lại <span class="text-equal"> = </span></td>
                                    <td class="total_point">${response.point_to_pay}</td>
                                    <td class="subtract_result" colspan="2">
                                        <span class="text-minus"> - </span>${response.point_award}
                                        <span class="result"> = </span> ${response.point_to_pay - response.point_award} point
                                    </td>
                                </tr>
                            `)
                            .insertBefore(".transport_fee");
                        }else{
                            $(".column8").remove();
                        }

                        var result = response.point_to_pay - response.point_award > 0 ?
                        `và ${response.point_to_pay - response.point_award} POINT` : '';
                        var text_total = `${response.price_to_pay} `+result;
                        $(".total").html(text_total);
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
        var quantity = $(".quantity")[index].innerHTML;
        editCart($(this).attr('id_product'),-parseInt(quantity),index);
    });

    $("#transport").change(function () {
        $.ajax({
            type: "GET",
            url: url_change_transport,
            data: {
                transport_id:$(this).val()
            },
            dataType: "JSON",
            success: function (response) {
                if(response.status == 200)
                {
                    $(".transport_fee").empty();
                    $(".transport_fee").append(`<td colspan='9' class='money'>${response.transport_fee}</td>`);
                    var text_total = response.leftover_point <= 0 ? response.total : `${response.total} và ${response.leftover_point}POINT`;
                    $(".total").html(text_total);
                }
            }
        }).catch(error=>{
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: err
            });
        });
    });
});
