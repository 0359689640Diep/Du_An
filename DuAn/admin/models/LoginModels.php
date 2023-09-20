<?php
    trait LoginModles{
        public function modelLogin()
        {
            $Gmail = isset($_POST['Gmail']) ? $_POST['Gmail'] : "";
            $Password = isset($_POST['Password']) ? $_POST['Password'] : "";
            $conn = Connection::getInstance();
            $query = $conn->query("SELECT Gmail, Password, Permission FROM account WHERE  Gmail = '$Gmail'");
            if ($query) {
                $result = $query->fetch_assoc();
                // nếu đăng nhập với tài khoản đã tồn tại
                if(isset($result['Gmail'])) {
                    // kiểm tra xem đúng password ,
                    if($result['Password'] === $Password && $result['Permission'] == 0){
                        $_SESSION["emailAdmin"] = $Gmail;
                    }elseif($result['Password'] === $Password && $result['Permission'] == 1){
                        $_SESSION["email"] = $Gmail;
                        
                    }else{
                        $_SESSION["messageError"] = "Mật khẩu hoặc tài khoản không hợp lệ";
                    }

                }
            } else {
                $_SESSION["messageError"] =  "Hệ thống đang bảo trì";
            }
        }
        
        
    }
?>