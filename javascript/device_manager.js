





$("#deviceManager").addClass("active");
$(".pagination li:nth-child(1)").addClass("active");
var pages = 1;


function getPage(index) {
    pages = index;
    $(`.pagination li`).removeClass("active");
    $(`.pagination li:nth-child(${pages})`).addClass("active");
    getTableDevice()
}

function getTableDevice() {


    var orderBy = document.getElementById("orderby").value;
    var descending = document.getElementById("descending").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", `index.php?controller=devices&action=deviceTable&page=${pages}&orderby=${orderBy}&descending=${descending}`, true);
    xmlhttp.send();
}

function deleteAPI(_id) {



    swal.fire({
        title: "Bạn có muốn xóa thiết bị",
        text: "Bạn sẽ không thể khôi phục dữ liệu nếu xóa",
        icon: "warning",
        confirmButtonText: 'Yes, delete it!',
        showCancelButton: true,
    })
        .then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'DELETE',
                    dataType: 'JSON',
                    url: `index.php?controller=devices&action=deleteAPI&id=${_id}`,
                    // data: { username: _username, oldPassword: _oldPassword, newPassword: _NewPassword, },
                    success: function (response) {
                        console.log(response);
                        $("#submit").show();
                        $("#spinner").hide();

                        if (response.Success) {

                            swal.fire({
                                title: "Xóa tài khoản thành công",
                                icon: "success",
                            });
                            getTableDevice();
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
        })

}

function goToPageInput() {
    pages = $("#pages").val();
    if (pages <= 0) {
        pages = 1;
        getTableDevice();
    }
    else {
        getTableDevice();
    }

}
function goToPage(index) {
    if (index <= 0) {
        index = 1;
    }
    else {
        pages = index;
        $("#pages").val(pages);
    }
    getTableDevice();
}







getTableDevice();



