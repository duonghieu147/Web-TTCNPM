<link rel="stylesheet" href="css/side-bar.css">

<?php
$accinfo = Role::getAccInfo();

?>
<div class="side-bar">
    <div class="profile">
        <div class="profile-image">

        </div>
        <div class="profile-text">
            <div class="profile-name">
                <?php echo $accinfo['name'] ?>
            </div>
            <div class="profile-email">
                <?php echo $accinfo['email'] ?>
            </div>
        </div>
    </div>

    <ul>

        <?php if (!$accinfo['isAdmin']) { ?>
            <li id="accountInfo">
                <a href="<?php echo Helper::getUrl('', 'auth', 'accountInfo'); ?>">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </i>
                    Thông tin tài khoản
                </a>
            </li>
        <?php } else { ?>

            <li id="webInfo">
                <a href="<?php echo Helper::getUrl('', 'webinfo', 'form'); ?>">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </i>
                    Thông tin trang web
                </a>

            </li>

            <li id="accountManager">
                <a href="<?php echo Helper::getUrl('', 'auth', 'accountManager'); ?>">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                        </svg>
                    </i>
                    Quản lý tài khoản
                </a>
            </li>

            <li id="deviceManager">
                <a href="<?php echo Helper::getUrl('', 'devices', 'deviceManager'); ?>">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hard-drive">
                            <line x1="22" y1="12" x2="2" y2="12"></line>
                            <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                            <line x1="6" y1="16" x2="6.01" y2="16"></line>
                            <line x1="10" y1="16" x2="10.01" y2="16"></line>
                        </svg>
                    </i>
                    Quản lý thiết bị
                </a>
            </li>
        <?php }  ?>


        <li id="changePassword">
            <a href="<?php echo Helper::getUrl('', 'auth', 'changePassword'); ?>">
                <i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </i>
                Đổi mật khẩu
            </a>
        </li>
    </ul>
</div>