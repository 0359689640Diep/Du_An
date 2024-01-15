<?php 
include "models/CartModels.php";
class CartController extends Controller{
    use CartModel;
    public function index(){
        $data = $this->toString();
            if(!empty($data["showCart"][0]['Price'])){
                $_SESSION['Price'] = $data["showCart"][0]['Price'];
            }
            $dataPay = $this->PayBank();
            $this->loadView("CartViews.php", $data);
            if($dataPay == null && $_SERVER['REQUEST_METHOD']){
                extract($_POST);
                if(isset($BankCardPayment)){
                    $idAccount = $_COOKIE['CashPayMentAccout'];
                    header("Location: index.php?controller=CashPayMent&id=$idAccount");
                }elseif(isset($CashPayment)){
                    $idAccount = $_COOKIE['BankCardPayMentAccout'];
                    header("Location: index.php?controller=BankCardPayMent&id=$idAccount");                    
                }
            }
    }
    public function delete(){
        $data = $this->deleteCart();
        if(empty($data)){
            $idAccount = isset($_SESSION['IdAccountUser']) && !empty($_SESSION['IdAccountUser']);
            header("location: index.php?controller=Cart&id=$idAccount");
        }
    }

    }
?>