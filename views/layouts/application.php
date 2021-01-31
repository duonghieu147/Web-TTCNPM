<DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- <title>PVAD</title> -->
    <title>DVH</title>
    <link rel="stylesheet" href="asset/framework/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/framework/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="asset/icon/fontawesome-free-5.15.1-web/css/all.min.css">
    <link rel="stylesheet" href="asset/icon/fontawesome-free-5.15.1-web/css/brands.min.css">
    <link rel="stylesheet" href="css/common/base.css">
    <link rel="stylesheet" href="css/common/card.css">
    <link rel="stylesheet" href="css/common/table.css">
    <link rel="stylesheet" href="css/common/pagination.css">
    <link rel="stylesheet" href="css/common/select.css">
    <link rel="stylesheet" href="css/common/dialog.css">
    <link rel="stylesheet" href="css/common/input.css">
  </head>

  <body>

    <?php require_once('header.php'); ?>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="asset/framework/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/framework/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/framework/ckeditor/ckeditor.js"></script>

    <?= @$content ?>

    <?php require_once('footer.php'); ?>
    <script src="javascript/base.js"></script>
    <script src="asset/framework/sweetalert2/dist/sweetalert2.min.js"></script>

  </body>

  </html>