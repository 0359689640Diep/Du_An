<?php 
require "models/PersonalModels.php";
class PersonalController extends Controller{
    use PersonalModel;
    public function index(){
        $data = $this->showAccount();
        // echo "<pre>";
        // var_dump($data["showAccount"]);die();
        $this->loadView("Personal.php", $data);
    }
}
?>