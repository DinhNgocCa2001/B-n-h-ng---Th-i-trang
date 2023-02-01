<?php
class BaseModel
{
    public function connectDb()
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $db = "data_fashion";

        $conn = new mysqli($hostname, $username, $password, $db);
        if($conn->connect_errno)
        {
            die("Lỗi khi kết nối MySQL");
        }
        return $conn;
    }
}
?>
