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
            if(!empty($_SESSION["IdDetails"])){
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
            }else{
                header("localhost: index.php");
            }

        }
        public function showComment(){
            if(isset($_SESSION['IdAccountUser'])){
                $IdAccount = $_SESSION['IdAccountUser'];
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
                // echo "<pre>";
                // var_dump($data["showComment"]); die();                
            }   
        }


        public function GetProductsByCategory(){
            if(!empty($_SESSION["IdCategory"])){
                $IdCategory = $_SESSION["IdCategory"];
                $conn = Connection::getInstance();
                $query = $conn->query("select image.Image, product.IdProduct, product.NameProducts, product.Price, product.NumberProduct, product.Evalute from product join image on image.IdProduct = product.IdProduct where product.IdCategory = '$IdCategory'");
                if($query){
                    while($row = $query->fetch_assoc()){
                        $this->data['GetProductsByCategory'][] = $row;
                    }
                    echo "<pre>";
                    var_dump($this->data['GetProductsByCategory']);die();
                }else{
                    $this->data['messageError'] = "Hệ thống đang bảo trì";
                }

            }else{
                header("localhost: index.php");
            }
        }

        // lấy tất cả các sản phẩm ra ngoài màn hình
        public function showProduct(){
            $conn = Connection::getInstance();
            $id = $_GET['id'];

            $query = $conn->prepare("SELECT image.Image, product.IdProduct, product.NameProducts, product.Price, product.NumberProduct , product.Evalute,
                                    color.Color,
                                    size.Size,
                                    productdetails.ProductDetails
                                    FROM product
                                    JOIN image ON image.IdProduct = product.IdProduct
                                    JOIN color ON color.IdProduct = product.IdProduct
                                    JOIN size ON size.IdProduct = product.IdProduct
                                    join productdetails on productdetails.IdProductDetails  = product.IdDetails
                                    WHERE product.Status = 0 and product.IdProduct = ?");
            
            $query->bind_param("i", $id);
            $query->execute();

            $result = $query->get_result();
            
            if($result->num_rows > 0){
                $this->data['showProduct'] = $result->fetch_all(MYSQLI_ASSOC);
            }else{
                $this->data['messageError'] = "Hệ thống đang bảo trì";
            }

            // $query->close();
        
            // echo "<pre>";
            // var_dump($this->data['showProduct']);
            // die();
        }

        // kiem tra tai khoan da dang nhap hay chua
        public function checkLogin(){
            $dataProduct = array();
            $idProduct =isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : '' ;
            $idAccount = isset($_SESSION['IdAccountUser']) && !empty($_SESSION['IdAccountUser']) ? $_SESSION['IdAccountUser'] : '';
            // var_dump($idAccount); die(); 
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
                        $queryOder = $conn->query("insert into cart value(null,'$idProduct',null, '$Size', '$idAccount',  '$number')");

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
            $this->showComment();
            $this->showDetails();
            $this->GetProductsByCategory();
            // $this->checkLogin();

            return $this->data;
        }
    }
?>
