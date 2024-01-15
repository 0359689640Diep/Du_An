<?php
    trait ProductDetailModels{
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


        public function GetProductsByCategory(){
            if(!empty($_SESSION["IdCategory"])){
                $IdCategory = $_SESSION["IdCategory"];
                $conn = Connection::getInstance();

                $query = $conn->query("
                SELECT p.*, i.Image
                FROM product p
                INNER JOIN (
                    SELECT IdProduct, MAX(Image) AS Image
                    FROM image
                    GROUP BY IdProduct
                ) i ON p.IdProduct = i.IdProduct
                WHERE p.Status = 0 and p.IdCategory = '$IdCategory'
                ORDER BY p.IdProduct;
                ");
                if($query){
                    while($row = $query->fetch_assoc()){
                        $this->data['GetProductsByCategory'][] = $row;
                    }
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
    
                $query = $conn->prepare("SELECT p.*, de.ProductDetails 
                FROM product p
                JOIN productdetails de ON de.IdProductDetails = p.IdDetails
                WHERE p.Status = 0 AND p.IdProduct = ?
                ");
                $id = $_GET['id'];
                
                $query->bind_param("i", $id);
                $query->execute();
    
                $result = $query->get_result();
                
                if($result->num_rows > 0){
                    $this->data['showProduct'] = $result->fetch_all(MYSQLI_ASSOC);
                    // lay IdProduct
                    $IdProduct = $this->data['showProduct'][0]['IdProduct'];
                    // truy van lay tat ca mau thuoc 1 san pham
                    $queryColor = $conn->query("select c.IdColor, cd.Color from color c
                    join colordefault cd on cd.IdColorDefalut = c.IdColorDefault
                    where IdProduct = '$IdProduct'");
                    if($queryColor){
                        while($row = $queryColor->fetch_assoc()){
                            $this->data['Color'][] = $row;
                        }
                        
                        // truy van lay tat ca size trong 1 sp
                        $querySize = $conn->query("select s.IdSize, sd.Size from size s
                        join sizedefault sd on sd.IdSizeDefalut  = s.IdSizeDefault 
                        where IdProduct  = '$IdProduct'");
                        if($querySize){
                            while($row = $querySize->fetch_assoc()){
                                $this->data['Size'][] = $row;
                            }
                            // truy van lay tat ca image trong 1 sp
                            $querySize = $conn->query("select  Image from image where IdProduct  = '$IdProduct'");
                            if($querySize){
                                while($row = $querySize->fetch_assoc()){
                                    $this->data['Image'][] = $row;
                                }
                            }
                        }
                        
                    }else{
                        $this->data['messageError'] = "Hệ thống đang bảo trì";
                        
                    }
                }else{
                    $this->data['messageError'] = "Hệ thống đang bảo trì";
                }
    
                $query->close();
                return $this->data;
            }
    
        // kiem tra tai khoan da dang nhap hay chua, thêm dữ liệu vào bảng product
        public function checkLogin(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                extract($_POST);
        
                $idProduct =isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : '' ;
                $idAccount = isset($_SESSION['IdAccountUser']) && !empty($_SESSION['IdAccountUser']) ? $_SESSION['IdAccountUser'] : '';

                if(!empty($idProduct) && !empty($idAccount)){
                    if($_SERVER['REQUEST_METHOD'] === 'POST'){
                        extract($_POST);
                        $conn = Connection::getInstance();
                        $queryOder = $conn->query("insert into cart value(null,'$idProduct','$idAccount','$Price', '$Size',   '$number', '$Color')");
    
                            if($queryOder){
                                $this->data['message'][] = $idAccount;
                            }else{
                                $this->data['messageError'][] = "The system is maintenance";
                            }
                    }
                }else{
                    $this->data['messageError'][] = "You are not logged into the system. Please log in to use the service";
                    
                }
            }
            return $this->data;
        }

        public function toString(){
            $this->showCategory();
            $this->showProduct();
            $this->showComment();
            $this->showDetails();
            $this->GetProductsByCategory();

            return $this->data;
        }
    }
?>