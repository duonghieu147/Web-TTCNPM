<?php

class Role
{
    // Hàm thiết lập là đã đăng nhập
    static function setLogged($id, $username, $email, $name, $isAdmin)
    {
        Session::set('ss_acc_token', array(
            'id' => $id,
            'username' => $username,
            'email' => $email,
            'name' => $name,
            'isAdmin' => $isAdmin
        ));
    }

    // Hàm thiết lập đăng xuất
    static function setLogout()
    {
        Session::delete('ss_acc_token');
    }

    // Hàm kiểm tra trạng thái người dùng đã đăng hập chưa
    static function isLogged()
    {
        $user =  Session::get('ss_acc_token');
        return $user ? true : false;
    }

    static function getAccInfo()
    {
        $user =  Session::get('ss_acc_token');
        return isset($user) ? $user : '';
    }

    static function getCurrentId()
    {
        $user =  Session::get('ss_acc_token');
        return isset($user['id']) ? $user['id'] : '';
    }

    static function getCurrentUsername()
    {
        $user =  Session::get('ss_acc_token');
        return isset($user['username']) ? $user['username'] : '';
    }


    // Hàm kiểm tra có phải là admin hay không
    static function isAdmin()
    {
        $user  = Role::getAccInfo();
        if (!empty($user['isAdmin']) && $user['isAdmin'] == 1) {
            return true;
        }
        return false;
    }
}
