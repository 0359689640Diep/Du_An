<?php

trait FixAccountModels{
    public function FixAccountDisplayModels($id){
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM account where Id = '$id' ");
        $data = array(); 
        if($query){
            $data['display']= $query->fetch_assoc();
        }
        return $data;
        
    }

    public function modelFixAccount($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $Gmail = isset($_POST['Gmail']) ? $_POST['Gmail']: "";

            $Password = isset($_POST['Password']) ? $_POST['Password']: "";

            $Name = isset($_POST['Name']) ? $_POST['Name']: "";
            
            $Phone = isset($_POST['Phone']) ? $_POST['Phone']: "";

            $Permission = isset($_POST['Permission']) ? $_POST['Permission']: "";

            $Address = isset($_POST['Address']) ? $_POST['Address']: "";
            
            $ImageName = isset($_FILES['Image']['name']) ? $_FILES['Image']['name']: "";
            $ImageTmp = isset($_FILES['Image']['tmp_name']) ? $_FILES['Image']['tmp_name']: "";

            $data = array();

            // lấy IdAccount
            $IdAccount = $_COOKIE['IdAccount'];
            if(empty($IdAccount) && empty($id)){
                echo "<script> alert('Your session has expired'); </script>";
                header("location:index.php?controller=LisstAccount");
            }
            $conn = Connection::getInstance();

            if(!empty($ImageName)){
                    // thêm dữ liệu vào Account
                    $query = $conn->query("UPDATE account SET Gmail = '$Gmail', Password = '$Password ', Name = '$Name', Phone = '$Phone', Permission = '$Permission',  Address = '$Address', Image='$ImageName'  where Id = '$id'");
                    if($query){
                        // thêm file ảnh vào thư mục 
                        move_uploaded_file($ImageTmp,"assets/imgUpload/". $ImageName);
                        $data[] = "Added Account successfully";
                    }else{
                                // print_r();
                        $data[] = $conn->error;
                        // $data[] = "The system is maintenance";
                     }
    
            }else{
                    // thêm dữ liệu vào Account
                    $query = $conn->query("UPDATE account SET Gmail = '$Gmail', Password = '$Password ', Name = '$Name', Phone = '$Phone', Permission = '$Permission',  Address = '$Address' where Id = '$id'");
                    if($query){
                        $data[] = "Add Account successfully";
                    }else{
                        print_r($conn->error);
                        $data[] = "The system is maintenance";
                    }
            }
    
            return $data;

        }

    }

}
// }
?>  