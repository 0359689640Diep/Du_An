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
        // print_r($IdDetails);die();
        $this->loadView("ProductDetail.php", $data);
    }
    function addToCart(){
        $data = $this->checkLogin();
        if(!empty($data['messageError'])){
            echo "<script> 
                if(confirm('" . $data['messageError'][0] . "')){
                    window.location.href = 'index.php?controller=login';
                }
            </script>";            
        }else{
            echo "<script> 
                window.location.replace(`http://localhost:3000/DuAn/user/index.php?controller=Cart&id=".$data['message'][0]."`);
            </script>";  
            
        }
    }
    

}
?>