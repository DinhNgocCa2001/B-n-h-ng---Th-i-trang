<?php

class BaiVietController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show_bai_viet()
    {
        if(isset($_GET['search']))
        {
            $search = $_GET['search'];
        }
        else
        {
            $search ='';
        }

        $baivietModel = $this->get_model('BaiVietModel');
        $tong_bai_viet = $baivietModel->get_so_luong($search);
        $page = 1;
        $so_bai =10;
        $tong_so_page = ceil($tong_bai_viet/$so_bai);

        if(isset($_GET['page']))
        {
            $page = $_GET['page'];

            if($_GET['page'] == 0 )
            {
                $page = 1;
            }

            if($_GET['page'] > $tong_so_page )
            {
                $page = $tong_so_page;
            }
        }

        if(isset($_GET['so_bai']))
        {
            $so_bai = $_GET['so_bai'];
        }

        $ds_baiviet = $baivietModel->get_show_bai_viet($so_bai, $page, $search);
        $this->render_view('show_bai_viet', ['get_show_bai_viet' => $ds_baiviet, 'so_bai' => $so_bai, 'tong_bai_viet' => $tong_bai_viet, 'page' => $page, 'search' => $search]);
    }

    public function show_bai_viet_limit() {
        $so_luong_bai = 5;
        $baivietModel = $this->get_model('BaiVietModel');
        $ds_baiviet = $baivietModel->get_bai_viet_limit($so_luong_bai);
        $this->render_view('show_bai_viet_limit', ['get_bai_viet_limit' => $ds_baiviet]);
    }

    public function page_insert_bai_viet()
    {
        $this->render_view('insert_bai_viet');
    }

    public function do_insert_bai_viet()
    {
        //id	tieu_de	gioi_thieu	noi_dung	nguoi_dang	ngay_dang	trang_thai	anh
        $data = $_POST;

        $message = "";

        if(!isset($data['tieu_de']) || empty($data['tieu_de']))
        {
            $message .= "Tiêu đề bài viết không được để trống<br>";
        }

        if(strlen($data['tieu_de']) > 150)
        {
            $message .= "Tiêu đề phải nhỏ hơn 150 ký tự<br>";
        }

        if(!isset($data['gioi_thieu']) || empty($data['gioi_thieu']))
        {
            $message .= "Phần giới thiệu bài viết không được để trống<br>";
        }

        if(strlen($data['gioi_thieu']) > 250)
        {
            $message .= "Phần giới thiệu ngắn gọn phải nhỏ hơn 250 ký tự<br>";
        }

        if(!isset($data['noi_dung']) || empty($data['noi_dung']))
        {
            $message .= "Nội dung bài viết không được để trống<br>";
        }

        if(!isset($data['nguoi_dang']) || empty($data['nguoi_dang']))
        {
            $message .= "Tên người đăng không được để trống<br>";
        }

        if(strlen($data['nguoi_dang']) > 200)
        {
            $message .= "Tên người đăng phải nhỏ hơn 200 ký tự<br>";
        }

        if ($_FILES["anh"]['error'] != 0)
        {
            $message .= "Dữ liệu không được thiếu !<br>";
        }

        if($_FILES['anh']['size'] > 1000000)
        {
            $message .= "File ảnh tải lên quá lớn";
        }

        $targetFile = 'Uploads/'.basename($_FILES['anh']['name']);
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        if($imageFileType !== 'png' && $imageFileType !== 'jpg' && $imageFileType !== 'jpeg' && $imageFileType !== 'gif')
        {
            $message .= "File ảnh tải lên không đúng định dạng (png/jpg/jpeg/gif)";
        }

        move_uploaded_file($_FILES['anh']['tmp_name'], $targetFile);
        $data['anh'] = $targetFile;

        if(!empty($message))
        {
            $_SESSION['error_message']  = $message;
            $this->luu_data_session($data);
            header('Location: ?controller=BaiViet&action=page_insert_bai_viet');
        }
        else
        {
            move_uploaded_file($_FILES['anh']['tmp_name'], $targetFile);
            $baivietModel = $this->get_model('BaiVietModel');

            if($baivietModel->insert_bai_viet($data))
            {
                $this->redirect("BaiViet", "show_bai_viet");
            }
            else
            {
                $_SESSION['error_message'] = "Lỗi khi thêm bài viết";
                $this->luu_data_session($data);
                $this->redirect("BaiViet", "page_insert_bai_viet");
            }

        }
    }

    public function page_update_bai_viet()
    {
        $baivietModel = $this->get_model('BaiVietModel');
        $row = $baivietModel->get_data_by_id($_GET['id']);
        $_SESSION['get_data_by_id'] = $row;
        var_dump($_SESSION['get_data_by_id']);
        $this->render_view('update_bai_viet');//, ['get_data_by_id' => $row]
    }

    public function do_update_bai_viet()
    {
        $id = $_POST['id'];
        $data= $_POST;

        $message = "";
        if (!isset($data['tieu_de']) || empty($data['tieu_de']))
        {
            $message = $message . "Tiêu đề không được bỏ trống" . " ";
        }

        if (strlen($data['tieu_de']) > 200)
        {
            $message = $message . "Phần tiêu đề phải nhỏ hơn 200 kí tự" . " ";
        }

        if (!isset($data['gioi_thieu']) || empty($data['gioi_thieu']))
        {
            $message = $message . "Phần giới thiệu không được bỏ trống" . " ";
        }

        if (strlen($data['gioi_thieu']) > 250)
        {
            $message = $message . "Phần giới thiệu nhỏ hơn 200 kí tự" . " ";
        }

        if (!isset($data['noi_dung']) || empty($data['noi_dung']))
        {
            $message = $message . "Phần nội dung không được bỏ trống" . " ";
        }

        if (!isset($data['trang_thai']))
        {
            $message = $message . "Phải chọn 1 trong các trạng thái";
        }

        if ($_FILES["anh_new"]['error'] != 0)
        {
            $targetFile = $data['anh_old'];
        }
        else
        {
            if($_FILES['anh_new']['size'] > 1000000)
            {
                $message .= "File ảnh tải lên quá lớn";
            }

            $targetFile = 'Uploads/'.basename($_FILES['anh_new']['name']);
            $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

            if($imageFileType !== 'png' && $imageFileType !== 'jpg' && $imageFileType !== 'jpeg' && $imageFileType !== 'gif')
            {
                $message .= "File ảnh tải lên không đúng định dạng (png/jpg/jpeg/gif)";
            }
            move_uploaded_file($_FILES['anh_new']['tmp_name'], $targetFile);
        }
        $data['anh'] = $targetFile;

        if(!empty($message))
        {
            $_SESSION['error_message'] = $message;
            $this->luu_data_session($data);
            header('Location: ?controller=BaiViet&action=page_update_bai_viet&id='.$data['id']);
            exit;
        }
        else
        {
            $baivietModel = $this->get_model('BaiVietModel');
            if ($baivietModel->update_bai_viet($data, $id))
            {
                $this->redirect("BaiViet", "show_bai_viet");
            }
            else
            {
                $_SESSION['error_message'] = "Lỗi khi thêm bài viết";
                $this->luu_data_session($data);
                $this->redirect("BaiViet", "insert_bai_viet");
            }
        }
    }

    public function page_chi_tiet_bai_viet()
    {
        $baivietModel = $this->get_model('BaiVietModel');
        $row = $baivietModel->get_data_by_id($_GET['id']); //luu y
        $this->render_view('show_chi_tiet_bai_viet', ['get_data_by_id' => $row]);
    }

    public function delete_bai_viet()
    {
        $id = $_GET['id'];
        $baiVietModel = $this->get_model('BaiVietModel');
        $baiVietModel->xoa_bai_viet($id);
        $this->redirect("BaiViet", "show_bai_viet");
    }

    function luu_data_session($data_luu)
    {
        $_SESSION['id'] = $data_luu['id'];
        $_SESSION['tieu_de'] = $data_luu['tieu_de'];
        $_SESSION['gioi_thieu'] = $data_luu['gioi_thieu'];
        $_SESSION['noi_dung'] = $data_luu['noi_dung'];
        $_SESSION['nguoi_dang'] = $data_luu['nguoi_dang'];
        $_SESSION['trang_thai'] = $data_luu['trang_thai'];
        $_SESSION['anh'] = $data_luu['anh'];
    }
}

