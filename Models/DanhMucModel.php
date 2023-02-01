<?php
class  DanhMucModel extends BaseModel
{
    public function __construct()
    {
        $this->conn = $this->connectDb();
    }

    public function insert_danh_muc($data)
    {
        $query = "INSERT INTO danh_muc(ten_danh_muc, mo_ta, sex) VALUES('".$data['ten_danh_muc']."','".$data['mo_ta']."','".$data['sex']."')";
        if($this->conn->query($query))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function update_danh_muc($data, $id)
    {
        $query1 = "UPDATE danh_muc SET ten_danh_muc='".$data['ten_danh_muc']."', mo_ta='".$data['mo_ta']."', sex='".$data['sex']."' WHERE id ='$id'";
        if($this->conn->query($query1))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function delete_danh_muc($id)
    {
        $query2 = "DELETE FROM danh_muc WHERE id='$id'";
        if($this->conn->query($query2))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_show_danh_muc()
    {
        $query3 = "SELECT id, ten_danh_muc, mo_ta, sex from danh_muc";
        $result = $this->conn->query($query3);
        $data=[];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc())
            {
                $data[] = $row;
            }
            return $data;
        }
        else
        {
            return false;
        }
    }

    public function get_danh_muc_by_id($id)
    {
        $query4 = "SELECT id, ten_danh_muc, mo_ta, sex FROM danh_muc WHERE id='$id'";
        $result = $this->conn->query($query4);
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }
        else
        {
            return false;
        }
    }
}

//$abc = new UserModel();
?>