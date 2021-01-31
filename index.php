  <?php
  require_once('libs/connection.php');
  require_once('libs/session.php');
  require_once('libs/role.php');
  require_once('libs/helper.php');
  require_once('libs/cart.php');
  db_connect();
//   Khi truy cập vào website sẽ nhận 2 biến $_GET là controller và action từ url (nếu
// chưa có thì mặc định controller = pages, action = home)
  session_start();
  if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    if (isset($_GET['action'])) {
      $action = $_GET['action'];
    } else {
      $action = 'index';
    }
  } else {
    $controller = 'pages';
    $action = 'home';
  }

  require_once('routes.php');
  db_close();
  ?>


