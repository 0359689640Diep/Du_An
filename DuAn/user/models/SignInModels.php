<?php
    trait SignInModles  {
        public function modelSignIn()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                extract($_POST);
                $data = array();

                $gmail = empty(validate::check("email", $Gmail, null)) == false  ? ($data[] =validate::check("email", $Gmail, null)) : 0 ;
                $password = empty(validate::check('password', $Password, null)) == false  ? ($data[] = validate::check('password', $Password, null)) : 0 ;
                $confirmationPassword = empty(validate::check('ConfirmationPassword', $ConfirmationPassword, $Password)) == false  ? ($data[] = validate::check('ConfirmationPassword', $ConfirmationPassword, $Password)) : 0 ;

                if($gmail == 0 && $password == 0 && $confirmationPassword == 0){
                    $conn = Connection::getInstance();
                    $query = $conn->query("SELECT Gmail FROM account WHERE Gmail = '$Gmail'");
                    if ($query->num_rows == 0) {
                        $insertQuery = $conn->query("INSERT INTO account (Gmail, Password, Permission) VALUES ('$Gmail', '$Password', '$Permission')");
                        if ($insertQuery) {
                            $data[]["success"] = "Account successfully created";
                        } else {
                            // Xử lý khi chèn dữ liệu gặp lỗi
                            $data[]["error"] =  "Account creation failed";
                        }
                    } else {
                        $data[]["error"] =  "Account already exists";
                    }
                    
                }
                print_r($conn->error);
                return $data;

            }

            }
        }
        
        
    
?>