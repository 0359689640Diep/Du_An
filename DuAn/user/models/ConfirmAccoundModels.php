<?php

    trait ConfirmAccoundModles  {
        public function modelConfirmAccound()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                extract($_POST);
                    $data = array();
                    $jsonData = json_encode($_SESSION['infoUser']);
                    // Giải mã JSON thành mảng
                    $infoUserArray = json_decode($jsonData, true);
        
                    // Lấy từng phần tử từ mảng
                    $Gmail = $infoUserArray['Gmail'];
                    $Phone = $infoUserArray['Phone'];
                    $Address = $infoUserArray['Address'];
                    $Password = $infoUserArray['Password'];
                    $FullName = $infoUserArray['FullName'];
                    $CodeEmail = $infoUserArray['codeGmail'];
                    $conn = Connection::getInstance();
                    if($codeEmail === $CodeEmail){
                        $insertQuery = $conn->query("INSERT INTO account (Gmail, Password, Name,Phone ,Permission, Address) VALUES ('$Gmail', '$Password', '$FullName','$Phone', '1', '$Address')");
                        if ($insertQuery ) {
                            $data[]["success"] = "Account successfully created";
                        } else {
                            // Xử lý khi chèn dữ liệu gặp lỗi
                            $data[]["error"] =  "Account creation failed";
                        }
                    }else{
                        $data[]["error"] =  "Verification code is invalid, please check again";
                    }
                return $data;

            }

            }
        }
        
        
    
?>