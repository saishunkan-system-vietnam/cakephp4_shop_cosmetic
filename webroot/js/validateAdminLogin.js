$(document).ready(function () {
    var email = $(".email");
    var password = $(".password");
    var regex_email= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var regex_pass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    $("#submit").click(function(e){
        if(email.val()=='')
        {
            email.css("border","1.5px solid red");
            email.prop('title',"Email không được để trống");
            e.preventDefault();
        }
        else if(regex_email.test(email.val())==false)
        {
            email.css("border","1.5px solid yellow");
            email.prop('title',"Email không đúng định dạng");
            e.preventDefault();
        }
        else{
            let flag = true;
            $.ajax({
                type: "GET",
                url: "http://m-shop.com/admin/check-exist-email",
                data: {
                    email:email.val()
                },
                dataType: "JSON",
                success: function (response) {
                    if(response.status==false)
                    {
                        email.css("border","1.5px solid #c91fe8");
                        email.prop('title',"Email không tồn tại");
                        flag = false;
                    }
                    else{
                        email.css("border","none");
                        email.prop('title',"");
                    }
                }
            });
            if(flag == false){
                e.preventDefault();
            }
        }

        if(password.val()=='')
        {
            password.css("border","1.5px solid red");
            password.prop('title',"Password không được để trống");
            e.preventDefault();
        }
        else if(regex_pass.test(password.val())==false)
        {
            password.css("border","1.5px solid yellow");
            password.prop('title',"Password tối thiểu tám ký tự, ít nhất một chữ cái và một số");
            e.preventDefault();
        }
        else{
            password.css("border","none");
            password.prop('title',"");
        }
    })
});
