<?php
class DonHangModel extends BaseModel
{
    public function __construct()
    {
        $this->conn = $this->connectDb();
    }

    public function insert_don_hang($data)
    {
        $query = "INSERT INTO don_hang(ho_ten, sdt, dia_chi, email, trang_thai,tong_tien) VALUES ('".$data['ho_ten']
            ."', '".$data['sdt']."', '".$data['dia_chi']."', '".$data['email']."', '".$data['trang_thai']."', '".$data['Tong_tien_don_hang']."')";
        $result = $this->conn->query($query);
        //$last_id = $this->conn->insert_id;
        //echo $last_id; exit;
        return $result;
    }
    public function lay_id_don_hang()
    {
        $last_id = $this->conn->insert_id;
        return $last_id;
    }
    public function info_don_hang($data)
    {
        $query = "SELECT * FROM don_hang WHERE id='".$data['id_don_hang']."' or sdt='".$data['sdt']."'";
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            return $result->fetch_assoc();
        }
        else
        {
            return false;
        }
    }

    public function luu_chi_tiet_don_hang($id_san_pham=[],$so_luong=[],$id_don_hang)
    {
        $luu_thanh_cong=[];
        for($i = 0; $i < count($id_san_pham);$i++)
        {
            $sql = "INSERT INTO ct_don_hang(id_san_pham, so_luong,id_don_hang) VALUES ('".$id_san_pham[$i]."', '".$so_luong[$i]."', '".$id_don_hang."')";
            if($this->conn->query($sql))
            {
                $luu_thanh_cong[] = $i;
            }
        }
        if(count($luu_thanh_cong) == count($id_san_pham))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
//nếu file không chuyển thành file class thì tức là tên class đang sai
