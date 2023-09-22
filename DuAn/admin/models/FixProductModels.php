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
            $IdDetails = isset($this->FixProductDisplayModels($id)["display"]['IdDetails']) ? $this->FixProductDisplayModels($id)["display"]['IdDetails'] : "";
            $conn = Connection::getInstance();
            $currentDate = date("Y/m/d");

            if(!empty($ImageName)){
                // thêm dữ liệu vào bảng details
                $queryDetails = $conn->query("update  productdetails set ProductDetails = $Details,ProductDescription =$ProductDescription where IdProductDetails = '$IdDetails'");
                if($queryDetails){;
                    // thêm dữ liệu vào product
                    $query = $conn->query("UPDATE product SET NameProducts = '$NameProducts',IdDetails= '$IdDetails', Color = '$Color', NumberProduct = '$NumberProduct', Price = '$Price', Size = '$Size', image='$ImageName',  IdCategory = '$IdCategory' ,DateEdit = '$currentDate' where IdProduct = '$id'");
                    if($query){
                        // thêm file ảnh vào thư mục 
                        move_uploaded_file($ImageTmp,"assets/imgUpload/". $ImageName);
                        $data[] = "Thêm sản phẩm thành công";
                    }else{
                                // print_r($conn->error);
                        $data[] = "Hệ thống đang bảo trì11";
                     }
                }else{
                    $data[] = "Hệ thống đang bảo trì41";
                }
    
            }else{
                // thêm dữ liệu vào bảng details
                $queryDetails = $conn->query("update  productdetails set ProductDetails = $Details,ProductDescription =$ProductDescription where IdProductDetails = '$IdDetails'");
                if($queryDetails){;
                    // thêm dữ liệu vào product
                    $query = $conn->query("UPDATE product SET NameProducts = '$NameProducts',IdDetails = '$IdDetails', Color = '$Color', NumberProduct = '$NumberProduct', Price = '$Price', Size = '$Size', IdCategory = '$IdCategory', DateEdit = '$currentDate' where IdProduct = '$id'");
                    if($query){
                        $data[] = "Thêm sản phẩm thành công";
                    }else{
                        print_r($conn->error);
                        $data[] = "Hệ thống đang bảo trì12";
                    }
                }else{
                    $data[] = "Hệ thống đang bảo trì42";
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
            $data['messageError'] = "Hệ thống đang bảo trì";
            return $data;
        }
    }
}
// }
?>  