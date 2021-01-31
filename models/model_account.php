<?php

include_once("entity/E_Account.php");
class Model_Account
{

    public $error;
    public $entity;

    public function __construct()
    {
        $this->error = array();
        // $this->error['username'] = $this->error['password'] = '';
    }

    function login($username, $password)
    {
        global $conn;
        if (empty($username)) {
            $this->error['username'] = 'Bạn chưa nhập tên đăng nhập';
        }
        if (empty($password)) {
            $this->error['password'] = 'Bạn chưa nhập mật khẩu';
        }

        if (!$this->error) {
            $account =  $this->getAccountByUsername($username);
            if (empty($account)) {
                $this->error['username'] = 'Tên đăng nhập không đúng';
            } else if (Helper::encodePassword($password) != $account->Password) {
                $this->error['password'] = 'Mật khẩu bạn nhập không đúng';
            }

            if (!$this->error) {
                $this->entity = $account;
                $sql = "UPDATE Account SET LastOnline = NOW() WHERE Username = '$username'";
                $result = mysqli_query($conn, $sql);
                return true;
            } else {
                return false;
            }
        }

        return false;
    }


    function add($request)
    {
        global $conn;
        $encodePassword = Helper::encodePassword($request->Password);
        $sql = "INSERT INTO Account(Username,Password,Name,Email) VALUES('$request->Username','$encodePassword','$request->Name','$request->Email')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $this->entity = $request;
            return true;
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
            return false;
        }
    }



    function update($request)
    {
        global $conn;
        $sql = "UPDATE Account SET Name='$request->Name',Email='$request->Email',Phone='$request->Phone',Sex='$request->Sex',Address='$request->Address' WHERE Id = $request->Id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $this->entity = $request;
            return true;
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
            return false;
        }
    }

    function delete($id)
    {
        global $conn;
        $sql = "DELETE FROM Account WHERE Id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            return true;
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
            return false;
        }
    }

    public function total()
    {

        global $conn;

        $total_sql = "SELECT COUNT(*) FROM Account";
        $result = mysqli_query($conn, $total_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        return $total_rows;
    }


    function changePassword($username, $newPassword, $oldPassword)
    {
        global $conn;
        $account =  $this->getAccountByUsername($username);
        if (Helper::encodePassword($oldPassword) != $account->Password) {
            $this->error[] = 'Mật khẩu cũ bạn nhập không đúng';
        } else {
            $encodeNewPassword = Helper::encodePassword($newPassword);
            $sql = "UPDATE Account SET Password='$encodeNewPassword' WHERE Username = '$username'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $this->entity = $account;
                return true;
            } else {

                $this->error[] = "update thất bại model_account-> changePassword $username, $newPassword,$oldPassword,'$sql'";
                return false;
            }
        }
        // $sql = "SELECT * FROM Account where Password = '$password'";
        // $sql = "UPDATE Account SET Name='$request->Name',Email='$request->Email',Phone='$request->Phone',Sex='$request->Sex',Address='$request->Address' WHERE Id = $request->Id";
        // $result = mysqli_query($conn, $sql);
        // if ($result) {
        //     $this->entity = $request;
        //     return true;
        // } else {
        //     return false;
        // }
    }



    function getList($_limit, $_offset, $_orderby)
    {
        global $conn;
        $sql = "SELECT * FROM Account ORDER BY $_orderby ASC LIMIT $_limit OFFSET $_offset";

        $result = mysqli_query($conn, $sql);
        if ($result) {

            foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
                $list[] = new Entity_Account(
                    $item['Id'],
                    $item['Username'],
                    $item['Password'],
                    $item['Name'],
                    $item['Email'],
                    $item['Phone'],
                    $item['Address'],
                    $item['Sex'],
                    $item['LastOnline'],
                    $item['IsAdmin']
                );
            }
            return $list;
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
        }
        return null;
    }

    function getAccountByUsername($username)
    {
        global $conn;
        $sql = "SELECT * FROM Account where Username = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $item = mysqli_fetch_assoc($result);
            if (isset($item)) {
                return new Entity_Account(
                    $item['Id'],
                    $item['Username'],
                    $item['Password'],
                    $item['Name'],
                    $item['Email'],
                    $item['Phone'],
                    $item['Address'],
                    $item['Sex'],
                    $item['LastOnline'],
                    $item['IsAdmin']
                );
            }
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
        }
        return null;
    }
}
