





$("#accountManager").addClass("active");
$(".pagination li:nth-child(1)").addClass("active");
var pages = 1;


function getPage(index) {
    pages = index;
    $(`.pagination li`).removeClass("active");
    $(`.pagination li:nth-child(${pages})`).addClass("active");
    getTable()
}

function getTable() {


    var orderBy = document.getElementById("orderby").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", `index.php?controller=auth&action=accountTable&page=${pages}&orderby=${orderBy}`, true);
    xmlhttp.send();
}

function openDialog(username) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dialog").innerHTML = this.responseText;
            $("#dialog").show();
            $("#dialog-overlay").show();

        }
    };
    xmlhttp.open("GET", `index.php?controller=auth&action=accountDialog&username=${username}`, true);
    xmlhttp.send();
}

function deleteAccount(_id) {



    swal.fire({
        title: "Bạn có muốn xóa tài khoản",
        text: "Bạn sẽ không thể đăng nhập nếu xóa tài khoản",
        icon: "warning",
        confirmButtonText: 'Yes, delete it!',
        showCancelButton: true,
    })
        .then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'DELETE',
                    dataType: 'JSON',
                    url: `index.php?controller=auth&action=deleteAPI&id=${_id}`,
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
                            getTable();
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

function closeDialog() {
    document.getElementById("dialog").innerHTML = '';
    $("#dialog").hide();
    $("#dialog-overlay").hide();
}
// $("#dialog-overlay").click(function () {
//     $("#dialog").hide();
//     $("#dialog-overlay").hide();
// })

getTable();