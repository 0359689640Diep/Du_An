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
        $data = $this->modelLogin();
        $this->loadView("login.php", $data);
        // echo "<pre>";
        // print_r($data); die();
        
    }
}
?>