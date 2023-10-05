<?php 
include "models/CashPayMentModels.php";
class CashPayMentController extends Controller{
    use CashPayMentModels;
    public function index(){
        $this->loadView("CashPayMent.php");
    }
    
}
?>