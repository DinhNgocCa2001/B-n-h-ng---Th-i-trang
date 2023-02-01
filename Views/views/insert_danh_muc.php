<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Thêm mới danh mục sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<form  action="?controller=DanhMuc&action=do_insert_danh_muc" method="POST">
    <h1 class="text-center">Thêm danh mục</h1>
    <div class="container bg-light">
        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
            <?php echo ($_SESSION['error_message']); $_SESSION['error_message']=null;?>
        </div>
        <?php endif;?>
        <div class="container bg-light">
            <div class="mb-3">
                <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                <input type="text" name="ten_danh_muc" class="form-control" id="ten_danh_muc" placeholder="Tên danh mục" value="<?php echo isset($_SESSION['ten_danh_muc']) ? $_SESSION['ten_danh_muc'] : ""?>">
            </div>
            <div class="mb-3">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <input type="text" name="mo_ta" class="form-control" id="mo_ta" placeholder="Mô tả" value="<?php echo isset($_SESSION['mo_ta']) ? $_SESSION['mo_ta'] : ""?>">
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

