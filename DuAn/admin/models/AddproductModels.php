<?php
trait AddproductModels{
    public function LisstColorAndSizeDefault() {
        $data = array();
        $conn = Connection::getInstance();

        $queryColor = $conn->query("Select * from colordefault");
        if($queryColor){
            while($row = $queryColor->fetch_assoc()){
                $data["ColorDefault"][] = $row; 
            }
        }else{
            $data['message'] = "The system is maintenance";
        }
        $querySize = $conn->query("Select * from sizedefault");
        if($querySize){
            while($row = $querySize->fetch_assoc()){
                $data["SizeDefault"][] = $row; 
            }
        }else{
            $data['message'] = "The system is maintenance";
        }

        return $data;
    }
        
    public function modeladdproduct(){
        $data = array();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            extract($_POST);
            extract($_FILES['Image']);
            $Size = $_POST['Size'];
            $Color = $_POST['Color'];
    
            $conn = Connection::getInstance();
    
            // thêm dữ liệu vào bảng details
            $queryDetails = $conn->query("insert into productdetails(ProductDetails,ProductDescription) values('$Details','$ProductDescription')");
            if($queryDetails){
                // lấy id từ bảng Details rồi đưa vào bảng product
                $getIdDetails = mysqli_insert_id($conn);
    
                // đảm bảo rằng details được thêm vào trước khi thêm dữ liệu product
                $query = $conn->query("INSERT INTO product (NameProducts, IdDetails, NumberProduct, Price, IdCategory, DateEdit)
                VALUES ('$NameProducts', '$getIdDetails', '$NumberProduct', '$Price', '$Category', NOW());
                ");
                if($query){
                    // lấy idproduct mới được update rồi thêm vào bảng size và image
                    $queryIdProduct  = mysqli_insert_id($conn);
    
                    // Thêm dữ liệu vào bảng size
                    foreach($Size as $valueSize){
                        $querySize = $conn->query("insert into size values(null, '$queryIdProduct', '$valueSize') ");
                        if(!$querySize){
                            $data["messageError"] = "Hệ thống đang bảo trì-1";
                            break;
                        }
                    }
    
                    // Thêm dữ liệu vào bảng color
                        foreach($Color as $valueColor){
                            $queryColor = $conn->query("insert into color values(null, '$queryIdProduct', '$valueColor') ");
                            if(!$queryColor){
                                $data["messageError"] = "Hệ thống đang bảo trì-2";
                                break;
                            }
                        }
              
    
                    // Thêm dữ liệu vào bảng image
                        foreach($_FILES['Image']['name'] as $key=>$name){
                            $file_name = $_FILES['Image']['name'][$key];
                            $file_tmp = $_FILES['Image']['tmp_name'][$key];
                            $file_type = $_FILES['Image']['type'][$key];
                            $file_size = $_FILES['Image']['size'][$key];
    
                            $queryImg = $conn->query("insert into image values(null,$queryIdProduct, '$file_name')");
                            if($queryImg){
                                // thêm file ảnh vào thư mục 
                                move_uploaded_file($file_tmp,"../assets/imgUpload/". $file_name);
                                $data['message'] = "Thêm sản phẩm thành công";

                            }else{
                                $data["messageError"] = "Hệ thống đang bảo trì-3";
                                break;
                            }
                        }
                }else{
                    $data["messageError"] = "Hệ thống đang bảo trì1";
                }
            }else{
                $data["messageError"] = "Hệ thống đang bảo trì4";
            }
        }
        return $data;
    }
    
    public function modelGetCategory(){
        $conn = Connection::getInstance();
        $query = $conn->query("select IdCategory, NameCategory from category where Status = 0");
        $data = array();
        if($query) {
            while($row = $query->fetch_assoc()) {
                $data['result'][] = $row;
            }

            return $data;
        } else {
            $data['messageError'] = "Hệ thống đang bảo trì";
            return $data;
        }
    }
}
// }
?>