<?php
include_once 'ConnectModel.php';
class UserModel{
    use ConnectModel;

    public function insertUser($username, $password, $email){
        try {
            $sql = "INSERT INTO user (username, password, fullname, email)
            VALUES(:username, :password, '', :email);";
            $params = [
                ':username' => $username,
                ':password' => $password,
                ':email' => $email
            ];
            $results = $this->db->insert($sql, $params);    
            return $results;   
        } catch (Exception $th) {
            $_SESSION['error'] = "Lỗi SQL: " . $th->getMessage();
            return false;
        }
    }

    public function selectUser($username){
        $sql = "SELECT * FROM user WHERE username = :username;";
        return $this->db->getOne($sql, ['username' => $username]);
    }

    public function updateUser($fullname, $phone, $email, $address, $user_id){
        try {
            $sql = "UPDATE user SET fullname = :fullname, phone = :phone, email = :email, address = :address WHERE id = :user_id;";
            $params = [
                ':fullname' => $fullname,
                ':phone' => $phone,
                ':email' => $email,
                ':address' => $address,
                ':user_id' => $user_id
            ];
            $results = $this->db->update($sql, $params);
            return $results;
        } catch (Exception $th) {
            $_SESSION['error'] = "Lỗi SQL: " . $th->getMessage();
            echo "Lỗi SQL: " . $th->getMessage(); 
            return false;
        }
    }
    
    
}

?>