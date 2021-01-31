





$("#changePassword").addClass("active");

var errorList = $("ul.errorMessages");
var check = true;
function changePassword(e, _username) {

    e.preventDefault();
    errorList.slideUp()
    check = true;
    errorList.empty();
    checkOldPassword();
    checkNewPassword();
    checkRePassword();
    if (check) {
        errorList.slideUp()
        var _oldPassword = $("#old-password").val();
        var _NewPassword = $("#new-password").val();
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'index.php?controller=auth&action=changePasswordAPI',
            data: { username: _username, oldPassword: _oldPassword, newPassword: _NewPassword, },
            beforeSend: function () {
                $("#submit").hide();
                $("#spinner").show();

            },
            success: function (response) {
                console.log(response);
                setTimeout(function () {
                    $("#submit").show();
                    $("#spinner").hide();

                    if (response.Success) {

                        swal.fire("Cập nhật mật khẩu thành công!", "", "success").then(() => {
                            window.location.href = "index.php?controller=auth&action=accountInfo"
                        });;

                    }
                    else {
                        response.Errors.forEach(item => {
                            errorList.append(item);
                        });
                        errorList.slideDown()
                        // errorList.append("<li>Mật khẩu mới phải giống với mật khẩu xác thực</li>");
                        // swal(response.Errors['password'], "", "error");
                    }
                }, 1000);

            },
            error: function (xhr, ajaxOptions, thrownError) {
                $("#submit").show();
                $("#spinner").hide();
                swal.fire("Đã có lỗi xảy ra!", "", "error");
                alert(thrownError);
                alert(xhr.status);
            }
        });
    }
    else {
        errorList.slideDown()
    }

}



function checkOldPassword() {
    var value = $("#old-password").val();
    if (value.length == 0) {
        $("#old-password").addClass("error");
        errorList.append("<li><span>Mật khẩu cũ:  </span>không được để trống</li>");
        check = false;
    }
    else if (value.length < 6) {
        $("#old-password").addClass("error");
        errorList.append("<li><span>Mật khẩu cũ:  </span>phải có ít nhất 6 ký tự</li>");
        check = false;
    }
    else {
        $("#old-password").removeClass("error");
    }
}

function checkNewPassword() {
    var password = $("#new-password").val();
    var repassword = $("#repassword").val();
    if (password.length == 0) {
        $("#new-password").addClass("error");
        errorList.append("<li><span>Mật khẩu mới:  </span>không được để trống</li>");
        check = false;
    }
    else if (password.length < 6) {
        $("#new-password").addClass("error");
        errorList.append("<li><span>Mật khẩu mới:  </span>phải có ít nhất 6 ký tự</li>");
        check = false;
    }
    else if (password != repassword) {
        $("#new-password").addClass("error");
        $("#repassword").addClass("error");
        errorList.append("<li>Mật khẩu mới phải giống với mật khẩu xác thực</li>");
        check = false;
    }
    else {
        $("#password").removeClass("error");
        $("#repassword").removeClass("error");
    }
}

function checkRePassword() {
    var password = $("#new-password").val();
    var repassword = $("#repassword").val();
    if (password != repassword) {
        $("#new-password").addClass("error");
        $("#repassword").addClass("error");
        errorList.append("<li>Mật khẩu mới phải giống với mật khẩu xác thực</li>");
        check = false;
    }
    else {
        $("#password").removeClass("error");
        $("#repassword").removeClass("error");
    }
}