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
        if (isset($_SESSION['error'])) {
            echo '<div class="modal fade" tabindex="-1" id="errorModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thông báo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger text-danger text-bold">'.$_SESSION['error'].'</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>';
            unset($_SESSION['error']);

            echo "<script>
                    var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                    errorModal.show();
                </script>";
        } elseif (isset($_SESSION['success'])) {
            echo '<div class="modal fade" tabindex="-1" id="successModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thông báo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success text-success text-bold">'.$_SESSION['success'].'</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>';
            unset($_SESSION['success']);
            echo "<script>
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        </script>";

        }
 
        include_once './Views/' . $view . '.php';  
        include_once './Views/footer.php';  
    }
    }

?>