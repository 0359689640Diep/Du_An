<?php 
include "models/HomeModels.php";
class CartController extends Controller{
    // use CartModel;
    public function index(){
        // $data = $this->toString();
        // echo "<pre>";
        // var_dump($data); die();, $data
        $this->loadView("CartViews.php");
    }
    
}
?>