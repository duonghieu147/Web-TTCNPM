<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/cart-list.css">
</head>

<body>


    <div style="min-height: 500px;" class=" container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="cart-title">
                    Giỏ hàng của bạn <span>(<?php echo count($devices) ?> sản phẩm)</span>
                </div>
            </div>
            <div class="col-lg-9 col-12">


                <?php foreach ($devices as  $item) { ?>
                    <div class="cart-product">
                        <div class="cart-img">
                            <img src="<?php echo $item->Img; ?>" alt=""width="200px" height="auto">
                        </div>
                        <div class="cart-info">
                            <div class="cart-img-mobile">

                            </div>
                            <div class="cart-left">
                                <div class="cart-product-name">
                                    <?php echo $item->Name ?>
                                </div>
                                <div class="cart-product-description">
                                    <?php echo $item->Description ?>
                                </div>


                                <div class="product-delete-button-mobile">
                                    Delete
                                </div>

                                <div class="cart-product-trademark">
                                    <span>Thương hiệu</span> <?php echo $item->Supplier ?>
                                </div>
                            </div>
                            <div class="cart-right">
                                <div class="cart-right-top">
                                    <div class="cart-product-price">
                                        <div class="product-new-price">
                                            <?php echo number_format($item->Price * (100 - $item->Discount) / 100, 0, ".", "."); ?> Đ
                                        </div>
                                        <?php if ($item->Discount != 0) { ?>
                                            <div class="product-old-price">
                                                <?php echo number_format($item->Price, 0, ".", "."); ?>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="product-number">
                                        <div class="product-button-minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </div>
                                        <input disabled type="number" value="<?php echo number_format($item->Number, 0, ".", "."); ?>" />
                                        <div class="product-button-add">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </div>
                                    </div>


                                </div>


                                <div class="cart-right-bottom">
                                    <div onclick="removeFromCart(<?php echo $item->Id ?>)" class="product-delete-button">
                                        Delete
                                    </div>
                                    <div class="product-sum-money">
                                        Tổng tiền<?php echo "<span>" . number_format($item->Number * $item->Price * (100 - $item->Discount) / 100, 0, ".", ".") . "</span>"; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cart-right-mobile">
                            <div class="cart-right-top">
                                <div class="cart-product-price">
                                    <div class="product-new-price">
                                        <?php echo number_format($item->Price * (100 - $item->Discount) / 100, 0, ".", "."); ?> Đ
                                    </div>
                                    <div class="product-old-price">
                                        <?php echo number_format($item->Price, 0, ".", "."); ?>
                                    </div>
                                </div>

                                <div class="product-number">
                                    <div class="product-button-minus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                    <input disabled type="number" value="<?php echo number_format($item->Number, 0, ".", "."); ?>" />

                                    <div class="product-button-add">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="product-sum-money">
                                Tổng tiền<?php echo "<span>" . number_format($item->Number * $item->Price * (100 - $item->Discount) / 100, 0, ".", ".") . "</span>"; ?>
                            </div>
                        </div>

                    </div>

                <?php } ?>
            </div>
            <div class="col-lg-3 col-12">
                <div class="pay">
                    <div class="pay-box">
                        Thành tiền:
                        <div class="pay-money">

                            <?php $sum = 0;
                            foreach ($devices as  $item) {
                                $sum += $item->Price * (100 - $item->Discount) / 100 * $item->Number;
                            }
                            ?>
                            <span><?php echo  number_format($sum, 0, ".", "."); ?>đ</span>
                            (Đã bao gồm VAT nếu có)
                        </div>
                    </div>

                    <div class="pay-button" style="margin-bottom: 30px;">
                        Tiến hành đặt hàng
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="javascript/cart_list.js"></script>
</body>

</html>