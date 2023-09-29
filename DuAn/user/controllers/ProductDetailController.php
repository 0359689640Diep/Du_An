<?php 
include "models/ProductDetailModels.php";
class ProductDetailController extends Controller{
    use ProductDetailModels;
    public function index(){
        $data = $this->toString();
        // echo "<pre>";
        // var_dump($data); die();
        $this->loadView("ProductDetail.php");
    }
}
?>