<?php 
include "models/CartModels.php";
class CartController extends Controller{
    use CartModel;
    public function index(){
        $data = $this->toString();
            // echo "<pre>";
            // print_r($data["showCart"][0]['IdCart']); die();
            // $this->pay(); 
            if(!empty($data["showCart"][0]['Price'])){
                $_SESSION['Price'] = $data["showCart"][0]['Price'];
            }
            $dataPay = $this->PayBank();
            $this->loadView("CartViews.php", $data);
            if($dataPay == null){
                // var_dump($dataPay);
                if(!empty($_COOKIE['CashPayMentAccout'])){
                    $idAccount = $_COOKIE['CashPayMentAccout'];
                    header("location: index.php?controller=CashPayMent&id=$idAccount");
                    
                }elseif(!empty($_COOKIE['BankCardPayMentAccout'])){
                     $idAccount = $_COOKIE['BankCardPayMentAccout'];

                    header("location: index.php?controller=BankCardPayMent&id=$idAccount");
                    
                }else{
                    die("error");
                }
            }
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