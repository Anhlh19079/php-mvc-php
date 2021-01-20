/////////////form-validate/////////////

function Checktendangnhap(event, min, max) {

    event.preventDefault();

    var mess = document.getElementById("nameerror");

    var username = document.getElementById("name_register").value;

    if (username == '') {
        mess.innerHTML = 'Tên đăng nhập ko được để trống ';
        $("#registerbtn").attr({
            "disabled": ''
        });
        return false;
    } else if ((username.length > 0 && username.length < min) || username.length > max) {
        mess.innerHTML = '';
        mess.innerHTML = 'Tên đăng nhập từ 3-10 kí tự';
        $("#registerbtn").attr({
            "disabled": ''
        });
        return false;

    } else {

        mess.innerHTML = '';
        $("#registerbtn").removeAttr("disabled");
        return true;

    }

}

function Checkpassword(event) {
    event.preventDefault();

    var pass = document.getElementById("pass_register").value;
    var mess = document.getElementById("passerror");

    if (pass == '' || pass == null) {
        mess.innerHTML = 'Mật khẩu ko được để trống ';
        $("#registerbtn").attr({
            "disabled": ''
        });
        return false;
    } else {
        mess.innerHTML = '';
        $("#registerbtn").removeAttr("disabled");
        return true;
    }

}

function Checkrepassword(event) {

    event.preventDefault();

    var pass = document.getElementById("pass_register").value;
    var repass = document.getElementById("re_pass_register").value;
    var mess = document.getElementById("passerror");
    var remess = document.getElementById("repasserror");


    if (pass == '' || pass == null) {
        mess.innerHTML = 'Mật khẩu ko được để trống ';
        $("#registerbtn").attr({
            "disabled": ''
        });
        return false;
    } else {
        if (repass == '' || repass == null) {
            remess.innerHTML = 'Nhập lại mật khẩu!';
            $("#registerbtn").attr({
                "disabled": ''
            });
        } else {
            if (pass != repass) {
                mess.innerHTML = '';
                remess.innerHTML = '';
                // remess.css('color', 'red');
                remess.innerHTML = 'Password must be same !';
                $("#registerbtn").attr({
                    "disabled": ''
                });
                return false;


            }

            remess.innerHTML = '';
            // $("#registerbtn").removeAttr("disabled");
            // return true;

        }
        mess.innerHTML = '';
        $("#registerbtn").removeAttr("disabled");
        return true;
    }
}

function Checkemail(event) {
    event.preventDefault();

    var mess = document.getElementById("mailerror");
    var messerror = $("#mailerror");
    var email = document.getElementById("email_register").value;
    var atposition = email.indexOf("@");
    var dotposition = email.lastIndexOf(".");
    if (atposition < 1 || dotposition < (atposition + 2) ||
        (dotposition + 2) >= email.length) {
        messerror.text("Email nhập sai định dạng");
        return false;
    } else {
        mess.innerHTML = '';
        return true;
    }
}

var registerbtn = document.getElementById("registerbtn");

registerbtn.onclick = function Validate(event) {

    //Mặc định các lỗi này sẽ ẩn

    var mess_ername = document.getElementById("name_register");
    var mess_eremail = document.getElementById("email_register");
    var mess_erpass = document.getElementById("pass_register");
    var mess_errepass = document.getElementById("re_pass_register");

    mess_ername.innerHTML = '';
    mess_eremail.innerHTML = '';
    mess_erpass.innerHTML = '';
    mess_errepass.innerHTML = '';
    //Gọi các hàm đã viết
    ;
    var name = Checktendangnhap(event, 3, 10);
    var pass = Checkpassword(event);
    var email = Checkemail(event);
    if (name == true || pass == true || email == true) {
        var formElement = document.querySelector('#form_register');
        formElement.submit();
    }




}