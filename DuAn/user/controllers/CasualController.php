<?php 
include "models/CasualModels.php";
class CasualController extends Controller{
    use CasualModels;
    function index(){
        $data = $this->showCategory();
        $data = $this->showProduct();
        $this->loadView("Casual.php", $data);
    }

    function fillter(){
        $data = $this->sortBy();
        $data = $this->showCategory();
        $this->loadView("Casual.php", $data);
    }
    
    
    function sheach(){
        $data = $this->showProductShearch();
        $data = $this->sortByShearch();
        $data = $this->showCategory();
        $this->loadView("Casual.php", $data);
    }
}
?>