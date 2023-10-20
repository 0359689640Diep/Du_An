<?php
include "models/AddproductModels.php";
class AddproductController extends Controller{
    use AddproductModels;
    public function index() {
        $dataMessage = $this->modeladdproduct();
        $dataCategory = $this->modelGetCategory();
        $dataColorSizeDefault = $this->LisstColorAndSizeDefault();
        
        $data = array(
           "dataCategory" => $dataCategory,
           "dataMessage" => $dataMessage,
            "dataColorSizeDefault" => $dataColorSizeDefault
        );
        // echo "<pre>";
        // print_r($data['dataColorSizeDefault']);
        // die();
        // echo "<pre>";

        $this->loadView("Addproduct.php", $data);
    }

    public function fix(){
        $this->loadView("FixProduct.php");
    }
}
?>