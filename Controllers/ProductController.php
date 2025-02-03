<?php
include_once 'Models/ProductModel.php';
include_once 'BaseController.php';

class ProductController extends BaseController {
    private $product;

    public function __construct() {
        parent::__construct();
        $this->product = new ProductModel();
    }

    public function index($categoryid = null) {
        if ($categoryid) {
            $listpro = $this->product->getProductByC($categoryid);
        } else {
            $listpro = $this->product->getProduct();
        }
        $this->render('product', ['listpro' => $listpro]);
    }

    public function detail($id) {
        $listprodetail = $this->product->getProductDetail($id);

        if (!$listprodetail) {
            echo "Sản phẩm không tồn tại.";
            exit();
        }

        $listsize = $this->product->getSize();
        $listcolor = $this->product->getColor();
        $images = array_column($listprodetail, 'image');

        $this->render('product_detail', [
            'listprodetail' => $listprodetail,
            'listsize' => $listsize,
            'listcolor' => $listcolor,
            'images' => $images,
        ]);
        // echo $images[0];
        // echo "<pre>";
        // var_dump($images);
        // echo "<pre>";

    }
    
}
?>
