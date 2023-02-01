<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm mới bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .imageChangeCard
        {
            height: 300px;
        }

        .color-red
        {
            background: #d51414;
        }

        .imageChangeCarousel{
            height: 300px;
        }
        .cardChange
        {
            height: 450px;
        }
        .textChange
        {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .textChangeProduct
        {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
        .no-underline
        {
            text-decoration: none;
        }
        .bg-area-product
        {
            background: rgb(242, 244, 245);
            /*--bs-bg-opacity: .05;*/
        }
        .fix-div
        {
            height: 25px;
            width: 60px;
        }
    </style>
</head>
<?php
extract($data);
include("header_layout.php");
?>
<body>
<div class="container" style="margin-top: 90px ;">
    <div class="row bg-area-product">
        <div class="col col-8">
            <?php include("Views/views/".$views['main_content'].".php")?>
        </div>
        <div class="col col-4">
            <?php include("Views/views/".$views['right_bar'].".php")?>
        </div>
    </div>
</div>

<?php
include("footer_layout.php");
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

