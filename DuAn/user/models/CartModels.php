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
            cart.IdCart, 
            cart.IdAccount, 
            cart.Size, 
            cart.IdProduct, 
            cart.Number, 
            product.NameProducts, 
            product.Color,
            product.NumberProduct, 
            product.Price, 
            product.image
            from cart
            join product on cart.IdProduct = product.IdProduct
            ');
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
                $Price = $_SESSION['Price'];
                // echo "<pre>";
                // var_dump($number) ; die();
                if(isset($number)){
                    foreach($number as $key=>$value){
                        $sumPrice = ((float)$value * (float)$Price);
                        $queryCart = $conn->query("update cart set Price = $sumPrice, Number = $value where IdCart =$key");
                        if(!$queryCart){
                            $data["messageError"] = $conn->error;
                            // header("loaction: index.php?controller=pay");
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
