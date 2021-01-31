

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
        else {
            var _username = $("#username").val();
            var _password = $("#password").val();
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: 'index.php?controller=auth&action=loginAPI',
                data: { username: _username, password: _password },
                beforeSend: function () {
                    $("#submit").hide();
                    $("#spinner").show();

                },
                success: function (response) {
                    setTimeout(function () {
                        $("#submit").show();
                        $("#spinner").hide();

                        if (response.Success) {

                            swal.fire("Đăng nhập thành công!", "", "success")
                                .then(() => {
                                    window.location.href = "index.php?controller=auth&action=login"
                                });

                        }
                        else {
                            if (response.Errors['password']) {
                                $("#password").addClass("error");
                                $("#password_error").html(response.Errors['password']);
                                $("#password_error").show();
                            }

                            if (response.Errors['username']) {
                                $("#username").addClass("error");
                                $("#username_error").html(response.Errors['username']);
                                $("#username_error").show();
                            }
                        }
                    }, 1000);

                },
                error: function () {
                    swal.fire("Đã có lỗi xảy ra!", "", "error");
                }
            });
        }
    });

    $("#spinner").hide();
    $(".username_error").hide();
    $(".password_error").hide();

    var error_username = false;
    var error_password = false;

    $("#username").keyup(function () {
        check_username();
    });
    $("#password").keyup(function () {
        check_password();
    });

    function check_username() {

        var username_length = $("#username").val().length;
        if (username_length == 0) {
            $("#username_error").html("Vui lòng nhập tên đăng nhập của bạn");
            error_username = true;
        }
        else if (username_length < 6) {
            $("#username_error").html("Tên đăng nhập phải có độ dài ít nhất 6 ký tự");
            $("#username_error").show()
            error_username = true;
        }
        else {
            $("#username").removeClass("error");
            $("#username_error").hide()
            error_username = false;
        }
    }


    function check_password() {
        var password_length = $("#password").val().length;
        if (password_length == 0) {
            $("#password_error").html("Mật khẩu không được để trống");
            error_password = true;
        }
        else if (password_length < 6) {
            $("#password_error").html("Mật khẩu phải có độ dài ít nhất 6 ký tự");
            $("#password_error").show()
            error_password = true;
        }
        else {
            $("#password").removeClass("error");
            $("#password_error").hide()
            error_password = false;
        }
    }
});