<?php
include_once './Models/UserModel.php';
include_once 'BaseController.php';

class UserController extends BaseController{
    private $user;

    public function __construct(){
        parent::__construct();
        $this->user = new UserModel();
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $rePassword = $_POST['repassword'] ?? '';

            if(empty($username) || empty($email) || empty($password) || empty($rePassword)){
                $_SESSION['error'] = "Vui lòng nhập đủ thông tin";
            }
            //var_dump($_POST);
            if($password !== $rePassword){
                $_SESSION['error'] = "Mật khẩu không khớp";
            }
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        }
        $checkusern = $this->user->selectUser($username);
        if($checkusern && $checkusern['username'] == $username){
            $_SESSION['error'] = "Tên đăng nhập đã tồn tại";
        }
        $insertSuccess = $this->user->insertUser($username, $hashPassword, $email);
        if($insertSuccess){
            $_SESSION['success'] = "Đăng ký thành công";
        }else{
            $_SESSION['error'] = "Đăng ký không thành công";
        }
        header('location: /php2/ASM');
        exit;
        
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
        }

        $infouser = $this->user->selectUser($username);
        if(!$infouser){
            $_SESSION['error'] = "Tên đăng nhập không đúng";
        }else{
            $hashedPassword = password_verify($password, $infouser['password']);

            if($hashedPassword){
                $_SESSION['user']=[
                    'username' => $infouser['username'],
                    'id' => $infouser['id'],
                    'password' => $infouser['password']
                ];
            }else{
                $_SESSION['error'] = "Mật khẩu sai";
            }
        }

        header('location: /php2/ASM');
        exit;
        //var_dump($infouser);
    }

    public function logout(){
        unset($_SESSION['user']);
        header('location: /php2/ASM');
        exit;
    }
}

?>