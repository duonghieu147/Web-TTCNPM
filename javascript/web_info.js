$("#webInfo").addClass("active");


var errorList = $("ul.errorMessages");
var check = true;
function updateWebInfoAPI(e) {

    e.preventDefault();
    errorList.slideUp()
    check = true;
    errorList.empty();
    check_email();
    check_phone();
    check_address();
    if (check) {
        errorList.slideUp()
        var _phone = $("#phone").val();
        var _email = $("#email").val();

        var _facebook = $("#facebook").val();
        var _twitter = $("#twitter").val();
        var _webside = $("#webside").val();
        var _address = $("#address").val();
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'index.php?controller=webinfo&action=updateAPI',
            data: { phone: _phone, email: _email, facebook: _facebook, twitter: _twitter, webside: _webside, address: _address, },
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

                        swal.fire("Cập nhật thông tin thành công!", "", "success").then(() => {
                            window.location.href = "index.php?controller=webinfo&action=form"
                        });

                    }
                    else {


                        if (response.Errors) {
                            response.Errors.forEach(item => {
                                errorList.append(item);
                            });
                        }

                        errorList.slideDown();
                        swal.fire(
                            {
                                title: "Đã có lỗi xảy ra!",
                                icon: 'error',
                            }

                        );
                    }
                }, 1000);

            },
            error: function () {
                $("#submit").show();
                $("#spinner").hide();
                swal.fire("Đã có lỗi xảy ra!", "", "error");
            }
        });
    }
    else {
        errorList.slideDown()
    }

}

function check_email() {

    var value = $("#email").val();
    if (value.length == 0) {
        $("#email").addClass("error");
        errorList.append("<li><span>Email: </span>Không được để trống</li>");
        check = false;
    }
    else if (!ValidateEmail(value)) {
        $("#email").addClass("error");
        errorList.append("<li><span>Email: </span>Không đúng định dạng</li>");
        check = false;
    }
    else {
        $("#email").removeClass("error");
    }
}

function ValidateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}



function check_phone() {

    var value = $("#phone").val();
    if (value.length == 0) {
        errorList.append("<li><span>Số điện thoại : </span>Không được để trống</li>");
        $("#phone").addClass("error");
        check = false;
    }
    else {
        $("#phone").removeClass("error");
    }
}


function check_address() {

    var value = $("#address").val();
    if (value.length == 0) {
        errorList.append("<li><span>Địa chỉ : </span>Không được để trống</li>");
        $("#address").addClass("error");
        check = false;
    }
    else {
        $("#address").removeClass("error");
    }
}