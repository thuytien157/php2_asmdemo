<?php
include_once './Models/HomeModel.php';
include_once 'BaseController.php';

class HomeController extends BaseController{
    private $home;

    public function __construct(){
        parent::__construct();  
        $this->home = new HomeModel();
    }

    public function index(){
        $listpro = $this->home->getProduct();  
        $this->render('home', ['listpro' => $listpro]); 
    }
}
?>
