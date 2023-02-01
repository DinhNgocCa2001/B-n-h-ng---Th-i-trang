<div class="bg-area-product p-2">
    <ul class="list-group mt-3">
        <li class="list-group-item h1 text-center">Danh mục</li>
        <li class="list-group-item"><a href="?controller=DanhMuc&action=page_insert_danh_muc"
               class="text-decoration-none" style="color: red;">+ Thêm danh mục</a></li>
        <?php foreach($data2 as $danhmuc): ?>
        <li class="list-group-item"><a href="#" class="badge-warning text-decoration-none" ><?php echo $danhmuc['ten_danh_muc']?> </a></li>
        <?php endforeach;?>
    </ul>

    <ul class="list-group mt-5">
        <li class="list-group-item h1 text-center">Bài viết</li>
        <?php foreach($data3 as $baiviet): ?>
            <li class="list-group-item">
                <a href="?controller=BaiViet&action=chi_tiet_bai_viet&id=<?php echo $baiviet['id'] ?>"
                   class="text-decoration-none"><h4 class=""><?php echo $baiviet['tieu_de'] ?></h4></a>
                <h6 class="textChange"><?php echo $baiviet['gioi_thieu'] ?></h6>
            </li>
        <?php endforeach;?>
    </ul>
</div>
