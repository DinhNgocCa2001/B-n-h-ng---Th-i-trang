<?php
//include("BaseController.php");
class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function page_register()
    {
        $this->render_view('register');
    }
    public function do_register()
    {
        $data = $_POST;
        $message = "";

        if(!isset($data['ten']) || empty($data['ten']))
        {
            $message = $message.'Firstname không được để trống<br>';
        }
        if(strlen($data['ten']) > 50)
        {
            $message = $message.'Firstname không được vượt quá 50 kí tự<br>';
        }
        if(!isset($data['ho']) || empty($data['ho']))
        {
            $message = $message.'Lastname không được để trống<br>';
        }
        if(strlen($data['ho']) > 50)
        {
            $message = $message.'Lastname không được vượt quá 50 kí tự<br>';
        }
        if(!isset($data['email']) || empty($data['email']))
        {
            $message = $message.'Email không được để trống<br>';
        }
        if(strlen($data['email']) > 100)
        {
            $message = $message.'Email không được vượt quá 100 kí tự<br>';
        }
        if(!isset($data['sdt']) || empty($data['sdt']))
        {
            $message = $message.'Phone number không được để trống<br>';
        }
        if(strlen($data['sdt']) > 20)
        {
            $message = $message.'Phone number không được vượt quá 20 kí tự<br>';
        }
        if(!isset($data['dia_chi']) || empty($data['dia_chi']))
        {
            $message = $message.'Địa chỉ không được để trống<br>';
        }
        if(!isset($data['user_name']) || empty($data['user_name']))
        {
            $message = $message.'Username không được để trống<br>';
        }
        if(strlen($data['user_name']) > 50)
        {
            $message = $message.'Username không được vượt quá 50 kí tự<br>';
        }
        if(!isset($data['user_password']) || empty($data['user_password']))
        {
            $message = $message.'Password không được để trống<br>';
        }

        if(!empty($message))
        {
            $_SESSION['error_message'] = $message;
            $this->luu_data_session($data);
            $this->redirect('User','page_register');
            exit;
        }
        $data['user_password'] = md5($data['user_password']);
        $userModel = $this->get_model('UserModel');
        if($userModel->insert_account($data))
        {
            echo 'Insert account thành công';
            $this->redirect('Product','two_column_layout');
        }
        else
        {
            echo 'Insert account không thành công';
        }



    }

    public function luu_data_session($data_luu) {
        $_SESSION['ten'] = $data_luu['ten'];
        $_SESSION['ho'] = $data_luu['ho'];
        $_SESSION['email'] = $data_luu['email'];
        $_SESSION['sdt'] = $data_luu['sdt'];
        $_SESSION['dia_chi'] = $data_luu['dia_chi'];
        $_SESSION['user_name'] = $data_luu['user_name'];
    }

    public function page_login()
    {
        $this->render_view('login');
    }
    public function do_login()
    {
        $admin_type = 1;
        $user_type = 2;

        $data = $_POST;
        $message = "";

        if(!isset($data['user_name']) || empty($data['user_name']))
        {
            $message = $message.'Username không được để trống<br>';
        }
        if(strlen($data['user_name']) > 50)
        {
            $message = $message.'Username không được vượt quá 50 kí tự<br>';
        }
        if(!isset($data['user_password']) || empty($data['user_password']))
        {
            $message = $message.'Password không được để trống<br>';
        }

        if(!empty($message))
        {
            $_SESSION['error_message'] = $message;
            $this->luu_data_session($data);
            $this->redirect('User','page_login');
            exit;
        }
        $data['user_password'] = md5($data['user_password']);
        $userModel = $this->get_model('UserModel');
        if($userModel->check_login($data))
        {
            if($data['user_name'] == 'admin')
            {
                $_SESSION['is_login'] = $admin_type;
            }
            else
            {
                $_SESSION['is_login'] = $user_type;
            }
            echo 'Check login account thành công';
            $this->redirect('Product','two_column_layout');
        }
        else
        {
            $_SESSION['error_message'] = 'Tên tài khoản hoặc mật khẩu không chính xác !';
            $this->redirect('User','page_login');
            echo 'Check login account không thành công';
        }
    }
}