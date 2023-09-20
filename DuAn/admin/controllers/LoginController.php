<?php 
include "models/LoginModels.php";
class loginController extends Controller{
    use LoginModles;
    // load views
    public function index(){
        $this->loadView("login.php");
    }
    // khi ấn nút submit
    public function login(){
        $this->modelLogin();
        // kiểm tra tài khoản
        if(isset($_SESSION["emailAdmin"]) == true && $_SESSION["emailAdmin"] != ""){
            header("location:index.php?controller=homeAdmin");
        }elseif(isset($_SESSION["email"]) == true && $_SESSION["email"] != ""){
            header("location:index.php?controller=index");
        }elseif(isset($_SESSION["messageError"]) == true && $_SESSION["messageError"] != ""){
            header("location:index.php?controller=login");
        }
        else{
            header("location:index.php?controller=error");
            
        }
    }
}
?>