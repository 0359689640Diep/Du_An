<?php 
trait HomeAdminModels{
    public function modelHomeAdmin()
        {
                $IdAccountAdmin = isset($_SESSION["IdAccountAdmin"]) ? $_SESSION["IdAccountAdmin"] : "";
                $data = array();
                if(!empty($IdAccountAdmin)){
                    $conn = Connection::getInstance();
                    $query = $conn->query("SELECT Name, Image, Permission FROM account WHERE  Id = '$IdAccountAdmin'");
                    if ($query) {
                        $result = $query->fetch_assoc();
                        $data['result'] = $result;
                        // truy vấn lấy tổng số account admin
                        $queryAdmin = $conn->query("select count(Id) from account where Permission = 0  and Status =0 ");
                        $resultAdmin = $queryAdmin->fetch_assoc();
                        $data['Admin'] = $resultAdmin;
                        // truy vấn lấy tổng số account user
                        $queryUser = $conn->query("select count(Id) from account where Permission = 1  and Status =0 ");
                        $resultUser = $queryUser->fetch_assoc();
                        $data['User'] = $resultUser;
                        // truy vấn lấy tổng số account  đã hủy
                        $queryAdmin = $conn->query("select count(Id) from account where  Status =1 ");
                        $resultAdmin = $queryAdmin->fetch_assoc();
                        $data['Canceled'] = $resultAdmin;
                        // truy vấn lấy tổng số account admin đã hủy
                        $queryAdmin = $conn->query("select count(Id) from account where Permission = 0  and Status =1 ");
                        $resultAdmin = $queryAdmin->fetch_assoc();
                        $data['AdminCanceled'] = $resultAdmin;
                        // truy vấn lấy tổng số account user đã hủy
                        $queryUser = $conn->query("select count(Id) from account where Permission = 1  and Status =1 ");
                        $resultUser = $queryUser->fetch_assoc();
                        $data['UserCanceled'] = $resultUser;
                    } else {
                        $data['messageError '] = "Hệ thống đang bảo trì";
                    }
                    
                }else{
                    header("location:index.php?controller=login");

                }

                return $data;
                
                // echo "<pre>";
                // print_r($data['result']['Name']);
                // echo "<pre>";
            }
        
    
}
?>