<?php
include "models/OderModels.php";
class OderController extends Controller
{
    use OderModels;
    public function index()
    {
        $data = $this->listOder();
        //  

        $this->loadView("Oder.php", $data);
    }

    public function Delivery()
    {
        $data = $this->deliveryOder();
        $data = $this->listOder();
        $this->loadView("Oder.php", $data);
    }
    public function BeingShipped()
    {
        $data = $this->BeingShippedOder();
        $data = $this->listOder();
        $this->loadView("Oder.php", $data);
    }
    public function Arrived()
    {
        $data = $this->ArrivedOder();
        $data = $this->listOder();
        $this->loadView("Oder.php", $data);
    }
    public function CancelOrder()
    {
        $data = $this->CanceldOder();
        $this->loadView("Oder.php", $data);
    }
}
