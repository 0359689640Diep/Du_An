<?php 
include "models/LoginModels.php";
class LoginController extends Controller{
    use loginModles;
    // load views
    public function index(){
        $this->loadView("login.php");
    }
    // khi ấn nút submit
    public function login(){
        $data = $this->modellogin();
        $this->loadView("login.php", $data);
        
    }
}
?>