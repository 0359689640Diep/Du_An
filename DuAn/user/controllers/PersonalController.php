<?php 
require "models/PersonalModels.php";
class PersonalController extends Controller{
    use PersonalModel;
    public function index(){
        $data = $this->showAccount();
        $_SESSION["ImageUser"] = $data["showAccount"]["Image"];
        $_SESSION["NameUser"] = $data["showAccount"]["Name"];
        // echo "<pre>";
        // var_dump($data["showAccount"]["Image"]);die();
        $this->loadView("Personal.php", $data);
    }

    public function UpdateAccount(){
         $this->Update();
        $IdAccount = $_GET['id'];
        header("location: index.php?controller=Personal&id=$IdAccount");
    }
}
?>