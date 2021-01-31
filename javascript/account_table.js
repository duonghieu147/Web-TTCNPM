








    // $.ajax({
    //     type: 'DELETE',
    //     dataType: 'JSON',
    //     url: `index.php?controller=auth&action=changePasswordAPI&id=${_id}`,
    //     // data: { username: _username, oldPassword: _oldPassword, newPassword: _NewPassword, },
    //     beforeSend: function () {
    //         $("#submit").hide();
    //         $("#spinner").show();

    //     },
    //     success: function (response) {
    //         console.log(response);
    //         setTimeout(function () {
    //             $("#submit").show();
    //             $("#spinner").hide();

    //             if (response.Success) {

    //                 swal("Cập nhật mật khẩu thành công!", "", "success").then(() => {
    //                     window.location.href = "index.php?controller=auth&action=accountInfo"
    //                 });;

    //             }
    //             else {
    //                 response.Errors.forEach(item => {
    //                     errorList.append(item);
    //                 });
    //                 errorList.slideDown()
    //                 // errorList.append("<li>Mật khẩu mới phải giống với mật khẩu xác thực</li>");
    //                 // swal(response.Errors['password'], "", "error");
    //             }
    //         }, 1000);

    //     },
    //     error: function (xhr, ajaxOptions, thrownError) {
    //         $("#submit").show();
    //         $("#spinner").hide();
    //         swal("Đã có lỗi xảy ra!", "", "error");
    //         alert(thrownError);
    //         alert(xhr.status);
    //     }
    // });

// }


