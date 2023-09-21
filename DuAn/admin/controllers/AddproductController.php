<?php
include "models/AddproductModels.php";
class AddproductController extends Controller{
    use AddproductModels;
    public function index() {
        $dataMessage = $this->modeladdproduct();
        $dataCategory = $this->modelGetCategory();
        
        $data = array(
           "dataCategory" => $dataCategory,
           "dataMessage" => $dataMessage

        );
        // echo "<pre>";
        // print_r($data['dataCategory']);die();
        // echo "<pre>";

        $this->loadView("Addproduct.php", $data);
    }
}
?>