<?php
class  ProductModel extends BaseModel
{
    public function __construct()
    {
        $this->conn = $this->connectDb();
    }

    public function insert_product($data)
    {
        $query0 = "INSERT INTO product(ten, danh_muc, mo_ta, nha_san_xuat, so_luong, gia_ban, phan_tram_khuyen_mai, anh, sex) 
                    VALUES('".$data['ten']."','".$data['danh_muc']."','".$data['mo_ta']."','".$data['nha_san_xuat']."','".$data['so_luong']."',
                    '".$data['gia_ban']."','".$data['phan_tram_khuyen_mai']."','".$data['anh']."','".$data['sex']."')";
        if($this->conn->query($query0))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function update_product($data, $id)
    {
        $query1 = "UPDATE product SET ten='".$data['ten']."',danh_muc='".$data['danh_muc']."', mo_ta='".$data['mo_ta']."', nha_san_xuat='".$data['nha_san_xuat']."',
        so_luong='".$data['so_luong']."', gia_ban='".$data['gia_ban']."', phan_tram_khuyen_mai='".$data['phan_tram_khuyen_mai']."', 
        anh='".$data['anh']."' ,sex='".$data['sex']."' WHERE id ='$id'";
        if($this->conn->query($query1))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function delete_product($id)
    {
        $query2 = "DELETE FROM product WHERE id='$id'";
        if($this->conn->query($query2))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_show_product_limit($so_luong) {
        $query = "SELECT * FROM product LIMIT ".$so_luong;
        $result = $this->conn->query($query);
        $data = [];
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function get_show_product($so_product, $page, $search)
    {
//        $query3 = "SELECT id,ten, danh_muc, mo_ta, nha_san_xuat, so_luong, gia_ban, phan_tram_khuyen_mai,anh, sex from product";
//        $result = $this->conn->query($query3);
//        $data=[];
//        if($result->num_rows > 0){
//            while($row = $result->fetch_assoc())
//            {
//                $data[] = $row;
//            }
//            return $data;
//        }
//        else
//        {
//            return false;
//        }

        //start
        $search_theo_noi_dung = "WHERE ten LIKE '%".$search."%'";
        $offset = ($page - 1)* $so_product;
        $query = "SELECT * FROM product ".$search_theo_noi_dung." LIMIT ".$so_product." OFFSET ".$offset;
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
        $search_theo_noi_dung = "WHERE ten LIKE '%".$search."%'";
        $query = "SELECT COUNT(id) AS so_luong FROM product ".$search_theo_noi_dung;
        $so_luong = $this->conn->query($query)->fetch_assoc();//kết quả là 1 array
        //var_dump($so_luong);exit;
        return $so_luong['so_luong'];
    }

    public function get_product_by_id($id)
    {
        $query4 = "SELECT id, ten, danh_muc, mo_ta, nha_san_xuat, so_luong, gia_ban, phan_tram_khuyen_mai, anh, sex FROM product WHERE id='$id'";
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
