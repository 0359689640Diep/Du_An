<?php 
include "models/WaitingForDeliveryModels.php";
class WaitingForDeliveryController  extends Controller{
    use WaitingForDeliveryModels;
    public function index(){
        // echo "<pre>";
        // var_dump($data);die();
        $data = $this->showCategory();
        $data = $this->lisstProduct();
        $this->loadView('WaitingForDelivery.php', $data);
    }
    
    public function CancelOrder(){
        $data = $this->lisstProduct();
        $data = $this->CancelOrderUser();
        $this->loadView('WaitingForDelivery.php', $data);

    }
}
?>