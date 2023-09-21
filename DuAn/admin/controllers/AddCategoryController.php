<?php
include "models/AddCategoryModels.php";
class AddCategoryController extends Controller{
    use AddCategoryModels;
    public function index() {
        $data = $this->modelAddCategory();
        // echo "<pre>";
        // print_r($data);die();
        $this->loadView("AddCategory.php", $data);
    }
}
?>