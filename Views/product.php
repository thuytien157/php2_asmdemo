<div class="container-xxl">
        <div class="link d-flex justify-content-between">
            <div class="dieuhuong mt-3">
                <a class="icon-link text-dark text-decoration-none" href="#">
                    TRANG CHỦ <i class="fa fa-chevron-right opacity-25"></i>
                </a>
                <a class="icon-link text-dark fw-bold text-decoration-none" href="#">
                    SẢN PHẨM
                </a>
            </div>
            <select class="form-select w-25 mt-2" id="dsdm" aria-label="Default select example">
                <option selected>Chọn danh mục</option> 
                <option value="1">Quần áo</option>
                <option value="2">Mũ nón</option>
                <option value="3">Giày dép</option>
                <option value="4">Túi ví</option> 
            </select>
        </div>

        <div class="sanpham m-4 mt-2">
            <div class="hangbanchay mb-2">
            <div class="row g-3" id="dssp">
            <?php foreach ($listpro as $product):?>
        <div class="col-12 col-md-6 col-lg-3">
        <a href="product/detail/<?=$product['id']?>" class="card text-decoration-none">
            <?php if (!empty($product['discount'])): ?>
            <div class="position-absolute top-0 start-0 badge text-bg-danger m-2"><?=$product['discount']?>%</div>
            <?php endif; ?>
            <img src="/php2/ASM/public/img/products/<?=$product['image']?>" class="card-img-top small-img img-fluid" alt="...">
            <div class="card-body bg-body">
                <div class="position-absolute top-0 end-0 m-2 giohang"><i class="fa fa-shopping-bag fs-4 gh m-2"></i></div>
                <p class="card-text fw-bolder"><?=$product['name']?></p>
                <p class="card-text fw-bold text-danger fs-5">
                <?php if (!empty($product['discount'])): ?>    
                <?=number_format($product['price'] - ($product['price']*($product['discount']/100)),0,'.','.')?>đ 
                    <del class="text-dark fs-6"><?=number_format($product['price'],0,'.','.')?>đ</del>
                <?php else: ?>
                <?=number_format($product['price'],0,'.','.')?>đ 
                <?php endif;?>
                </p>
            </div>
        </a>
        </div>
        <?php endforeach;?>

                <!-- <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="position-absolute top-0 start-0 badge text-bg-danger m-2">-50%</div>
                        <img src="public/img/ao4.webp" class="card-img-top img-fluid" alt="...">
                        <div class="card-body bg-body">
                            <div class="position-absolute top-0 end-0 m-2 giohang"><i class="fa fa-shopping-cart fs-4 gh m-2"></i></div>
                            <p class="card-text fw-bolder">MLB - Áo thun unisex cổ tròn tay ngắn hiện đại</p>
                            <p class="card-text fw-bold text-danger fs-5">1,090,000đ</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="position-absolute top-0 start-0 badge text-bg-danger m-2">-50%</div>
                        <img src="public/img/ao5.webp" class="card-img-top img-fluid" alt="...">
                        <div class="card-body bg-body">
                            <div class="position-absolute top-0 end-0 m-2 giohang"><i class="fa fa-shopping-cart fs-4 gh m-2"></i></div>
                            <p class="card-text fw-bolder">MLB - Áo thun unisex cổ tròn tay ngắn hiện đại</p>
                            <p class="card-text fw-bold text-danger fs-5">1,090,000đ</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="position-absolute top-0 start-0 badge text-bg-danger m-2">-50%</div>
                        <img src="public/img/ao6.webp" class="card-img-top img-fluid" alt="...">
                        <div class="card-body bg-body">
                            <div class="position-absolute top-0 end-0 m-2 giohang"><i class="fa fa-shopping-cart fs-4 gh m-2"></i></div>
                            <p class="card-text fw-bolder">MLB - Áo thun unisex cổ tròn tay ngắn hiện đại</p>
                            <p class="card-text fw-bold text-danger fs-5">1,090,000đ</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="position-absolute top-0 start-0 badge text-bg-danger m-2">-50%</div>
                        <img src="public/img/ao7.webp" class="card-img-top img-fluid" alt="...">
                        <div class="card-body bg-body">
                            <div class="position-absolute top-0 end-0 m-2 giohang"><i class="fa fa-shopping-cart fs-4 gh m-2"></i></div>
                            <p class="card-text fw-bolder">MLB - Áo thun unisex cổ tròn tay ngắn hiện đại</p>
                            <p class="card-text fw-bold text-danger fs-5">1,090,000đ</p>
                        </div>
                    </div>
                </div>  -->
            </div>
            </div>
        </div>

    </div>
    <div class="text-center p-5 pb-2 bg-body-secondary">
            <div class="card-body"> 
                <h2 class="card-title fw-bold mb-2">ĐĂNG KÝ BẢN TIN CỦA CHÚNG TÔI</h2>
                <p class="card-text">Hãy cập nhật các tin tức thời trang về sản phẩm, BST sắp ra mắt, chương trình khuyến mãi đặc biệt và xu hướng thời trang mới nhất hàng tuần của chúng tôi.</p>
                <div class="input-group mb-3 ip_emmail border border-black rounded">
                    <input type="text" class="form-control" placeholder="Nhập email đăng ký nhận tin" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-dark text-light fw-bold" type="button" id="button-addon2">ĐĂNG KÝ</button>
                </div>
            </div>
    </div>

