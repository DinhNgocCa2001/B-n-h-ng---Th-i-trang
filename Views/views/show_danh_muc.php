<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hiển thị danh mục sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Danh sách danh mục</h1>
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
                <th scope="col">Tên danh mục</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($get_show_danh_muc as $danhMuc): ?>
                <tr>
                    <th scope="row"><?php echo $danhMuc['id'] ?></th>
                    <td><?php echo $danhMuc['ten_danh_muc'] ?></td>
                    <td><?php echo $danhMuc['mo_ta'] ?></td>
                    <td><?php echo $danhMuc['sex'] ?></td>
                    <td>
                        <a onclick="return confirm('Bạn có muốn xoá không')" href="?controller=DanhMuc&action=delete_danh_muc&id=<?php echo $danhMuc['id'] ?>">Xoá</a>
                        <a href="?controller=DanhMuc&action=page_update_danh_muc&id=<?php echo $danhMuc['id'] ?>">Sửa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>



