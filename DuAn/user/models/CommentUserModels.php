<?php
trait CommentUserModel{
    public $data = array();

    public function showPoduct(){
        $conn = Connection::getInstance();
        // StatusComment: 1 = chưa comment, 2 = đã comment 
        $query = $conn->query("
        SELECT orderconfirmation.Size, orderconfirmation.Price, orderconfirmation.IdProduct, 
        orderconfirmation.Number, product.NameProducts, product.image 
        FROM orderconfirmation
        JOIN product ON orderconfirmation.IdProduct = product.IdProduct
         WHERE orderconfirmation.StatusComment != 1 

        ;
        
        ");
        if($query){
            while($row = $query->fetch_assoc()){
                $this->data["listProduct"][] = $row;
                // print_r($this->data);
            }
            if(empty($this->data)){
                $queryComment = $conn->query("
                select comment.IdComment, comment.Content,
                account.Name,  product.image
                from comment
                join product on comment.IdProduct = product.IdProduct
                join account on comment.IdAccount = account.Id
                WHERE comment.Status != 1 ");
                
                if($queryComment){
                    while($row = $queryComment->fetch_assoc()){
                        $this->data["listComment"][] = $row;
                    }
                }
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
            $query = $conn->query("insert into comment value(null,'$IdAccount', '$IdProduct', '$comment', '$date', '1')");
            if($query){
                $this->data['message'] = "Success";
            }else{
                
                $this->data['message'] = "Failure";
            }
        }
        return $this->data;
    }

    public function FixCommentUser(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            extract($_POST);
            $date = date('Y-m-d H:i:s');
            $IdComment = $_GET['id'];
            $conn = Connection::getInstance();
            $query = $conn->query("update comment set	Content = '$comment', Date = '$date' where IdComment = '$IdComment'");
            if($query){
                $this->data['message'] = "Success";
            }else{
                
                $this->data['message'] = "Failure";
            }
        }
        return $this->data;
    }

    public function deleteCommentUser(){
            extract($_POST);
            $date = date('Y-m-d H:i:s');
            $IdComment = $_GET['id'];
            // var_dump($IdComment);die();
            $conn = Connection::getInstance();
            $query = $conn->query("update comment set	Status = '1', Date = '$date' where IdComment = '$IdComment'");
            if($query){
                $this->data['message'] = "Success";
            }else{
                
                $this->data['message'] = "Failure";
            }
            return $this->data;
        }
    }


?>