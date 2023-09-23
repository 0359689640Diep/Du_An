<?php
    trait SignInModles  {
        public function modelSignIn()
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                extract($_POST);
                $data = array();

                $gmail = validate::check("email", $Gmail, null) !== 0 ? ($data[] =validate::check("email", $Gmail, null)) : 0 ;
                $password = validate::check('password', $Password, null) !== 0 ? ($data[] = validate::check('password', $Password, null)) : 0 ;
                $confirmationPassword = validate::check('ConfirmationPassword', $ConfirmationPassword, $Password) !== 0 ? ($data[] = validate::check('ConfirmationPassword', $ConfirmationPassword, $Password)) : 0 ;
                $permission = validate::check("number", $Permission, null) !== 0 ? ($data[] = validate::check("number", $Permission, null)) : 0 ;

                if($gmail == 0 && $password == 0 && $confirmationPassword ==0 && $permission == 0){
                    $conn = Connection::getInstance();
                    // print_r($ConfirmationPassword); die();
                    $query = $conn->query("insert into account (Gmail, Password, Permission) value($Gmail, $Password, $Permission)  WHERE  Gmail != '$Gmail' ");
                    if ($query) {
                        $data[] = "Account successfully created";
                    } else {
                       $data[] =  "Account already exists";
                    }

                }
                return $data;

            }

            }
        }
        
        
    
?>