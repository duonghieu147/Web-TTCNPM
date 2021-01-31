<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/account_info.css">

</head>

<body>




    <div class="account-info">

        <?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '\web-php\views\layouts\side-bar.php'); ?>

        <div class="Pcard container-fluid">
            <div class="Pcard-header">
                <h1 class="Pcard-title">Thông tin tài khoản</h1>
            </div>



            <form id="account-info-form" method="POST" class="signup-form">

                <ul class="errorMessages"></ul>
                <div class="row" style="margin: 0;">
                    <div class="col-lg-6 col-md-12">
                        <div class="input-group row">
                            <Label for="name" class="signup-label col-lg-4 col-md-3">Họ và tên <span class="error-star">*</span></Label>
                            <input id="name" type="text" name="name" tabindex="2" class="signup-input col-lg-8 col-md-9" value="<?php echo $info->Name ?>">
                        </div>

                        <div class="input-group row">
                            <Label for="email" class="signup-label  col-lg-4 col-md-3">Email <span class="error-star">*</span></Label>
                            <input id="email" type="text" name="email" tabindex="3" class="signup-input   col-lg-8 col-md-9" placeholder="Eg: uzumakinas@gmai.com" value="<?php echo $info->Email ?>">
                        </div>


                    </div>


                    <div class="col-lg-6 col-md-12">


                        <div class="input-group row">
                            <Label for="phone" class="signup-label  col-lg-4 col-md-3">Số điện thoại</Label>
                            <input id="phone" type="text" name="phone" tabindex="3" class="signup-input   col-lg-8 col-md-9" value="<?php echo $info->Phone ?>">
                        </div>

                        <div class="input-group row">
                            <Label class="signup-label  col-lg-4 col-md-3">Giới tính:</Label>
                            <div class="select-radio-group">
                                <input type="radio" name="sex" class="signup-input col-2" value="m" <?php if ($info->Sex == 'm') {
                                                                                                        echo 'checked';
                                                                                                    } ?>>
                                <label for="m">Male</label>

                                <input type="radio" name="sex" class="signup-input    col-2" value="f" <?php if ($info->Sex == 'f') {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                                <label for="f">Female</label><br>
                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="input-group row">
                            <Label for="address" class="signup-label col-lg-2 col-md-3">Địa chỉ</Label>
                            <input id="address" type="text" name="address" tabindex="2" class="signup-input col-lg-10 col-md-9" value="<?php echo $info->Address ?>">
                        </div>



                    </div>
                </div>


                <Button id="submit" name="login" onclick="updateAPI(event,<?php echo $info->Id ?>)" class="done-button">Cập nhật</Button>

                <!-- <input id="submit" type="submit"  name="login" class="done-button" value="Cập nhật" /> -->
                <Button id="spinner" style="display: none;" class="done-button"><i style="font-size: 20px;" class="fas fa-spinner fa-spin"></i></Button>
            </form>

        </div>
    </div>


    <script src="javascript/account_info.js"></script>
</body>

</html>