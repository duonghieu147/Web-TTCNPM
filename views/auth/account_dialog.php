<style>
    body {
        overflow: hidden;
    }
</style>
<div class="header">
    <div class="title">
        Thông tin tài khoản
    </div>
    <i onclick="closeDialog()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </i>
</div>
<form id="account-info-form" method="POST" class="signup-form">

    <ul class="errorMessages"></ul>
    <div class="row" style="margin: 0;">
        <div class="col-lg-6 col-md-12">
            <div class="input-group row">
                <Label for="name" class="signup-label col-lg-4 col-md-3">Họ và tên <span class="error-star">*</span></Label>
                <input id="name" type="text" name="name" tabindex="2" class="signup-input col-lg-8 col-md-9" value="<?php echo $info->Name ?>" disabled>
            </div>

            <div class="input-group row">
                <Label for="email" class="signup-label  col-lg-4 col-md-3">Email <span class="error-star">*</span></Label>
                <input id="email" type="text" name="email" tabindex="3" class="signup-input   col-lg-8 col-md-9" placeholder="Eg: uzumakinas@gmai.com" value="<?php echo $info->Email ?>" disabled>
            </div>



            <div class="input-group row">
                <Label for="email" class="signup-label  col-lg-4 col-md-3">Username <span class="error-star">*</span></Label>
                <input id="email" type="text" name="email" tabindex="3" class="signup-input   col-lg-8 col-md-9" placeholder="Eg: uzumakinas@gmai.com" value="<?php echo $info->Username ?>" disabled>
            </div>


        </div>


        <div class="col-lg-6 col-md-12">


            <div class="input-group row">
                <Label for="phone" class="signup-label  col-lg-4 col-md-3">Số điện thoại</Label>
                <input id="phone" type="text" name="phone" tabindex="3" class="signup-input   col-lg-8 col-md-9" value="<?php echo $info->Phone ?>" disabled>
            </div>

            <div class="input-group row">
                <Label class="signup-label  col-lg-4 col-md-3">Giới tính:</Label>
                <div class="select-radio-group">
                    <input type="radio" name="sex" class="signup-input col-2" value="m" <?php if ($info->Sex == 'm') {
                                                                                            echo 'checked';
                                                                                        } ?> disabled>
                    <label for="m">Male</label>

                    <input type="radio" name="sex" class="signup-input    col-2" value="f" <?php if ($info->Sex == 'f') {
                                                                                                echo 'checked';
                                                                                            } ?> disabled>
                    <label for="f">Female</label><br>
                </div>
            </div>

            <div class="input-group row">
                <Label for="phone" class="signup-label  col-lg-4 col-md-3">Loại tài khoản</Label>

                <div class="signup-input   col-lg-8 col-md-9" style="background: none;">
                    <?php echo $info->IsAdmin ?  'Quản trị viên' : 'Thành viên' ?>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="input-group row">
                <Label for="address" class="signup-label col-lg-2 col-md-3">Địa chỉ</Label>
                <input id="address" type="text" name="address" tabindex="2" class="signup-input col-lg-10 col-md-9" value="<?php echo $info->Address ?>" disabled>
            </div>



        </div>
    </div>


    <div class="footer">
        <Button onclick="closeDialog()" class="close-button">Đóng</Button>
        <Button id="submit" name="login" onclick="closeDialog()" class="done-button">Cập nhật</Button>
        <Button id="spinner" style="display: none;" class="done-button"><i style="font-size: 20px;" class="fas fa-spinner fa-spin"></i></Button>

    </div>
</form>