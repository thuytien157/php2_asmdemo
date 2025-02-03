<div class="container-fluid mt-2">
    <div class="link mb-4">
        <div class="dieuhuong">
          <a class="icon-link text-dark text-decoration-none" href="#">
            SẢN PHẨM <i class="fa fa-chevron-right opacity-50"></i>
          </a>
          <span class="fw-bold">GIỎ HÀNG</span>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-lg-8">
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" id="selectAll" checked>
          <label class="form-check-label" for="selectAll">Chọn tất cả sản phẩm</label>
        </div>

        <div class="list-group" id="cart">
          <?php foreach($cart as $item):?>
           <div class="list-group-item d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              <input class="form-check-input me-3" type="checkbox" checked>
              <img src="/php2/ASMC/public/img/<?=$item['image']?>" alt="Áo khoác" class="img-thumbnail" style="width: 100px;">
              <div class="ms-3">
                <p class="mb-1 fw-bold"><?=$item['name']?></p>
                <!-- <p class="text-muted">Kích thước: M</p> -->
                 <?=$item['id']?>
                <p class="text-muted">Số lượng: <?=$item['quantity']?></p>
              </div>
            </div>
            <div class="text-center">
              <p class="fw-bold"><?=$item['price']?><sup class="fw-bold">đ</sup></p>
              <div class="input-group input-group-sm">
                <button class="btn btn-outline-secondary" type="button">-</button>
                <input type="number" class="form-control text-center" value="1" min="1" readonly>
                <button class="btn btn-outline-secondary" type="button">+</button>
              </div>
                <a class="btn btn-danger btn-sm mt-2" href="php2/ASMC/cartRemove/<?=$item['id']?>">Xoá</a>
              </div>
          </div> 
          <?php endforeach?>
        </div>
      </div>

      <!-- Thanh toán -->
      <div class="col-12 col-lg-4 mt-4 mt-lg-0">
        <div class="card">
          <div class="card-body" id="tomtat">
            <h5 class="card-title fw-bold">Tóm tắt đơn hàng</h5>
            <div class="d-flex justify-content-between">
              <p>Tổng sản phẩm:</p>
              <p>3</p>
            </div>
            <div class="d-flex justify-content-between">
              <p>Tổng tiền:</p>
              <p class="fw-bold">10,480,000 VND</p>
            </div>
            <div>
              <h6>Thông tin thanh toán</h6>
              <input type="text" class="mb-2" placeholder="Nhập tên của bạn">
              <input type="text" placeholder="Nhập địa chỉ của bạn">
              <input type="email" placeholder="Nhập email chỉ của bạn">
              <input type="phone" placeholder="Nhập email chỉ của bạn">
            </div>
            <button class="btn btn-dark w-100 mt-3">Tiến hành thanh toán</button> 
          </div>
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
      <script src="/php2/ASMC/public/js/removeCart.js"></script>