<?php
trait DeliveredSuccessfullyModels{
    public $data = array();

    public function showCategory(){
        $conn = Connection::getInstance();
        $query = $conn->query('select IdCategory,NameCategory from category');
        if($query){
            while($row = $query->fetch_assoc()){
                $this->data['showCategory'][] = $row;
            }
        }else{
            $this->data['messageError'] = "Hệ thống đang bảo trì";
        }
        return $this->data;

    }
    // $query = $conn->query("
    // select orderconfirmation.Price,orderconfirmation.IdOrder, 
    // product.NameProducts, image.Image,  
    // account.Address, account.Phone
    // from orderconfirmation
    // join account on orderconfirmation.IdAccount = account.Id
    // join product on orderconfirmation.IdProduct = product.IdProduct
    // join image on image.IdProduct = product.IdProduct
    //
    // ");
    public function lisstProduct(){
        $conn = Connection::getInstance();
        $IdAccount = $_SESSION['IdAccountUser'] ?? '';
        // echo $IdAccount; die();
        $query = $conn->query("
        SELECT ord.Price, ord.IdOrder, p.NameProducts, i.Image, ac.Address, ac.Phone
        FROM orderconfirmation ord
        INNER JOIN (
            SELECT IdProduct, MAX(Image) AS Image
            FROM image i
            GROUP BY IdProduct
        ) i ON ord.IdProduct = i.IdProduct
        JOIN product p ON p.IdProduct = ord.IdProduct
        JOIN account ac ON ac.Id = ord.IdAccount
        where ord.Status = 4 and ord.IdAccount = '$IdAccount';
        ");
        if($query){
            while ($row = $query->fetch_assoc()){
                $this->data['lisstProduct'][] = $row;
            }
        }
        return $this->data;
    }

    public function GiveBackUser(){
        $conn = Connection::getInstance();
        $IdOrder = $_GET['id'];
        $query = $conn->query("
        update orderconfirmation set Status = 7 where IdOrder = $IdOrder");
        if($query){
            $this->data['message'] = "Returned goods successfully. You need to wait for your friend to approve the order"; 
        }else{
            $this->data['message'] = "Order cancellation failed"; 

        }
        return $this->data;
    }
}
?>