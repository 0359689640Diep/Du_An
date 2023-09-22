<?php
    trait SignInModles{
        public function modelSignIn()
        {
            $Gmail = isset($_POST['Gmail']) ? $_POST['Gmail'] : "";
            $Password = isset($_POST['Password']) ? $_POST['Password'] : "";
            $ConfirmationPassword = isset($_POST['ConfirmationPassword']) ? $_POST['ConfirmationPassword'] : "";
            $Permission = isset($_POST['Permission']) ? $_POST['Permission'] : "";
            $conn = Connection::getInstance();
            $query = $conn->query("insert into account (Gmail, Password, Permission) value($Gmail, $Password, )  WHERE  Gmail = '$Gmail'");
            if ($query) {

            } else {
                $_SESSION["messageError"] =  "Hệ thống đang bảo trì";
            }
        }
        
        
    }
?>