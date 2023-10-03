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

        // kiem tra tai khoan da dang nhap hay chua
        public function checkLogin(){
            $dataProduct = array();
            $idProduct =isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : '' ;
            $idAccount = isset($_SESSION['IdAccountUser']) && !empty($_SESSION['IdAccountUser']);
            if(!empty($idProduct) && !empty($idAccount)){
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    extract($_POST);
                    $conn = Connection::getInstance();
                    $query = $conn->query("select Price, Size, image from product where IdProduct = '$idProduct'");
                    if($query){
                        while($row = $query->fetch_assoc()){
                            $dataProduct= $row;
                        }
                        extract($dataProduct);
                        $Date = date("Y/m/d");
                        $queryOder = $conn->query("insert into orderconfirmation value(null, '$idAccount', 'null',null, '$Date', '$idProduct', '$number', '$Size', '$image')");

                        if($queryOder){
                            $this->data['message'][] = $idAccount;
                        }else{
                            $this->data['messageError'][] = "The system is maintenance";
                        }

                        // echo "<pre>";
                        // var_dump(); die();
                    }else{
                        $this->data['messageError'][] = "The system is maintenance";
                    }
                    // echo $Price; die();
                }
                // echo "tét";
            }else{
                $this->data['messageError'][] = "You are not logged into the system. Please log in to use the service";
                
            }
            return $this->data;
        }

        public function toString(){
            $this->showCategory();
            $this->showProduct();
            $this->showDetails();
            $this->GetProductsByCategory();
            // $this->checkLogin();

            return $this->data;
        }
    }
?>
