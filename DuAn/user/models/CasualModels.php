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
        $query = $conn->query("select IdProduct,Size, NameProducts,	Price, Price,
        Color , image from product where IdCategory = '$IdCategory'
        order by IdProduct desc limit 10
        ");
        if($query){
            while($row = $query->fetch_assoc()){
                $this->data['showProduct'][] = $row;
            }
        }else{
            $this->data['messageError'] = "Hệ thống đang bảo trì";
        }
        return $this->data;
    }

    public function sortBy(){
        $IdCategory = $_GET['id'];
        $quantity = $_GET['quantity'];
        // echo $IdCategory.$quantity; die();
        $conn = Connection::getInstance();
        $query = $conn->query("select IdProduct,Size, NameProducts,	Price, Price,
        Color , image from product where IdCategory = '$IdCategory'
        order by IdProduct desc limit $quantity
        ");
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