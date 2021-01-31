$("#accountInfo").addClass("active");





var errorList = $("ul.errorMessages");
var check = true;
function updateAPI(e, _id) {

    e.preventDefault();
    errorList.slideUp()
    check = true;
    errorList.empty();
    check_email();
    check_name();
    if (check) {
        errorList.slideUp()
        var _email = $("#email").val();
        var _name = $("#name").val();
        var _sex = $('input[name=sex]:checked', '#account-info-form').val()
        var _phone = $("#phone").val();
        var _address = $("#address").val();
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'index.php?controller=auth&action=updateAPI',
            data: { id: _id, name: _name, email: _email, sex: _sex, phone: _phone, address: _address, },
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



function check_name() {

    var value = $("#name").val();
    if (value.length == 0) {
        errorList.append("<li><span>Họ và tên : </span>Không được để trống</li>");
        $("#name").addClass("error");
        check = false;
    }
    else {
        $("#name").removeClass("error");
    }
}