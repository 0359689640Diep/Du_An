<?php
trait ProductModels{
    public function modelproduct(){
        $conn = Connection::getInstance();
        $query = $conn->query("select * from product");
        $data = array();
        if($query) {
            $result = $query->fetch_assoc();
            $data['result'] = $result;
        }else{
            $data['messageError '] = "Hệ thống đang bảo trì";
        }
        return $data;
    }
}
?>  