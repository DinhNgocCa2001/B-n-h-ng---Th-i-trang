<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hiển thị đơn hàng tìm kiếm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Đơn hàng đã tìm kiếm</h1>
    <a href="?controller=User&action=logout"> <button type="button" class="btn btn-outline-primary">Đăng Xuất</button></a>
    <a href="?controller=DanhMuc&action=page_insert_danh_muc" class="btn btn-primary">Thêm danh mục</a>
    <a href="?controller=Product&action=two_column_layout"> <button type="button" class="btn btn-outline-primary">Quay lại trang chủ</button></a>
    <div>
        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error_message']; $_SESSION['error_message']=null;?>
            </div>
        <?php endif;?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Email</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tổng tiền</th>
            </tr>
            </thead>
            <tbody>
            <?php //var_dump($info_don_hang);?>

            <?php foreach ($info_don_hang as $donHangById): ?>
                <tr>
                    <td scope="row"><?php echo $donHangById['id']; ?></td>
                    <td><?php echo $donHangById['ho_ten'] ?></td>
                    <td><?php echo $donHangById['sdt'] ?></td>
                    <td><?php echo $donHangById['dia_chi'] ?></td>
                    <td><?php echo $donHangById['email'] ?></td>
                    <td><?php echo $donHangById['ngay_tao'] ?></td>
                    <td><?php echo $donHangById['trang_thai'] ?></td>
                    <td><?php echo $donHangById['tong_tien'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>
