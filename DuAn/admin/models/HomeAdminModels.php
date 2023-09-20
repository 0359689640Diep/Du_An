<?php 
trait HomeAdminModels{
    public function modelHomeAdmin()
        {
                $Gmail = isset($_SESSION["emailAdmin"]) ? $_SESSION["emailAdmin"] : "";
                $data = array();
                if(!empty($Gmail)){
                    $conn = Connection::getInstance();
                    $query = $conn->query("SELECT Name, Image, Permission FROM account WHERE  Gmail = '$Gmail'");
                    if ($query) {
                        $result = $query->fetch_assoc();
                        $data['result'] = $result;
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