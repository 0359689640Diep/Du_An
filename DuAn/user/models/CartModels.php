<?php
    trait CartModel{
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

        public function showCart(){
            $conn = Connection::getInstance();
            $query = $conn->query('select 
            orderconfirmation.IdOrder, 
            orderconfirmation.IdAccount, 
            orderconfirmation.Size, 
            orderconfirmation.IdProduct, 
            orderconfirmation.Number, 
            product.NameProducts, 
            product.Color,
            product.NumberProduct, 
            product.Price, 
            product.image
            from orderconfirmation
            join product on orderconfirmation.IdProduct = product.IdProduct
            ');
            if($query){
                while($row = $query->fetch_assoc()){
                    $this->data['showCart'][] = $row;
                }
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
            
        }

        public function toString(){
            $this->showCategory();
            $this->showCart();
            return $this->data;
        }
    }
?>
