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

        function pay(){
            $conn = Connection::getInstance();
            if($_SERVER['REQUEST_METHOD']){
                extract($_POST);
                $Price = $_SESSION['Price'];
                $idAccount = isset($_GET['id']);
                $sumPrice = ((float)$number * (float)$Price) * 0.1;
                $query = $conn->query("select Phone, Address from account where Id = $idAccount");
                if($query){
                    $rows = $query->fetch_assoc();
                    if(!empty($rows)){
                        $queryCart = $conn->query("update cart set Price = $sumPrice, Number = $number");
                        if($queryCart){
                            // header("loaction: index.php?controller=pay");
                        }
                    }
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
