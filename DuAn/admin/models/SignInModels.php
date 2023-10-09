<?php
    trait SignInModles  {
        public function modelSignIn()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                extract($_POST);
                $data = array();

                // validate
                $gmail = empty(validate::check("email", $Gmail, null)) == false  ? ($data[] =validate::check("email", $Gmail, null)) : 0 ;

                $phone = empty(validate::check("Phone", $Phone, null)) == false  ? ($data[] =validate::check("Phone", $Phone, null)) : 0 ;

                $address = empty(validate::check("Address", $Address, null)) == false  ? ($data[] =validate::check("Address", $Address, null)) : 0 ;

                $password = empty(validate::check('password', $Password, null)) == false  ? ($data[] = validate::check('password', $Password, null)) : 0 ;

                $confirmationPassword = empty(validate::check('ConfirmationPassword', $ConfirmationPassword, $Password)) == false  ? ($data[] = validate::check('ConfirmationPassword', $ConfirmationPassword, $Password)) : 0 ;

                // sử lý và đưa dữ liệu lên database
                if($gmail == 0 && $password == 0 && $phone == 0 && $address == 0 && $confirmationPassword == 0){
                    echo "test";
                    $conn = Connection::getInstance();
                    $query = $conn->query("SELECT Gmail FROM account WHERE Gmail = '$Gmail'");
                    if ($query->num_rows == 0) {
                        $insertQuery = $conn->query("INSERT INTO account (Gmail, Password, Permission, Phone, Address) VALUES ('$Gmail', '$Password', '$Permission', '$Phone', '$Address')");
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
                return $data;

            }

            }
        }
        
        
    
?>