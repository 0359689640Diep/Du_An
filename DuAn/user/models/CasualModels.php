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
        // echo $IdCategory;
        $conn = Connection::getInstance();
        $query = $conn->query("
        select image.Image, color.Color, size.Size ,product.IdProduct, product.NameProducts, product.Price from product
        join image on image.IdProduct = product.Idproduct
        join color on color.IdProduct = product.Idproduct
        join size on size.IdProduct = product.Idproduct
        where product.IdCategory = '$IdCategory'
        order by product.IdProduct desc limit 10
        ");
        if($query){
            // echo "test";
            while($row = $query->fetch_assoc()){
                $this->data['showProduct'][] = $row;
            }
        }else{
            $this->data['messageError'] = "Hệ thống đang bảo trì";
        }
        return $this->data;
    }

    // $query = $conn->query("select IdProduct,Size, NameProducts,	Price, Price,
    // Color , image from product where IdCategory = '$IdCategory'
    // order by IdProduct desc limit $quantity
    // ");
    public function sortBy(){
        $IdCategory = $_GET['id'];
        $quantity = $_GET['quantity'];
        // echo $IdCategory.$quantity; die();
        $conn = Connection::getInstance();
        $query = $conn->query("
        select product.IdProduct, product.NameProducts, product.Price,
        color.Color, image.Image, size.Size from product
        join image on image.IdProduct= product.IdProduct
        join color on color.IdProduct = product.IdProduct
        join size on size.IdProduct = product.IdProduct
        where product.Idcategory = '$IdCategory' 
        order by product.IdProduct desc limit $quantity
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