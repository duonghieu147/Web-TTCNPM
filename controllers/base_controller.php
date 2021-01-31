
<?php
require_once('models/model_webinfo.php');
class BaseController
{
    protected $folder;
    protected $model;

    function render($file, $data = array())
    {
        $view_file = 'views/' . $this->folder . '/' . $file . '.php';

        // Kiểm tra file gọi đến có tồn tại hay không?
        if (is_file($view_file)) {
            extract($data);

            // lưu nội dung của file vào biến $content
            ob_start();
            require_once($view_file);
            $content = ob_get_clean();
            $modelWebInfo = new Model_WebInfo();
            $webInfo = $modelWebInfo->findOne();
            // trong file application.php hiện thị biến $content
            require_once('views/layouts/application.php');
        } else {

            // Nếu file muốn gọi ra không tồn tại thì chuyển hướng đến trang báo lỗi.
            Helper::redirect("index.php?controller=pages&action=error");
        }
    }


    function renderContent($file, $data = array())
    {
        $view_file = 'views/' . $this->folder . '/' . $file . '.php';

        // Kiểm tra file gọi đến có tồn tại hay không?
        if (is_file($view_file)) {
            extract($data);

            // lưu nội dung của file vào biến $content
            ob_start();
            require_once($view_file);
            $content = ob_get_clean();

            echo $content;
            // trong file application.php hiện thị biến $content

        } else {
            echo  $view_file;
        }
        // else {

        //     // Nếu file muốn gọi ra không tồn tại thì chuyển hướng đến trang báo lỗi.
        //     Helper::redirect("index.php?controller=pages&action=error");
        // }


    }
}
?>