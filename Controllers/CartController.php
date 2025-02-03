<?php
include_once 'BaseController.php';

class CartController extends BaseController {
    public function __construct() {
        parent::__construct();

    }

    public function index() {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $this->render('cart', ['cart' => $cart]);
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
        
            $found = false;
            foreach ($_SESSION['cart'] as &$item) { 
                if ($item['id'] === $product_id) {
                    $item['quantity'] += $quantity;  
                    $found = true;
                    break;
                }
            }
        
            if (!$found) {
                $_SESSION['cart'][] = [
                    'id' => $product_id,
                    'name' => $product_name,
                    'price' => $product_price,
                    'quantity' => $quantity, 
                    'image' => $image 

                ];
            }
            // unset($_SESSION['cart']);
            //$_SESSION['success'] = 'Sản phẩm đã được thêm vào giỏ hàng thành công!';
            // echo "<pre>";
            // var_dump($_SESSION['cart']);
            // echo "<pre>";
            
            header('location: php2/ASMC/cart');
            exit;
        }
        
    }

    public function removeFromCart($product_id) {
        if (isset($product_id)) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $product_id) {
                    unset($_SESSION['cart'][$key]); 
                    header('location: /php2/ASMC/cart');
                    exit;
                }
            }
        }

    }
        
    
}
?>
