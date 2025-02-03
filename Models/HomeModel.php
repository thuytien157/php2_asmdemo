<?php
include_once 'ProductBaseModel.php';
class HomeModel{ 
   use ProductBaseModel;
    public function getProduct(){
       return $this->getAllProducts();
    }

}
?>