<?php
include "models/AddproductModels.php";
class AddproductController extends Controller{
    use AddproductModels;
    public function index() {
        $data = $this->modeladdproduct();
        var_dump($data);die();
        $this->loadView("Addproduct.php", $data);
    }
}
?>