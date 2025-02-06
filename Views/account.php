<main class="wrap container-xxl mt-4 py-4">
<div class="row">
    <div class="col-md-4 col-lg-3">
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-dark active">
                Thông tin tài khoản
            </a>
            <a href="order/infor" class="list-group-item list-group-item-action">
                Lịch sử mua hàng
            </a>
            <a href="" class="list-group-item list-group-item-action">
                Yêu thích
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                Mã giảm giá
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                Thông báo
            </a>
            <a href="index.php?act=logout" class="list-group-item list-group-item-action">
                Đăng xuất
            </a>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Bảo mật</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <a href="index.php?act=doimk" class="btn btn-link">Đổi mật khẩu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-lg-9">
        <div class="card">
            <div class="card-header">
                <h5>Hồ sơ của tôi</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="account/update">

                    <div class="mb-3">
                        <label for="ho_ten" class="form-label">Họ tên</label>
                        <input type="text" id="ho_ten" name="hoten" class="form-control" value="<?=$infouser['fullname']?>">
                    </div>

                    <div class="mb-3">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input type="text" id="sdt" name="sdt" class="form-control" value="<?=$infouser['phone']?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?=$infouser['email']?>">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" id="address" name="address" class="form-control" value="<?=$infouser['address']?>">
                    </div>

                    <button type="submit" name="edituser" class="btn btn-dark">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>
</main>