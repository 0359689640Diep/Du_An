<?php
include "models/AddproductModels.php";
class AddproductController extends Controller{
    use AddproductModels;
    public function index() {
        $data = $this->modeladdproduct();
        // echo "<pre>";
        // print_r($data);die();
        $this->loadView("Addproduct.php", $data);
    }
}
?>