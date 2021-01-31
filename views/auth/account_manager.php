<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/account_info.css">

</head>

<body>




    <div class="Pcontainer">

    <?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '\web-php\views\layouts\side-bar.php'); ?>

        <div class="Pcard container-fluid">
            <div class="Pcard-header">
                <h1 class="Pcard-title">Quản lý tài khoản</h1>
            </div>
            <div class="PSelect">
                Sắp xếp theo:
                <div class="form-select">
                    <select name="orderby" id="orderby" onchange="getTable()">
                        <option value="Name">Họ và tên</option>
                        <option value="CreatedTime">Ngày tạo</option>
                        <option value="LastOnline">Lần đăng nhập cuối</option>
                    </select>
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </i>
                </div>

            </div>

            <div id="table" style="overflow-x:auto;">

            </div>
            <?php if ($total_pages > 1) { ?>
                <div class="col-12">


                    <ul class="pagination">


                        <!-- <li class="active">1</li> -->
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>

                            <li onclick="getPage(<?php echo $i ?>)">
                                <?php echo $i; ?>
                            </li>



                        <?php  }   ?>
                    </ul>
                </div>
            <?php  }   ?>
        </div>
    </div>


    <div id="dialog">
    </div>
    <div id="dialog-overlay"></div>

    <script src="javascript/account_manager.js"></script>
</body>

</html>