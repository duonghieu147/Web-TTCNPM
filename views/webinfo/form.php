<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/web_info.css">
</head>

<body>




    <div class="web-info">

        <?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '\web-php\views\layouts\side-bar.php'); ?>

        <div class="Pcard container-fluid">
            <div class="Pcard-header">
                <h1 class="Pcard-title">Thông tin trang web</h1>
            </div>



            <form id="account-info-form" method="POST" class="signup-form">

                <ul class="errorMessages"></ul>
                <div class="row" style="margin: 0;">
                    <div class="col-lg-6 col-md-12">
                        <div class="input-group row">
                            <Label for="phone" class="signup-label col-lg-4 col-md-3">Số điện thoại <span class="error-star">*</span></Label>
                            <input id="phone" type="text" name="phone" tabindex="1" class="signup-input col-lg-8 col-md-9" value="<?php echo $info->Phone ?>">
                        </div>

                        <div class="input-group row">
                            <Label for="email" class="signup-label  col-lg-4 col-md-3">Email <span class="error-star">*</span></Label>
                            <input id="email" type="text" name="email" tabindex="2" class="signup-input   col-lg-8 col-md-9" placeholder="Eg: uzumakinas@gmai.com" value="<?php echo $info->Email ?>">
                        </div>


                    </div>


                    <div class="col-lg-6 col-md-12">


                        <div class="input-group row">
                            <Label for="facebook" class="signup-label  col-lg-4 col-md-3">Facebook</Label>
                            <input id="facebook" type="text" name="facebook" tabindex="3" class="signup-input   col-lg-8 col-md-9" value="<?php echo $info->Facebook ?>">
                        </div>


                        <div class="input-group row">
                            <Label for="twitter" class="signup-label  col-lg-4 col-md-3">Twitter</Label>
                            <input id="twitter" type="text" name="twitter" tabindex="4" class="signup-input   col-lg-8 col-md-9" value="<?php echo $info->Twitter ?>">
                        </div>

                        <div class="input-group row">
                            <Label for="webside" class="signup-label  col-lg-4 col-md-3">Webside</Label>
                            <input id="webside" type="text" name="webside" tabindex="5" class="signup-input   col-lg-8 col-md-9" value="<?php echo $info->Webside ?>">
                        </div>


                    </div>

                    <div class="col-12">
                        <div class="input-group row">
                            <Label for="address" class="signup-label col-lg-2 col-md-3">Địa chỉ <span class="error-star">*</span></Label>
                            <input id="address" type="text" name="address" tabindex="6" class="signup-input col-lg-10 col-md-9" value="<?php echo $info->Address ?>">
                        </div>



                    </div>
                </div>


                <Button id="submit" name="login" onclick="updateWebInfoAPI(event)" class="done-button">Cập nhật</Button>

                <!-- <input id="submit" type="submit"  name="login" class="done-button" value="Cập nhật" /> -->
                <Button id="spinner" style="display: none;" class="done-button"><i style="font-size: 20px;" class="fas fa-spinner fa-spin"></i></Button>
            </form>

        </div>
    </div>

    <script src="javascript/web_info.js"></script>
    <script>
        $("#webInfo").addClass("active");
    </script>
</body>

</html>