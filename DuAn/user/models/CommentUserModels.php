<?php
trait CommentUserModel{
    public $data = array();

    public function showPoduct(){
        $conn = Connection::getInstance();
        $query = $conn->query("
        SELECT orderconfirmation.Size, orderconfirmation.Price, orderconfirmation.IdProduct, 
        orderconfirmation.Number, product.NameProducts, product.image 
        FROM orderconfirmation
        JOIN product ON orderconfirmation.IdProduct = product.IdProduct
        ;
        
        ");
        if($query){
            while($row = $query->fetch_assoc()){
                $this->data["listProduct"][] = $row;
            }
            // echo "<pre>";
            // print_r($this->data); die();
        }
        return $this->data;
    }

    public function addCommentUser(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            extract($_POST);
            $date = date('Y-m-d H:i:s');
            $IdAccount = $_SESSION['IdAccountUser'];
            $IdProduct = $_GET['id'];
            $conn = Connection::getInstance();
            $query = $conn->query("insert into comment value(null,'$IdAccount', '$IdProduct', '$comment', '$date')");
            if($query){
                $this->data['message'] = "Success";
            }else{
                
                $this->data['message'] = "Failure";
            }
        }
        return $this->data;
    }
}

?>
<!-- WHERE orderconfirmation.Status != 2 -->