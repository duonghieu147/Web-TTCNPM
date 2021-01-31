<?php


class Helper
{

    static function getUrl($url, $controller = 'pages', $action = 'home')
    {
        return 'index.php?controller=' . $controller . '&action=' . $action . $url;
    }

    static function redirect($url)
    {
        header("Location:{$url}");
        exit();
    }

    static function getVaulePost($key)
    {
        return isset($_POST[$key]) ? trim($_POST[$key]) : null;
    }



    static function isSubmit($name, $key)
    {
        return (isset($_POST[$name]) && $_POST[$name] == $key);
    }

    static function showError($error, $key)
    {
        echo '<span style="color: red">' . (empty($error[$key]) ? "" : $error[$key]) . '</span>';
    }


    static function encodePassword($password)
    {
        return hash('sha256', $password);
    }
}
