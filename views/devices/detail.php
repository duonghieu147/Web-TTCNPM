<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/device-detail.css">
</head>

<body>


    <div class="container device-detail">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="device-image">
                    <img src="<?php echo $item->Img; ?>" alt=""width="auto" height="auto">
                </div>
            </div>
            <div class="col-md-6 col-12">

                <div class="detail-info">
                    <?php if ($item->Supplier) { ?>
                        <div class="detail-supplier">
                            Nhà cung cấp: <?php echo $item->Supplier ?>
                        </div>
                    <?php } ?>
                    <h1 class="detail-name">
                        <?php echo $item->Name ?>
                    </h1>

                    <div class="detail-star-list">
                        <?php if ($item->ReviewPoint) { ?>

                            <?php for ($i = 0; $i < 5; $i++) {

                                if ($item->ReviewPoint < $i) { ?>
                                    <i class="fas fa-star"></i>
                                <?php } else if (round($item->ReviewPoint, 1) - $i >= 0.5 && round($item->ReviewPoint, 1) - $i < 1) { ?>
                                    <div class="PStar-half">
                                        <i class="fas fa-star-half star-active"></i>
                                        <i class="fas fa-star"></i>

                                    </div>

                                <?php } else { ?>
                                    <i class="fas fa-star star-active"></i>
                                <?php } ?>

                            <?php } ?>
                        <?php } ?>
                    </div>

                    <div class="detail-description">
                        <?php echo $item->Description ?>
                    </div>

                    <div class="flex" style="margin-bottom: 15px;">
                        <div class="detail-new-price">
                            <?php
                            $price = $item->Price;
                            if ($item->Discount) {
                                $price =  $item->Price * (100 -  $item->Discount) / 100;
                            }
                            echo number_format($price, 0, ".", ".");
                            ?> VND
                        </div>

                        <?php if ($item->Discount) { ?>
                            <div class="detail-old-price">
                                <?php echo number_format($item->Price, 0, ".", "."); ?>
                            </div>
                        <?php } ?>
                    </div>


                    <div class="detail-number">
                        <div class="detail-number-text">
                            Số lượng:
                        </div>
                        <div class="flex" style="align-items: center;">

                            <a onclick="minus()" class="number-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </a>
                            <input id="detail-number" type="number" class="number-button number-input" value="<?php echo $item->Number  ?>">

                            <a onclick="plus( <?php echo $item->Amount ? $item->Amount : 0 ?>)" class="number-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex" style="margin-bottom: 15px;">
                        <div onclick="addToCart('<?php echo $item->Id ?>')" class="add-cart-button">
                            Thêm vào giỏ hàng
                            <div class="add-cart-icon">
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.6441 7.75421V5.22754C13.6441 3.49087 12.2366 2.08337 10.5007 2.08337C8.76407 2.07587 7.34991 3.47671 7.34241 5.21337V5.22754V7.75421" stroke="#116DBE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.4518 17.5003H6.54815C4.58808 17.5003 3 15.9128 3 13.9544V9.35778C3 7.39945 4.58808 5.81195 6.54815 5.81195H14.4518C16.4119 5.81195 18 7.39945 18 9.35778V13.9544C18 15.9128 16.4119 17.5003 14.4518 17.5003Z" stroke="#116DBE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                        </div>

                    </div>
                    <div class="detail-contact">
                        Liện hệ <b>0326829143</b> để được tư vấn hỗ trợ
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="tabs">
        <div class="container-fluid">
            <div class="row text-center">
                <ul class="tab-title">

                    <li id="content-tab" onclick="tabOnClick('content')" class="active">
                        Thông tin sản phẩm
                    </li>
                    <li id="review-tab" onclick="tabOnClick('review')">
                        Khách hàng nhận xét
                    </li>
                </ul>

                <div class="col-12">
                    <div id="review" class="tab-content review">
                        <div class="review-comment">
                            <div style="display: flex;justify-content: space-between;align-items: center;margin-bottom: 10px;">
                                <div class="review-total flex">
                                    Đánh giá <div class="review-total-number"><?php echo $item->ReviewTotal ? $item->ReviewTotal : 0 ?></div>
                                </div>

                                <?php if (Role::isLogged()) { ?>
                                    <div onclick="openAddDialog()" class="add-review-button">
                                        Viết đánh giá
                                    </div>
                                <?php } ?>
                            </div>

                            <div id="review-list">
                            </div>
                        </div>
                    </div>

                    <div id="content" class="tab-content active">
                        <?php echo $item->Content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dialog" style="min-width: 450px">
    </div>
    <div id="dialog-overlay"></div>
    <script src="javascript/detail.js"></script>
</body>

</html>