<?php

trait AddproductModels{
    public function modeladdproduct(){
        $data = array();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            extract($_POST);
            extract($_FILES['Image']);
            $Size = $_POST['Size'];
            $Color = $_POST['Color'];
            $data['messageError'] = "tett";
            return $data;
            die();
            $conn = Connection::getInstance();
            // thêm dữ liệu vào bảng details

            $queryDetails = $conn->query("insert into productdetails(ProductDetails,ProductDescription) values('$Details','$ProductDescription')");
            if($queryDetails){
                // lấy id từ bảng Details rồi đưa vào bảng product,
                $getIdDetails = $conn->query("select IdProductDetails from productdetails order by IdProductDetails desc limit 1 ");
                if($getIdDetails) {
                    $result = $getIdDetails->fetch_assoc();
                    // đảm bảo rằng details được thêm vào trước khi thêm dữ liệu product
                    if(!empty($result['IdProductDetails'])){
                       $IdDetails= $result['IdProductDetails'];
                        // thêm dữ liệu vào product
                        $query = $conn->query("insert into product (NameProducts,IdDetails,  NumberProduct, Price,  IdCategory)  values ('$NameProducts','$IdDetails','$NumberProduct','$Price', '$Category')");
                        if($query){
                            // lấy idproduct mới được update rồi thêm vào bảng size và image
                            $queryIdProduct  = $conn->query("select IdProduct from product order by IdProduct desc limit 1 ");
                            $resultSize = $queryIdProduct->fetch_assoc();
                            // $resultSize['IdProduct']
                            $IdProduct = $resultSize['IdProduct'];
                            // echo $IdProduct; die();
                            if(!empty($resultSize)){
                                foreach($Size as $valueSize){
                                    // update size vào bảng size
                                    $querySize = $conn->query("insert into size values(null, $IdProduct, '$valueSize')");
                                    if($querySize){
                                    // update color vào bảng color
                                        foreach($Color as $valueColor){
                                            $queryColor = $conn->query("insert into  color values(null,$IdProduct, '$valueColor')");
                                            
                                            if($queryColor){
                                                // update img vào bảng img

                                                foreach($_FILES['Image']['name'] as $key=>$name){
                                                    $file_name = $_FILES['Image']['name'][$key];
                                                    $file_tmp = $_FILES['Image']['tmp_name'][$key];
                                                    $file_type = $_FILES['Image']['type'][$key];
                                                    $file_size = $_FILES['Image']['size'][$key];

                                                    $queryImg = $conn->query("insert into  image values(null,$IdProduct, '$file_name')");
                                                    if($queryImg){
                                                        // thêm file ảnh vào thư mục 
                                                        move_uploaded_file($file_tmp,"../assets/imgUpload/". $file_name);
                                                        $data['message'] = "Thêm sản phẩm thành công";
                                                    }else{
                                                        // print_r($conn->error);
                                                        $data["messageError"] = "Hệ thống đang bảo trì-3";
                                                    }
                                                    
                                                }
                                                
                                            }else{
                                                // print_r($conn->error);
                                                $data["messageError"] = "Hệ thống đang bảo trì-2";
                                            }

                                        }

                                    }else{
                                        // print_r($conn->error);
                                        $data["messageError"] = "Hệ thống đang bảo trì-1";
                                    }
                                }
                            }else{
                                // print_r($conn->error);
                                $data["messageError"] = "Hệ thống đang bảo trì0";
                            }
                            
                        }else{
                            // print_r($conn->error);
                            $data["messageError"] = "Hệ thống đang bảo trì1";
                        }
                    }else{
                        $data["messageError"] = "Hệ thống đang bảo trì2";
                    }
                }else{
                    $data["messageError"] = "Hệ thống đang bảo trì3";
                }

            }else{
                $data["messageError"] = "Hệ thống đang bảo trì4";
            }

        }
        // $NameProducts = isset($_POST['NameProducts']) ? $_POST['NameProducts']: "";
        
        //  = isset($_POST['Details']) ? $_POST['Details']: "";
        // $ProductDescription = isset($_POST['ProductDescription']) ? $_POST['ProductDescription']: "";
        // $Color = isset($_POST['Color']) ? $_POST['Color']: "";
        // $NumberProduct = isset($_POST['NumberProduct']) ? $_POST['NumberProduct']: "";
        // $Price = isset($_POST['Price']) ? $_POST['Price']: "";
        // $Size = isset($_POST['Size']) ? $_POST['Size']: "";
        // // $ImageName = isset($_FILES[]['name']) ? $_FILES['Image']['name']: "";
        // $ImageTmp = isset($_FILES['Image']['tmp_name']) ? $_FILES['Image']['tmp_name']: "";
        // $IdCategory = isset($_POST['Category']) ? $_POST['Category']: "";
        //     // extr
        
        // echo "<pre>";
        // var_dump($_FILES['Image']); die();


        return $data;
    }
    public function modelGetCategory(){
        $conn = Connection::getInstance();
        $query = $conn->query("select IdCategory, NameCategory from category where Status != 0");
        $data = array();
        if($query) {
            while($row = $query->fetch_assoc()) {
                $data['result'][] = $row;
            }
        // print_r($data);die();

            return $data;
        } else {
            $data['messageError'] = "Hệ thống đang bảo trì";
            return $data;
        }
    }
}
// }
?>  