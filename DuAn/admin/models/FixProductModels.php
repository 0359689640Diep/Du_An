<?php
trait FixProductModels{
    public function LisstColorAndSizeDefault() {
        $data = array();
        $conn = Connection::getInstance();
        $IdProduct = $_GET['IdProduct'];
        // lay du lieu color
        $queryColor = $conn->query("
        SELECT c.*, cd.Color FROM color c
        join colordefault cd on cd.IdColorDefalut   = c.IdColorDefault  
        where IdProduct = '$IdProduct'
        ");
        $queryColorDefault = $conn->query("
        SELECT cd.* FROM colordefault cd
      
        
        ");

        if($queryColorDefault and $queryColor){
            while($row = $queryColor->fetch_assoc()){
                $data["ColorDefault"][] = $row; 
            }
            while($row = $queryColorDefault->fetch_assoc()){
                $data["ColorDefault"][] = $row; 
            }
        
            
        }else{
            $data['message'] = "The system is maintenance";
        }

        // lấy dữ liệu size
        $querySize = $conn->query("
        SELECT s.*, sd.Size FROM size s
        join sizedefault sd on sd.IdSizeDefalut   = s.IdSizeDefault  
        where IdProduct = '$IdProduct'
        ");
        $querySizeDefault = $conn->query("
        SELECT sd.* FROM sizedefault sd
      
        
        ");

        if($querySizeDefault and $querySize){
            // echo 1;
            while($row = $querySize->fetch_assoc()){
                $data["SizeDefault"][] = $row; 
            }
            while($row = $querySizeDefault->fetch_assoc()){
                $data["SizeDefault"][] = $row; 
            }
        
            
        }else{
            $data['message'] = "The system is maintenance";
        }
        // echo "<pre>";
        // print_r($data);
        // die();  

        return $data;

    }
    public function FixProductDisplayModels($id){
        $conn = Connection::getInstance();
    
        $query = $conn->query("
            SELECT 
                p.NameProducts, p.IdProduct, p.IdDetails, p.NumberProduct, p.Price,
                de.ProductDetails, de.ProductDescription,
                ca.IdCategory, ca.NameCategory,  i.IdImage, i.Image
                FROM product p
                LEFT JOIN category ca ON p.IdCategory = ca.IdCategory
                LEFT JOIN productdetails de ON p.IdDetails = de.IdProductDetails
                LEFT JOIN (
                    SELECT DISTINCT IdProduct, IdImage, Image
                    FROM image
                    WHERE IdProduct = '$id'
                ) i ON p.IdProduct = i.IdProduct
                
                WHERE p.Status = 0 AND p.IdProduct = '$id'
                ORDER BY p.IdProduct;
        ");
        $data = array(); 
        if($query){
            while($row = $query->fetch_assoc()){
                $data['NameProducts'] = $row['NameProducts'];
                $data['IdProduct'] = $row['IdProduct'];
                $data['IdDetails'] = $row['IdDetails'];
                $data['NumberProduct'] = $row['NumberProduct'];
                $data['ProductDetails'] = $row['ProductDetails'];
                $data['ProductDescription'] = $row['ProductDescription'];
                $data['IdCategory'] = $row['IdCategory'];
                $data['NameCategory'] = $row['NameCategory'];
                $data['Price'] = $row['Price'];
    
                if (!empty($row['IdImage'])) {
                    $data['Image'][] = [
                        'IdImage' => $row['IdImage'],
                        'Image' => $row['Image']
                    ];
                }
            }
        }

        $data["Image"] = array_unique($data["Image"], SORT_REGULAR);

    //     echo "<pre>";
    // var_dump($data["Color"]); die();
        return $data;
    }
    
        
    

    public function modelFixProduct($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $conn = Connection::getInstance();
            extract($_POST);
            extract($_FILES);
            // lấy id details
            $IdDetails = $_GET['IdDetails'];        
            $data = array();
            if(empty($IdDetails) && empty($id)){
                echo "<script> alert('Your session has expired'); </script>";
                header("location:index.php?controller=LisstProduct");
            }
            $currentDate = date("Y/m/d");
                // thêm dữ liệu vào bảng details
                $queryDetails = $conn->query("update productdetails set ProductDetails = '$Details',ProductDescription ='$ProductDescription' where IdProductDetails = '$IdDetails'");
                if($queryDetails){;
                    // thêm dữ liệu vào product
                    $query = $conn->query("UPDATE product 
                    SET NameProducts = '$NameProducts',IdDetails= '$IdDetails',
                     NumberProduct = '$NumberProduct', Price = '$Price',  IdCategory = '$Category' ,DateEdit = '$currentDate' 

                    where IdProduct = '$id'");
                    if($query){
                      
                        // Xóa toàn bộ những trường nào có IdColor trùng rồi insert lại dữ liệu
                        $queryUpdateIdProductColor = $conn->query("delete from color where IdProduct  = '$id' ");
                        if($queryUpdateIdProductColor){
                            foreach($Color as $valueColor){
                                $sql= "insert into color values(null, '$id', '$valueColor')" ;
                                // var_dump($sql); die();
                                $queryColor = $conn->query($sql);
                                if(!$queryColor){
                                    $data['messageError'] = "Không thể update dữ liệu. Vui lòng nhập lại dữ liệu";
                                    die();
                                }
    
                            }

                        }
                      // Xóa toàn bộ những trường nào có IdColor trùng rồi insert lại dữ liệu
                      $queryUpdateIdProductSize = $conn->query("delete from size  where IdProduct  = '$id' ");
                      if($queryUpdateIdProductSize){
                          // update du lieu vào Size
                          foreach($Size as $valueSize){
                              $querySize = $conn->query("insert into size values(null, '$id', '$valueSize')");
                              if(!$querySize){
                                  $data['messageError'] = "Không thể update dữ liệu. Vui lòng nhập lại dữ liệu";
                                  die();
                              }
                          }

                      }
                        // echo "test";
                        // die();                        
                        // update du lieu vào image
                        for ($i = 0; $i < count($IdImageUpdate); $i++) {
                            // Kiểm tra xem một tệp ảnh mới đã được tải lên cho trường này chưa
                            if (!empty($ImageUpdate['name'][$i])) {
                                // Xử lý tệp ảnh mới
                                $newImageName = time() . '_' . $ImageUpdate['name'][$i];
                                $targetPath = '../assets/imgUpload/' . $newImageName;
                                // thêm file ảnh vào thư mục
                                move_uploaded_file($ImageUpdate['tmp_name'][$i], $targetPath);
                                $data[] = "Added product successfully";
                                // Cập nhật bản ghi ảnh trong cơ sở dữ liệu
                                $imageId = $IdImageUpdate[$i];
                                $conn->query("UPDATE image SET Image = '$newImageName' WHERE IdImage = '$imageId'");
                            }
                        }
                   
                         

                       
                    }else{
                                // print_r($conn->error);
                        $data[] = "The system is maintenance";
                     }
                }else{
                    $data[] = "The system is maintenance";
                }
    
   
    
    
            return $data;

        }

    }
    public function modelGetCategory(){
        $conn = Connection::getInstance();
        $query = $conn->query("select IdCategory, NameCategory from category where Status != 1");
        $data = array();
        if($query) {
            while($row = $query->fetch_assoc()) {
                $data['result'][] = $row;
            }
        //     echo "<pre>";
        // print_r();die();

            return $data;
        } else {
            $data['messageError'] = "The system is maintenance";
            return $data;
        }
    }

}

?>  