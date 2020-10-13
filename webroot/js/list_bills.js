$(document).ready(function () {
    $("#list_bills").DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": url_render_list_bills
    });

    setTimeout(function(){
        $("h3").slideUp();
    },2000);
});

jQuery(document).on('click','.change_status', function(){
    var index = $(".change_status").index($(this));
    var parent = $(this).parent();
    const id_bill = $(".sorting_1")[index].innerText;
    (async () => {
    const { value: status } = await Swal.fire({
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
                url: url_change_status_bill,
                data: {
                    id_bill: id_bill,
                    status: status,
                    id_user:$(this).attr('id_user')
                },
                dataType: "JSON",
                success: function (response) {
                    if(response.status == 200)
                    {
                        parent.html(response.data);
                    }
                }
            });
        }
    })()
});
