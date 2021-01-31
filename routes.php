<?php
// Tại file routes sẽ tiến hành kiểm tra controller và action nếu cả 2 đều hợp lệ thì sẽ tiến hành khởi tại class
// controller tương ứng và chạy action tương ứng

$controllers = array(
    'pages' => ['home', 'table', 'product', 'contact', 'introduce', 'device', 'error'],
    'devices' => ['index', 'detail', 'addDeviceDialog', 'updateDeviceDialog', 'deviceManager', 'updateAPI', 'addAPI', 'deleteAPI', 'deviceTable', 'deviceList', 'removeFromCartAPI', 'addToCartAPI', 'cartList'],
    'auth' => ['login', 'logout', 'signup', 'signupAPI', 'updateAPI', 'deleteAPI', 'accountDialog', 'accountInfo', 'accountManager', 'accountTable', 'changePasswordAPI', 'changePassword', 'checkUsernameAvailable', 'loginAPI'],
    'review' => ['reviewPage', 'addReviewDialog', 'addAPI'],
    'webinfo' => ['form', 'updateAPI'],
);


// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

include_once('controllers/' . $controller . '_controller.php');

// ucwords chuyển ký tự đầu thanh chữ hoa
// $controller = "pages" => $klass = "PagesController";
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;

// vd :  $controller = "pages_controller" và $action = "home" 
// thì $controller->$action() nghĩa là gọi tới hàm home trong class pages_controller hay pages_controller.home();
$controller->$action();
