<?php
include_once './Database.php';
trait ConnectModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

    public function getAll($sql, $param = []) {
        return $this->db->getAll($sql, $param);
    }

    public function getOne($sql, $param = []) {
        return $this->db->getOne($sql, $param); 
    }

    public function insert($sql, $param = []) {
        return $this->db->insert($sql, $param); 
    }

    public function update($sql, $param = []) {
        return $this->db->update($sql, $param); 
    }

    public function delete($sql, $param = []) {
        return $this->db->delete($sql, $param); 
    }
}


?>