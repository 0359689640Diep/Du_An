<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once "../assets/PHPMailer-master/src/PHPMailer.php";
require_once "../assets/PHPMailer-master/src/SMTP.php";
require_once "../assets/PHPMailer-master/src/Exception.php";
trait ForgotPasswordModles
{
    public function ForgotPasswordSendGmail()
    {
        $data  = array();
        $conn = Connection::getInstance();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
            $gmail = empty(validate::check("email", $Gmail, null)) == false  ? ($data[] = validate::check("email", $Gmail, null)) : 0;
            $query = $conn->query("select Gmail from account where Gmail = '$Gmail'");
            $row = $query->fetch_assoc();
            if ($gmail == 0 && $row) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';
                // cho phép xử lý lỗi nếu có
                $mail = new PHPMailer();

                for ($i = 0; $i < 5; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $randomString .= $characters[$index];
                }
                try {
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    // thiet lap tieng viet
                    $mail->CharSet = "utf8";
                    // dia chi may chu gmail
                    $mail->Host = "smtp.gmail.com";
                    // cho phep kiem tra username password
                    $mail->SMTPAuth = true;
                    // gmail can gui
                    $mail->Username = "Vudiep621@gmail.com";
                    // password
                    $mail->Password = 'bisu npsp kqhi eyzd';
                    // ma hoa thu
                    $mail->SMTPSecure = 'ssl';
                    // port
                    $mail->Port = 465;
                    // Dia chi gmail cua nguoi gui
                    $mail->setFrom("VuDiep621@gmail.com", "HR Shop.com");
                    // gmail nguoi nhan
                    $mail->addAddress("$Gmail");
                    // tieu de
                    $mail->Subject = "Recover account";
                    // 
                    $content = "Hello. This is your account confirmation code, please do not disclose it to a second person. The code is: $randomString";

                    $mail->Body = $content;
                    $mail->send();
                    $_SESSION['codeGmail'] = $randomString;
                    $_SESSION['Gmail'] = $Gmail;
                    $data['message'] = 'true';
                } catch (Exception $e) {
                    $data["error"] =  "Email error";
                }
            } else {
                $data['error'] = "Account does not exist";
            }
        }
        return $data;
    }

    public function updatePasswordForgotPassword()
    {
        $data = array();
        $conn = Connection::getInstance();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            $codeGmails = $_SESSION['codeGmail'];
            $Gmail = $_SESSION['Gmail'];

            // var_dump($codeGmail); 

            $password = empty(validate::check('password', $Password, null)) == false  ? ($data[] = validate::check('password', $Password, null)) : 0;
            $confirmationPassword = empty(validate::check('ConfirmationPassword', $ConfirmationPassword, $Password)) == false  ? ($data[] = validate::check('ConfirmationPassword', $ConfirmationPassword, $Password)) : 0;
            if ($password == 0 && $confirmationPassword == 0 && $codeGmail == $codeGmails) {
                $query = $conn->query("update account set Password = '$Password', Gmail = '$Gmail' WHERE  Gmail = '$Gmail'");
                if ($query) {
                    $data['message'] = "Update successful";
                } else {
                    $data["error"] =  "Update failed";
                }
            }
        }
        return $data;
    }
}
