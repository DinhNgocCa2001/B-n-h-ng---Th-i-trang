<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm mới sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<?php //var_dump($get_show_danh_muc); exit;?>
<form  action="?controller=Product&action=do_insert_product" method="POST" enctype="multipart/form-data">
    <h1 class="text-center">Thêm sản phẩm</h1>
    <div class="container bg-light">
        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
            <?php echo ($_SESSION['error_message']); $_SESSION['error_message']=null;?>
        </div>
        <?php endif;?>

        <div class="container bg-light">
            <div class="mb-3">
                <label for="ten" class="form-label">Tên sản phẩm</label>
                <input type="text" name="ten" class="form-control" id="ten" placeholder="Tên sản phẩm" value="<?php echo isset($_SESSION['ten']) ? $_SESSION['ten'] : ""?>">
            </div>
            <div class="mb-3">
                <label for="danh_muc" class="form-label">Danh mục sản phẩm</label>
                <?php //echo isset($_SESSION['danh_muc']) ? $_SESSION['danh_muc'] : ""?>
                <select name="danh_muc" id="danh_muc" class="form-control">
                    <?php foreach($get_show_danh_muc as $danhMuc): ?>
                        <option><?php echo $danhMuc['ten_danh_muc']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <input type="text" name="mo_ta" class="form-control" id="mo_ta" placeholder="Mô tả" value="<?php echo isset($_SESSION['mo_ta']) ? $_SESSION['mo_ta'] : ""?>">
            </div>
            <div class="mb-3">
                <label for="nha_san_xuat" class="form-label">Nhà sản xuất</label>
                <input type="text" name="nha_san_xuat" class="form-control" id="nha_san_xuat" placeholder="Nhà sản xuất" value="<?php echo isset($_SESSION['nha_san_xuat']) ? $_SESSION['nha_san_xuat'] : ""?>">
            </div>
            <div class="mb-3">
                <label for="so_luong" class="form-label">Số lượng</label>
                <input type="number" name="so_luong" class="form-control" id="so_luong" placeholder="Số lượng sản phẩm" value="<?php echo isset($_SESSION['so_luong']) ? $_SESSION['so_luong'] : ""?>">
            </div>
            <div class="mb-3">
                <label for="gia_ban" class="form-label">Giá bán sản phẩm</label>
                <input type="number" name="gia_ban" class="form-control" id="gia_ban" placeholder="Giá bán sản phẩm" value="<?php echo isset($_SESSION['gia_ban']) ? $_SESSION['gia_ban'] : ""?>">
            </div>
            <div class="mb-3">
                <label for="phan_tram_khuyen_mai" class="form-label">Phần trăm khuyến mại</label>
                <input type="number" name="phan_tram_khuyen_mai" class="form-control" id="phan_tram_khuyen_mai" placeholder="Phần trăm khuyến mại" value="<?php echo isset($_SESSION['phan_tram_khuyen_mai']) ? $_SESSION['phan_tram_khuyen_mai'] : ""?>">
            </div>
            <div class="mb-3">
                <label for="anh" class="form-label">Ảnh sản phẩm</label>
                <input accept="image/*" type="file" name="anh" class="form-control" id="anh" placeholder="Ảnh sản phẩm" value="<?php echo isset($_SESSION['anh']) ? $_SESSION['anh'] : ""?>">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="male" value="NAM">
                <label class="form-check-label" for="male">
                    NAM
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="female" value="NỮ" checked>
                <label class="form-check-label" for="female">
                    NỮ
                </label>
            </div>
            <div>
                <input type="reset" class="btn btn-outline-secondary">
                <input type="submit" class="btn btn-outline-primary" value="Thêm">
            </div>
        </div>
</form>
<?php //session_destroy();?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>