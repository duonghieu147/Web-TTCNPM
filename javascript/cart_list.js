function removeFromCart(_id) {


    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'index.php?controller=devices&action=removeFromCartAPI',
        data: { id: _id, },
        // beforeSend: function () {
        //     $("#submit").hide();
        //     $("#spinner").show();

        // },
        success: function (response) {
            console.log(response);


            if (response.Success) {
                swal.fire("Xóa thiết bị khỏi giỏ hàng thành công!", "", "success").then(() => {
                    window.location.href = "index.php?controller=devices&action=cartList"
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


        },
        error: function () {

            swal.fire("Đã có lỗi xảy ra!", "", "error");
        }
    });

}