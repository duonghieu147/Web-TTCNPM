<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div id="congty" class="title">
                    Công ty
                </div>
                <ul id="congty-content">
                    <li><a href="">Về chúng tôi</a></li>
                    <li><a href="">khách hàng</a></li>
                    <li><a href="">Điều khoản sử dụng</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
            </div>

            <div class="col-12 col-sm-6  col-md-4 col-lg-3">
                <div class="title">
                    Hỗ trợ
                </div>
                <ul>
                    <li><a href="">Hướng dẫn sử dụng</a></li>
                    <li><a href="">Câu hỏi thường gặp</a></li>
                    <li><a href="">Wiki</a></li>
                    <li><a href="">Hưỡng dẫn sử dụng blog</a></li>
                </ul>
            </div>

            <div class="col-12 col-sm-6  col-md-4 col-lg-3">
                <div class="title">
                    Ngành hàng
                </div>



                <ul>
                    <li><a href="">Cửa hàng thời trang</a></li>
                    <li><a href="">Cửa hàng tạp hóa</a></li>
                    <li><a href="">Cửa hàng mỹ phẩm</a></li>
                    <li><a href="">Cửa hàng đồ chơi</a></li>


                </ul>
            </div>




            <div class="col-12 col-sm-6  col-md-4 col-lg-3">
                <div class="title">
                    Liên hệ
                </div>
                <ul>
                    <li><a href="tel:02866801235">Hotline: <?php echo $webInfo->Phone ?></a></li>
                    <li><a href="">Email: <?php echo $webInfo->Email ?></a></li>
                    <?php if (!empty($webInfo->Webside)) { ?>
                        <li><a href="">Website: <?php echo $webInfo->Webside ?></a></li>
                    <?php } ?>
                </ul>

                <!-- <div class="title">
              Mạng xã hội
            </div> -->
                <ul class="icon-list " style="float: left;">
                    <li><a id="facebook-icon" href="<?php echo $webInfo->Facebook ?>"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a id="twitter-icon" href="<?php echo $webInfo->Twitter ?>"><i class="fab fa-twitter"></i></a></li>
                    <li><a id="google-icon" href=""><i class="fab fa-google"></i></a></li>
                    <li><a id="square-icon" href=""><i class="fa fa-rss-square"></i></a></li>
                </ul>
            </div>


        </div>

    </div>

</footer>

<a id="return-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up">
        <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
</a>