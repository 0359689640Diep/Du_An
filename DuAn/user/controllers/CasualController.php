<?php 
include "models/CasualModels.php";
class CasualController extends Controller{
    use CasualModels;
    function index(){
        $data = $this->showCategory();
        $data = $this->showProduct();
        $this->loadView("Casual.php", $data);
        // echo "<pre>";
        // var_dump($data);die();
    }

    function fillter(){
        $data = $this->sortBy();
        $data = $this->showCategory();
        $data = $this->showProduct();
        $this->loadView("Casual.php", $data);
    }
}
?>