

$(document).ready(function () {




    $("#submit").click(function (e) {
        e.preventDefault();

        if (error_username) {
            $("#username").addClass("error");
            return false;
        }
        else if (error_password) {
            $("#password").addClass("error");
            return false;
        }
        else if (error_email) {
            $("#email").addClass("error");
            return false;
        }
        else if (error_name) {
            $("#name").addClass("error");
            return false;
        }
        else {
            var _username = $("#username").val();
            var _password = $("#password").val();
            var _email = $("#email").val();
            var _name = $("#name").val();
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: 'index.php?controller=auth&action=signupAPI',
                data: { username: _username, password: _password, email: _email, name: _name },
                beforeSend: function () {
                    $("#submit").hide();
                    $("#spinner").show();

                },
                success: function (response) {
                    setTimeout(function () {
                        $("#submit").show();
                        $("#spinner").hide();

                        if (response.Success) {

                            swal.fire("Đăng ký thành công!", "", "success")
                                .then(() => {
                                    window.location.href = "index.php?controller=auth&action=accountInfo"
                                });

                        }
                        else {

                            var listview = '';
                            if (response.Errors) {
                                response.Errors.forEach(item => {
                                    listview += `${item}<br>`;
                                });
                            }
                            swal.fire(
                                {
                                    title: "Đã có lỗi xảy ra!",
                                    icon: 'error',
                                    html: listview,
                                }

                            );

                        }
                    }, 1000);

                },
                error: function () {
                    swal.fire("Đã có lỗi xảy ra!", "", "error");
                }
            });
        }
    });



    var error_username = true;
    var error_password = true;
    var error_repassword = true;
    var error_name = true;
    var error_email = true;

    $("#email").keyup(function () {
        check_email();
    });

    $("#name").keyup(function () {
        check_name();
    });

    $("#username").keyup(function () {
        check_username();
    });
    $("#password").keyup(function () {
        check_password();
    });

    $("#repassword").keyup(function () {
        check_repassword();
    });

    function check_email() {

        var value = $("#email").val();
        if (value.length == 0) {
            $("#email_error").html("Email không được để trống");
            error_email = true;
        }
        else if (!ValidateEmail(value)) {
            $("#email_error").html("Email không đúng định dạng");
            $("#email_error").show()
            error_email = true;
        }
        else {
            $("#email").removeClass("error");
            $("#email_error").hide()
            error_email = false;
        }
    }

    function ValidateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function check_username() {

        var value = $("#username").val();
        if (value.length == 0) {
            $("#username_error").html("Vui lòng nhập tên đăng nhập của bạn");
            error_username = true;
        }
        else if (value.length < 6) {
            $("#username_error").html("Tên đăng nhập phải có độ dài ít nhất 6 ký tự");
            $("#username_error").show();
            error_username = true;
        }
        else {

            $("#username").removeClass("error");
            $("#username_error").hide()
            error_username = false;

            $.ajax({
                type: 'GET',
                dataType: 'JSON',
                url: `index.php?controller=auth&action=checkUsernameAvailable&username=${value}`,
                success: function (response) {

                    if (response.Success) {

                        if (response.Data) {
                            $("#username_error").html("Tên đăng nhập đã được sử dụng");
                            $("#username_error").show();
                        }

                    }

                },
            });
        }
    }

    function check_name() {

        var value = $("#name").val();
        if (value.length == 0) {
            $("#name_error").html("Họ và tên không được phép để trống");
            $("#name_error").show()
            error_name = true;
        }
        else {
            $("#name").removeClass("error");
            $("#name_error").hide()
            error_name = false;
        }
    }


    function check_repassword() {
        var password = $("#password").val();
        var repassword = $("#repassword").val();
        if (repassword.length == 0) {
            $("#repassword_error").html("Mật khẩu Xác thực không được để trống");
            error_repassword = true;
        }
        else if (repassword != password) {
            $("#repassword_error").html("Mật khẩu Xác thực phải giống mật khẩu");
            $("#repassword_error").show()
            error_repassword = true;
        }
        else {
            $("#repassword").removeClass("error");
            $("#repassword_error").hide()
            error_repassword = false;
        }
    }

    function check_password() {
        var password = $("#password").val();
        var repassword = $("#repassword").val();
        if (password.length == 0) {
            $("#password_error").html("Mật khẩu không được để trống");
            error_password = true;
        }
        else if (password.length < 6) {
            $("#password_error").html("Mật khẩu phải có độ dài ít nhất 6 ký tự");
            $("#password_error").show()
            error_password = true;
        }
        else if (password != repassword) {
            $("#repassword_error").html("Mật khẩu Xác thực phải giống mật khẩu");
            $("#repassword_error").show();
            $("#password_error").hide();
            error_repassword = true;
        }
        else {
            $("#password").removeClass("error");
            $("#repassword_error").hide();
            $("#password_error").hide();
            error_password = false;
        }
    }
});