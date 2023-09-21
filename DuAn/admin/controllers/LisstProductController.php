<?php 
include "models/LisstProductModels.php";
class LisstProductController extends Controller{
    use LisstProductModels;
    public function index(){
        $data = $this->LisstProductModels();
        $this->loadView('LisstProduct.php', $data);
    }

    public function deleteProduct(){
        $id = isset($_GET['Id'])? $_GET['Id'] : 0;
        $this->delete($id);
        header("location:index.php?controller=LisstProduct");
    }
}
?>