<?php
trait BeingShippedModels{
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
    public function lisstProduct(){
        $conn = Connection::getInstance();
        $IdAccount = $_SESSION['IdAccountUser'] ?? '';
        $query = $conn->query("
        select orderconfirmation.Price,orderconfirmation.IdOrder, 
        product.NameProducts, image.Image,  
        account.Address, account.Phone
        from orderconfirmation
        join account on orderconfirmation.IdAccount = account.Id
        join product on orderconfirmation.IdProduct = product.IdProduct
        join image on image.IdProduct = product.IdProduct
        where orderconfirmation.Status = 3 and orderconfirmation.IdAccount = '$IdAccount';
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