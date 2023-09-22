<?php
include "models/FixProductModels.php";
class FixProductController extends Controller{
    use FixProductModels;
    public function index() {
        $id = isset($_GET['Id']) ? $_GET['Id'] : 0;
        $datadisplay = $this->FixProductDisplayModels($id);
        $dataMessage = $this->modelFixProduct($id);
        $dataCategory = $this->modelGetCategory();
        
        $data = array(
            "display" => $datadisplay,
           "dataCategory" => $dataCategory,
           "dataMessage" => $dataMessage

        );
        // echo "<pre>";
        // print_r($datadisplay);
        // print_r($data['display']['display']);
        // die();
        // echo "<pre>";
        $this->loadView("FixProduct.php",$data);
        if(empty($dataMessage[0])){
            header("location:index.php?controller=LisstProduct");

        }
    }


}
?>