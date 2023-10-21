<?php
include "models/FixProductModels.php";
class FixProductController extends Controller{
    use FixProductModels;
    public function index() {
        $id = isset($_GET['IdProduct']) ? $_GET['IdProduct']: 0;
        $datadisplay = $this->FixProductDisplayModels($id);
        $dataMessage = $this->modelFixProduct($id);
        $dataCategory = $this->modelGetCategory();
        $dataColorSizeDefault = $this->LisstColorAndSizeDefault();

        // echo "<pre>";
        // // print_r($dataColorSizeDefault['ColorDefault']);
        // var_dump(empty($dataColorSizeDefault['ColorDefault'][10]['IdProduct']));
        // die();
        if($id == 0){
            header("location:index.php?controller=LisstProduct");
        }
        $data = array(
            "dataColorSizeDefault" => $dataColorSizeDefault,
            "display" => $datadisplay,
           "dataCategory" => $dataCategory,
           "dataMessage" => $dataMessage

        );

        $this->loadView("FixProduct.php",$data);
    }


}
?>