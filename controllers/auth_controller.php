<?php
require_once('controllers/base_controller.php');
require_once('models/model_account.php');
require_once('entity/response.php');
require_once('entity/E_Account.php');
class AuthController extends BaseController
{
    public $accountTableLimit;

    function __construct()
    {
        $this->folder = 'auth';
        $this->model = new Model_Account();
        $this->accountTableLimit = 2;
    }

    public function login()
    {
        if (!Role::isLogged()) {
            $this->render('login', []);
        } else {

            if (Role::isAdmin()) {
                $this->accountManager();
            } else {
                $this->accountInfo();
            }
        }
    }

    public function accountManager()
    {



        $total_pages = ceil($this->model->total() / $this->accountTableLimit);

        $data = array('total_pages' => $total_pages);
        $this->render('account_manager',  $data);
    }

    public function accountTable()
    {
        $page = 1;
        $orderby = 'Name';
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        if (isset($_GET['orderby'])) {
            $orderby = $_GET['orderby'];
        }

        $offset = ($page - 1) * $this->accountTableLimit;

        $list = $this->model->getList($this->accountTableLimit,  $offset, $orderby);
        $data = array('list' => $list);
        $this->renderContent('account_table', $data);
    }

    public function accountDialog()
    {

        if (isset($_GET['username'])) {
            $username = $_GET['username'];
            $check = $this->model->getAccountByUsername($username);
            $data = [];
            if (!empty($check)) {
                $data =  array('info' => $check);
            }
            $this->renderContent('account_dialog', $data);
        }
    }

    public function accountInfo()
    {
        // login
        $username = Role::getCurrentUsername();
        $check = $this->model->getAccountByUsername($username);
        $data = [];
        if (!empty($check)) {
            $data =  array('info' => $check);
        }

        $this->render('account_info', $data);
    }

    public function signup()
    {

        if (!Role::isLogged()) {
            $this->render('signup', []);
        } else {
            $this->accountInfo();
        }
    }



    public function changePassword()
    {

        if (!Role::isLogged()) {
            $this->render('signup', []);
        } else {
            $this->render('change_password', []);
        }
    }


    public function changePasswordAPI()
    {
        $response = new Response();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $input['username'] = Helper::getVaulePost('username');
            $input['oldPassword'] = Helper::getVaulePost('oldPassword');
            $input['newPassword'] = Helper::getVaulePost('newPassword');
            if (empty($input['username'])) {
                $response->Errors[] = "không có username";
                $response->Success = false;
            } else if (empty($input['oldPassword'])) {
                $response->Errors[] = "không có oldPassword";
                $response->Success = false;
            } else if (empty($input['newPassword'])) {
                $response->Errors[] = "không có newPassword";
                $response->Success = false;
            }

            if (empty($response->Errors)) {
                $check = $this->model->changePassword($input['username'],  $input['newPassword'], $input['oldPassword']);

                if (!$check) {
                    $response->Errors = array_merge($response->Errors, $this->model->error);
                    $response->Success = false;
                } else {
                    $account = $this->model->entity;
                    $response->Data = $account;
                }
            }
        } else {
            $response->Errors[] = "không gọi post";
            $response->Success = false;
        }

