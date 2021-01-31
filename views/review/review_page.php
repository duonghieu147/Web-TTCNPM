<?php foreach ($list as $review) { ?>

    <div style="margin-bottom: 30px;">
        <div class="flex" style="align-items: center;">
            <div class="user-image">

            </div>
            <div class="user-info">
                <div class="user-name">
                    <?php echo $review->Name ?>
                </div>
                <div class="review-time">
                    <?php $time =  strtotime($review->CreatedTime);
                    echo "Nhận xét vào " . date('d', $time) . " tháng " . date('m', $time) . ", " . date('Y', $time) ?>
                </div>
                <div class="review-star-list">
                    <?php
                    if ($review->Star) { ?>

                        <?php for ($i = 0; $i < 5; $i++) {

                            if ($review->Star <= $i) { ?>
                                <i class="fas fa-star"></i>
                            <?php } else if (round($review->Star, 1) - $i >= 0.5 && round($review->Star, 1) - $i < 1) { ?>
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
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="review-content">
            <?php echo $review->Content ?>
        </div>
    </div>

<?php } ?>


<?php if ($total_pages > 1) { ?>



    <div class="Ppagination">
        <ul>

            <li class="prev">
                <i onclick="goToReviewPage(<?php echo $page - 1 ?>)">
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
                <li class="<?php echo $page == $i ? 'active' : '' ?>" onclick="goToReviewPage(<?php echo  $i ?>)">
                    <?php echo $i; ?>
                </li>

            <?php  }   ?>

            <?php if ($page + 2 <= $total_pages && $total_pages > 3) { ?>

                <li>
                    ...
                </li>
            <?php } ?>

            <li class="next">
                <i onclick="goToReviewPage(<?php echo $page + 1 ?>)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </i>
            </li>
        </ul>
    </div>

<?php  }   ?>