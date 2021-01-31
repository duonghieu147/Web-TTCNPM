<?php
require_once('models/model_webinfo.php');
require_once('controllers/base_controller.php');
require_once('entity/E_WebInfo.php');
require_once('entity/response.php');
class WebInfoController extends BaseController
{
    function __construct()
    {
        $this->folder = 'webinfo';
        $this->model = new Model_WebInfo();
    }



    public function form()
    {
        $check = $this->model->findOne();
        $data = [];
        if (!empty($check)) {
            $data =  array('info' => $check);
        }
        $this->render('form', $data);
    }

    public function updateAPI()
    {
        $response = new Response();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $input['phone'] = Helper::getVaulePost('phone');
            $input['email'] = Helper::getVaulePost('email');
            $input['facebook'] = Helper::getVaulePost('facebook');
            $input['twitter'] = Helper::getVaulePost('twitter');
            $input['webside'] = Helper::getVaulePost('webside');
            $input['address'] = Helper::getVaulePost('address');


            if (empty($input['phone'])) {
                $response->Errors[] = "Số điện thoại không được để trống";
                $response->Success = false;
            }
            if (empty($input['email'])) {
                $response->Errors[] = "Email không được để trống";
                $response->Success = false;
            }
            if (empty($input['address'])) {
                $response->Errors[] = "Địa chỉ không được để trống";
                $response->Success = false;
            }


            if (empty($response->Errors)) {
                $request = new Entity_WebInfo(
                    null,
                    $input['phone'],
                    $input['email'],
                    $input['facebook'],
                    $input['twitter'],
                    $input['address'],
                    $input['webside']
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
}
