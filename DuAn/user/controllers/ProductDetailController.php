<?php 
include "models/ProductDetailModels.php";
class ProductDetailController extends Controller{
    use ProductDetailModels;
    public function index(){
        $data = $this->toString();
        if(isset($data['showProduct'][0]['IdDetails'])){    
            $IdDetails = $data['showProduct'][0]['IdDetails'];
            $IdCategory = $data['showProduct'][0]['IdCategory'];
            $_SESSION["IdDetails"] = $IdDetails;
            $_SESSION["IdCategory"] = $IdCategory;
        }
        // echo "<pre>";
        // print_r($data);die();
        $this->loadView("ProductDetail.php", $data);
    }

}
?>