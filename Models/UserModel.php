<?php
//include("BaseModel.php");

class  UserModel extends BaseModel
{
    public function __construct()
    {
        $this->conn = $this->connectDb();
    }

    public function insert_account($data)
    {
        $query = "INSERT INTO account(ho, ten, email, sdt, dia_chi, user_name, user_password, sex) VALUES ('" . $data['ho'] . "','" . $data['ten'] . "',
        '".$data['email']."','".$data['sdt']."','".$data['dia_chi']."','".$data['user_name']."','".$data['user_password']."','".$data['sex']."')";
        if($this->conn->query($query))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function update_account($data, $id)
    {
        $query1 = "UPDATE account SET ho='".$data['ho']."', ten='".$data['ten']."', email='".$data['email']."', sdt='".$data['sdt']."',
        dia_chi='".$data['dia_chi']."', user_name='".$data['user_name']."', user_password='".$data['user_password']."', sex='".$data['sex']."'
        WHERE id = '$id'";
        if($this->conn->query($query1))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function delete_account($id)
    {
        $query2 = "DELETE FROM account WHERE id='$id'";
        if($this->conn->query($query2))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_data_by_id($id)
    {
        $query3 = "SELECT id, ho, ten, email, sdt, dia_chi, user_name, sex FROM account WHERE id='$id'";
        if($result = $this->conn->query($query3))
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

    public function check_login($data)
    {
        $query4 = "SELECT user_name, user_password FROM account WHERE user_name = '".$data['user_name']."' and user_password = '".$data['user_password']."'";
        if($this->conn->query($query4)->num_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

//$abc = new UserModel();
?>