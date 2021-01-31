
<?php
require_once('controllers/base_controller.php');
require_once('models/model_device.php');
require_once('entity/response.php');
require_once('entity/E_Device.php');
class DevicesController extends BaseController
{
  public $accountTableLimit;

  function __construct()
  {
    $this->folder = 'devices';
    $this->model = new Model_Device();
    $this->accountTableLimit = 1;
  }
  // trả về màng hình dách sách các thiết bị
  public function index()
  {
    $page = 1;
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    $limit =  2;
    $offset = ($page - 1) * $limit;

    $orderby = 'Name';
    $descending = 'ASC';

    $devices = $this->model->getList($limit, $offset, $orderby, $descending);

    $total_pages = ceil($this->model->total() / $limit);

    $data = array('devices' => $devices, 'total_pages' => $total_pages,);
    $this->render('index', $data);
  }
  // trả về màng hình thông tin chi tiết của thiết bị.
  public function detail()
  {
    $id = 1;
    if (isset($_GET['Id'])) {
      $id = $_GET['Id'];
    }
    $item = $this->model->findOne($id);

    $data = array('item' => $item);
    $this->render('detail', $data);
  }


  // trả về màng hình quản lý thiết bị
  public function deviceManager()
  {



    $total_pages = ceil($this->model->total() / $this->accountTableLimit);

    $data = array('total_pages' => $total_pages);
    $this->render('device_manager',  $data);
  }

  // trả về table list các thiết bị
  public function deviceTable()
  {
    $page = 1;
    $orderby = 'Name';
    $descending = 'ASC';
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    if (isset($_GET['orderby'])) {
      $orderby = $_GET['orderby'];
    }
    if (isset($_GET['descending'])) {
      $descending = $_GET['descending'];
    }



    $offset = ($page - 1) * $this->accountTableLimit;
    $total_pages = ceil($this->model->total() / $this->accountTableLimit);
    if ($offset >= $total_pages * $this->accountTableLimit) {
      $offset = $total_pages * $this->accountTableLimit - $this->accountTableLimit;
      $page = $total_pages - 1;
    }

    $list = $this->model->getList($this->accountTableLimit,  $offset, $orderby, $descending);


    $data = array('list' => $list, 'total_pages' => $total_pages, 'page' => $page);
    $this->renderContent('device_table', $data);
  }

  // trả về list UI các thiết bị.
  public function deviceList()
  {
    $page = 1;
    $orderby = 'Name';
    $descending = 'ASC';
    $searchField = 'Name';
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    if (isset($_GET['orderby'])) {
      $orderby = $_GET['orderby'];
    }
    if (isset($_GET['descending'])) {
      $descending = $_GET['descending'];
    }
    if (isset($_GET['min'])) {
      $min = $_GET['min'];
    }
    if (isset($_GET['max'])) {
      $max = $_GET['max'];
    }
    if (isset($_GET['keyword'])) {
      $keyword = $_GET['keyword'];
    }
    if (isset($_GET['searchField'])) {
      $searchField = $_GET['searchField'];
    }

    $limit = 2;
    $offset = ($page - 1) * $limit;
    $total_pages = ceil($this->model->total() / $limit);
    if ($offset >= $total_pages * $limit) {
      $offset = $total_pages * $limit - $limit;
      $page = $total_pages - 1;
    }

    $list = $this->model->getListWidthSearch($limit,  $offset, $orderby, $descending, $keyword, $searchField, $min, $max);


    $data = array('devices' => $list, 'total_pages' => $total_pages, 'page' => $page);
    $this->renderContent('device_list', $data);
  }

