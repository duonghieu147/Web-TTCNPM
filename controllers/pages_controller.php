<?php

require_once('controllers/base_controller.php');
class PagesController extends BaseController
{
    function __construct()
    {
        $this->folder = 'pages';
    }
    // trả về view trang chủ.
    public function home()
    {
        $this->render('home', []);
    }

    //chưa làm
    public function table()
    {
        $this->render('table', []);
    }

    // trả về view giới thiệu sản phẩm.
    public function product()
    {
        $this->render('product', []);
    }

    // trả về view liên hệ.
    public function contact()
    {
        $this->model = new Model_WebInfo();
        $check = $this->model->findOne();
        $data = [];
        if (!empty($check)) {
            $data =  array('info' => $check);
        }
        $this->render('contact', $data);
    }
    // trả về view thiết bị.
    public function device()
    {
        $this->render('device', []);
    }

    // trả về view giới thiệu.
    public function introduce()
    {
        $this->render('introduce', []);
    }

    public function error()
    {
        $this->render('error');
    }
}
