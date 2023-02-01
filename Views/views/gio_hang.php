<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script type="text/javascript" src="/MVC_fashion/Assets/js/Jquery/jquery-3.6.1.min.js"></script>
</head>
<body>
<div class="container">

    <h1>Danh sách sản phẩm trong giỏ hàng</h1>
        <?php //var_dump($gio_hang);?>
        <form action="?controller=DonHang&action=do_update_don_hang" method="post">
            <table class="table table-hover table-info">
                <tr>
                    <th>id</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền/SP</th>
                    <th>Giảm</th>
                    <th>Hành động</th>
                    <th>Thành tiền</th>
                </tr>
                <?php $tong_tien=0; ?>
                <?php foreach($gio_hang as $sanPham): ?>
                    <tr>
                        <td><?php echo $sanPham['id']; ?></td>
                        <td><?php echo $sanPham['ten']; ?></td>
                        <td ><input class="so_product" value="<?php echo $sanPham['so_luong'];?>" name="so_luong[]"></td>
                        <td><?php echo $sanPham['gia_ban']; ?> ₫</td>
                        <td><?php echo $sanPham['phan_tram_khuyen_mai']; ?>%</td>
                        <td><a href="?controller=DonHang&action=delete_san_pham_gio_hang&id=<?php echo $sanPham['id']; ?>">Xóa sản phẩm</a></td>
                        <td class="tien"><?php echo($sanPham['so_luong'] * $sanPham['gia_ban']*(100-$sanPham['phan_tram_khuyen_mai'])/100); ?> ₫</td>
                        <?php $tong_tien += ($sanPham['so_luong'] * $sanPham['gia_ban'] *(100-$sanPham['phan_tram_khuyen_mai'])/100); ?>

                        <input type="hidden" value="<?php echo $sanPham['id']; ?>" name="id[]">
                        <input type="hidden" class="gia" value="<?php echo $sanPham['gia_ban']; ?>">
                        <input type="hidden" class="phan_tram_khuyen_mai" value="<?php echo $sanPham['phan_tram_khuyen_mai']; ?>">
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="6" class="text-center">Tổng tiền</td>
                    <td><?php echo $tong_tien ?> ₫</td>
                </tr>
            </table>

            <button type="submit" class="btn btn-outline-primary d-inline">Cập nhập đơn hàng</button>
            <a href="?controller=Product&action=two_column_layout"> <button type="button" class="btn btn-outline-primary">Quay lại trang chủ</button></a>
            <a href="?controller=DonHang&action=page_thanh_toan"> <button type="button" class="btn btn-outline-primary">Trang thanh toán</button></a>

        </form>
    <script>
        $(document).ready(function() {
            $(".so_product").mouseleave(function () {
                var value = $(".so_product").val();
                var value1 = $(".gia").val();
                var tien = value * value1;

                $(".tien1").html(tien);
            });
        });
        $( ".so_product" )
            .change(function() {
                // var value = $("#so_product").val();
                // var value1 = $("#gia").val();
                // var tien = value * value1;
                //$( "#tien", this ).first().text( tien );
                var value = $(".so_product").val();
                var value1 = $(".gia").val();
                var tien = value * value1;
                $(".tien").html(tien);

            });
    </script>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>

<?php $_SESSION['error_message'] = null ?>
