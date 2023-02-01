<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập nhập thông tin sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<form  action="?controller=Product&action=do_update_product" method="POST" enctype="multipart/form-data">
    <h1 class="text-center">Sửa sản phẩm</h1>
    <div class="container bg-light">
        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
            <?php echo ($_SESSION['error_message']); $_SESSION['error_message'] = null;?>
        </div>
        <?php endif;?>
        <?php if(isset($get_product_by_id)) $product = $get_product_by_id; ?>
        <div class="container bg-light">
            <input type="hidden" name="id" value="<?php echo isset($_SESSION['error_message'])?$_SESSION['id']:'';echo isset($product['id'])?$product['id']:'';?>">
            <div class="mb-3">
                <label for="ten" class="form-label">Tên sản phẩm</label>
                <input type="text" name="ten" class="form-control" id="ten" placeholder="Tên sản phẩm" value="<?php echo isset($_SESSION['error_message'])?$_SESSION['ten']:'';echo isset($product['ten'])?$product['ten']:'';?>">
            </div>
            <div class="mb-3">
                <label for="danh_muc" class="form-label">Danh mục sản phẩm</label>
                <input type="text" name="danh_muc" class="form-control" id="danh_muc" placeholder="Danh mục sản phẩm" value="<?php echo isset($_SESSION['error_message'])?$_SESSION['danh_muc']:'';echo isset($product['danh_muc'])?$product['danh_muc']:'';?>">
            </div>
            <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <input type="text" name="mo_ta" class="form-control" id="mo_ta" placeholder="Mô tả" value="<?php echo isset($_SESSION['error_message'])?$_SESSION['mo_ta']:'';echo isset($product['mo_ta'])?$product['mo_ta']:'';?>">
            </div>
            <div class="mb-3">
                <label for="nha_san_xuat" class="form-label">Nhà sản xuất</label>
                <input type="text" name="nha_san_xuat" class="form-control" id="nha_san_xuat" placeholder="Nhà sản xuất" value="<?php echo isset($_SESSION['error_message'])?$_SESSION['nha_san_xuat']:'';echo isset($product['nha_san_xuat'])?$product['nha_san_xuat']:'';?>">
            </div>
            <div class="mb-3">
                <label for="so_luong" class="form-label">Số lượng</label>
                <input type="number" name="so_luong" class="form-control" id="so_luong" placeholder="Số lượng sản phẩm" value="<?php echo isset($_SESSION['error_message'])?$_SESSION['so_luong']:'';echo isset($product['so_luong'])?$product['so_luong']:'';?>">
            </div>
            <div class="mb-3">
                <label for="gia_ban" class="form-label">Giá bán sản phẩm</label>
                <input type="number" name="gia_ban" class="form-control" id="gia_ban" placeholder="Giá bán sản phẩm" value="<?php echo isset($_SESSION['error_message'])?$_SESSION['gia_ban']:'';echo isset($product['gia_ban'])?$product['gia_ban']:'';?>">
            </div>
            <div class="mb-3">
                <label for="phan_tram_khuyen_mai" class="form-label">Phần trăm khuyến mại</label>
                <input type="number" name="phan_tram_khuyen_mai" class="form-control" id="phan_tram_khuyen_mai" placeholder="Phần trăm khuyến mại" value="<?php echo isset($_SESSION['error_message'])?$_SESSION['phan_tram_khuyen_mai']:'';echo isset($product['phan_tram_khuyen_mai'])?$product['phan_tram_khuyen_mai']:'';?>">
            </div>
            <div class="mb-3">
                <label for="anh_old" class="form-label">Ảnh sản phẩm hiện tại</label>
                <input type="text" name="anh_old" class="form-control" id="anh_old" placeholder="Ảnh sản phẩm hiện tại" value="<?php echo isset($_SESSION['error_message'])?$_SESSION['anh']:'';echo isset($product['anh'])?$product['anh']:'';?>">
            </div>
            <div class="mb-3">
                <label for="anh_new" class="form-label">Ảnh sản phẩm mới</label>
                <input accept="image/*" type="file" name="anh_new" class="form-control" id="anh_new" placeholder="Ảnh sản phẩm">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="male" value="NAM" <?php echo isset($_SESSION['error_message']) && $_SESSION['sex']== "NAM" ? 'checked' : ""; echo isset($product['sex']) && $product['sex']=="NAM" ? 'checked':''?>>
                <label class="form-check-label" for="male">
                    NAM
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" id="female" value="NỮ" <?php echo isset($_SESSION['error_message']) && $_SESSION['sex']== "NỮ" ? 'checked' : ""; echo isset($product['sex']) && $product['sex']=="NỮ" ? 'checked' : ''?>>
                <label class="form-check-label" for="female">
                    NỮ
                </label>
            </div>
            <div>
                <input type="reset" class="btn btn-outline-secondary">
                <input type="submit" class="btn btn-outline-primary" value="Sửa">
            </div>
        </div>
</form>
<?php //session_destroy();?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

