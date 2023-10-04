<?php 
include "models/CartModels.php";
class CartController extends Controller{
    use CartModel;
    public function index(){
        $data = $this->toString();
            // echo "<pre>";
            // print_r($data["showCart"][0]['Price']); die();
            // $this->pay(); 
            if(!empty($data["showCart"][0]['Price'])){
                $_SESSION['Price'] = $data["showCart"][0]['Price'];
            }
        $this->loadView("CartViews.php", $data);
    }
    public function CashPayment(){
    }
    public function BankPayment(){

    }
    public function delete(){
        $data = $this->deleteCart();
        // var_dump($data);
        if(empty($data)){
            $idAccount = isset($_SESSION['IdAccountUser']) && !empty($_SESSION['IdAccountUser']);
            header("location: index.php?controller=Cart&id=$idAccount");
        }
    }
    
}
?>