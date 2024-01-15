<?php 
include "models/BankCardPayMentModels.php";
class BankCardPayMentController extends Controller{
    use BankCardPayMentModels;
    public function index(){
        $data = $this->Toal();
        $this->loadView("BankCardPayMent.php", $data);
    }

    public function browseOrders(){
        $data = $this->BrowseOrdersAll();
        if($data === null){
            header("Location: DuAn/user/index.php");
        }
    }
    
}
?>