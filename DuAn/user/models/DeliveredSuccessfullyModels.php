<?php
trait DeliveredSuccessfullyModels{
    public $data = array();

    public function lisstProduct(){
        $conn = Connection::getInstance();
        $query = $conn->query("
        select orderconfirmation.Price,orderconfirmation.IdOrder, 
        product.NameProducts, product.image,  
        account.Address, account.Phone
        from orderconfirmation
        join account on orderconfirmation.IdAccount = account.Id
        join product on orderconfirmation.IdProduct = product.IdProduct
        where orderconfirmation.Status = 4;
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