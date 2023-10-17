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
            $query = $conn->query("SELECT c.*, p.NumberProduct, i.Image
            FROM cart c 
            INNER JOIN (
                SELECT IdProduct, MAX(Image) AS Image
                FROM image
                GROUP BY IdProduct
            ) i ON c.IdProduct = i.IdProduct
            JOIN product p ON p.IdProduct = c.IdProduct
            "
            );
            if($query){
                while($row = $query->fetch_assoc()){
                    $this->data['showCart'][] = $row;
                }
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }
            
        }

        function PayBank(){
            $conn = Connection::getInstance();
            $data = array();
            if($_SERVER['REQUEST_METHOD']){
                extract($_POST);
                $Price = isset($_SESSION['Price']) ?? "";
                if(isset($Price) && isset($number)){
                    foreach($number as $key=>$value){
                        $sumPrice = ((float)$value * (float)$Price);
                        // echo "<pre>";
                        // var_dump($key) ; die();
                        $queryCart = $conn->query("update cart set Price = '$sumPrice', Number = '$value' where IdCart ='$key'");
                        if(!$queryCart){
                            $data["messageError"] = $conn->error;
                            die();
                        }   
                    };

                }
                    
                }
            }
        

        public function deleteCart(){
            $data = array();
            $conn = Connection::getInstance();
            $idCart = $_GET['id'];
            // echo $idCart; die();
            $quety = $conn->query("delete from cart where idCart = $idCart");
            if(!$quety){
                $data['messageError'] = 'Xoa that bai';
            }
            return $data;
        }

        public function toString(){
            $this->showCategory();
            $this->showCart();
            return $this->data;
        }
    }
?>
