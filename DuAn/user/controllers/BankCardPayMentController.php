<?php 
include "models/BankCardPayMentModels.php";
class BankCardPayMentController extends Controller{
    use BankCardPayMentModels;
    public function index(){
        $data = $this->Toal();
        // echo "<pre>";
        // var_dump($data);die();
        $this->loadView("BankCardPayMent.php", $data);
    }

    public function browseOrders(){
        $data = $this->BrowseOrdersAll();
        if($data === null){
            echo "<script>
                window.location.replace('http://localhost:3000/DuAn/user/index.php');
            </script>";
        }
    }
    
}
?>