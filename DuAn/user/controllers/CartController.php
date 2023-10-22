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
            if($dataPay == null){
                if(!empty($_COOKIE['CashPayMentAccout'])){
                    $idAccount = $_COOKIE['CashPayMentAccout'];
                    echo "<script>
                    window.location.replace('http://localhost:3000/DuAn/user/index.php?controller=CashPayMent&id=$idAccount');
                    </script>";
                    
                }elseif(!empty($_COOKIE['BankCardPayMentAccout'])){
                    $idAccount = $_COOKIE['BankCardPayMentAccout'];
                     echo "<script>
                        window.location.replace('http://localhost:3000/DuAn/user/index.php?controller=BankCardPayMent&id=$idAccount');
                    </script>";
                    
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