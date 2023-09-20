<?php
include "models/productModels.php";
class ProductController extends Controller{
    use ProductModels;
    public function index() {
        $data = $this->modelproduct();
        $this->loadView("product.php", $data);
    }
}
?>