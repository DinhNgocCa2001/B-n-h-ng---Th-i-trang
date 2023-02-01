<?php
class ProductController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function two_column_layout()
    {
        $soLuong = 6;
        $productModel =$this->get_model('ProductModel');
        $ds_product = $productModel->get_show_product_limit($soLuong);

        $danhmucModel =$this->get_model('DanhMucModel');
        $ds_danhmuc = $danhmucModel->get_show_danh_muc();

        $BaiVietModel =$this->get_model('BaiVietModel');
        $ds_baiviet = $BaiVietModel->get_bai_viet_limit($soLuong);

        $this->render_layout('two_column_layout', [
            'main_content' => 'noi_dung_chinh',
            'right_bar' => 'thanh_ben_phai',
            'bai_viet' => 'thanh_ben_phai'
        ],
            [
                'data1' => $ds_product,
                'data2' => $ds_danhmuc,
                'data3' => $ds_baiviet
            ]);
    }

    public function page_insert_product()
    {
        $danhmucModel = $this->get_model('DanhMucModel');
        $ds_danhmuc = $danhmucModel->get_show_danh_muc();
        $this->render_view('insert_product',['get_show_danh_muc' => $ds_danhmuc]);
    }

    public function do_insert_product()
    {
        $data = $_POST;
        $message = "";
        if(!isset($data['ten']) || empty($data['ten']))
        {
            $message = $message.'Tên sản phẩm không được bỏ trống !<br>';
        }
        if(strlen($data['ten']) > 255)
        {
            $message = $message.'Tên sản phẩm không được quá 255 kí tự !<br>';
        }

//        if(!isset($data['danh_muc']) || empty($data['danh_muc']))
//        {
//            $message = $message.'Tên danh mục không được bỏ trống !<br>';
//        }
//        if(strlen($data['danh_muc']) > 255)
//        {
//            $message = $message.'Tên danh mục không được quá 255 kí tự !<br>';
//        }

        if(!isset($data['mo_ta']) || empty($data['mo_ta']))
        {
            $message = $message.'Phần mô tả không được bỏ trống !<br>';
        }

        if(!isset($data['nha_san_xuat']) || empty($data['nha_san_xuat']))
        {
            $message = $message.'Tên nhà sản xuất không được bỏ trống !<br>';
        }
        if(strlen($data['nha_san_xuat']) > 255)
        {
            $message = $message.'Tên nhà sản xuất không được quá 255 kí tự !<br>';
        }

        if(!isset($data['so_luong']) || empty($data['so_luong']))
        {
            $message = $message.'Số lượng không được bỏ trống !<br>';
        }
        if($data['so_luong'] < 1)
        {
            $message = $message.'Số lượng không được nhỏ hơn 1 !<br>';
        }

        if(!isset($data['gia_ban']) || empty($data['gia_ban']))
        {
            $message = $message.'Giá bán không được bỏ trống !<br>';
        }
        if($data['gia_ban'] < 0)
        {
            $message = $message.'Giá bán phải lớn hơn 0 đồng !<br>';
        }

        if(!isset($data['phan_tram_khuyen_mai']) || empty($data['phan_tram_khuyen_mai']))
        {
            $message = $message.'Phần trăm khuyến mại không được bỏ trống !<br>';
        }
        if($data['phan_tram_khuyen_mai'] < 0)
        {
            $message = $message.'Phần trăm khuyến mại phải lớn hơn 0 đồng !<br>';
        }

        if ($_FILES["anh_new"]['error'] != 0)
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
            $_SESSION['error_message'] = $message;
            $this->luu_data_session($data);
            $this->redirect('product','page_insert_product');
            exit;
        }
        $productModel = $this->get_model('ProductModel');
        if($productModel->insert_product($data))
        {
            echo 'Insert sản phẩm thành công';
            $this->redirect('product','show_product');
        }
        else
        {
            echo 'Insert sản phẩm không thành công';
        }
    }
    public function show_product()
    {
        if(isset($_GET['search']))
        {
            $search = $_GET['search'];
        }
        else
        {
            $search ='';
        }
        $productModel = $this->get_model('ProductModel');
        $tong_product = $productModel->get_so_luong($search);
        $page = 1;
        $so_product =12;
        $tong_so_page = ceil($tong_product/$so_product);

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

        if(isset($_GET['so_product']))
        {
            $so_product = $_GET['so_product'];
        }

        $ds_product = $productModel->get_show_product($so_product, $page, $search);
        $this->render_view('show_product', ['get_show_product' => $ds_product, 'so_product' => $so_product,
            'tong_product' => $tong_product, 'page' => $page, 'search' => $search]);

//        //end
//
//        $result = $productModel->get_show_product();
//        $this->render_view('show_product',['get_show_product'=> $result]);
    }

    public function page_update_product()
    {
        $productModel = $this->get_model('ProductModel');
        $result = $productModel->get_product_by_id($_GET['id']);
        //var_dump($result); exit;
        $this->render_view('update_product',['get_product_by_id' => $result]);
    }

    public function do_update_product()
    {
        $data = $_POST;
        $message = "";
        if(!isset($data['ten']) || empty($data['ten']))
        {
            $message = $message.'Tên sản phẩm không được bỏ trống !<br>';
        }
        if(strlen($data['ten']) > 255)
        {
            $message = $message.'Tên sản phẩm không được quá 255 kí tự !<br>';
        }

        if(!isset($data['danh_muc']) || empty($data['danh_muc']))
        {
            $message = $message.'Tên danh mục không được bỏ trống !<br>';
        }
        if(strlen($data['danh_muc']) > 255)
        {
            $message = $message.'Tên danh mục không được quá 255 kí tự !<br>';
        }

        if(!isset($data['mo_ta']) || empty($data['mo_ta']))
        {
            $message = $message.'Phần mô tả không được bỏ trống !<br>';
        }

        if(!isset($data['nha_san_xuat']) || empty($data['nha_san_xuat']))
        {
            $message = $message.'Tên nhà sản xuất không được bỏ trống !<br>';
        }
        if(strlen($data['nha_san_xuat']) > 255)
        {
            $message = $message.'Tên nhà sản xuất không được quá 255 kí tự !<br>';
        }

        if(!isset($data['so_luong']) || empty($data['so_luong']))
        {
            $message = $message.'Số lượng không được bỏ trống !<br>';
        }
        if($data['so_luong'] < 1)
        {
            $message = $message.'Số lượng không được nhỏ hơn 1 !<br>';
        }

        if(!isset($data['gia_ban']) || empty($data['gia_ban']))
        {
            $message = $message.'Giá bán không được bỏ trống !<br>';
        }
        if($data['gia_ban'] < 0)
        {
            $message = $message.'Giá bán phải lớn hơn 0 đồng !<br>';
        }

        if(!isset($data['phan_tram_khuyen_mai']) || empty($data['phan_tram_khuyen_mai']))
        {
            $message = $message.'Phần trăm khuyến mại không được bỏ trống !<br>';
        }
        if($data['phan_tram_khuyen_mai'] < 0)
        {
            $message = $message.'Phần trăm khuyến mại phải lớn hơn 0 đồng !<br>';
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
            header('Location: ?controller=Product&action=page_update_product&id='.$data['id']);
            exit;
        }
        $productModel = $this->get_model('ProductModel');
        if($productModel->update_product($data,$data['id']))
        {
            echo 'Update sản phẩm thành công';
            $this->redirect('Product','show_product');
        }
        else
        {
            echo 'Update sản phẩm không thành công';
        }
    }

    public function delete_product(){
        $productModel = $this->get_model('ProductModel');
        if($productModel->delete_product($_GET['id']))
        {
            echo 'Delete sản phẩm thành công !';
            $this->redirect('Product','show_product');
        }
        else
        {
            echo 'Delete sản phẩm không thành công !';
        }
    }

    public function luu_data_session($data_luu)
    {
        $_SESSION['id'] = $data_luu['id'];
        $_SESSION['ten'] = $data_luu['ten'];
        $_SESSION['danh_muc'] = $data_luu['danh_muc'];
        $_SESSION['mo_ta'] = $data_luu['mo_ta'];
        $_SESSION['nha_san_xuat'] = $data_luu['nha_san_xuat'];
        $_SESSION['so_luong'] = $data_luu['so_luong'];
        $_SESSION['gia_ban'] = $data_luu['gia_ban'];
        $_SESSION['phan_tram_khuyen_mai'] = $data_luu['phan_tram_khuyen_mai'];
        $_SESSION['anh'] = $data_luu['anh'];
        $_SESSION['sex'] = $data_luu['sex'];
    }
}
?>
