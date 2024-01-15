<?php
include "models/AddCategoryModels.php";
class AddCategoryController extends Controller
{
    use AddCategoryModels;
    public function index()
    {
        $data = $this->modelAddCategory();
        $this->loadView("AddCategory.php", $data);
    }
}