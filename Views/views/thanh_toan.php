<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php if(isset($_SESSION['error_message'])) : ?>
        <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error_message']; $_SESSION['error_message']= null;?>
            </div>
    <?php endif ?>

    <?php if(isset($_SESSION['luu_don_hang'])) : ?>
        <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['luu_don_hang']; $_SESSION['luu_don_hang']= null;?>
            </div>
    <?php endif ?>

    <?php if(isset($_SESSION['dn'])) : ?>
        <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['dn']; ?>
            </div>
    <?php endif ?>

    <?php if(isset($_SESSION['dk'])) : ?>
        <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['dk']; ?>
            </div>
    <?php endif ?>

    <form action="?controller=DonHang&action=do_thanh_toan_luu_don_hang" method="post">
        <div class="form-group">
            <label for="ho_ten">Họ và tên</label>
            <input type="text" class="form-control" id="ho_ten" placeholder="Họ và tên" name="ho_ten">
        </div>
        <div class="form-group">
            <label for="sdt">Số điện thoại</label>
            <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại" name="sdt">
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa chỉ</label>
            <input type="text" class="form-control" id="dia_chi" placeholder="Địa chỉ" name="dia_chi">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Trạng thái</label>
            <select name="trang_thai" class="form-control">
                <option <?php if(isset($_SESSION['thong_bao_loi'])) echo $_SESSION['trang_thai'] == 0 ? 'selected' : '' ?> value="0">Bản nháp</option>
                <option <?php if(isset($_SESSION['thong_bao_loi'])) echo $_SESSION['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Đã lưu</option>
                <option <?php if(isset($_SESSION['thong_bao_loi'])) echo $_SESSION['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Đã thanh toán</option>
                <option <?php if(isset($_SESSION['thong_bao_loi'])) echo $_SESSION['trang_thai'] == 3 ? 'selected' : '' ?> value="3">Đã giao hàng</option>
            </select>
        </div>
        <div>
            <table class="table table-hover table-info">
                <tr>
                    <th>id</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
                <?php $tongTien=0; ?>
                <?php foreach($_SESSION['gio_hang'] as $sanPham): ?>
                    <tr>
                        <td><?php echo $sanPham['id']; ?></td>
                        <td><?php echo($sanPham['so_luong']); ?></td>
                        <td><?php echo($sanPham['so_luong'] * $sanPham['gia_ban']) * (100 - $sanPham['phan_tram_khuyen_mai']) /100; ?></td>
                        <input type="hidden" name ='id[]' value="<?php echo $sanPham['id']; ?>">
                        <input type="hidden" name ='so_luong[]' value="<?php echo($sanPham['so_luong']); ?>">
<!--                        <input type="hidden" name ='phan_tram_khuyen_mai[]' value="--><?php //echo($sanPham['phan_tram_khuyen_mai']); ?><!--">-->
                    </tr>
                    <?php
                    $tongTien += ($sanPham['so_luong'] * $sanPham['gia_ban'] * (100 -$sanPham['phan_tram_khuyen_mai']) /100);
                    ?>
                <?php endforeach; ?>
                <tr>
                <tr>
                    <td colspan="2" class="text-center">Tổng tiền</td>
                    <td><?php echo $tongTien ?></td>
                    <input type="hidden" name="Tong_tien_don_hang" value="<?php echo $tongTien ?>">
                </tr>
                </tr>
            </table>
        </div>
        <button type="submit" class="btn btn-primary">Thanh toán hóa đơn</button>
        <a href="?controller=Product&action=two_column_layout"> <button type="button" class="btn btn-outline-primary">Quay lại trang chủ</button></a>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
