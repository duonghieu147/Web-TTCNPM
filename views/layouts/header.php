<div class="slide-black"></div>

<div class="sidebar-mobile">
    <a href="">
        <h1><span>D</span>VH</h1>
    </a>
    <ul>
        <li><a href="index.php?controller=pages&action=home">Trang chủ</a></li>
        <li><a href="index.php?controller=pages&action=introduce">Giới thiệu</a></li>
        <li><a href="index.php?controller=pages&action=product">Sản phẩm</a></li>
        <li><a href="index.php?controller=pages&action=table">Bảng giá</a></li>
        <li><a href="index.php?controller=pages&action=contact">Liên hệ</a></li>
        <li><a href="index.php?controller=devices&action=index">Thiết bị</a></li>
        <li>
            <a href="<?php echo Helper::getUrl('', 'devices', 'cartList'); ?>">
                Giỏ hàng
            </a>
        </li>
        <?php if (Role::isLogged()) { ?>
            <li><a href="<?php echo Helper::getUrl('', 'auth', 'login'); ?>">Tài khoản</a></li>
            <li><a href="<?php echo Helper::getUrl('', 'auth', 'logout'); ?>">Đăng xuất</a></li>
        <?php } else { ?>
            <li><a href="<?php echo Helper::getUrl('', 'auth', 'login'); ?>">Đăng nhập</a></li>
        <?php } ?>
    </ul>
</div>

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 col-lg-2 col-xl-2">
                <a href="">
                    <h1><span>D</span>VH</h1>
                </a>
            </div>

            <div class="d-none d-lg-block col-lg-10 col-xl-10">
                <div class="navbar">
                    <a href="index.php?controller=pages&action=home" class="nav-item">Trang chủ</a>
                    <a href="index.php?controller=pages&action=introduce" class="nav-item">Giới thiệu</a>
                    <!-- <a href="index.php?controller=pages&action=product" class="nav-item">Sản phẩm</a>
                    <a href="index.php?controller=pages&action=table" class="nav-item">Bảng giá</a> -->
                    <a href="index.php?controller=pages&action=contact" class="nav-item">Liên hệ</a>
                    <a href="index.php?controller=devices&action=index" class="nav-item">Thiết bị</a>
                    <?php if (Role::isLogged()) { ?>
                        <a href="<?php echo Helper::getUrl('', 'auth', 'login'); ?>" class="nav-item">Tài khoản</a>
                        <a href="<?php echo Helper::getUrl('', 'auth', 'logout'); ?>" class="nav-item">Đăng xuất</a>
                    <?php } else { ?>
                        <a href="<?php echo Helper::getUrl('', 'auth', 'login'); ?>" class="nav-item">Đăng nhập</a>
                    <?php } ?>
                    <a href="<?php echo Helper::getUrl('', 'devices', 'cartList'); ?>" class="nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="d-lg-none d-md-block col-2">
                <div id="buttom-slide" class="buttom-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </div>
            </div>

        </div>
    </div>
</header>