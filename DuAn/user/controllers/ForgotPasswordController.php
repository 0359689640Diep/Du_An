<?php 
include "models/ForgotPasswordModels.php";
class ForgotPasswordController extends Controller{
    use ForgotPasswordModles;
    // load views
    public function index(){
        $this->loadView("ForgotPassword.php");
    }
    // khi ấn nút submit
    public function SendGmail(){
        $data = $this->ForgotPasswordSendGmail();
        // echo "<pre>";
        // print_r($data); die();
        $this->loadView("ForgotPassword.php", $data);
        
    }
    public function updatePassword(){
        $data = $this->updatePasswordForgotPassword();
        // echo "<pre>";
        // print_r($data); die();
        $this->loadView("ForgotPassword.php", $data);
        
    }
}
?>