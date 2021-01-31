<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>

    <style>
        .Pcard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-button {
            padding: 10px 30px;
            color: white;
            font-size: 16px;
            text-align: center;
            border: 0;
            width: auto;
            outline: none;
            display: block;
            border-radius: 10px;
            background-color: rgb(131, 201, 19);
            font-family: "Poppins", sans-serif;
            cursor: pointer;
            font-weight: 400;
            margin: 0;
        }

        @media (max-width: 400px) {
            .Pcard-header {
                display: block;
                text-align: center;

            }

            .Pcard-title {
                margin-bottom: 12px;
            }

            .add-button {
                width: 100%;
            }

        }

        @media (max-width: 768px) {
            .Pcontainer {
                display: block;
            }

            .Pcard {
                margin: 16px;
                width: auto;
            }
        }

        .ck-editor__editable {
            min-height: 250px;
        }

        .errorMessages {
            margin: 12px;
        }
    </style>


    <div class="Pcontainer">

        <?php require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '\web-php\views\layouts\side-bar.php'); ?>

        <div class="Pcard container-fluid">
            <div class="Pcard-header">
                <h1 class="Pcard-title">Quản lý thiết bị</h1>
                <Button onclick="openAddDialog()" class="add-button">Thêm Thiết bị</Button>
            </div>
            <div class="PSelect">
                Sắp xếp theo:
                <div class="form-select">
                    <select name="orderby" id="orderby" onchange="getTableDevice()">
                        <option value="Name">Tên</option>
                        <option value="Amount">Số lượng</option>
                        <option value="Price">Giá</option>
                        <option value="Discount">Giảm giá</option>
                    </select>
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </i>
                </div>
                <div class="form-select">
                    <select name="descending" id="descending" onchange="getTableDevice()">
                        <option value="ASC">Tăng dần </option>
                        <option value="DESC">Giảm dần</option>

                    </select>
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </i>
                </div>

            </div>

            <div id="table">

            </div>
        </div>
    </div>



    <div id="dialog">
    </div>
    <div id="dialog-overlay"></div>

    <script src="javascript/device_manager.js"></script>
    <script src="javascript/device_dialog.js"></script>
</body>

</html>