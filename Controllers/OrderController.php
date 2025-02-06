<?php
include_once 'BaseController.php';
include_once './Models/OrderModel.php';
include_once './Models/UserModel.php';
class OrderController extends BaseController {
    private $order;

    public function __construct() {
        parent::__construct();  

        $this->order = new OrderModel(); 
    }
    public function orders() {
        $totalPrice = 0;
        $totalQuantity = 0;

        foreach ($_SESSION['cart'] as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
            $totalQuantity += $item['quantity'];
        }

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['order'])){
            $id_user = $_SESSION['user']['id'] ?? '';
            $payment_method = $_POST['pt_thanhtoan'] ?? '';
            $note = $_POST['ghi_chu'] ?? '';
            $totalquantity = $totalQuantity;
            $totalprice = $totalPrice;
            $orderDetails = $_SESSION['cart']; 
            //var_dump($_SESSION['cart']);
            $insertOrder = $this->order->insertOrder($totalquantity, $totalprice, $payment_method, $note, $orderDetails, $id_user);

            if ($insertOrder) {
                $_SESSION['success'] = "Đặt hàng thành công";
            } else {
                $_SESSION['error'] = "Đặt hàng thất bại";
            }

            header('location: /php2/ASMC/cart');
            exit;
        }
    }

    public function InforOrder(){
        $id_user = $_SESSION['user']['id'];

        $inforOrder = $this->order->getOrders($id_user);
        $this->render('order_Infor',['inforOrder' => $inforOrder]);

    }

    public function updateAddress(){
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['editaddress'])) {
            $id_user = $_SESSION['user']['id'];
            $address = $_POST['address'];
    
            $updateSuccess = $this->order->updateAddress($id_user, $address);
    
            if ($updateSuccess) {
                $_SESSION['success'] = "Cập nhật thành công";
            } else {
                $_SESSION['error'] = "Cập nhật không thành công";
            }
        }
        header('location: /php2/ASMC/order/infor');
        exit;
    }
    
    public function cancelOrder($id){
        $updateSuccess = $this->order->updateStatus($id);

        if ($updateSuccess) {
            $_SESSION['success'] = "Đã huỷ đơn hàng";
        } else {
            $_SESSION['error'] = "Huỷ không thành công";
        }        
        header('location: /php2/ASMC/order/infor');
        exit;

    }
}


?>