<?php
include_once 'ConnectModel.php';

class OrderModel{
    use ConnectModel;

    public function insertOrder($totalquantity, $totalprice, $payment_method, $note, $orderDetails, $id_user) {
        try {
            $this->db->beginTransaction();
            
            $sqlOrder = "INSERT INTO orders (id_user, totalquantity, totalprice, payment_method, note) 
                         VALUES (:id_user, :totalquantity, :totalprice, :payment_method, :note);";
            $paramsOrder = [
                ':id_user' => $id_user,
                ':totalquantity' => $totalquantity,
                ':totalprice' => $totalprice,
                ':payment_method' => $payment_method,
                ':note' => $note
            ];
            $orderId = $this->db->insert($sqlOrder, $paramsOrder); 
    
            foreach ($orderDetails as $item) {
                $sqlOrderDetail = "INSERT INTO orders_detail (id_order, id_product, price, quantity) 
                                   VALUES (:id_order, :id_product, :price, :quantity);";
                $paramsOrderDetail = [
                    ':id_order' => $orderId,
                    ':id_product' => $item['id'],
                    ':price' => $item['price'],
                    ':quantity' => $item['quantity']
                ];
                $this->db->insert($sqlOrderDetail, $paramsOrderDetail);
            }
    
            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            $this->db->rollBack();
            echo $e->getMessage();  
            return false;
        }
    }

    public function getOrders($id_user){
        $sql = "SELECT o.id, o.orderdate, o.totalquantity, o.totalprice, o.status,
                    GROUP_CONCAT(p.name) as name,
                    GROUP_CONCAT(i.image) as image,
                    GROUP_CONCAT(od.price) as price,
                    GROUP_CONCAT(od.quantity) as quantity,
                    u.fullname,
                    u.address,
                    u.phone,
                    u.email
                FROM orders o
                INNER JOIN orders_detail od ON o.id = od.id_order
                INNER JOIN user u ON u.id = o.id_user
                INNER JOIN product p ON p.id = od.id_product
                INNER JOIN image_detail i ON p.id = i.id_product
                WHERE o.id_user = :id_user AND i.is_main = 1
                GROUP BY o.id
                ORDER BY o.orderdate DESC;
                ";

        return $this->db->getALL($sql, ['id_user' => $id_user]);
    }

    public function updateAddress($id_user, $address){
        try {
            $sql = "UPDATE user SET address = :address WHERE id = :id_user;";
            $params = [
                ':address' => $address,
                ':id_user' => $id_user
            ];
            $results = $this->db->update($sql, $params);
            return $results;
        } catch (Exception $th) {
            $_SESSION['error'] = "Lỗi SQL: " . $th->getMessage();
            echo "Lỗi SQL: " . $th->getMessage(); 
            return false;
        }
    }

    public function updateStatus($id){
        try {
            $sql = "UPDATE orders SET status = 'don-that-bai' WHERE id = :id;";
            $results = $this->db->update($sql, ['id' => $id]);
            return $results;

        } catch (Exception $th) {
            $_SESSION['error'] = "Lỗi SQL: " . $th->getMessage();
            echo "Lỗi SQL: " . $th->getMessage(); 
            return false;
        }
    }
    

}

?>