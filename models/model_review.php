<?php
include_once("entity/E_Review.php");
class Model_Review
{
    public $error;

    public function __construct()
    {
    }

    public function getList($_DeviceId, $_limit, $_offset)
    {
        global $conn;
        $list = [];
        $sql = "SELECT re.Id,re.Content,re.Star,re.CreatedTime,re.UpdatedTime,re.DeviceId,re.AccountId,acc.Name FROM review re LEFT JOIN account acc ON re.AccountId = acc.Id WHERE re.DeviceId = $_DeviceId ORDER BY re.UpdatedTime DESC LIMIT $_limit OFFSET $_offset";
        $result = mysqli_query($conn, $sql);



        if (mysqli_num_rows($result) > 0) {
            foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
                $list[] = new Entity_Review(
                    $item['Id'],
                    $item['Content'],
                    $item['Star'],
                    $item['DeviceId'],
                    $item['AccountId'],
                    $item['CreatedTime'],
                    $item['UpdatedTime'],
                    $item['Name']
                );
            }
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
        }

        return $list;
    }

    function add($request)
    {
        global $conn;
        $sql = "INSERT INTO Review(Content,Star,DeviceId ,AccountId) VALUES('$request->Content',$request->Star,$request->DeviceId,$request->AccountId)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $this->entity = $request;
            return true;
        } else {
            $this->error[] = "Gọi Server thất bại sql: $sql";
            return false;
        }
    }

    public function total($_DeviceId)
    {

        global $conn;

        $total_sql = "SELECT COUNT(*) FROM review WHERE DeviceId = $_DeviceId";
        $result = mysqli_query($conn, $total_sql);

        $total_rows = 0;
        if (mysqli_num_rows($result) > 0) {
            $total_rows = mysqli_fetch_array($result)[0];
        }
        return $total_rows;
    }
}
