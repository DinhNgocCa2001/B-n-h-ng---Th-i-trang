<?php
class DonHangController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function page_thanh_toan()
    {
        $this->render_view('thanh_toan');
    }

    public function info_don_hang()
    {
        $data= $_POST;
        $donHangModel = $this->get_model('DonHangModel');
        $donHang[] = $donHangModel->info_don_hang($data);//vì nếu có 1 phần tử thì không truy cập được nên gán bằng mảng là ok
        if($donHang && isset($donHang[0]['id']))
        {
            $this->render_view('show_don_hang', ['info_don_hang' => $donHang]);
        }
        else
        {
            $_SESSION['error_message'] .= "Không tìm thấy đơn hàng";
            $this->redirect('Product','two_column_layout');
        }
    }

    public function do_thanh_toan_luu_don_hang()
    {
        //Tong_tien_don_hang
        $data = $_POST;
        $_SESSION['id_ct_san_pham'] = $data['id'];
        $_SESSION['so_luong_ct_san_pham'] = $data['so_luong'];
        //$_SESSION['phan_tram_khuyen_mai'] = $data['phan_tram_khuyen_mai'];
//        var_dump($_SESSION['id_ct_san_pham']);
//        echo '<br>';
//        var_dump($data);
//        exit;
        $message = "";

        if(!isset($data['ho_ten']) || empty($data['ho_ten']))
        {
            $message .= "Tên không được để trống<br>";
        }

        if(strlen($data['ho_ten']) > 255)
        {
            $message .= "Tên phải nhỏ hơn 255 ký tự<br>";
        }

        if(!isset($data['sdt']) || empty($data['sdt']))
        {
            $message .= "Số điện thoại không được để trống<br>";
        }

        if(strlen($data['sdt']) >11)
        {
            $message .= "Số điện thoaj phải nhỏ hơn 11 ký tự<br>";
        }

        if(!is_numeric($data['sdt']))
        {
            $message .= "Số điện thoại chỉ bao gồm các chữ số từ 0 đến 9<br>";
        }

        if(!isset($data['dia_chi']) || empty($data['dia_chi']))
        {
            $message .= "Địa chỉ không được để trống<br>";
        }

        if(!isset($data['email']) || empty($data['email']))
        {
            $message .= "Địa chỉ không được để trống<br>";
        }

        if(!isset($data['trang_thai']) || empty($data['trang_thai']))
        {
            $message .= "Trạng thái  không được để trống<br>";
        }

        if(!empty($message))
        {
            $_SESSION['error_message']  = $message;
            $this->luu_data_session($data);
            $this->redirect('DonHang', 'page_thanh_toan');
            exit;
        }
        $donhangModel = $this->get_model('DonHangModel');
        if($donhangModel->insert_don_hang($data))
        {
            $_SESSION['id_ct_don_hang'] = $donhangModel->lay_id_don_hang();
            $this->redirect("DonHang", "luu_chi_tiet_don_hang");
        }
        else
        {
            $_SESSION['tin_nhan_loi'] = "Lỗi khi thêm đơn hàng";
            $this->luu_data_session($data);
            $this->redirect("DonHang", "page_thanh_toan");
        }
    }

    public function them_sp_vao_gio_hang()
    {
        $_POST['so_luong'] = 1;
        $gio_hang = $_SESSION['gio_hang'];
        $_SESSION['gio_hang'] = [];
        $is_new = true;

        foreach($gio_hang as $san_pham)
        {
            if($san_pham['id'] == $_POST['id'])
            {
                $san_pham['so_luong'] +=1;
                $is_new = false;
            }
            $_SESSION['gio_hang'][] = $san_pham;
        }

        if($is_new)
        {
            $_SESSION['gio_hang'][] = $_POST;
        }

        $this->redirect('DonHang', 'page_gio_hang');

    }
    public function page_gio_hang()
    {
        //var_dump($_SESSION['gio_hang']); exit;
        if(!isset($_SESSION['gio_hang']) || empty($_SESSION['gio_hang']))
        {
            $_SESSION['gio_hang'] = [];
        }
        $this->render_view('gio_hang',['gio_hang' => $_SESSION['gio_hang']]);
    }

    public function luu_chi_tiet_don_hang()
    {
        $donhangModel = $this->get_model('DonHangModel');
        if($donhangModel->luu_chi_tiet_don_hang($_SESSION['id_ct_san_pham'],$_SESSION['so_luong_ct_san_pham'],$_SESSION['id_ct_don_hang']))
        {
            $_SESSION['luu_don_hang']='Lưu đơn hàng thành công';
            $this->redirect("DonHang", "page_thanh_toan");
        }
        else
        {
            $_SESSION['luu_don_hang'] = 'Lỗi khi thêm chi tiết đơn hàng';
            $this->redirect("DonHang", "page_thanh_toan");
        }
    }

    public function do_update_don_hang()
    {
        $result = [];
        foreach($_SESSION['gio_hang'] as $san_pham)
        {
            for($i=0; $i < count($_POST['id']); $i++)
            {
                if($san_pham['id'] == $_POST['id'][$i])
                {
                    $san_pham['so_luong'] = $_POST['so_luong'][$i];
                }
            }
            $result[] = $san_pham;
        }
        $_SESSION['gio_hang'] = $result;
        $this->render_view('gio_hang',['gio_hang' => $_SESSION['gio_hang']]);
    }

    public function delete_san_pham_gio_hang()
    {

        $result = [];
        foreach($_SESSION['gio_hang'] as $san_pham)
        {
            if($san_pham['id'] != $_GET['id'])
            {
                $result[] = $san_pham;
            }
        }
        $_SESSION['gio_hang'] = $result;
        $this->render_view('gio_hang', ['gio_hang' =>$_SESSION['gio_hang']]);

    }

    function luu_data_session($data_luu)
    {
        $_SESSION['ho_ten'] = $data_luu['ho_ten'];
        $_SESSION['sdt'] = $data_luu['sdt'];
        $_SESSION['dia_chi'] = $data_luu['dia_chi'];
        $_SESSION['email'] = $data_luu['email'];
        $_SESSION['trang_thai'] = $data_luu['trang_thai'];
        $_SESSION['tong_tien'] = $data_luu['tong_tien'];
    }


}

