<?php
ob_start();
session_start();
ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);

// var_dump($_SESSION['user']);
// unset($_SESSION['user']);
if(isset($_SESSION['error'])){
    echo '<div class="alert alert-danger" role="alert">
            '.$_SESSION['error'].'
        </div>';
    unset($_SESSION['error']);
}elseif(isset($_SESSION['success'])){
    echo '<div class="alert alert-success" role="alert">
            '.$_SESSION['success'].'
        </div>';
unset($_SESSION['success']);
}

include "router.php";

$route = new Router();
$route->add("/home", ["controller" => "home", "action" => "index"]);
$route->add("/", ["controller" => "home", "action" => "index"]);
$route->add("/product", ["controller" => "product", "action" => "index"]);
$route->add("/product/detail/{id}", ["controller" => "product", "action" => "detail"]);
$route->add("/addToCart", ["controller" => "cart", "action" => "addToCart"]);
$route->add("/cart", ["controller" => "cart", "action" => "index"]);
$route->add("/cartRemove/{product_id}", ["controller" => "cart", "action" => "removeFromCart"]);
$route->add("/user/register", ["controller" => "user", "action" => "register"]);
$route->add("/user/login", ["controller" => "user", "action" => "login"]);
$route->add("/user/logout", ["controller" => "user", "action" => "logout"]);
$route->add("/product/category/{categoryid}", ["controller" => "product", "action" => "index"]);



$request_uri = $_SERVER['REQUEST_URI'];
$path = str_replace('/php2/ASMC', '', $request_uri);
//var_dump($path);

$params = $route->match($path);
echo "<br>";
if ($params === false) {
    exit("Không có cái trang này!");
}
//var_dump($params);
$ctrlName = ucfirst($params['controller']) . "Controller";
//echo $ctrlName;

$action = $params['action'] ?? "index";
unset($params['controller'], $params['action']);
spl_autoload_register(function ($className) {
    include "Controllers/" . $className . ".php";
});

$ctrl = new $ctrlName();
$ctrl->$action(...$params);
?>
