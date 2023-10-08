<?php
   trait HomeModel{
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

        public function showProduct(){
            $conn = Connection::getInstance();
            $query = $conn->query('select IdProduct, NameProducts, Price, Evalute, image from product');
            if($query){
                while($row = $query->fetch_assoc()){
                    $this->data['showProduct'][] = $row;
                }
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }

        public function showComment(){
            $IdAccount = $_SESSION['IdAccountUser'];
            $conn = Connection::getInstance();
            $query = $conn->query("select comment.Content, account.Name from comment 
            join account on comment.IdAccount = account.Id
            where IdAccount = '$IdAccount'");
            if($query){
                while($row = $query->fetch_assoc()){
                    $this->data['showComment'][] = $row;
                }
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }

        public function toString(){
            $this->showComment();
            $this->showCategory();
            $this->showProduct();
            return $this->data;
        }
    }
?>
