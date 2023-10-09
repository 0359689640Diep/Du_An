<?php
trait LisstCategoryModels{
    public function LisstCategoryModels(){
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM category where Status = 0");
        $data = array();
    
        if($query) {
            while($row = $query->fetch_assoc()) {
                $data['result'][] = $row;
            }
            return $data;
        } else {
            $data['messageError'] = "Hệ thống đang bảo trì";
            return $data;
        }
    }

    public function delete($id){
        $currentDate = date('Y-m-d H:i:s');
        $conn = Connection::getInstance();
        $query = $conn->query("UPDATE category  SET DateEdit = '$currentDate', Status = '1' where IdCategory = '$id' ");
        $data = array();
        if($query){
            $data[] = true;
        }else{
            $data[] = false;
        }
        return $data;
    }
}
?>