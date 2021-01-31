<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">

</head>

<body>


    <div class="background">

        <div class="signup">
            <h1 class="signup-heading">Đăng ký</h1>

            <form id="login-form" method="POST" class="signup-form">

                <div class="input-group">
                    <Label for="username" class="signup-label">Tên đăng nhập</Label>
                    <input id="username" type="text" name="username" tabindex="1" class="signup-input" placeholder="Eg: JsonDone">
                    <div id="username_error" class="error-message"></div>
                </div>

                <div class="input-group">
                    <Label for="name" class="signup-label">Họ và tên</Label>
                    <input id="name" type="text" name="name" tabindex="2" class="signup-input">
                    <div id="name_error" class="error-message"></div>
                </div>

                <div class="input-group">
                    <Label for="email" class="signup-label">Email</Label>
                    <input id="email" type="text" name="email" tabindex="3" class="signup-input" placeholder="Eg: uzumakinas@gmai.com">
                    <div id="email_error" class="error-message"></div>
                </div>


                <div class="input-group">
                    <Label for="password" class="signup-label">Mật khẩu</Label>
                    <input id="password" type="password" name="password" tabindex="4" class="signup-input">
                    <div id="password_error" class="error-message"></div>
                </div>

                <div class="input-group">
                    <Label for="repassword" class="signup-label">Nhập lại mật khẩu</Label>
                    <input id="repassword" type="password" name="repassword" tabindex="5" class="signup-input">
                    <div id="repassword_error" class="error-message"></div>
                </div>


                <input id="submit" type="submit" name="login" class="signup-submit" value="Đăng ký" />
                <Button id="spinner" style="display: none;" class="signup-submit"><i style="font-size: 24px;" class="fas fa-spinner fa-spin"></i></Button>
            </form>
            <p class="signup-already">
                <span>Bạn đã có tài khoản?</span>
                <a href="index.php?controller=auth&action=login"><b>Đăng nhập</b></a>
            </p>
        </div>

    </div>

    <script src="javascript/signup.js"></script>
</body>

</html>