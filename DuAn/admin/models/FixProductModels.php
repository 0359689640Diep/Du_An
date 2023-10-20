<?php

trait FixProductModels{
    public function LisstColorAndSizeDefault() {
        $data = array();
        $conn = Connection::getInstance();
        // lay du lieu color
        $queryColorDefault = $conn->query("SELECT * FROM colordefault");
        if($queryColorDefault){
            while($row = $queryColorDefault->fetch_assoc()){
                $data["ColorDefault"][] = $row; 
            }
            // xử lý so sánh và đánh dấu
            $queryColor = $conn->query("SELECT c.*, cd.* FROM color c JOIN colordefault cd ON c.IdColorDefault = cd.IdColor");
            if($queryColor){
                while($row = $queryColor->fetch_assoc()){
                    $data["Color"][] = $row; 
                }
            }
        
            
        }else{
            $data['message'] = "The system is maintenance";
        }
        // lay du lieu size
        $querySize = $conn->query("Select * from sizedefault");
        if($querySize){
            while($row = $querySize->fetch_assoc()){
                $data["SizeDefault"][] = $row; 
            }
            // xử lý so sánh và đánh dấu
            $querySize = $conn->query("SELECT s.*, sd.* FROM size s JOIN sizedefault sd ON s.IdSizeDefault = sd.IdSize");
            if($querySize){
                while($row = $querySize->fetch_assoc()){
                    $data["Size"][] = $row; 
                }
            }
        
   
        // echo "<pre>";
        // print_r($data);
        // die();
        return $data;
    }
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
            // foreach($Color as $valueColor){
            //     echo $valueColor;
            // }
                // echo "<pre>";
                // var_dump($id);
                // die();
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

                        foreach($Color as $valueColor){
                            $queryColor = $conn->query("Update color set IdColorDefault   = '$valueColor' where IdProduct   = '$id' AND IdColorDefault  = '$valueColor'" );
                            if(!$queryColor){
                                $data['messageError'] = "Không thể update dữ liệu. Vui lòng nhập lại dữ liệu";
                                die();
                            }else{
                                echo 1;
                            }
                        }
                        // update du lieu vào Size
                        foreach($Size as $valueSize){
                            $querySize = $conn->query("Update size set IdSizeDefault  = '$valueSize' where IdProduct = '$id' and IdSizeDefault  = '$valueSize'");
                            if(!$querySize){
                                $data['messageError'] = "Không thể update dữ liệu. Vui lòng nhập lại dữ liệu";
                                die();
                            }else{
                                echo 2;
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