<?php
    trait ProductDetailModels{
        public $data = array();

        public function showCategory(){
            $conn = Connection::getInstance();
            $query = $conn->query('select IdCategory,NameCategory from category');
            if($query){
                while($row = $query->fetch_assoc()){
                    $this->data['showCategory'][] = $row;
                }
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }

        public function showDetails(){
            $IdDetails = $_SESSION["IdDetails"];
            $conn = Connection::getInstance();
            $query = $conn->query("select * from productdetails where IdProductDetails = '$IdDetails'");
            if($query){
                while($row = $query->fetch_assoc()){
                    $this->data['showDetails'][] = $row;
                }
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }

        }

        public function GetProductsByCategory(){
            $conn = Connection::getInstance();
            $IdCategory = $_SESSION["IdCategory"];
            $query = $conn->query("select IdProduct, NameProducts, Price, Evalute, image from product where IdCategory = '$IdCategory'");
            if($query){
                while($row = $query->fetch_assoc()){
                    $this->data['GetProductsByCategory'][] = $row;
                }
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }

        public function showProduct(){
            $conn = Connection::getInstance();
            $id = $_GET['id'];
            $query = $conn->query("select * from product where IdProduct = '$id'");
            if($query){
                while($row = $query->fetch_assoc()){
                    $this->data['showProduct'][] = $row;
                }
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }

        public function toString(){
            $this->showCategory();
            $this->showProduct();
            $this->showDetails();
            $this->GetProductsByCategory();
            return $this->data;
        }
    }
?>
