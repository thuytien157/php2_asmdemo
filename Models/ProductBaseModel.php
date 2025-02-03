<?php
include_once 'ConnectModel.php';
trait ProductBaseModel{
    use ConnectModel;
    protected function getALLProductsQuery(){
        $sql = "SELECT p.id, p.name, p.description, p.price, p.discount, i.image
                FROM product p
                inner join image_detail i on p.id = i.id_product
                WHERE is_main = 1";
        return $sql;
    }

    public function getAllProducts() {
        $sql = $this->getALLProductsQuery();
        return $this->db->getAll($sql);
    }
    
    protected function getDetailProductQuery(){
        $sql = "SELECT p.name, p.id AS product_id, p.price, p.discount, p.description,
                        i.image as image
                    FROM product p
                    INNER JOIN image_detail i ON P.id = i.id_product  
                    WHERE P.id = :id;";
        return $sql;
    }
    public function getDetailProduct($id) {
        $sql = $this->getDetailProductQuery(); 
        return $this->db->getALL($sql, ['id' => $id]);
    }

    protected function getColors(){
        $sql = "SELECT hex_code FROM colors";
        return $this->db->getALL($sql);
    }
    protected function getSizes(){
        $sql = "SELECT type FROM size";
        return $this->db->getALL($sql);
    }

    protected function getProductByCategoryQuery(){
        $sql = "SELECT p.id, p.name, p.description, p.price, p.discount, i.image
                FROM product p 
                INNER JOIN categories ca 
                ON ca.id = p.id_category 
                INNER JOIN image_detail i
                ON P.id = i.id_product
                WHERE (ca.id = :categoryid OR ca.id_parent = :categoryid)
                AND i.is_main = 1;";
        return $sql;
    }
    
  
    public function getProductByCategory($categoryid) {
        $sql = $this->getProductByCategoryQuery(); 
        return $this->db->getALL($sql, ['categoryid' => $categoryid]); 
    }
    
}
?>