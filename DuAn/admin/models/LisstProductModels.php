<?php
trait LisstProductModels{
    public function LisstProductModels(){
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM product where Status != 0");
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
        $conn = Connection::getInstance();
        $query = $conn->query("UPDATE product SET Status = 0 where IdProduct = '$id' ");
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