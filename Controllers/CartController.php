<?php
include_once 'BaseController.php';

class CartController extends BaseController {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        if(isset($_SESSION['user'])){
            $this->render('cart', ['cart' => $cart]);
        }else{
            $_SESSION['error'] = "Bạn cần phải đăng nhập";
            header('location: /php2/ASMC');
            exit;
        }
    }

    public function addToCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addToCart'])) {
            $product_id = $_POST['id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $quantity = $_POST['quantity'];
            $image = $_POST['product_image'];

            // Kiểm tra nếu giỏ hàng chưa được tạo
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            $check = false;
            foreach ($_SESSION['cart'] as &$item) { 
                if ($item['id'] === $product_id) {
                    $item['quantity'] += $quantity;  
                    $check = true;
                    break;
                }
            }

            if (!$check) {
                $_SESSION['cart'][] = [
                    'id' => $product_id,
                    'name' => $product_name,
                    'price' => $product_price,
                    'quantity' => $quantity, 
                    'image' => $image 
                ];
            }

            header('Location: /php2/ASMC/cart');
            exit;            
        }
    }

    public function removeFromCart($product_id) {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $product_id) {
                    unset($_SESSION['cart'][$key]);
                    header('Location: /php2/ASMC/cart');
                    exit;
                }
            }
        }
    }

    public function increase($product_id) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    
        $check = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity']++;
                $check = true;
                break;
            }
        }
    
        if (!$check) {
            $_SESSION['cart'][] = [
                'id' => $product_id,
                'quantity' => 1, 
            ];
        }
    
        header('Location: /php2/ASMC/cart');
        exit;
    }
    
    public function decrease($product_id) {
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $product_id && $item['quantity'] > 1) {
                    $item['quantity']--;
                    break;
                }
            }
        }
    
        header('Location: /php2/ASMC/cart');
        exit;
    }
    
}
?>
