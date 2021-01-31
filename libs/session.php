<?php
class Session {
   // Gán session (SET)
  static function set($key, $val){
    $_SESSION[$key] = $val;
  }

  // Lấy session (GET)
  static function get($key){
    return (isset($_SESSION[$key])) ? $_SESSION[$key] : null;
  }

  // Xóa session (DELETE)
  static function delete($key){
    if (isset($_SESSION[$key])){
      unset($_SESSION[$key]);
    }
  }
}


?>