        echo json_encode($response);
    }


    public function logout()
    {
        Role::setLogout();
        $url = Helper::getUrl('');
        Helper::redirect($url);
    }




    public function signupAPI()
    {
        $response = new Response();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $input['username'] = Helper::getVaulePost('username');
            $input['password'] = Helper::getVaulePost('password');
            $input['email'] = Helper::getVaulePost('email');
            $input['name'] = Helper::getVaulePost('name');

            if (empty($input['username'])) {
                $response->Errors[] = "username không được để trống";
                $response->Success = false;
            }
            if (empty($input['password'])) {
                $response->Errors[] = "password không được để trống";
                $response->Success = false;
            }
            if (empty($input['name'])) {
                $response->Errors[] = "name không được để trống";
                $response->Success = false;
            }
            if (empty($input['email'])) {
                $response->Errors[] = " email không được để trống";
                $response->Success = false;
            }

            if (empty($response->Errors)) {
                $request = new Entity_Account(
                    null,
                    $input['username'],
                    $input['password'],
                    $input['name'],
                    $input['email'],
                    '',
                    '',
                    '',
                    null,
                    false
                );

                $check = $this->model->add($request);

                if (!$check) {
                    $response->Errors[] = "gọi server thất bại";
                    $response->Success = false;
                } else {
                    $account = $this->model->entity;
                    Role::setLogged($account->Id, $account->Username, $account->Email, $account->Name, $account->IsAdmin);
                    $response->Data = $account;
                }
            }
        } else {

            $response->Errors[] = "không gọi post";
            $response->Success = false;
        }

        echo json_encode($response);
    }


    public function updateAPI()
    {
        $response = new Response();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $input['id'] = Helper::getVaulePost('id');
            $input['sex'] = Helper::getVaulePost('sex');
            $input['phone'] = Helper::getVaulePost('phone');
            $input['email'] = Helper::getVaulePost('email');
            $input['name'] = Helper::getVaulePost('name');
            $input['address'] = Helper::getVaulePost('address');

            if (empty($input['id'])) {
                $response->Errors[] = "không có id";
                $response->Success = false;
            }
            if (empty($input['name'])) {
                $response->Errors[] = "name không được để trống";
                $response->Success = false;
            }
            if (empty($input['email'])) {
                $response->Errors[] = " email không được để trống";
                $response->Success = false;
            }


            if (empty($response->Errors)) {
                $request = new Entity_Account(
                    $input['id'],
                    null,
                    null,
                    $input['name'],
                    $input['email'],
                    $input['phone'],
                    $input['address'],
                    $input['sex'],
                    null,
                    false
                );

                $check = $this->model->update($request);

                if (!$check) {
                    $response->Errors[] = array_merge($response->Errors, $this->model->error);
                    $response->Success = false;
                } else {
                    $account = Role::getAccInfo();
                    Role::setLogout();
                    Role::setLogged($account['id'], $account['username'], $account['email'], $input['name'], false);
                    $response->Data = $account;
                }
            }
        } else {

            $response->Errors = "không gọi post";
            $response->Success = false;
        }

        echo json_encode($response);
    }


    public function deleteAPI()
    {
        $response = new Response();
        if ($_SERVER["REQUEST_METHOD"] == "DELETE") {

            $id = $_GET['id'];

            if (!($id == Role::getCurrentId())) {
                $check = $this->model->delete($id);

                if (!$check) {
                    $response->Errors = $this->model->error;
                    $response->Success = false;
                }
            } else {
                $response->Errors[] = "bạn không thể xóa tài khoản đang sử dụng";
                $response->Success = false;
            }
        } else {

            $response->Errors[] = "không gọi delete";
            $response->Success = false;
        }

        echo json_encode($response);
    }

    public function loginAPI()
    {
        $response = new Response();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $input['username'] = Helper::getVaulePost('username');
            $input['password'] = Helper::getVaulePost('password');

            $check = $this->model->login($input['username'], $input['password']);

            if (empty($check)) {
                $response->Success = false;
                $response->Errors = $this->model->error;
            } else {
                $account = $this->model->entity;
                Role::setLogged($account->Id, $account->Username, $account->Email, $account->Name, $account->IsAdmin);
                $response->Data = $account;
            }
        } else {
            $response->Success = false;
        }

        echo json_encode($response);
    }


    public function checkUsernameAvailable()
    {
        $response = new Response();
        $username = $_GET['username'];
        if ($username) {
            $check = $this->model->getAccountByUsername($username);
            if (empty($check)) {
                $response->Data = false;
            } else {
                $response->Data = true;
            }
        } else {
            $response->Success = false;
        }

        echo json_encode($response);
    }
}
