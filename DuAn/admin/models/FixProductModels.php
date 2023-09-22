<?php

trait FixProductModels{
    public function FixProductDisplayModels($id){
        $conn = Connection::getInstance();
        $query = $conn->query("
        SELECT product.NameProducts,product.IdDetails,productdetails.ProductDetails,productdetails.ProductDescription, product.Color, product.NumberProduct,product.Price, product.Size,category.IdCategory ,category.NameCategory FROM product
        join productdetails on product.IdDetails = productdetails.IdProductDetails
        join category on product.IdCategory  = category.IdCategory 
        where IdProduct = '$id'");
        $data = array(); 
        if($query){
            $data['display']= $query->fetch_assoc();
        }
        return $data;
        
    }

    public function modelFixProduct($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $NameProducts = isset($_POST['NameProducts']) ? $_POST['NameProducts']: "";
            $Details = isset($_POST['Details']) ? $_POST['Details']: "";
            $ProductDescription = isset($_POST['ProductDescription']) ? $_POST['ProductDescription']: "";
            $Color = isset($_POST['Color']) ? $_POST['Color']: "";
            $NumberProduct = isset($_POST['NumberProduct']) ? $_POST['NumberProduct']: "";
            $Price = isset($_POST['Price']) ? $_POST['Price']: "";
            $Size = isset($_POST['Size']) ? $_POST['Size']: "";
            $ImageName = isset($_FILES['Image']['name']) ? $_FILES['Image']['name']: "";
            $ImageTmp = isset($_FILES['Image']['tmp_name']) ? $_FILES['Image']['tmp_name']: "";
            $IdCategory = isset($_POST['Category']) ? $_POST['Category']: "";
            $data = array();
            // lấy id details
            $IdDetails = $_COOKIE['IdDetails'];
            if(empty($IdDetails) && empty($id)){
                echo "<script> alert('Your session has expired'); </script>";
                header("location:index.php?controller=LisstProduct");
            }
            $conn = Connection::getInstance();
            $currentDate = date("Y/m/d");

            if(!empty($ImageName)){
                // thêm dữ liệu vào bảng details
                $queryDetails = $conn->query("update productdetails set ProductDetails = '$Details',ProductDescription ='$ProductDescription' where IdProductDetails = '$IdDetails'");
                if($queryDetails){;
                    // thêm dữ liệu vào product
                    $query = $conn->query("UPDATE product SET NameProducts = '$NameProducts',IdDetails= '$IdDetails', Color = '$Color', NumberProduct = '$NumberProduct', Price = '$Price', Size = '$Size', image='$ImageName',  IdCategory = '$IdCategory' ,DateEdit = '$currentDate' where IdProduct = '$id'");
                    if($query){
                        // thêm file ảnh vào thư mục 
                        move_uploaded_file($ImageTmp,"assets/imgUpload/". $ImageName);
                        $data[] = "Added product successfully";
                    }else{
                                // print_r($conn->error);
                        $data[] = "The system is maintenance";
                     }
                }else{
                    $data[] = "The system is maintenance";
                }
    
            }else{
                // thêm dữ liệu vào bảng details
                $queryDetails = $conn->query("update  productdetails set ProductDetails = '$Details',ProductDescription ='$ProductDescription' where IdProductDetails = '$IdDetails'");
                if($queryDetails){;
                    // thêm dữ liệu vào product
                    $query = $conn->query("UPDATE product SET NameProducts = '$NameProducts',IdDetails = '$IdDetails', Color = '$Color', NumberProduct = '$NumberProduct', Price = '$Price', Size = '$Size', IdCategory = '$IdCategory', DateEdit = '$currentDate' where IdProduct = '$id'");
                    if($query){
                        $data[] = "Add product successfully";
                    }else{
                        print_r($conn->error);
                        $data[] = "The system is maintenance";
                    }
                }else{
                    $data[] = "The system is maintenance";
                }
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
// }
?>  