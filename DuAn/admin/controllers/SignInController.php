<?php 
include "models/SignInModels.php";
class SignInController extends Controller{
    use SignInModles;
    // load views
    public function index(){
        $this->loadView("SignIn.php");
    }
    // khi ấn nút submit
    public function SignIn(){
        $this->modelSignIn();
        // kiểm tra tài khoản
        if(isset($_SESSION["emailAdmin"]) == true && $_SESSION["emailAdmin"] != ""){
            header("location:index.php?controller=homeAdmin");
        }elseif(isset($_SESSION["email"]) == true && $_SESSION["email"] != ""){
            header("location:index.php?controller=index");
        }elseif(isset($_SESSION["messageError"]) == true && $_SESSION["messageError"] != ""){
            header("location:index.php?controller=SignIn");
        }
        else{
            header("location:index.php?controller=error");
            
        }
    }
}
?>