<?php
include_once("entity/E_WebInfo.php");
class Model_WebInfo
{
    public $error;
    function findOne()
    {
        global $conn;
        $sql = "SELECT * FROM WebInfo where Id = 1";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $item = mysqli_fetch_assoc($result);
            if (isset($item)) {
                return new Entity_WebInfo(
                    $item['Id'],
                    $item['Phone'],
                    $item['Email'],
                    $item['Facebook'],
                    $item['Twitter'],
                    $item['Address'],
                    $item['Webside']
                );
            }
        }
        return null;
    }


    function update($request)
    {
        global $conn;
        $sql = "UPDATE webinfo  SET Phone='$request->Phone',Email='$request->Email',Facebook ='$request->Facebook',Twitter='$request->Twitter',Webside='$request->Webside',Address='$request->Address' WHERE Id = 1";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $this->entity = $request;
            return true;
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
            return false;
        }
    }
}
