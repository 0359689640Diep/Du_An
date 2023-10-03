<?php 
include "models/CartModels.php";
class CartController extends Controller{
    use CartModel;
    public function index(){
        $data = $this->toString();
            // echo "<pre>";
            // print_r($data["showCart"]); die();
        $this->loadView("CartViews.php", $data);
    }
    
}
?>