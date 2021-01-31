<style>
    body {
        overflow: hidden;
    }
</style>
<div class="header">
    <div class="title">
        Viết đánh giá
    </div>
    <i onclick="closeDialog()">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </i>
</div>
<form id="add-review-form" method="POST" class="signup-form">

    <ul class="errorMessages"></ul>
    <div class="row" style="margin: 0;">

        <div style="    display: flex;width: 100%; justify-content: center; text-align: center; margin-top: 10px;">

            <div id="rating">
                <input type="radio" id="star5" name="rating" value="5" />
                <label class="full" for="star5" title="Awesome - 5 stars"></label>

                <input type="radio" id="star4" name="rating" value="4" />
                <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                <input type="radio" id="star3" name="rating" value="3" />
                <label class="full" for="star3" title="Meh - 3 stars"></label>

                <input type="radio" id="star2" name="rating" value="2" />
                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                <input type="radio" id="star1" name="rating" value="1" />
                <label class="full" for="star1" title="Sucks big time - 1 star"></label>
            </div>
        </div>
        <div class="col-12">
            <div class="input-group row">
                <Label for="review-content" class="signup-label  mb-2 col-12">Nội dung</Label>
                <textarea style="padding-left: 10px;" id="review-content" type="text" name="review-content" tabindex="2" class="signup-input col-12"></textarea>
            </div>



        </div>

    </div>

    <div class="footer">

        <Button id="submit" name="login" onclick="addAPI(event)" class="done-button">Thêm</Button>
        <Button id="spinner" style="display: none;" class="done-button"><i style="font-size: 20px;" class="fas fa-spinner fa-spin"></i></Button>

    </div>


    <!-- <input id="submit" type="submit"  name="login" class="done-button" value="Cập nhật" /> -->
</form>