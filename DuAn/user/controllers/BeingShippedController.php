<?php 
include "models/BeingShippedModels.php";
class BeingShippedController  extends Controller{
    use BeingShippedModels;
    public function index(){
        $data = $this->showCategory();
        $data = $this->lisstProduct();
        $this->loadView('BeingShipped.php', $data);
    }
}
?>