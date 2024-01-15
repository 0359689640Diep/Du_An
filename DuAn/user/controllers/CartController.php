<?php
include "models/CartModels.php";
class CartController extends Controller
{
    use CartModel;
    public function index()
    {
        $data = $this->toString();
        if (!empty($data["showCart"][0]['Price'])) {
            $_SESSION['Price'] = $data["showCart"][0]['Price'];
        }
        $this->loadView("CartViews.php", $data);
        $dataPay = $this->PayBank();

        if ($dataPay === NULL && $_SERVER['REQUEST_METHOD'] === "POST") {
            extract($_POST);
            if (isset($BankCardPayment)) {
                echo "<script>
                         window.location.replace('index.php?controller=BankCardPayment&id=$BankCardPayment')
                    </script>";
            } elseif (isset($CashPayment)) {
                echo "<script>
                         window.location.replace('index.php?controller=CashPayMent&id=$CashPayment')
                    </script>";
            }
        }
    }
    public function delete()
    {
        $data = $this->deleteCart();
        if (empty($data)) {
            $idAccount = isset($_SESSION['IdAccountUser']) && !empty($_SESSION['IdAccountUser']);
            header("location: index.php?controller=Cart&id=$idAccount");
        }
    }
}
