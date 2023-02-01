<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm mới bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<form  action="?controller=BaiViet&action=do_insert_bai_viet" method="POST" enctype="multipart/form-data">
    <h1 class="text-center">Thêm bài viết</h1>
    <div class="container bg-light">
        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
            <?php echo ($_SESSION['error_message']); $_SESSION['error_message']=null;?>
        </div>
        <?php endif;?>
        <div class="container bg-light">
            <div class="mb-3">
                <label for="tieu_de" class="form-label">Tiêu đề</label>
                <input type="text" name="tieu_de" class="form-control" id="tieu_de" placeholder="Tiêu đề" value="<?php echo isset($_SESSION['tieu_de']) ? $_SESSION['tieu_de'] : ""?>">
            </div>
            <div class="mb-3">
                <label for="gioi_thieu" class="form-label">Giới thiệu</label>
                <input type="text" name="gioi_thieu" class="form-control" id="gioi_thieu" placeholder="Giới thiệu" value="<?php echo isset($_SESSION['gioi_thieu']) ? $_SESSION['gioi_thieu'] : ""?>">
            </div>
<!--            <div class="mb-3">-->
<!--                <label for="noi_dung" class="form-label">Nội dung</label>-->
<!--                <input type="text" name="noi_dung" class="form-control" id="noi_dung" placeholder="Nội dung" value="--><?php //echo isset($_SESSION['noi_dung']) ? $_SESSION['noi_dung'] : ""?><!--">-->
<!--            </div>-->
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung bài viết</label>
                <textarea name="noi_dung" class="form-control" id="content" rows="5" ><?php echo isset($_SESSION['noi_dung']) ? $_SESSION['noi_dung'] : ""?></textarea>
            </div>
            <div class="mb-3">
                <label for="nguoi_dang" class="form-label">Người đăng</label>
                <input type="text" name="nguoi_dang" class="form-control" id="nguoi_dang" placeholder="Người đăng" value="<?php echo isset($_SESSION['nguoi_dang']) ? $_SESSION['nguoi_dang'] : ""?>">
            </div>
            <div class="mb-3">
                <label for="anh" class="form-label">Ảnh sản phẩm</label>
                <input accept="image/*" type="file" name="anh" class="form-control" id="anh" placeholder="Ảnh sản phẩm" value="<?php echo isset($_SESSION['anh']) ? $_SESSION['anh'] : ""?>">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" id="cho_xet_duyet" value="0" checked>
                <label class="form-check-label" for="cho_xet_duyet">
                    Chờ xét duyệt
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trang_thai" id="nhap" value="1">
                <label class="form-check-label" for="nhap">
                    Nháp
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
<script type="text/javascript" src="/MVC_products/assets/js/Jquery/jquery.js"></script>
<script type="text/javascript" src="/MVC_products/assets/js/jcarousel-0.3.9/dist/jquery.jcarousel.min.js"></script>
<script src="/MVC_products/assets/js/tinymce/tinymce.min.js"></script>
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
<script>
    (function($) {
        $(function() {
            $('.jcarousel').jcarousel();

            $('.jcarousel-control-prev')
                .on('jcarouselcontrol:active', function() {
                    $(this).removeClass('inactive');
                })
                .on('jcarouselcontrol:inactive', function() {
                    $(this).addClass('inactive');
                })
                .jcarouselControl({
                    target: '-=1'
                });

            $('.jcarousel-control-next')
                .on('jcarouselcontrol:active', function() {
                    $(this).removeClass('inactive');
                })
                .on('jcarouselcontrol:inactive', function() {
                    $(this).addClass('inactive');
                })
                .jcarouselControl({
                    target: '+=1'
                });

            $('.jcarousel-pagination')
                .on('jcarouselpagination:active', 'a', function() {
                    $(this).addClass('active');
                })
                .on('jcarouselpagination:inactive', 'a', function() {
                    $(this).removeClass('active');
                })
                .jcarouselPagination();
        });
    })(jQuery);
</script>
</html>
