

function plus(max) {
    var i = document.getElementById('detail-number').value;
    if (Number(i) + 1 <= max) {
        console.log(Number(i) + 1);
        document.getElementById('detail-number').value = Number(i) + 1;
    }
}

function minus() {
    var i = document.getElementById('detail-number').value;
    if (Number(i) - 1 > 0) {
        document.getElementById('detail-number').value = Number(i) - 1;
    }
}

function getReviewPage() {

    var url_string = window.location.href;
    var url = new URL(url_string);
    var deviceId = url.searchParams.get("Id");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("review-list").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", `index.php?controller=review&action=reviewPage&deviceId=${deviceId}&page=${pages}`, true);
    xmlhttp.send();
}
var pages = 1;
function goToReviewPage(index) {
    if (index <= 0) {
        index = 1;
    }
    else {
        pages = index;
        $("#pages").val(pages);
    }
    getReviewPage();
}

function openAddDialog() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dialog").innerHTML = this.responseText;
            errorList = $("ul.errorMessages");
            $("#dialog").show();
            $("#dialog-overlay").show();

        }
    };
    xmlhttp.open("GET", `index.php?controller=review&action=addReviewDialog`, true);
    xmlhttp.send();
}

function addAPI(e) {

    e.preventDefault();
    errorList.slideUp();
    check = true;
    errorList.empty();
    check_content();

    if (check) {
        errorList.slideUp();
        var url_string = window.location.href;
        var url = new URL(url_string);
        var _deviceId = url.searchParams.get("Id");
        var _content = $("#review-content").val();
        var _star = $('input[name=rating]:checked', '#add-review-form').val()
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'index.php?controller=review&action=addAPI',
            data: { deviceId: _deviceId, content: _content, star: _star },
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


                        swal.fire("Viết Đánh giá thành công!", "", "success").then(() => {
                            location.reload(true);
                            $("#dialog").hide();
                            $("#dialog-overlay").hide();
                            document.getElementById("dialog").innerHTML = '';
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

function closeDialog() {
    document.getElementById("dialog").innerHTML = '';
    errorList = '';
    $("#dialog").hide();
    $("#dialog-overlay").hide();
}

function tabOnClick(id) {
    $(".tab-content").hide();
    $(".tab-title li").removeClass("active");
    $("#" + id + "-tab").addClass("active");
    $("#" + id).fadeIn()
}

function check_content() {

    var value = $("#review-content").val();
    if (value.length == 0) {
        errorList.append("<li><span>Nội dung đánh giá : </span>Không được để trống</li>");
        $("#review-content").addClass("error");
        check = false;
    }
    else {
        $("#review-content").removeClass("error");
    }
}

function addToCart(_id) {

    var _number = $("#detail-number").val();
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'index.php?controller=devices&action=addToCartAPI',
        data: { id: _id, number: _number, },
        // beforeSend: function () {
        //     $("#submit").hide();
        //     $("#spinner").show();

        // },
        success: function (response) {
            console.log(response);
            if (response.Success) {
                swal.fire("Thêm vào giỏ hàng thành công!", "", "success");
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

        },
        error: function () {

            swal.fire("Đã có lỗi xảy ra!", "", "error");
        }
    });

}

getReviewPage()

