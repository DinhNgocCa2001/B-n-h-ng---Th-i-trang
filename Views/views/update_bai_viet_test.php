<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script type="text/javascript" src="/MVC_products/assets/js/jcarousel-0.3.9/vendor/jquery/jquery.js"></script>
    <link rel="stylesheet" href="/MVC_products/assets/CSS/carousel.css" />
    <link rel="stylesheet" href="/MVC_products/assets/CSS/jcarousel.basic.css" />
    <style>

    </style>
</head>
<?php
//session_start();
?>
<body>
<div class="container">
    <h1>Thêm bài viết</h1>
    <?php if(isset($_SESSION['thong_bao_loi'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['thong_bao_loi']; ?>
        </div>
    <?php endif;?>
    <form action="?controller=BaiViet&action=insert_bai_viet" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề bài viết</label>
            <input value="<?php echo isset($_SESSION['thong_bao_loi']) ? $_SESSION['tieu_de'] : '' ?>" name="tieu_de" type="text" class="form-control" id="title" placeholder="Tiêu đề bài viết">
        </div>
        <div>
            <label for="img_baiviet" class="form-label">Ảnh bài viết</label>
            <input accept="image/*" type="file" name="img_baiviet" id="img_baiviet">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Giới thiệu ngắn gọn</label>
            <textarea name="gioi_thieu" class="form-control" id="description" rows="3"><?php echo isset($_SESSION['thong_bao_loi']) ? $_SESSION['gioi_thieu'] : '' ?></textarea>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung bài viết</label>
            <textarea name="noi_dung" class="form-control" id="content" rows="5"><?php echo isset($_SESSION['thong_bao_loi']) ? $_SESSION['noi_dung'] : '' ?></textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Người đăng</label>
            <input value="<?php echo isset($_SESSION['thong_bao_loi']) ? $_SESSION['nguoi_dang'] : '' ?>" name="nguoi_dang" type="text" class="form-control" id="author" placeholder="Người đăng">
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Trạng thái</label>
            <select name="trang_thai" class="form-control">
                <option <?php if(isset($_SESSION['thong_bao_loi'])) echo $_SESSION['trang_thai'] == 0 ? 'selected' : '' ?> value="0">Bản nháp</option>
                <option <?php if(isset($_SESSION['thong_bao_loi'])) echo $_SESSION['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Chờ đăng</option>
                <option <?php if(isset($_SESSION['thong_bao_loi'])) echo $_SESSION['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Đã đăng</option>
                <option <?php if(isset($_SESSION['thong_bao_loi'])) echo $_SESSION['trang_thai'] == 3 ? 'selected' : '' ?> value="3">Không được đăng</option>
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-secondary" type="reset">Xoá</button>
            <button class="btn btn-success" type="submit">Thêm bài viết</button>
        </div>
    </form>
</div>

<div class="wrapper">
    <div class="jcarousel-wrapper">
        <div class="jcarousel">
            <ul>
                <li><img src="/MVC_products/uploads/Hinh-Nen-Zoro-1 (1).png" width="600" height="400" alt=""></li>
                <li><img src="/MVC_products/uploads/Hinh-Nen-Zoro-1 (3).jpg" width="600" height="400" alt=""></li>
                <li><img src="/MVC_products/uploads/Hinh-Nen-Zoro-1 (4).jpg" width="600" height="400" alt=""></li>
                <li><img src="/MVC_products/uploads/Hinh-Nen-Zoro-1 (10).jpg" width="600" height="400" alt=""></li>
                <li><img src="/MVC_products/uploads/Hinh-Nen-Zoro-1 (1).png" width="600" height="400" alt=""></li>
                <li><img src="/MVC_products/uploads/Hinh-Nen-Zoro-1 (1).png" width="600" height="400" alt=""></li>
            </ul>
        </div>
        <p class="photo-credits">
            Photos by <a href="http://www.mw-fotografie.de">Marc Wiegelmann</a>
        </p>
        <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
        <a href="#" class="jcarousel-control-next">&rsaquo;</a>

        <p class="jcarousel-pagination">
        </p>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

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

<?php $_SESSION['thong_bao_loi'] = null ?>
