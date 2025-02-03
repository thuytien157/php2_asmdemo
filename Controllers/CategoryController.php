<?php
include_once './Models/CategoryModel.php';
class CategoryController{
    private $category;

    public function __construct(){
        $this->category = new CategoryModel();
    }

    public function index(){
        $parentct = $this->category->getParentCategories();
        //var_dump($parentct);
    }
}
?>