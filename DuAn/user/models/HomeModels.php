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
            $query = $conn->query("SELECT image.Image, product.IdProduct, product.NameProducts, product.Price, product.Evalute
            FROM image
            JOIN product ON image.IdProduct = product.IdProduct
            WHERE product.Status = 0;");
            if($query){
                while($row = $query->fetch_assoc()){
                    $this->data['showProduct'][] = $row;
                }
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }

        public function showComment(){
            if(isset($_SESSION['IdAccountUser'])){
                $conn = Connection::getInstance();
                $query = $conn->query("select comment.Content, account.Name from comment 
                join account on comment.IdAccount = account.Id
                where  comment.Status = 0");
                if($query){
                    while($row = $query->fetch_assoc()){
                        $this->data['showComment'][] = $row;
                    }
                }else{
                    $this->data['messageError'] = "Hệ thống đang bảo trì";
                }
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
