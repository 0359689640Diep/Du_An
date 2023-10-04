<?php
class validate {
    public static function check($type, $value, $value1){
        $ArrayAouPush = array();
        switch($type){
            case "number":
                if (!is_int($value) && $value < 0 && !is_numeric($value) && filter_var($value, FILTER_VALIDATE_INT) == false) {
                    $ArrayAouPush['error'] = "The number entered is invalid";
                }
                return $ArrayAouPush;
                break;
            case "email":
                if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $ArrayAouPush['error'] = "The email entered is not valid";}
             return $ArrayAouPush;
            break;
            case "password":
                // Độ dài tối thiểu là 8 ký tự
                if (strlen($value) < 8) {
                    $ArrayAouPush['error'] = "Password has a minimum length of 8 characters";
                }
                // Chứa ít nhất một chữ cái viết hoa
                if (!preg_match('/[A-Z]/', $value)) {
                    $ArrayAouPush['error'] = "Password contains at least one uppercase letter";
                }
                // Chứa ít nhất một chữ cái viết thường
                if (!preg_match('/[a-z]/', $value)) {
                    $ArrayAouPush['error'] = "Password contains at least one lowercase letter";
                }
                // Chứa ít nhất một chữ số
                if (!preg_match('/[0-9]/', $value)) {
                    $ArrayAouPush['error'] = "Password contains at least one digit";
                }
                // Chứa ít nhất một ký tự đặc biệt
                if (!preg_match('/[^a-zA-Z0-9]/', $value)) {
                    $ArrayAouPush['error'] = "Password contains at least one special character";
                }
             return $ArrayAouPush;
            break;
            case "ConfirmationPassword":
                if(empty($value1)&& $value === $value1){
                    $ArrayAouPush['error'] = " không hợp lệ";                   
                }
             return $ArrayAouPush;
            break;
            case "Phone":
                if( empty($value) && strlen($value) <= 10 && strlen($value) >= 12
                && !is_int($value)  && !is_numeric($value)
                ){
                    $ArrayAouPush['error'] = "Invalid phone number";                   
                };
            return $ArrayAouPush;
            case "Address":
                if( empty($value)){
                    $ArrayAouPush['error'] = "Address cannot be left blank";                   
                };
            return $ArrayAouPush;
            break;
            default:
                return $ArrayAouPush['error']="Lỗi ";
             break;

        }   
    }
}

// $models = new models();
// $result = $models->check("email", '', null);
// echo $result;
?>
