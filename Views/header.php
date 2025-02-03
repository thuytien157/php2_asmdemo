<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/php2/ASM/public/css/css.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary menu-1">
    <div class="container-fluid">
      <a class="navbar-brand" to="/">
        <svg xmlns="http://www.w3.org/2000/svg" width="84" height="24" viewBox="0 0 84 24" fill="black">
          <path d="M27.6027 0L17.7745 10.585L14.1671 0H6.94734V0.005L5.41862 0L6.33686 2.365L1.14528 19.9L0 24H7.24501L10.6203 12.505L13.1177 18.435H17.8199L23.8036 12.505L20.4283 24H27.7742L34.8224 0H27.6027ZM75.8708 7.25C75.5933 8.195 74.67 9.205 72.6519 9.205H68.0758L69.2261 5.295H73.8022C75.8153 5.295 76.1483 6.305 75.8708 7.25ZM73.5499 16.585C73.2573 17.595 72.2583 18.71 70.2402 18.71H65.2908L66.5269 14.495H71.4814C73.4944 14.495 73.8526 15.575 73.555 16.585H73.5499ZM83.1208 7.04C84.3317 2.895 82.031 0 75.8203 0H61.86L62.7884 2.2L57.1831 21.68L54.7714 24H69.4078C74.7356 24 79.5336 23.5 80.8807 18.915C81.8696 15.545 80.8858 12.69 79.8464 12.08C80.916 11.575 82.3186 9.77 83.1208 7.04ZM41.1896 18.74H51.3709H51.376C51.418 18.7175 51.4112 18.7212 51.3897 18.733C51.2824 18.7916 50.8087 19.0503 54.2568 17.225L52.1984 23.995H30.6853L32.9961 21.69L38.7527 2.32L37.7891 0H46.694L41.1896 18.74Z"/>        </svg>
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="home" class="nav-link me-2 fw-semibold">Trang chủ</a>
          </li>
          <ul class="navbar-nav">
          <?php foreach ($ParentsC as $category): ?>
              <li class="nav-item dropdown">
                  <a href="product/category/<?= $category['id']?>" class="nav-link me-2 fw-semibold">
                      <?= $category['name'] ?>
                          </a>
                    <?php if (isset($ChildrenC[$category['id']]) && !empty($ChildrenC[$category['id']])): ?>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown<?= $category['id'] ?>">
                            <?php foreach ($ChildrenC[$category['id']] as $child): ?>
                                <li>
                                    <a class="dropdown-item" href="product/category/<?= $child['id'] ?>">
                                        <?= $child['name'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>

          <li class="nav-item">
            <a href="baiviet.html" class="nav-link me-2 fw-semibold">Bài viết</a>
          </li>
          <?php if(!isset($_SESSION['user'])):?>
          <li class="nav-item">
            <div class="nav-link me-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#registerModal">Đăng ký</div>
          </li>
          <li class="nav-item">
            <div class="nav-link me-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#loginModal">Đăng nhập</div>
          </li>
          <?php else:?>
            <?=''?>
          <?php endif; ?>
        </ul>
      </div>
      <div class="d-flex justify-content-end gap-3 fs-5 ">
        <a class="text-dark text-decoration-none fa fa-search"></a>
        <a href="giohang.html" class="text-dark text-decoration-none fa fa-shopping-bag"></a>
        <a class="text-dark text-decoration-none fa fa-heart"></a>
        <a  href="admin.html" class="text-dark text-decoration-none fa fa-lock"></a>    
      </div>
      <?php if(isset($_SESSION['user'])): ?>
        <div class="dropdown ps-2">
            <button class="btn btn-secondary fs-6 fw-semibold dropdown-toggle ps-3 pe-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['user']['username']; ?> 
            </button>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li class="dropdown-item fs-6">Tài khoản</li>
                <li><a class="dropdown-item fs-6" href="user/logout">Đăng xuất</a></li>
            </ul>
        </div>
    <?php else: ?>
        <?=''?>
    <?php endif; ?>

  </nav>
  <!-- Modal Đăng Ký -->
  <div class="modal fade modal-md" id="registerModal" aria-hidden="true" aria-labelledby="registerLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold w-100 text-center" id="registerLabel">Đăng ký</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action='user/register'>
            <p class="fw-normal">Đăng ký thành viên và nhận ngay <strong>ưu đãi 10% </strong>cho đơn hàng đầu tiên <br>
              Nhập mã: <strong>MLBWELCOME</strong></p>
            <div class="mb-3">
          
              <label for="registerUsername" class="form-label fw-bold">Username <sup><i class="fa fa-asterisk text-danger"></i></sup></label>
              <input type="text" class="form-control" id="registerUsername" placeholder="Nhập username của bạn..." name="username">
            </div>
            <div class="mb-3">
              <label for="registerEmail" class="form-label fw-bold">Email <sup><i class="fa fa-asterisk text-danger"></i></sup></label>
              <input type="email" class="form-control" id="registerEmail" placeholder="Nhập email..." name="email">
            </div>
            <div class="mb-3">
              <label for="registerPassword" class="form-label fw-bold">Mật khẩu <sup><i class="fa fa-asterisk text-danger"></i></sup></label>
              <input type="password" class="form-control" id="registerPassword" placeholder="Nhập mật khẩu..." name="password">
              <input type="password" class="form-control mt-2" id="registerPassword" placeholder="Nhập lại mật khẩu" name="repassword">
            </div>
            </div>
            <div class="modal-footer d-flex flex-column align-items-center">
              <input type="submit" name="register" class="btn btn-dark ps-5 pe-5"></input>
              <div>Hoặc</div>
              <p class="text-center fw-bold">Đã có tài khoản? 
                <a href="#" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-target="#loginModal" data-bs-toggle="modal">Đăng nhập</a>
              </p>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Modal Đăng Nhập -->
  <div class="modal fade" id="loginModal" aria-hidden="true" aria-labelledby="loginLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 fw-bold w-100 text-center" id="registerLabel">Đăng nhập</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="user/login">
            <div class="mb-3">
              <label for="loginUsername" class="form-label">Username <sup><i class="fa fa-asterisk text-danger"></i></sup></label>
              <input type="text" class="form-control" id="loginUsername" placeholder="Nhập username của bạn..." name="username">
            </div>
            <div class="mb-3">
              <label for="loginPassword" class="form-label">Mật khẩu <sup><i class="fa fa-asterisk text-danger"></i></sup></label>
              <input type="password" class="form-control" id="loginPassword" placeholder="Nhập mật khẩu..." name="password">
            </div>
            <div class="modal-footer d-flex flex-column align-items-center">
          <input type="submit" class="btn btn-dark ps-5 pe-5" name="login"></input>
          <a href="" class="text-dark">Quên mật khẩu?</a>
          <div>Hoặc</div>
          <p class="text-center fw-bold">Chưa có tài khoản? 
            <a href="#" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" data-bs-target="#registerModal" data-bs-toggle="modal">Đăng ký</a>
          </p>
        </div>
          </form>
        </div>
    
      </div>
    </div>
  </div>
