<?php 
include "models/WaitForConfirmationModels.php";
class WaitForConfirmationController  extends Controller{
    use WaitForConfirmationModels;
    public function index(){
        // echo "<pre>";
        // var_dump($data);die();
        $data = $this->lisstProduct();
        $data = $this->showCategory();
        $this->loadView('WaitForConfirmation.php', $data);
    }
    
    public function CancelOrder(){
        $data = $this->lisstProduct();
        $data = $this->CancelOrderUser();
        $this->loadView('WaitForConfirmation.php', $data);

    }
}
?>