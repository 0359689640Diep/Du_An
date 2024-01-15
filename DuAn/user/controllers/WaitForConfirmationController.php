<?php
include "models/WaitForConfirmationModels.php";
class WaitForConfirmationController  extends Controller
{
    use WaitForConfirmationModels;
    public function index()
    {

        $data = $this->lisstProduct();
        $data = $this->showCategory();
        $this->loadView('WaitForConfirmation.php', $data);
    }

    public function CancelOrder()
    {
        $data = $this->lisstProduct();
        $data = $this->CancelOrderUser();
        $this->loadView('WaitForConfirmation.php', $data);
    }
}