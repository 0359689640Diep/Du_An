<?php

class validate {
    public static function check($type, $value, $value1){
        switch($type){
            case "number":
                $outPush =  is_int($value)&& $value > 0 && is_numeric($value) && filter_var($value, FILTER_VALIDATE_INT) !== false ? 0 : " The number entered is invalid";
                return $outPush;
            break;
            case "email":
                $outPush = filter_var($value, FILTER_VALIDATE_EMAIL) ? 0 : "The email entered is not valid";
             return $outPush;
            break;
            case "password":
                $outPush = 0;
                // Độ dài tối thiểu là 8 ký tự
                if (strlen($value) < 8) {
                    $outPush ="Password has a minimum length of 8 characters";
                }
                // Chứa ít nhất một chữ cái viết hoa
                if (!preg_match('/[A-Z]/', $value)) {
                    $outPush ="Password contains at least one uppercase letter";
                }
                // Chứa ít nhất một chữ cái viết thường
                if (!preg_match('/[a-z]/', $value)) {
                    $outPush ="Password contains at least one lowercase letter";
                }
                // Chứa ít nhất một chữ số
                if (!preg_match('/[0-9]/', $value)) {
                    $outPush ="Password contains at least one digit";
                }
                // Chứa ít nhất một ký tự đặc biệt
                if (!preg_match('/[^a-zA-Z0-9]/', $value)) {
                    $outPush ="Password contains at least one special character";
                }
             return $outPush;
            break;
            case "ConfirmationPassword":
                $outPush = !empty($value1)&& $value === $value1 ? 0 : " không hợp lệ";
             return $outPush;
            break;
            default:
                
             return $outPush="Lỗi ";

        }   
    }
}

// $models = new models();
// $result = $models->check("email", '', null);
// echo $result;
?>
