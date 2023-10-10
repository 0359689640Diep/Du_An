<?php 
include "models/CasualModels.php";
class CasualController extends Controller{
    use CasualModels;
    function index(){
        $data = $this->showCategory();
        $data = $this->showProduct();
        // echo "<pre>";
        // var_dump($data);die();
        $this->loadView("Casual.php", $data);
    }
}
?>