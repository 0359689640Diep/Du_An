<?php
    trait SignInModles  {
        public function modelSignIn()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                extract($_POST);
                // $Gmail1 = validate::check("email", $Gmail, null);
                // $Password1 = validate::check('password', $Password, null);
                // $ConfirmationPassword1 = validate::check('ConfirmationPassword', $ConfirmationPassword, $Password);
                // $Permission1 = validate::check("number", $Permission, null);

                // $conn = Connection::getInstance();
                print_r($Gmail); die();
                $query = $conn->query("insert into account (Gmail, Password, Permission) value($Gmail, $Password, )  WHERE  Gmail = '$Gmail'");
                if ($query) {
    
                } else {
                    $_SESSION["messageError"] =  "Hệ thống đang bảo trì";
                }

            }

            }
        }
        
        
    
?>