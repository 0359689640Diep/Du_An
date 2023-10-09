<?php 
include "models/OderModels.php";
class OderController extends Controller{
    use OderModels;
    public function index(){
        $data = $this->listOder();
        // echo "<pre>";
        // var_dump($data); die();
        $this->loadView("Oder.php", $data);

    }

    public function Delivery(){
        $data = $this->deliveryOder();
        $data = $this->listOder();
        // header("location: index.php?controller=Oder");
        // echo "<pre>";
        // var_dump($data); die();
         $this->loadView("Oder.php", $data);
    }
    public function BeingShipped(){
        $data = $this->BeingShippedOder();
        $data = $this->listOder();
        // header("location: index.php?controller=Oder");
        // echo "<pre>";
        // var_dump($data); die();
         $this->loadView("Oder.php", $data);
    }
    public function Arrived(){
        $data = $this->ArrivedOder();
        $data = $this->listOder();
        // header("location: index.php?controller=Oder");
        // echo "<pre>";
        // var_dump($data); die();
         $this->loadView("Oder.php", $data);
    }
    public function CancelOrder(){
        $data = $this->CanceldOder();
        $data = $this->listOder();
        // header("location: index.php?controller=Oder");
        // echo "<pre>";
        // var_dump($data); die();
         $this->loadView("Oder.php", $data);
    }
}
?>