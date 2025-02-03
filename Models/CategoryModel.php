<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'ConnectModel.php';
class CategoryModel{
    use ConnectModel;

    public function getParentCategories(){
        $sql = "SELECT id, name
                FROM categories
                WHERE id_parent = 0 AND is_default = 0;";
        return $this->db->getAll($sql);
    }

    public function getChildCategories($parentId) {
        $sql = "SELECT id, name 
                FROM categories 
                WHERE id_parent = :parentId;";
        // $l = $this->db->getAll($sql, ['parentId' => $parentId]);
        // var_dump($l);
        return $this->db->getAll($sql, ['parentId' => $parentId]);
    }

}
?>