<?php
include_once 'ConnectModel.php';
class UserModel{
    use ConnectModel;

    public function insertUser($username, $password, $email){
        try {
            $sql = "INSERT INTO user (username, password, fullname, email, role, status)
            VALUES(:username, :password, '', :email, 0, 'active');";
            $params = [
                ':username' => $username,
                ':password' => $password,
                ':email' => $email
            ];
            $results = $this->db->insert($sql, $params);    
            return $results;   
        } catch (PDOException $th) {
            $_SESSION['error'] = "Lỗi SQL: " . $th->getMessage();
            return false;
        }
    }

    public function selectUser($username){
        $sql = "SELECT * FROM user WHERE username = :username;";
        return $this->db->getOne($sql, ['username' => $username]);
    }
    
}

?>