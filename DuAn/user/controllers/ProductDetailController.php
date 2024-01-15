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
        $this->loadView("ProductDetail.php", $data);
    }
    function addToCart(){
        $data = $this->checkLogin();
        if(!empty($data['messageError'])){
            echo "<script> 
                if(confirm('" . $data['messageError'][0] . "')){
                     window.location.replace('index.php?controller=login');
                }
            </script>";            
        }else{
            header("Location:  index.php?controller=Cart&id=".$data['message'][0].""); 
            
        }
    }
    

}
?>