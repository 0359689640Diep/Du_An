<?php
trait AddproductModels{
    public function modeladdproduct(){
        $NameProducts = isset($_POST['NameProducts']) ? $_POST['NameProducts']: "";
        $Details = isset($_POST['Details']) ? $_POST['Details']: "";
        $ProductDescription = isset($_POST['ProductDescription']) ? $_POST['ProductDescription']: "";
        $Color = isset($_POST['Color']) ? $_POST['Color']: "";
        $NumberProduct = isset($_POST['NumberProduct']) ? $_POST['NumberProduct']: "";
        $Price = isset($_POST['Price']) ? $_POST['Price']: "";
        $Size = isset($_POST['Size']) ? $_POST['Size']: "";
        $ImageName = isset($_FILES['Image']['name']) ? $_FILES['Image']['name']: "";
        $ImageTmp = isset($_FILES['Image']['tmp_name']) ? $_FILES['Image']['tmp_name']: "";

        $data = array();
        if(
            !empty($NameProducts) &&
            !empty($Details) &&
            !empty($ProductDescription) &&
            !empty($Color) &&
            !empty($NumberProduct) &&
            !empty($Price) &&
            !empty($Size) &&
            !empty($ImageName)
        ){
            $conn = Connection::getInstance();
            // thêm dữ liệu vào bảng details
            $queryDetails = $conn->query("insert into productdetails(ProductDetails,ProductDescription) values($Details,$ProductDescription)");
            if($queryDetails){
                // lấy id từ bảng Details rồi đưa vào bảng product,
                $getIdDetails = $conn->query("select IdProductDetails from productdetails");
                if($getIdDetails) {
                    $result = $getIdDetails->fetch_assoc();
                    // đảm bảo rằng details được thêm vào trước khi thêm dữ liệu product
                    if(!empty($result['IdProductDetails'])){
                       $IdDetails= $result['IdProductDetails'];
                        // thêm dữ liệu vào product
                        $query = $conn->query("insert into product (NameProducts,IdDetails, Color,NumberProduct, Price, Size, image)  values ($NameProducts,$IdDetails, $Color, $NumberProduct, $Price, $Size, $ImageName)");
                        if($query){
                            // thêm file ảnh vào thư mục 
                            move_uploaded_file($ImageTmp,"assets/imgUpload/". $ImageName);
                            $data[] = "Thêm sản phẩm thành công";
                        }else{
                            $data[] = "Hệ thống đang bảo trì1";
                        }
                    }else{
                        $data[] = "Hệ thống đang bảo trì2";
                    }
                }else{
                    $data[] = "Hệ thống đang bảo trì3";
                }

            }else{
                $data[] = "Hệ thống đang bảo trì4";
            }

        }


        return $data;
    }
}
?>  