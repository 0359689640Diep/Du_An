<?php

trait PersonalModel{
    public $data = array();

    public function showAccount(){
        $conn = Connection::getInstance();
        $IdAccount = $_GET['id'];
        $query = $conn->query("select * from account where Id = $IdAccount");
        if($query){
            while($row = $query->fetch_assoc()){
                $this->data['showAccount'] = $row;
            }
        }else{
            $this->data['messageError'] = "Hệ thống đang bảo trì";
        }

        return $this->data;
    }
}