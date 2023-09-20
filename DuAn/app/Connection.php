<?php 
class Connection{
    public static function getInstance(){
        $conn = new mysqli("localhost", "root", "", "duanmau");
        if($conn ->connect_error) {
            return "Ket noi that bai";
        }else{
            return $conn;
        }
    }
}
?>