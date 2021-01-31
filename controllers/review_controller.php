
<?php
require_once('controllers/base_controller.php');
require_once('models/model_review.php');
require_once('entity/response.php');

class ReviewController extends BaseController
{
  public $accountTableLimit;

  function __construct()
  {
    $this->folder = 'review';
    $this->model = new Model_Review();
    $this->accountTableLimit = 5;
  }
  // trả về màng hình list review.
  public function reviewPage()
  {


    if (isset($_GET['deviceId'])) {
      $deviceId = $_GET['deviceId'];
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
      $total_pages = ceil($this->model->total($deviceId) / $this->accountTableLimit);
      if ($offset >= $total_pages * $this->accountTableLimit && $total_pages != 0) {
        $offset = $total_pages * $this->accountTableLimit - $this->accountTableLimit;
        $page = $total_pages - 1;
      }

      $list = $this->model->getList($deviceId, $this->accountTableLimit,  $offset);
      $data = array('list' => $list, 'total_pages' => $total_pages, 'page' => $page);
      $this->renderContent('review_page', $data);
    }
  }

  // trả về dialog add review.
  public function addReviewDialog()
  {
    $this->renderContent('add_review_dialog', []);
  }

  // thêm reivew vào database.
  public function addAPI()
  {
    $response = new Response();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && Role::isLogged()) {

      $input['deviceId'] = Helper::getVaulePost('deviceId');
      $input['content'] = Helper::getVaulePost('content');
      $input['star'] = Helper::getVaulePost('star');
      $input['accountId '] = Role::getCurrentId();


      if (empty($input['content'])) {
        $response->Errors[] = "nội dung không được để trống";
        $response->Success = false;
      }
      if (empty($input['deviceId'])) {
        $response->Errors[] = "id thiết bị không được phép để trống";
        $response->Success = false;
      }

      if (empty($input['star'])) {
        $input['star'] = 0;
      }


      if (empty($response->Errors)) {
        $request = new Entity_Review(
          null,
          $input['content'],
          $input['star'],
          $input['deviceId'],
          $input['accountId '],
          null,
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
}
?>