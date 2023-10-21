<?php
trait CommentUserModel{
    public $data = array();

    public function showCategory(){
        $conn = Connection::getInstance();
        $query = $conn->query('select IdCategory,NameCategory from category where status = 0');
        if($query){
            while($row = $query->fetch_assoc()){
                $this->data['showCategory'][] = $row;
            }
        }else{
            $this->data['messageError'] = "Hệ thống đang bảo trì";
        }
        return $this->data;

    }
    public function showPoduct(){
        $conn = Connection::getInstance();
        $IdAccount = $_SESSION['IdAccountUser'] ?? '';
        // StatusComment: 1 = chưa comment, 2 = đã comment 
        $query = $conn->query("
        SELECT ord.Price, ord.IdOrder, ord.Size, ord.Number, ord.IdProduct, 
        p.NameProducts, i.Image, ac.Address, ac.Phone
        FROM orderconfirmation ord
        INNER JOIN (
            SELECT IdProduct, MAX(Image) AS Image
            FROM image i
            GROUP BY IdProduct
        ) i ON ord.IdProduct = i.IdProduct
        JOIN product p ON p.IdProduct = ord.IdProduct
        JOIN account ac ON ac.Id = ord.IdAccount  
        WHERE ord.StatusComment != 1 and ord.Status = 4
         and ord.IdAccount = '$IdAccount'
         ");
        if($query){
            while($row = $query->fetch_assoc()){
                $this->data["listProduct"][] = $row;
            }
            
            // var_dump(empty($this->data)); die();

            if(empty($this->data)){
                $IdAccount = $_SESSION['IdAccountUser'];
                // echo $IdAccount; die();
                $queryComment = $conn->query("
                select co.IdComment, co.Content,
                ac.Name, i.Image from comment co
                inner join (
                    select IdProduct, Max(Image) as Image
                    from image i
                    group by IdProduct
                ) i on co.IdProduct = i.IdProduct
                join account ac on ac.Id = co.IdAccount
                where co.IdAccount = '$IdAccount' and co.Status = 0
                ");
                // status: 1 la xoa 0 la hien thi
                if($queryComment){

                    // var_dump( $queryComment->fetch_assoc()); 
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
            $IdOrder = $_GET['IdOrder'];
            // echo "<pre>";
            // print_r($IdOrder); die();            
            $conn = Connection::getInstance();

                // status: 1 la da comment xoa 0 la chua comment
            $queryUpdateStatusComment = $conn->query("update orderconfirmation set 	StatusComment = '1' where IdOrder = $IdOrder ");

            if($queryUpdateStatusComment){
                // status: 1 la xoa 0 la hien thi
                $query = $conn->query("insert into comment value(null,'$IdAccount', '$IdProduct', '$comment', '$date', '0')");
                if($query){
                    $this->data['message'] = "Success";
                }else{
                    
                    $this->data['message'] = "Failure";
                }

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