<?php foreach ($devices as $item) {
?>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <a href="index.php?controller=devices&action=detail&Id=<?php echo $item->Id; ?>">
            <div class="device">
                <div class="device-image">
                    <!-- <img src="" alt="" style="width:300px"> -->
                    <img src="<?php echo $item->Img; ?>" alt="" width="auto" height="180px" position="relative">
                    <?php if ($item->Discount) { ?>
                        <div class="device-price-discount">
                            - <?php echo $item->Discount; ?>%
                        </div>
                    <?php } ?>
                </div>
                <div class="device-information">
                    <h2 class="device-title">
                        <?php echo $item->Name; ?>
                    </h2>
                    <span class="device-description">
                        <?php echo $item->Description; ?>
                    </span>


                    <div class="device-star-list">

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
                        <?php } else { ?>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        <?php }  ?>
                        <?php echo "(" . ($item->ReviewTotal ? $item->ReviewTotal : 0) . ")" ?>
                    </div>
                </div>
                <div class="flex">
                    <div class="device-price">
                        <div class="new-price">
                            <?php
                            $price = $item->Price;
                            if ($item->Discount) {
                                $price =  $item->Price * (100 -  $item->Discount) / 100;
                            }
                            echo number_format($price, 0, ".", ".");
                            ?> VND
                        </div>

                        <?php if ($item->Discount) { ?>
                            <div class="old-price">
                                <?php echo number_format($item->Price, 0, ".", "."); ?>
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
        <div class="Ppagination">
            <ul>

                <li class="prev">
                    <i onclick="goToPage(<?php echo $page - 1 ?>)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </i>
                </li>


                <?php if ($page - 2 > 0 && $total_pages > 3) { ?>

                    <li>
                        ...
                    </li>
                <?php } ?>

                <!-- <li class="active">1</li> -->
                <?php
                $start = 1;
                $end = $total_pages;
                if ($total_pages > 3) {
                    if ($page == 1) {
                        $start = 1;
                        $end = $page + 2;
                    } else if ($page == $total_pages) {
                        $start = $page - 2;
                        $end = $total_pages;
                    } else {
                        $start = $page - 1;
                        $end = $page + 1;
                    }
                }
                ?>

                <?php for ($i = $start; $i <= $end; $i++) {

                ?>
                    <li class="<?php echo $page == $i ? 'active' : '' ?>" onclick="getPage(<?php echo  $i ?>)">
                        <?php echo $i; ?>
                    </li>

                <?php  }   ?>

                <?php if ($page + 2 <= $total_pages && $total_pages > 3) { ?>

                    <li>
                        ...
                    </li>
                <?php } ?>

                <li class="next">
                    <i onclick="goToPage('<?php echo $page + 1 ?>')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </i>
                </li>
            </ul>
        </div>
    </div>

<?php  }   ?>