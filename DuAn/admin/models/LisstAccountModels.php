<?php
trait LisstAccountModels{
    public function LisstAccountModels(){
        $conn = Connection::getInstance();
        $query = $conn->query("SELECT * FROM account where Status != 1 ");
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
        $query = $conn->query("UPDATE account SET Status = 1 where Id = '$id' ");
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