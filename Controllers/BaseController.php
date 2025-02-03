<?php
include_once './Models/CategoryModel.php';
class BaseController {
    protected $cate;

    public function __construct() {
        $this->cate = new CategoryModel(); 
    }

    protected function render($view, $data = []) {
        $ParentsC = $this->cate->getParentCategories();
        //var_dump($ParentsC);
        $ChildrenC = [];
    
        if (!empty($ParentsC)) {
            foreach ($ParentsC as $category) {
                $ChildrenC[$category['id']] = $this->cate->getChildCategories($category['id']);
            }
        }
        $data['ParentsC'] = $ParentsC;
        $data['ChildrenC'] = $ChildrenC;
        extract($data);
        include './Views/header.php';  
        include_once './Views/' . $view . '.php';  
        include_once './Views/footer.php';  
    }
    }

?>