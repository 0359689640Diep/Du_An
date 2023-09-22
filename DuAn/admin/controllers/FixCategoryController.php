<?php
include "models/FixCategoryModels.php";
class FixCategoryController extends Controller{
    use FixCategoryModels;
    public function index() {
        $id = isset($_COOKIE['IdCategory']) ? $_COOKIE['IdCategory'] : 0;
        $datadisplay = $this->FixCategoryDisplayModels($id);
        $dataMessage = $this->modelFixCategory($id);
        if($id == 0){
            header("location:index.php?controller=LisstCategory");
        }
        $data = array(
            "display" => $datadisplay,
           "dataMessage" => $dataMessage

        );
        // echo "<pre>";
        // print_r($datadisplay['display']['IdDetails']);
        // print_r($data);
        // die();
        // echo "<pre>";
        $this->loadView("FixCategory.php",$data);
    }


}
?>