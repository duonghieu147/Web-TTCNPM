<style>
    body {
        overflow: hidden;
    }
</style>
<div class="header">
    <div class="title">
        Thông tin thiết bị
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
                <Label for="name" class="signup-label col-lg-4 col-md-3">Tên thiết bị <span class="error-star">*</span></Label>
                <input id="name" type="text" name="name" tabindex="2" class="signup-input col-lg-8 col-md-9" value="">
            </div>

            <div class="input-group row">
                <Label for="supplier" class="signup-label  col-lg-4 col-md-3">Nhà cung cấp </Label>
                <input id="supplier" type="text" name="supplier" tabindex="3" class="signup-input   col-lg-8 col-md-9" value="">
            </div>



        </div>


        <div class="col-lg-6 col-md-12">


            <div class="input-group row">
                <Label for="amount" class="signup-label  col-lg-4 col-md-3">Số lượng <span class="error-star">*</span></Label>
                <input id="amount" type="number" name="amount" tabindex="3" class="signup-input   col-lg-8 col-md-9">
            </div>

            <div class="input-group row">
                <Label for="price" class="signup-label  col-lg-4 col-md-3">Giá <span class="error-star">*</span></Label>
                <input id="price" type="number" name="price" tabindex="3" class="signup-input   col-lg-8 col-md-9">
            </div>

            <div class="input-group row">
                <Label for="discount" class="signup-label  col-lg-4 col-md-3">Giảm giá (%) </Label>
                <input id="discount" type="number" name="discount" tabindex="3" class="signup-input   col-lg-8 col-md-9">
            </div>

        </div>

        <div class="col-12">
            <div class="input-group row">
                <Label for="description" class="signup-label  mb-2 col-12">Giới thiệu</Label>
                <input id="description" type="text" name="description" tabindex="2" class="signup-input col-12">
            </div>



        </div>

        <div class="col-12">
            <Label for="content" class="signup-label mb-2  col-lg-4 col-md-3">Mô tả chi tiết </Label>

            <textarea name="content" id="editor">

        </textarea>
            <!-- <div id="editor">
            
                <p>Here goes the initial content of the editor.</p>
            </div> -->


        </div>
    </div>

    <div class="footer">
        <Button onclick="closeDialog()" class="close-button">Đóng</Button>
        <Button id="submit" name="login" onclick="addAPI(event)" class="done-button">Thêm</Button>
        <Button id="spinner" style="display: none;" class="done-button"><i style="font-size: 20px;" class="fas fa-spinner fa-spin"></i></Button>

    </div>


    <!-- <input id="submit" type="submit"  name="login" class="done-button" value="Cập nhật" /> -->
</form>