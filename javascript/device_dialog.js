//update 
var errorList = '';
var check = true;



function openUpdateDialog(_id) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dialog").innerHTML = this.responseText;
            errorList = $("ul.errorMessages");
            setEditor();
            $("#dialog").show();
            $("#dialog-overlay").show();

        }
    };
    xmlhttp.open("GET", `index.php?controller=devices&action=updateDeviceDialog&id=${_id}`, true);
    xmlhttp.send();
}

function openAddDialog(_id) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dialog").innerHTML = this.responseText;
            errorList = $("ul.errorMessages");
            setEditor();
            $("#dialog").show();
            $("#dialog-overlay").show();

        }
    };
    xmlhttp.open("GET", `index.php?controller=devices&action=addDeviceDialog&id=${_id}`, true);
    xmlhttp.send();
}


let editor;
function setEditor() {
    ClassicEditor
        .create(document.querySelector('#editor'), {

            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            },
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'blockQuote', 'insertTable', 'mediaEmbed', 'undo', 'redo'],
            table: {
                contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
            }
        })
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });
}


function closeDialog() {
    document.getElementById("dialog").innerHTML = '';
    errorList = '';
    $("#dialog").hide();
    $("#dialog-overlay").hide();
}


function updateAPI(e, _id) {

    e.preventDefault();
    errorList.slideUp();
    check = true;
    errorList.empty();
    check_price();
    check_name();
    check_discount();
    check_amount();
    if (check) {
        errorList.slideUp()
        var _supplier = $("#supplier").val();
        var _name = $("#name").val();
        var _amount = $("#amount").val();
        var _price = $("#price").val();
        var _discount = $("#discount").val();
        var _description = $("#description").val();
        const editorData = editor.getData();
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'index.php?controller=devices&action=updateAPI',
            data: { id: _id, name: _name, supplier: _supplier, amount: _amount, price: _price, discount: _discount, description: _description, content: editorData },
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
                        getTableDevice();

                        swal.fire("Cập nhật thông tin thành công!", "", "success").then(() => {
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

function addAPI(e) {

    e.preventDefault();
    errorList.slideUp();
    check = true;
    errorList.empty();
    check_price();
    check_name();
    check_discount();
    check_amount();
    if (check) {
        errorList.slideUp()
        var _supplier = $("#supplier").val();
        var _name = $("#name").val();
        var _amount = $("#amount").val();
        var _price = $("#price").val();
        var _discount = $("#discount").val();
        var _description = $("#description").val();
        const editorData = editor.getData();
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'index.php?controller=devices&action=addAPI',
            data: { name: _name, supplier: _supplier, amount: _amount, price: _price, discount: _discount, description: _description, content: editorData },
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
                        getTableDevice();

                        swal.fire("Thêm thiết bị thành công!", "", "success").then(() => {
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


function check_name() {

    var value = $("#name").val();
    if (value.length == 0) {
        errorList.append("<li><span>Tên thiết bị : </span>Không được để trống</li>");
        $("#name").addClass("error");
        check = false;
    }
    else {
        $("#name").removeClass("error");
    }
}

function check_amount() {

    var value = $("#amount").val();
    if (!value) {
        errorList.append("<li><span>Số lượng : </span>Không được để trống</li>");
        $("#amount").addClass("error");
        check = false;
    }
    else if (value < 0) {
        errorList.append("<li><span>Số lượng : </span>Không thể bé hơn không</li>");
        $("#amount").addClass("error");
        check = false;
    }
    else {
        $("#amount").removeClass("error");
    }
}

function check_price() {

    var value = $("#price").val();
    if (!value) {
        errorList.append("<li><span>Giá : </span>Không được để trống</li>");
        $("#price").addClass("error");
        check = false;
    }
    else if (value < 0) {
        errorList.append("<li><span>Giá : </span>Không thể bé hơn không</li>");
        $("#price").addClass("error");
        check = false;
    }
    else {
        $("#price").removeClass("error");
    }
}

function check_discount() {

    var value = $("#discount").val();
    if (value >= 100) {
        errorList.append("<li><span>Giảm giá : </span>Không thể lớn hơn 100%</li>");
        $("#discount").addClass("error");
        check = false;
    }
    else {
        $("#discount").removeClass("error");
    }
}