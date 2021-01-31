<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/device.css">
</head>

<body>



    <?php
    require_once('connection.php');

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $limit =  12;
    $offset = ($page - 1) * $limit;

    // lấy tổng số lượng sản phẩm
    $total_pages_sql = "SELECT COUNT(*) FROM device";
    $result = mysqli_query($link, $total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $limit);


    $sql = "SELECT * FROM device LIMIT $limit OFFSET $offset";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        die("Database query failed: " . mysqli_error($link));
    }

    mysqli_close($link);
    ?>
    <div class="container-fluid list">
        <div class="row">

            <?php while ($row = mysqli_fetch_assoc($result)) {  ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <a href="device-detail.php">
                        <div class="device">
                            <div class="device-image">   
                                <img src="" alt="">
                                <?php echo $row["Img"]; ?>
                                <?php if ($row["Discount"]) { ?>
                                    <div class="device-price-discount">
                                        - <?php echo $row["Discount"]; ?>%
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="device-information">
                                <h2 class="device-title">
                                    <?php echo $row["Name"]; ?>
                                </h2>
                                <span class="device-description">
                                    <?php echo $row["Description"]; ?>
                                </span>
                                <div class="device-star-list">
                                    <i class="fas fa-star star-active"></i>
                                    <i class="fas fa-star star-active"></i>
                                    <i class="fas fa-star star-active"></i>
                                    <i class="fas fa-star star-active"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="device-price">
                                    <div class="new-price">
                                        <?php
                                        $price = $row["Price"];
                                        if ($row["Discount"]) {
                                            $price = $row["Price"] * (100 - $row["Discount"]) / 100;
                                        }
                                        echo number_format($price, 0, ".", ".");
                                        ?> VND
                                    </div>

                                    <?php if ($row["Discount"]) { ?>
                                        <div class="old-price">
                                            <?php echo number_format($row["Price"], 0, ".", "."); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="cart-button">
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.6441 7.75421V5.22754C13.6441 3.49087 12.2366 2.08337 10.5007 2.08337C8.76407 2.07587 7.34991 3.47671 7.34241 5.21337V5.22754V7.75421" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4518 17.5003H6.54815C4.58808 17.5003 3 15.9128 3 13.9544V9.35778C3 7.39945 4.58808 5.81195 6.54815 5.81195H14.4518C16.4119 5.81195 18 7.39945 18 9.35778V13.9544C18 15.9128 16.4119 17.5003 14.4518 17.5003Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                </div>
                </a>
            <?php  }   ?>


            <?php if ($total_pages > 1) { ?>
                <div class="col-12">


                    <ul class="pagination">
                        <!-- <li class="active">1</li> -->
                        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                            <a href="?page=<?php echo $i; ?>">
                                <li class="<?php if ($i == $page) echo "active" ?>">
                                    <?php echo $i; ?>
                                </li>
                            </a>


                        <?php  }   ?>
                    </ul>
                </div>
            <?php  }   ?>
        </div>
    </div>

</body>

</html>