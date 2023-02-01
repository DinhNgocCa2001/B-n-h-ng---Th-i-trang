<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid px-0" >
    <script>
        const triggerTabList = document.querySelectorAll('#home-tab')
        triggerTabList.forEach(triggerEl => {
            const tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('mouseover', event => {
                event.preventDefault()
                tabTrigger.show()
            })
        })
    </script>
    <ul class="nav justify-content-center py-2">
        <li class="nav-item">
            <p class="nav-link active my-0">
                THỜI TRANG NAM - THỜI TRANG NỮ - CÔNG SỞ ONLINE - Hotline 1900.6049 (08h00 - 22h00)
            </p>
        </li>
        <li class="nav-item dropdown">
            <p class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Kiểm tra đơn hàng</p>
                <ul class="dropdown-menu">
                    <form action="?controller=DonHang&action=info_don_hang" method="post" >
                        <li class="dropdown-item"><input type="text" name="sdt" class="form-control" placeholder="Số điện thoại"></li>
                        <li class="dropdown-item"><input type="text" name="id_don_hang" class="form-control" placeholder="Mã đơn hàng"></li>
                        <li class="dropdown-item"></li>
                        <button class="btn btn-secondary" type="submit" id="button-addon2">Check</button>
                    </form>
                </ul>

        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Tài khoản</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="?controller=User&action=page_register">Đăng kí</a></li>
                <li><a class="dropdown-item" href="?controller=User&action=page_login">Đăng nhập</a></li>
            </ul>
        </li>
        <li>
            <a href="?controller=DonHang&action=page_gio_hang"> <button type="button" class="btn btn-outline-primary">Giỏ hàng</button></a>
        </li>
    </ul>
    <ul class="nav justify-content-center color-red py-2">
        <li class="nav-item" role="presentation">
            <a class="nav-link fw-bold text-light" href="?controller=Product&action=two_column_layout">ZANADO</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link fw-bold text-light" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" href="?controller=Product&action=two_column_layout">THỜI TRANG NAM</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link fw-bold text-light" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">THỜI TRANG NỮ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-bold text-light" href="#">LÀM ĐẸP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link fw-bold text-light">THƯƠNG HIỆU</a>
        </li>

        <li class="nav-item ">
            <form  role="search" class="mb-0" action="?controller=Prodcut&action=info_don_hang" method="get">
                <div class="input-group">
                    <input type="hidden" class="form-control me-2" name="controller" value="Product">
                    <input type="hidden" class="form-control me-2" name="action" value="show_product">

                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm toàn bộ cửa hàng ở đây" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-secondary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <ul class="nav justify-content-center">
                <?php foreach($data2 as $danhmuc): ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link"><?php echo $danhmuc['ten_danh_muc']?></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <ul>
                <li>ca</li>
                <li>ca dz</li>
            </ul>
        </div>
    </div>
    <ul class="nav justify-content-center ">
        <li class="nav-item ">
            <a class="nav-link active " href="#">HÀNG MỚI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">HOT NHẤT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">KHUYẾN MÃI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">HOT DEAL</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">XU HƯỚNG</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">TIN TỨC</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">TUYỂN ĐẠI LÝ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">SHOWROOM</a>
        </li>
    </ul>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>

