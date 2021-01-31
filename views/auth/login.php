<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">

</head>

<body>


    <div class="background">

        <div class="signup">
            <h1 class="signup-heading">Đăng nhập</h1>

            <form id="login-form" method="POST" class="signup-form">

                <div class="input-group">
                    <Label for="username" class="signup-label">Tên đăng nhập</Label>
                    <input id="username" type="text" name="username" tabindex="1" id="username" class="signup-input" placeholder="Eg: JsonDone">
                    <div id="username_error" class="error-message"></div>
                </div>


                <div class="input-group">
                    <Label for="password" class="signup-label">Mật khẩu</Label>
                    <input id="password" type="password" name="password" tabindex="2" class="signup-input">
                    <div id="password_error" class="error-message"></div>
                </div>


                <input id="submit" type="submit" name="login" class="signup-submit" value="Đăng nhập" />
                <Button id="spinner" style="display: none;" class="signup-submit"><i style="font-size: 24px;" class="fas fa-spinner fa-spin"></i></Button>
            </form>
            <p class="signup-already">
                <span>Bạn chưa có tài khoản?</span>
                <a href="index.php?controller=auth&action=signup"><b>Đăng ký</b></a>
            </p>
        </div>

    </div>

    <script src="javascript/login.js"></script>
</body>

</html>