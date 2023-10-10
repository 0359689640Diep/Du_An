<?php 
include "models/BeingShippedModels.php";
class BeingShippedController  extends Controller{
    use BeingShippedModels;
    public function index(){
        // echo "<pre>";
        // var_dump($data);die();
        $data = $this->showCategory();
        $data = $this->lisstProduct();
        $this->loadView('BeingShipped.php', $data);
    }
}
?>