  // xóa một thiết bị khỏi database dựa trên id
  public function deleteAPI()
  {
    $response = new Response();
    if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

      if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $check = $this->model->delete($id);

        if (!$check) {
          $response->Errors = $this->model->error;
          $response->Success = false;
        }
      } else {
        $response->Errors[] = "không có id";
        $response->Success = false;
      }
    } else {

      $response->Errors[] = "không gọi delete";
      $response->Success = false;
    }

    echo json_encode($response);
  }

  // trả về màng hình cập nhập thông tin thiết bị
  public function updateDeviceDialog()
  {

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $check = $this->model->findOne($id);
      $data = [];
      if (!empty($check)) {
        $data =  array('info' => $check);
      }
      $this->renderContent('update_device_dialog', $data);
    }
  }
  // trả về màng hình thêm thiết bị
  public function addDeviceDialog()
  {
    $this->renderContent('add_device_dialog', []);
  }

  // thay đổi thông tin của một thiết bị
  public function updateAPI()
  {
    $response = new Response();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $input['id'] = Helper::getVaulePost('id');
      $input['name'] = Helper::getVaulePost('name');
      $input['supplier'] = Helper::getVaulePost('supplier');
      $input['amount'] = Helper::getVaulePost('amount');
      $input['description'] = Helper::getVaulePost('description');
      $input['discount'] = Helper::getVaulePost('discount');
      $input['price'] = Helper::getVaulePost('price');
      $input['content'] = Helper::getVaulePost('content');


      if (empty($input['id'])) {
        $response->Errors[] = "không có id";
        $response->Success = false;
      }
      if (empty($input['name'])) {
        $response->Errors[] = "name không được để trống";
        $response->Success = false;
      }
      if (!empty($input['discount'] && ($input['discount'] > 100))) {
        $response->Errors[] = "Giảm giá không thể lớn hơn 100%";
        $response->Success = false;
      }
      if (empty($input['price'])) {
        $response->Errors[] = " giá không được để trống";
        $response->Success = false;
      } elseif ($input['price'] <= 0) {
        $response->Errors[] = " giá thiết bị phải lớn hơn 0";
        $response->Success = false;
      }

      if (empty($input['amount']) && $input['amount'] != 0) {
        $response->Errors[] = " Số lượng không được để trống";
        $response->Success = false;
      } elseif ($input['amount'] < 0) {
        $response->Errors[] = " Số lượng thiết bị phải lớn hơn 0 hoặc = 0";
        $response->Success = false;
      }


      if (empty($response->Errors)) {
        $request = new Entity_Device(
          $input['id'],
          $input['name'],
          $input['supplier'],
          $input['amount'],
          $input['description'],
          $input['price'],
          $input['discount'],
          $input['content'],
          null,
          null
        );

        $check = $this->model->update($request);

        if (!$check) {
          $response->Errors[] = array_merge($response->Errors, $this->model->error);
          $response->Success = false;
        } else {
          $response->Data = $this->model->entity;
        }
      }
    } else {

      $response->Errors = "không gọi put";
      $response->Success = false;
    }

    echo json_encode($response);
  }

  // thêm một thiết bị vào database
  public function addAPI()
  {
    $response = new Response();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $input['id'] = Helper::getVaulePost('id');
      $input['name'] = Helper::getVaulePost('name');
      $input['supplier'] = Helper::getVaulePost('supplier');
      $input['amount'] = Helper::getVaulePost('amount');
      $input['description'] = Helper::getVaulePost('description');
      $input['discount'] = Helper::getVaulePost('discount');
      $input['price'] = Helper::getVaulePost('price');
      $input['content'] = Helper::getVaulePost('content');

      if (empty($input['name'])) {
        $response->Errors[] = "name không được để trống";
        $response->Success = false;
      }
      if (isset($input['discount']) && ($input['discount'] > 100)) {
        $response->Errors[] = "Giảm giá không thể lớn hơn 100%";
        $response->Success = false;
      } else if (empty($input['discount'])) {
        $input['discount'] = 0;
      }
      if (empty($input['price'])) {
        $response->Errors[] = " giá không được để trống";
        $response->Success = false;
      } elseif ($input['price'] <= 0) {
        $response->Errors[] = " giá thiết bị phải lớn hơn 0";
        $response->Success = false;
      }

      if (empty($input['amount'])) {
        $response->Errors[] = " Số lượng không được để trống";
        $response->Success = false;
      } elseif ($input['amount'] < 0) {
        $response->Errors[] = " Số lượng thiết bị phải lớn hơn 0 hoặc = 0";
        $response->Success = false;
      }


      if (empty($response->Errors)) {
        $request = new Entity_Device(
          $input['id'],
          $input['name'],
          $input['supplier'],
          $input['amount'],
          $input['description'],
          $input['price'],
          $input['discount'],
          $input['content'],
          $input['img'],
          null,
          null
        );

        $check = $this->model->add($request);

        if (!$check) {
          $response->Errors[] = array_merge($response->Errors, $this->model->error);
          $response->Success = false;
        } else {
          $response->Data = $this->model->entity;
        }
      }
    } else {

      $response->Errors = "không gọi post";
      $response->Success = false;
    }

    echo json_encode($response);
  }

  // thêm thiết bị vào giỏ hàng.
  public function addToCartAPI()
  {
    $response = new Response();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $input['id'] = Helper::getVaulePost('id');
      $input['number'] = Helper::getVaulePost('number');
      if ($input['number'] < 0) {
        $response->Success = false;
        $response->Errors[] = "Số lượng không thể bé hơn không";
      }

      if (empty($response->Errors)) {
        $request = new Entity_Device(
          $input['id'],
          null,
          null,
          null,
          null,
          null,
          null,
          null,
          null,
          null,
          null
        );
        $request->Number = $input['number'];
        Cart::add($request);
      }
    } else {

      $response->Errors[] = "không gọi post";
      $response->Success = false;
    }

    echo json_encode($response);
  }

  // xóa thiết bị vào giỏ hàng.
  public function removeFromCartAPI()
  {
    $response = new Response();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $input['id'] = Helper::getVaulePost('id');

      if (empty($response->Errors)) {
        Cart::delete($input['id']);
      }
    } else {

      $response->Errors[] = "không gọi post";
      $response->Success = false;
    }

    echo json_encode($response);
  }

  // trả về màng hình giỏ hàng của khách hàng
  public function cartList()
  {
    $cartList = Cart::get();
    $ids = [];
    foreach ($cartList as $value) {
      $ids[] = $value->Id;
    }

    $devices = $this->model->getListWidthIds($ids);
    foreach ($devices as $newItem) {
      foreach ($cartList as $oldItem) {
        if ($newItem->Id == $oldItem->Id) {
          $newItem->Number = $oldItem->Number;
        }
      }
    }

    $data = array('devices' => $devices);
    $this->render('cart_list', $data);
  }
}
?>