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
                        $("#checkout_items").html(parseInt($("#checkout_items").html()) + quantity);
                        $(".column5")[index+1].innerText = response.current_product_price;
                        $(".total").html(response.total);
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
                product_id: $(this).attr('id_product'),
                transport_id: $("#transport").val()
            },
            dataType: "JSON",
            success: function (response) {
                if(response.status == 200)
                {
                    const quantity = $('.quantity')[index].innerText;
                    $(".table100 tbody tr")[index].remove();
                    $("#checkout_items").html(parseInt($("#checkout_items").html()) - quantity);
                    $(".total").html(response.total);
                    if($(".table100 tbody tr").length == 2 || $(".table100 tbody tr").length == 2)
                    {
                        $(".transport_fee td").remove();
                        $(".all_total").remove();
                        const home = url_home;
                        $(".limiter .table100").append(`<a href='${home}'>Vui lòng quay lại để thêm sản phẩm vào giỏ hàng</a>`);
                    }
                }
            }
        }).catch(error=>{
            Swal.fire({
                icon: 'error',
                title: 'Lỗi',
                text: err
            })
        })
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
                    $(".transport_fee").append(`<td colspan='7'>${response.transport_fee}</td>`);
                    $(".total").html(response.total);
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
