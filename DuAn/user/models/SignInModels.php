<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once "../assets/PHPMailer-master/src/PHPMailer.php";
require_once "../assets/PHPMailer-master/src/SMTP.php";
require_once "../assets/PHPMailer-master/src/Exception.php";
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
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $randomString = '';

                        $_SESSION['infoUser']["Gmail"] = $Gmail;
                        $_SESSION['infoUser']["Password"] = $Password;
                        $_SESSION['infoUser']["FullName"] = $FullName;
                        // cho phép xử lý lỗi nếu có
                        $mail = new PHPMailer();
                    
                        for ($i = 0; $i < 5; $i++) {
                            $index = rand(0, strlen($characters) - 1);
                            $randomString .= $characters[$index];
                        }
                        try{
                            $mail->SMTPDebug = 0;
                            $mail->isSMTP();
                            // thiet lap tieng viet
                            $mail->CharSet = "utf8";
                            // dia chi may chu gmail
                            $mail->Host = "smtp.gmail.com";
                            // cho phep kiem tra username password
                            $mail->SMTPAuth = true;
                            // gmail can gui
                            $mail->Username= "Vudiep621@gmail.com";
                            // password
                            $mail->Password = 'bisu npsp kqhi eyzd';
                            // ma hoa thu
                            $mail->SMTPSecure = 'ssl';
                            // port
                            $mail->Port = 465;
                            // Dia chi gmail cua nguoi gui
                            $mail->setFrom("VuDiep621@gmail.com", "HR Shop.com");
                            // gmail nguoi nhan
                            $mail->addAddress("$Gmail","$FullName");
                            // tieu de
                            $mail->Subject = "Account confirmation notice";
                            // 
                            $content = "Hello $FullName. We have received a request to register an account at Shop.com. Below is the confirmation code. The code is valid for 5 minutes.
                            Here is your code:$randomString";

                            $mail->Body = $content;
                            $mail -> send();
                            $_SESSION['infoUser']["codeGmail"] = $randomString;
                            header("location:index.php?controller=ConfirmAccound");
                        }catch(Exception $e){
                            $data[]["error"] =  "Email error";
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