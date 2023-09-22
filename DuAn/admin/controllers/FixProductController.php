<?php
include "models/FixProductModels.php";
class FixProductController extends Controller{
    use FixProductModels;
    public function index() {
        $id = isset($_COOKIE['IdProduct']) ? $_COOKIE['IdProduct'] : 0;
        $datadisplay = $this->FixProductDisplayModels($id);
        $dataMessage = $this->modelFixProduct($id);
        $dataCategory = $this->modelGetCategory();
        if($id == 0){
            header("location:index.php?controller=LisstProduct");
        }
        setcookie("IdDetails", $datadisplay['display']['IdDetails'], time() + 3600); 
        $data = array(
            "display" => $datadisplay,
           "dataCategory" => $dataCategory,
           "dataMessage" => $dataMessage

        );
        // echo "<pre>";
        // print_r($datadisplay['display']['IdDetails']);
        // print_r($data['display']);
        // die();
        // echo "<pre>";
        $this->loadView("FixProduct.php",$data);
    }


}
?>