<?php
include_once("entity/E_Device.php");
class Model_Device
{
    public $error;

    public function __construct()
    {
    }

    public function getList($_limit, $_offset, $_orderby, $_descending)
    {
        global $conn;
        $list = [];
        $sql = "SELECT * FROM device de LEFT JOIN (
            SELECT AVG(review.Star) ReviewPoint,COUNT(*) ReviewTotal,review.DeviceId FROM review GROUP BY review.DeviceId) re ON re.DeviceId = de.Id ORDER BY $_orderby $_descending LIMIT $_limit OFFSET $_offset";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
                $list[] = new Entity_Device(
                    $item['Id'],
                    $item['Name'],
                    $item['Supplier'],
                    $item['Amount'],
                    $item['Description'],
                    $item['Price'],
                    $item['Discount'],
                    $item['Content'],
                    $item['ReviewTotal'],
                    $item['ReviewPoint'],
                    $item['Img']
                );
            }
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
        }
        return $list;
    }


    public function getListWidthIds($_idList)
    {

        if (!empty($_idList)) {
            global $conn;
            $query_ids = implode(",", $_idList);
            $list = [];
            $sql = "SELECT * FROM `device` WHERE Id IN ($query_ids)";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
                    $list[] = new Entity_Device(
                        $item['Id'],
                        $item['Name'],
                        $item['Supplier'],
                        $item['Amount'],
                        $item['Description'],
                        $item['Price'],
                        $item['Discount'],
                        $item['Content'],
                        null,
                        null,
                        $item['Img']
                    );
                }
            } else {
                $this->error[] = "Gọi Server thất bại sql: $sql";
            }
            return $list;
        } else {
            $this->error[] = "ids không có";
            return [];
        }
    }

    public function getListWidthSearch($_limit, $_offset, $_orderby, $_descending, $_keyword, $_searchField, $_min, $_max)
    {
        global $conn;
        $list = [];

        $sql = "SELECT * FROM device de LEFT JOIN (SELECT AVG(review.Star) ReviewPoint,COUNT(*) ReviewTotal,review.DeviceId FROM review GROUP BY review.DeviceId) re ON re.DeviceId = de.Id";
        if (isset($_keyword)) {
            $sql = $sql . " WHERE $_searchField LIKE '%$_keyword%'";
            if ($_max != 0) {
                $sql = $sql . " AND (Price * (100 - Discount)/100) < $_max AND (Price * (100 - Discount)/100) > $_min";
            }
        } else if ($_max != 0) {
            $sql = $sql . " WHERE (Price * (100 - Discount)/100) < $_max AND (Price * (100 - Discount)/100) > $_min";
        }

        if (isset($_descending)) {
            $sql = $sql . " ORDER BY $_orderby $_descending";
        }
        $sql = $sql . " LIMIT $_limit OFFSET $_offset";
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) > 0) {
            foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
                $list[] = new Entity_Device(
                    $item['Id'],
                    $item['Name'],
                    $item['Supplier'],
                    $item['Amount'],
                    $item['Description'],
                    $item['Price'],
                    $item['Discount'],
                    $item['Content'],
                    $item['ReviewTotal'],
                    $item['ReviewPoint'],
                    $item['Img']
                );
            }
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
        }
        return $list;
    }

    public function findOne($_id)
    {
        global $conn;

        $sql = "SELECT * FROM device de LEFT JOIN (
            SELECT AVG(review.Star) ReviewPoint,COUNT(*) ReviewTotal,review.DeviceId FROM review GROUP BY review.DeviceId) re ON re.DeviceId = de.Id WHERE Id = $_id";
        // $sql = "SELECT * FROM device WHERE Id =  $_id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $item = mysqli_fetch_assoc($result);
            if ($item) {
                return new Entity_Device(
                    $item['Id'],
                    $item['Name'],
                    $item['Supplier'],
                    $item['Amount'],
                    $item['Description'],
                    $item['Price'],
                    $item['Discount'],
                    $item['Content'],
                    $item['ReviewTotal'],
                    $item['ReviewPoint'],
                    $item['Img']
                );
            } else {
                $this->error[] = "Gọi Server thất bại sql: $sql";
                return null;
            }
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
            return null;
        }
    }

    function update($request)
    {
        global $conn;
        $sql = "UPDATE Device  SET Name='$request->Name',Supplier='$request->Supplier',Amount =$request->Amount,Description='$request->Description',Price=$request->Price,Discount=$request->Discount,Content='$request->Content',Img='$request->Img' WHERE Id = $request->Id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $this->entity = $request;
            return true;
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
            return false;
        }
    }

    function add($request)
    {
        global $conn;
        $sql = "INSERT INTO Device(Name,Supplier,Amount,Price,Description,Discount,Content) VALUES('$request->Name','$request->Supplier',$request->Amount,$request->Price,'$request->Description',$request->Discount,'$request->Content','$request->Img')";
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
        $sql = "DELETE FROM Device  WHERE Id = $id";
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

        $total_sql = "SELECT COUNT(*) FROM device";
        $result = mysqli_query($conn, $total_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        return $total_rows;
    }
}
