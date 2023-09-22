<?php

trait FixCategoryModels{
    public function FixCategoryDisplayModels($id){
        $conn = Connection::getInstance();
        $query = $conn->query("
        SELECT * FROM category where IdCategory = '$id'");
        $data = array(); 
        if($query){
            $data['display']= $query->fetch_assoc();
        }
        return $data;
        
    }

    public function modelFixCategory($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $NameCategory = isset($_POST['NameCategory']) ? $_POST['NameCategory']: "";
            $Status = isset($_POST['Status']) ? $_POST['Status']: "";
            $data = array();
            $conn = Connection::getInstance();
            $currentDate = date("Y/m/d ");
                    // thêm dữ liệu vào product
                    $query = $conn->query("UPDATE category SET NameCategory = '$NameCategory',Status= '$Status', DateEdit = '$currentDate' where IdCategory = '$id'");
                    if($query){;
                        $data[] = "Add category successfully";
                    }else{
                                // print_r($conn->error);
                        $data[] = "The system is maintenance1";
                     }
                     return $data;
                }
    
    
    }
}

?>  