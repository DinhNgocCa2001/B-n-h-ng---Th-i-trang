<!DOCTYPE html>

<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hiển thị bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
        .activePage
        {
            font-weight: bold;
            color: blue;
        }
    </style>
</head>
<body>
<div class="container">
    <a href="?controller=Product&action=two_column_layout"> <button type="button" class="btn btn-outline-primary">Quay lại trang chủ</button></a>
    <div class="row mt-5 mb-3">
        <h1 class="">Danh sách bài viết</h1>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="mt-2 mb-2">
                <form class="d-flex" method="get">
                    <div class="col-auto me-1">

                        <input type="hidden" class="form-control me-2" name="controller" value="BaiViet">
                        <input type="hidden" class="form-control me-2" name="action" value="show_bai_viet">

                        <label for="Search" class="visually-hidden">Search</label>
                        <input type="text" class="form-control me-2" id="Search" placeholder="Search" name="search" value="<?php echo isset($search) ? $search : ''?>">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </form>
            </div>
        </div>
        <div class="col-6">
            <div class="float-end">
                <a href="?controller=BaiViet&action=page_insert_bai_viet" class="btn btn-primary">Thêm bài viết</a>
                <a href="?controller=User&action=logout"> <button type="button" class="btn btn-outline-primary">Đăng Xuất</button></a>
                <a href="?controller=Product&action=display_san_pham"> <button type="button" class="btn btn-outline-primary">Quay lại trang chủ</button></a>
            </div>
        </div>
    </div>
    <div>
        <?php if(isset($_SESSION['thong_bao_loi'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['thong_bao_loi']; ?>

            </div>
        <?php endif;?>
        <table class="table table-hover table-info">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Người đăng</th>
                <th scope="col">Giới thiệu ngắn gọn</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Ngày đăng</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($get_show_bai_viet as $tinTuc): ?>
                <tr>
                    <th scope="row"><?php echo $tinTuc['id'] ?></th>
                    <td><?php echo $tinTuc['tieu_de'] ?></td>
                    <td><?php echo $tinTuc['nguoi_dang'] ?></td>
                    <td><?php echo $tinTuc['gioi_thieu'] ?></td>
                    <td><?php echo $tinTuc['trang_thai'] ?></td>
                    <td><?php echo $tinTuc['ngay_dang'] ?></td>
                    <td>
                        <a onclick="return confirm('Bạn có muốn xoá không')" href="?controller=BaiViet&action=action_xoa&id=<?php echo $tinTuc['id'] ?>">Xoá</a>
                        <a href="?controller=BaiViet&action=page_update_bai_viet&id=<?php echo $tinTuc['id'] ?>">Sửa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php $so_trang = ceil($tong_bai_viet/$so_bai); ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination float-end">
            <li class="page-item"><a class="page-link" href="?controller=BaiViet&action=show_bai_viet&page=<?php echo ($page - 1);?>&so_bai=<?php echo $so_bai;?>&search=<?php echo isset($search) ? $search : ''?>">Previous</a></li>
            <?php for($i = 1; $i <= $so_trang; $i++): ?>
                <li class="page-item"><a class="page-link <?php echo $page==$i ? 'activePage' : ''?>" href="?controller=BaiViet&action=show_bai_viet&page=<?php echo $i;?>&so_bai=<?php echo $so_bai;?>&search=<?php echo isset($search) ? $search : ''?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="?controller=BaiViet&action=show_bai_viet&page=<?php echo ($page + 1);?>&so_bai=<?php echo $so_bai;?>&search=<?php echo isset($search) ? $search : ''?>">Next</a></li>
        </ul>
    </nav>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></div>
</html>


