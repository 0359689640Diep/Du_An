<?php
include "models/DeliveredSuccessfullyModels.php";
class DeliveredSuccessfullyController  extends Controller
{
    use DeliveredSuccessfullyModels;
    public function index()
    {
        //  

        $data = $this->showCategory();
        $data = $this->lisstProduct();
        $this->loadView('DeliveredSuccessfully.php', $data);
    }

    public function GiveBack()
    {
        $data = $this->lisstProduct();
        $data = $this->GiveBackUser();
        $this->loadView('DeliveredSuccessfully.php', $data);
    }
}
