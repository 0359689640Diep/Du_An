<?php

trait PersonalModel{
    public $data = array();
    public function showAccount(){
        $conn = Connection::getInstance();
        $IdAccount = $_SESSION['IdAccountUser'] ?? '';
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

    public function Update(){
        $conn = Connection::getInstance();
        $IdAccount = $_SESSION['IdAccountUser'] ?? '';;
        if(!empty($IdAccount) && $_SERVER['REQUEST_METHOD'] === 'POST'){
            extract($_POST);
            extract($_FILES);
            $nameImg = $image['name'];
            
            if(isset($image)&& empty($image['error'])){
                move_uploaded_file($image["tmp_name"], "assets/imgUpload".$nameImg );
                $conn->query("
                update account set 
                Gmail = '$email', Name = '$name',  
                Phone = '$phone',Image = '$nameImg' ,Sex = '$sex', Address = '$address'
                where Id = '$IdAccount'");
            }
            // echo "<pre>";
            // var_dump($sex); die();


        }
        return $data;
    }
}