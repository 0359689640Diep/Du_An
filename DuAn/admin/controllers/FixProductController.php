<?php
include "models/FixProductModels.php";
class FixProductController extends Controller{
    use FixProductModels;
    public function index() {
        $id = isset($_GET['IdProduct']) ? $_GET['IdProduct']: 0;
        $datadisplay = $this->FixProductDisplayModels($id);
        $dataMessage = $this->modelFixProduct($id);
        $dataCategory = $this->modelGetCategory();
        if($id == 0){
            header("location:index.php?controller=LisstProduct");
        }
        $data = array(
            "display" => $datadisplay,
           "dataCategory" => $dataCategory,
           "dataMessage" => $dataMessage

        );
        // echo "<pre>";
        // print_r($datadisplay['display'][0]);
        // print_r($data);
        // die();
        // echo "<pre>";
        $this->loadView("FixProduct.php",$data);
    }


}
?>