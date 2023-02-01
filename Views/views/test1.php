<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
            <label for="a" class="form-label">Nội dung bài viết</label>
            <textarea name="noi_dung" class="form-control" id="a" rows="5"><?php echo isset($_SESSION['thong_bao_loi']) ? $_SESSION['noi_dung'] : '' ?></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-secondary" type="reset">Xoá</button>
            <button class="btn btn-success" type="submit">Thêm bài viết</button>
        </div>
    </form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script type="text/javascript" src="/MVC_fashion/Assets/js/Jquery/jquery.js"></script>
<script type="text/javascript" src="/MVC_fashion/Assets/js/jcarousel-0.3.9/dist/jquery.jcarousel.min.js"></script>
<script src="/MVC_fashion/Assets/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea#a',
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
