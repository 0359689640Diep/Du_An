<?php
   trait HomeModel{
        public $data = array();

        public function showCategory(){
            $conn = Connection::getInstance();
            $query = $conn->query('select IdCategory,NameCategory from category where status = 0');
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
            $query = $conn->query("SELECT p.*, i.Image
            FROM product p
            INNER JOIN (
                SELECT IdProduct, Image
                FROM image
                GROUP BY IdProduct
            ) i ON p.IdProduct = i.IdProduct
            WHERE p.Status = 0
            ORDER BY p.IdProduct
            ");

            if($query){
                while($row = $query->fetch_assoc()){
                    $this->data['showProduct'][] = $row;
                }
                // echo "<pre>";
                // print_r($this->data['showProduct']); 
                // die();
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
        }

        public function showComment(){
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

        public function toString(){
            $this->showComment();
            $this->showCategory();
            $this->showProduct();
            return $this->data;
        }
    }
?>
