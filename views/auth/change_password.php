<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/change_password.css">

</head>

<body>

    <div class="account-info">

    <?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '\web-php\views\layouts\side-bar.php'); ?>

        <div class="Pcard container-fluid">
            <div class="Pcard-header">
                <h1 class="Pcard-title">Đổi mật khẩu</h1>
            </div>



            <form id="change-password-form" method="POST" class="signup-form">

                <ul class="errorMessages"></ul>
                <div class="row" style="margin: 0;">
                    <div class="col-lg-6 col-md-12">
                        <div class="input-group row">
                            <Label for="old-password" class="signup-label col-lg-4 col-md-3">Mật khẩu cũ <span class="error-star">*</span></Label>
                            <input id="old-password" type="password" name="old-password" tabindex="1" class="signup-input col-lg-8 col-md-9">
                        </div>

                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="input-group row">
                            <Label for="new-password" class="signup-label col-lg-4 col-md-3">Mật khẩu mới <span class="error-star">*</span></Label>
                            <input id="new-password" type="password" name="new-password" tabindex="2" class="signup-input col-lg-8 col-md-9">
                        </div>

                        <div class="input-group row">
                            <Label for="repassword" class="signup-label  col-lg-4 col-md-3">Nhập lại mật khẩu <span class="error-star">*</span></Label>
                            <input id="repassword" type="password" name="repassword" tabindex="3" class="signup-input   col-lg-8 col-md-9">
                        </div>

                    </div>


                </div>



                <input id="submit" type="submit" name="login" onclick="changePassword(event,'<?php echo Role::getCurrentUsername() ?>')" class="done-button" value="Đổi mật khẩu" />
                <Button id="spinner" style="display: none;" class="done-button"><i style="font-size: 20px;" class="fas fa-spinner fa-spin"></i></Button>
            </form>
        </div>
    </div>

    <script src="javascript/change_password.js"></script>
</body>

</html>