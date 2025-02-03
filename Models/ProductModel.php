<?php
include_once 'ProductBaseModel.php';

class ProductModel {
    use ProductBaseModel;

    public function getProduct() {
        return $this->getAllProducts();
    }

    public function getProductDetail($id) {
        return $this->getDetailProduct($id);
    }

    public function getColor() {
        return $this->getColors();
    }

    public function getSize() {
        return $this->getSizes();
    }

    public function getProductByC($categoryid) {
        return $this->getProductByCategory($categoryid);
    }

}
?>
