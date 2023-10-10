<?php 
trait CasualModels {
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

    public function showProduct(){
        $IdCategory = $_GET['id'];
        $conn = Connection::getInstance();
        $query = $conn->query("select IdProduct,Size, NameProducts,	Price, Price,	Color , image from product where IdCategory = '$IdCategory'");
        if($query){
            while($row = $query->fetch_assoc()){
                $this->data['showProduct'][] = $row;
            }
        }else{
            $this->data['messageError'] = "Hệ thống đang bảo trì";
        }
        return $this->data;
    }

    
}
?>