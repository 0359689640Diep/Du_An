<?php 
include "models/CashPayMentModels.php";
class CashPayMentController extends Controller{
    use CashPayMentModels;
    public function index(){
        $data = $this->Toal();
        $this->loadView("CashPayMent.php", $data);
    }

    public function browseOrders(){
        $data = $this->BrowseOrdersAll();
        if($data === null){
            header("Location: DuAn/user/index.php");
        }
    }
    
}
?>