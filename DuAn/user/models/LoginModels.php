<?php
    trait LoginModles{
        public function modelLogin()
        {
            $array =  array();
            $conn = Connection::getInstance();
            $Gmail = isset($_POST['Gmail']) ? $_POST['Gmail'] : "";
            $Password = isset($_POST['Password']) ? $_POST['Password'] : "";
            $query = $conn->query("SELECT Gmail, Password, Permission FROM account WHERE  Gmail = '$Gmail'");
            if ($query) {
                $result = $query->fetch_assoc();
                // nếu đăng nhập với tài khoản đã tồn tại
                if(isset($result['Gmail'])) {
                    // kiểm tra xem đúng password ,
                    if($result['Password'] === $Password && $result['Permission'] == 0){

                        $array[]['message0'] = "Hello $Gmail";
                        $_SESSION["emailAdmin"] = $Gmail;
                    }elseif($result['Password'] === $Password && $result['Permission'] == 1){
                        $array[]['message1'] = "Hello $Gmail";
                        $_SESSION["email"] = $Gmail;
                    }else{
                        $array[]["messageError"] = "Mật khẩu hoặc tài khoản không hợp lệ";
                    }
                    
                }else{
                    $array[]["messageError"] = "Mật khẩu hoặc tài khoản không hợp lệ";

                }
            } else {
                $array[]["messageError"] =  "Hệ thống đang bảo trì";
            }
            return $array;
        }
        
        
    }
?>