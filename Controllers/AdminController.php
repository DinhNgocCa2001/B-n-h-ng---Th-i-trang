<?php
class AdminController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if (isset($_SESSION['is_login']) ) {
            if($_SESSION['is_login'] != 1 && $_SESSION['is_login'] != 2)
            {
                $_SESSION['error_message'] = "Kiểu truy cập bị chặn !";
                $this->redirect('User', 'page_login');
                exit;
            }
//                exit; //ở trước hàm redirect không hết hiện tượng mất $_SESSION['error_message']
//                $this->redirect('User', 'page_login');
//                hiện tượng $_SESSION['error_message'] bị biến mất sau khi chuyển hướng bằng hàm redirect và không có exit ở sau!
        }
        else
        {
            $_SESSION['error_message'] = "Bạn phải đăng nhập trước khi truy cập !";
            $this->redirect('User', 'page_login');
            exit;
        }
    }
}
