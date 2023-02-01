<?php if(isset($_SESSION['error_message'])): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo ($_SESSION['error_message']); $_SESSION['error_message']=null;?>
    </div>
<?php endif;?>
<div class="container-fluid">
<div class="row mt-3 bg-area-product ">
    <div class="col-12 px-1" >
        <h1 class="text-center mt-2 mb-2 bg-white">Sản phẩm</h1>
    </div>
    <?php foreach ($data1 as $product): ?>
        <div class="col-4 px-1 mb-3" >
            <div class="card">
                <div class="border-bottom">
                    <img src="/MVC_fashion/<?php echo $product['anh']?>" class="card-img-top imageChangeCard" alt="...">
                </div>
                <div class="card-body pb-1">
                    <p class="card-title textChangeProduct fw-bold"><?php echo $product['ten']?>:</p>
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
    <div class="mt-3 mx-2 border-bottom">
    </div>
</div>
    <div class="row mt-2 mb-2">
        <div class="col-5"></div>
        <button class="btn btn-outline-secondary col-2">
            <a href="?controller=Product&action=show_product" class="no-underline">Xem thêm</a>
        </button>
        <div class="col-5"></div>
    </div>
</div>

