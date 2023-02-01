
<?php
class BaiVietModel extends BaseModel
{
    public function __construct()
    {
        $this->conn = $this->connectDb();
    }

    public function get_show_bai_viet($so_bai, $page, $search)
    {
        $search_theo_noi_dung = "WHERE gioi_thieu LIKE '%".$search."%'";
        $offset = ($page - 1)* $so_bai;
        $query = "SELECT * FROM bai_viet ".$search_theo_noi_dung." LIMIT ".$so_bai." OFFSET ".$offset;
        $result = $this->conn->query($query);
        $data = [];
        if($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function get_so_luong($search)
    {
        $search_theo_noi_dung = "WHERE gioi_thieu LIKE '%".$search."%'";
        $query = "SELECT COUNT(id) AS so_luong FROM bai_viet ".$search_theo_noi_dung;
        $so_luong = $this->conn->query($query)->fetch_assoc();//kết quả là 1 array
        //var_dump($so_luong);exit;
        return $so_luong['so_luong'];
    }

    public function get_bai_viet_limit($so_luong) {
        $query = "SELECT * FROM bai_viet LIMIT ".$so_luong;
        $result = $this->conn->query($query);
        $data = [];
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function get_data_by_id($id)
    {
        $query = "SELECT * FROM bai_viet where id=". $id;
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function insert_bai_viet($data)
    {
        $query = "INSERT INTO bai_viet(tieu_de, gioi_thieu, noi_dung, nguoi_dang, trang_thai,anh) VALUES ('".$data['tieu_de']
            ."', '".$data['noi_dung']."', '".$data['gioi_thieu']."', '".$data['nguoi_dang']."', '".$data['trang_thai']."','".$data['anh']."')";
        $result = $this->conn->query($query);
        return $result;
    }

    public function update_bai_viet($data, $id){
        $query2 = "UPDATE bai_viet 
    SET tieu_de='" . $data['tieu_de'] . "',
     gioi_thieu='" . $data['gioi_thieu'] . "',
     noi_dung='" . $data['noi_dung'] . "',
     nguoi_dang='" . $data['nguoi_dang'] . "',
     trang_thai='" . $data['trang_thai'] . "',
     anh='" . $data['anh']. "'
    WHERE id= '$id'";

        if($this->conn->query($query2))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function delete_bai_viet($id) {
        $query = "DELETE FROM bai_viet WHERE id=".$id;
        return $this->conn->query($query);
    }


    public function __destruct()
    {
        $this->conn->close();
    }
}