<?php
class DanhMucController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_danh_muc()
    {
        $danhMucModel = $this->get_model('DanhMucModel');
        $result = $danhMucModel->get_show_danh_muc();
        $this->render_view('show_danh_muc',['get_show_danh_muc'=> $result]);
    }

    public function page_insert_danh_muc()
    {
        $this->render_view('insert_danh_muc');
    }

    public function do_insert_danh_muc()
    {
        $data = $_POST;
        $message = "";
        if(!isset($data['ten_danh_muc']) || empty($data['ten_danh_muc']))
        {
            $message = $message.'Tên danh mục không được bỏ trống !<br>';
        }
        if(strlen($data['ten_danh_muc']) > 255)
        {
            $message = $message.'Tên danh mục không được quá 255 kí tự !<br>';
        }
        if(!isset($data['mo_ta']) || empty($data['mo_ta']))
        {
            $message = $message.'Mục mô tả không được bỏ trống !<br>';
        }

        if(!empty($message))
        {
            $_SESSION['error_message'] = $message;
            $this->luu_data_session($data);
            $this->redirect('DanhMuc','page_insert_danh_muc');
            exit;
        }
        $userModel = $this->get_model('DanhMucModel');
        if($userModel->insert_danh_muc($data))
        {
            echo 'Insert danh mục thành công';
            $this->redirect('DanhMuc','show_danh_muc');
        }
        else
        {
            echo 'Insert danh mục không thành công';
        }
    }

    public function page_update_danh_muc()
    {
        $danhMucModel = $this->get_model('DanhMucModel');
        $result = $danhMucModel->get_danh_muc_by_id($_GET['id']);
        $this->render_view('update_danh_muc',['get_danh_muc_by_id' => $result]);
    }

    public function do_update_danh_muc()
    {
        $data = $_POST;
        $message = "";
        if(!isset($data['ten_danh_muc']) || empty($data['ten_danh_muc']))
        {
            $message = $message.'Tên danh mục không được bỏ trống !<br>';
        }
        if(strlen($data['ten_danh_muc']) > 255)
        {
            $message = $message.'Tên danh mục không được quá 255 kí tự !<br>';
        }
        if(!isset($data['mo_ta']) || empty($data['mo_ta']))
        {
            $message = $message.'Mục mô tả không được bỏ trống !<br>';
        }

        if(!empty($message))
        {
            $_SESSION['error_message'] = $message;
            $this->luu_data_session($data);
            header('Location: ?controller=DanhMuc&action=page_update_danh_muc&id='.$data['id']);
            exit;
        }
        $danhMucModel = $this->get_model('DanhMucModel');
        if($danhMucModel->update_danh_muc($data,$data['id']))
        {
            echo 'Update danh mục thành công';
            $this->redirect('DanhMuc','show_danh_muc');
        }
        else
        {
            echo 'Update danh mục không thành công';
        }
    }

    public function delete_danh_muc(){
        $danhMucModel = $this->get_model('DanhMucModel');
        if($danhMucModel->delete_danh_muc($_GET['id']))
        {
            echo 'Delete danh mục thành công !';
            $this->redirect('DanhMuc','show_danh_muc');
        }
        else
        {
            echo 'Delete danh mục không thành công !';
        }
    }

    public function luu_data_session($data_luu)
    {
        $_SESSION['id'] = $data_luu['id'];
        $_SESSION['ten_danh_muc'] = $data_luu['ten_danh_muc'];
        $_SESSION['mo_ta'] = $data_luu['mo_ta'];
        $_SESSION['sex'] = $data_luu['sex'];
    }
}
?>