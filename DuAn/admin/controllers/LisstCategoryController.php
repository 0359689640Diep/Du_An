<?php 
include "models/LisstCategoryModels.php";
class LisstCategoryController extends Controller{
    use LisstCategoryModels;
    public function index(){
        $data = $this->LisstCategoryModels();
                    // print_r($data);die();

        $this->loadView('LisstCategory.php', $data);
    }

    public function deleteCategory(){
        $id = isset($_GET['Id'])? $_GET['Id'] : 0;
        $this->delete($id);
        header("location:index.php?controller=LisstCategory");
    }
}
?>