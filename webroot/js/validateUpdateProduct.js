$(document).ready(function () {
    $("#submit").click(function (e) {
        var name    = $("#name");
        const regex_name = /^[A-Za-z0-9\sàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ]{2,200}$/;
        var price   = $("#price");
        const regex_number = /^[0-9]+$/;
        var amount  = $("#amount");
        var content = $("#content");
        var flag = 0;
        if(name.val().length == 0)
        {
            $(".err_name").html(" *Tên sản phẩm không được để trống");
            flag++;
        }
        else if(regex_name.test(name.val()) == false)
        {
            $(".err_name").html(" *Tên sản phẩm không đưowjc để kí tự đặc biệt");
            flag++;
        }
        else{
            $(".err_name").html("");
        }

        if(price.val().length == 0)
        {
            $(".err_price").html(" *Giá không được để trống");
            flag++;
        }
        else if(regex_number.test(price.val()) == false)
        {
            $(".err_price").html(" *Giá chỉ được gi số");
            flag++;
        }
        else{
            $(".err_price").html("");
        }

        if(amount.val().length == 0)
        {
            $(".err_amount").html(" *Số lượng không được để trống");
            flag++;
        }
        else if(regex_number.test(amount.val()) == false)
        {
            $(".err_amount").html(" *Số lượng chỉ được ghi số");
            flag++;
        }
        else{
            $(".err_amount").html("");
        }

        if(content.val().length == 0)
        {
            $(".err_content").html(" *Bài viết không được để trống");
            e.preventDefault();
        }
        else{
            $(".err_content").html(" *Bài viết không được để trống");
        }

        if(flag > 0)
        {
            e.preventDefault();
        }
    });
 });
