<?php
trait BeingShippedModels{
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

    public function lisstProduct(){
        $conn = Connection::getInstance();
        $IdAccount = $_SESSION['IdAccountUser'] ?? '';
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
        where ord.Status = 3 and ord.IdAccount = '$IdAccount';
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