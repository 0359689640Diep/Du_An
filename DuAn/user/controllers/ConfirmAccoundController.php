<?php 
include "models/ConfirmAccoundModels.php";
class ConfirmAccoundController extends Controller{
    use ConfirmAccoundModles;
    // load views
    public function index(){
        $data = $this->modelConfirmAccound();
        $this->loadView("ConfirmAccound.php", $data);
    }
}
?>