<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập nhập chi tiết bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript" src="/MVC_fashion/Assets/js/jcarousel-0.3.9/vendor/jquery/jquery.js"></script>
    <link rel="stylesheet" href="/MVC_fashion/Assets/CSS/carousel.css" />
    <link rel="stylesheet" href="/MVC_fashion/Assets/CSS/jcarousel.basic.css" />
</head>
<body>
<?php $id = $_GET['id'];?>
<div class="container">
    <?php if (isset($_SESSION['error_message'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error_message']; $_SESSION['error_message']= null;?>
        </div>
    <?php endif; ?>
    <?php  ?>
    <?php //$ds_tin_tuc = $get_data_by_id?>
    <?php $ds_tin_tuc = $_SESSION['get_data_by_id'] ?>
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
    <form action="?controller=BaiViet&action=do_update_bai_viet" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="tieu_de" class="form-label">Tiêu đề bài viết</label>
            <input type="text" value="<?php if(isset($_SESSION['error_message']))echo $_SESSION['tieu_de'];else echo($ds_tin_tuc['tieu_de']);?>" name="tieu_de" class="form-control" id="tieu_de" placeholder="Tiêu đề bài viết">
        </div>

        <div class="mb-3">
            <label for="anh_old" class="form-label">Ảnh sản phẩm hiện tại</label>
            <input type="text" name="anh_old" class="form-control" id="anh_old" placeholder="Ảnh sản phẩm hiện tại" value="<?php echo isset($_SESSION['error_message'])?$_SESSION['anh']:'';echo isset($ds_tin_tuc['anh'])?$ds_tin_tuc['anh']:'';?>">
        </div>
        <div class="mb-3">
            <label for="anh_new" class="form-label">Ảnh sản phẩm mới</label>
            <input accept="image/*" type="file" name="anh_new" class="form-control" id="anh_new" placeholder="Ảnh sản phẩm">
        </div>

        <div class="mb-3">
            <label for="gioi_thieu" class="form-label">Giới thiệu</label>
            <textarea  name="gioi_thieu" class="form-control" id="gioi_thieu" rows="3"><?php if(isset($_SESSION['error_message']))echo$_SESSION['gioi_thieu'];else echo($ds_tin_tuc['gioi_thieu']);?></textarea>
        </div>
        <div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung bài viết</label>
            <textarea  class="form-control" name="noi_dung" id="content" rows="5"><?php if(isset($_SESSION['error_message']))echo$_SESSION['noi_dung'];else echo($ds_tin_tuc['noi_dung']);?></textarea>
        </div>
        </div>
        <div class="mb-3">
            <label for="nguoi_dang" class="form-label">Người đăng bài</label>
            <input value="<?php if(isset($_SESSION['error_message']))echo$_SESSION['nguoi_dang'];else echo($ds_tin_tuc['nguoi_dang']);?>" type="text" name="nguoi_dang" class="form-control" id="nguoi_dang" placeholder="Người đăng bài">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="trang_thai" id="cho_xet_duyet" value="0" <?php echo isset($_SESSION['error_message']) && $_SESSION['trang_thai']== "0" ? 'checked' : ""; echo isset($ds_tin_tuc['trang_thai']) && $ds_tin_tuc['trang_thai']=="0" ? 'checked':''?>>
            <label class="form-check-label" for="cho_xet_duyet">
                Chờ xét duyệt
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="trang_thai" id="nhap" value="1" <?php echo isset($_SESSION['error_message']) && $_SESSION['trang_thai']== "1" ? 'checked' : ""; echo isset($ds_tin_tuc['trang_thai']) && $ds_tin_tuc['trang_thai']=="1" ? 'checked' : ''?>>
            <label class="form-check-label" for="nhap">
                Nháp
            </label>
        </div>
        <div class="mb-3">
            <input type="hidden" value="<?php echo($id);?>" name="id">
            <input type="reset" class="btn btn-secondary" value="Xóa bài" id="reset_click">
            <input type="submit" class="btn btn-primary" value="Sửa bài viết">
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="/MVC_fashion/Assets/js/Jquery/jquery.js"></script>
<script type="text/javascript" src="/MVC_fashion/Assets/js/jcarousel-0.3.9/dist/jquery.jcarousel.min.js"></script>
<script src="/MVC_fashion/Assets/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea#content',
        menu: {
            file: { title: 'File', items: 'newdocument restoredraft | preview | export print | deleteallconversations' },
            edit: { title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace' },
            view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen | showcomments' },
            insert: { title: 'Insert', items: 'image link media addcomment pageembed template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor tableofcontents | insertdatetime' },
            format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | styles blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat' },
            tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount' },
            table: { title: 'Table', items: 'inserttable | cell row column | advtablesort | tableprops deletetable' },
            help: { title: 'Help', items: 'help' }
        },
        toolbar: 'image',
        plugins: [ "image", "code", "table", "link", "media", "codesample"],
        images_upload_url: 'postAcceptor.php',
        images_upload_credentials: true
    });
</script>
</html>



