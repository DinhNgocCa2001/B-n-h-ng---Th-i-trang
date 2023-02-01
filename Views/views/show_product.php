<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hiển thị sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
        .activePage
        {
            font-weight: bold;
            color: red;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Danh sách sản phẩm</h1>
    <a href="?controller=User&action=logout"> <button type="button" class="btn btn-outline-primary">Đăng Xuất</button></a>
    <a href="?controller=Product&action=page_insert_product" class="btn btn-primary">Thêm sản phẩm</a>
    <a href="?controller=Product&action=two_column_layout"> <button type="button" class="btn btn-outline-primary">Quay lại trang chủ</button></a>
    <div class="col-6">
        <div class="mt-2 mb-2">
            <form class="d-flex" method="get">
                <div class="col-auto me-1">

                    <input type="hidden" class="form-control me-2" name="controller" value="Product">
                    <input type="hidden" class="form-control me-2" name="action" value="show_product">

                    <label for="Search" class="visually-hidden">Search</label>
                    <input type="text" class="form-control me-2" id="Search" placeholder="Search" name="search" value="<?php echo isset($search) ? $search : ''?>">
                </div>
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
        </div>
    </div>
    <div>
        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['error_message']; $_SESSION['error_message']=null;?>
            </div>
        <?php endif;?>
        <table class="table d-none ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Nhà sản xuất</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá bán</th>
                <th scope="col">Phần trăm khuyến mại</th>
                <th scope="col">Giới tính</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($get_show_product as $product): ?>
                <tr>
                    <th scope="row"><?php echo $product['id'] ?></th>
                    <td><?php echo $product['ten'] ?></td>
                    <td><?php echo $product['danh_muc'] ?></td>
                    <td><?php echo $product['mo_ta'] ?></td>
                    <td><?php echo $product['nha_san_xuat'] ?></td>
                    <td><?php echo $product['so_luong'] ?></td>
                    <td><?php echo $product['gia_ban'] ?></td>
                    <td><?php echo $product['phan_tram_khuyen_mai'] ?></td>
                    <td><?php echo $product['sex'] ?></td>
                    <td>
                        <a onclick="return confirm('Bạn có muốn xoá không')" href="?controller=Product&action=delete_product&id=<?php echo $product['id'] ?>">Xoá</a>
                        <a href="?controller=Product&action=page_update_product&id=<?php echo $product['id'] ?>">Sửa</a>
                        <div>
                            <form action="?controller=DonHang&action=them_sp_vao_gio_hang" method="post">
                                <input  type="hidden" value="<?php echo $product['id'] ?>" name="id">
                                <input  type="hidden" value="<?php echo $product['ten'] ?>" name="ten">
                                <input  type="hidden" value="<?php echo $product['gia_ban'] ?>" name="gia_ban">
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php //session_destroy();?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>

<div class="container-fluid">
    <div class="row">
        <div class="col-9">
            <div class="container-fluid">
                <div class="row mt-3 bg-area-product ">
                    <div class="col-12 px-1" >
                        <h1 class="text-center mt-2 mb-2 bg-white">Sản phẩm</h1>
                    </div>
                    <?php foreach ($get_show_product as $product): ?>
                        <div class="col-3 px-1 mb-3" >
                            <div class="card">
                                <div class="border-bottom">
                                    <img src="/MVC_fashion/<?php echo $product['anh']?>" class="card-img-top imageChangeCard" alt="...">
                                </div>
                                <div class="card-body pb-1">
                                    <p class="card-title textChangeProduct fw-bold"><?php echo $product['ten']?></p>
                                    <p class="card-text textChangeProduct"><small><?php echo $product['mo_ta'] ?></small></p>
                                    <div class="text-decoration-none fix-div text-white color-red px-1">-<?php echo $product['phan_tram_khuyen_mai'] ?>%</div>
                                    <div>
                                        Giá bán:
                                        <div class="d-inline text-decoration-line-through"><?php echo $product['gia_ban'] ?>₫</div>
                                        <div class="text-decoration-none text-danger d-inline float-end h5"><?php echo $product['gia_ban']* (100 - $product['phan_tram_khuyen_mai'])/100 ?>₫</div>
                                    </div>
                                    <div>
                                        <form action="?controller=DonHang&action=them_sp_vao_gio_hang" method="post">
                                            <input  type="hidden" value="<?php echo $product['id'] ?>" name="id">
                                            <input  type="hidden" value="<?php echo $product['ten'] ?>" name="ten">
                                            <input  type="hidden" value="<?php echo $product['gia_ban'] ?>" name="gia_ban">
                                            <input  type="hidden" value="<?php echo $product['phan_tram_khuyen_mai'] ?>" name="phan_tram_khuyen_mai">
                                            <!--                                    <a href="#" class="border-1 btn btn-secondary text-dark float-end mx-auto" style="background-color: #f5f5f5">Đặt mua »</a>-->
                                            <div class="d-grid gap-2 col-6 mx-auto mt-2">
                                                <button type="submit" class="shadow border-1 btn btn-outline-info text-dark rounded ">Đặt mua »</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="mt-3 mx-0 px-1 border-bottom">
                        <?php $so_trang = ceil($tong_product/$so_product); ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination float-start">
                                <li class="page-item"><a class="page-link" href="?controller=Product&action=show_product&page=<?php echo ($page - 1);?>&so_product=<?php echo $so_product;?>&search=<?php echo isset($search) ? $search : ''?>">Previous</a></li>
                                <?php for($i = 1; $i <= $so_trang; $i++): ?>
                                    <li class="page-item"><a class="page-link <?php echo $page==$i ? 'activePage' : ''?>" href="?controller=Product&action=show_product&page=<?php echo $i;?>&so_product=<?php echo $so_product;?>&search=<?php echo isset($search) ? $search : ''?>"><?php echo $i; ?></a></li>
                                <?php endfor; ?>
                                <li class="page-item"><a class="page-link" href="?controller=Product&action=show_product&page=<?php echo ($page + 1);?>&so_product=<?php echo $so_product;?>&search=<?php echo isset($search) ? $search : ''?>">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">

        </div>
    </div>
</div>



