<?php 
include "models/LisstAccountModels.php";
class LisstAccountController extends Controller{
    use LisstAccountModels;
    public function index(){
        $data = $this->LisstAccountModels();
        $this->loadView('LisstAccount.php', $data);
    }

    public function deleteAccount(){
        $id = isset($_GET['Id'])? $_GET['Id'] : 0;
        $this->delete($id);
        header("location:index.php?controller=LisstAccount");
    }
}
?>