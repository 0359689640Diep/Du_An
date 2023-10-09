<?php
trait BeingShippedModels{
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
        where orderconfirmation.Status = 3;
        ");
        if($query){
            while ($row = $query->fetch_assoc()){
                $this->data['lisstProduct'][] = $row;
            }
        }
        return $this->data;
    }

}
?>