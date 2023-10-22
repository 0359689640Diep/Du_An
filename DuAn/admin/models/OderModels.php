<!-- 
sp: Tên, giá, ảnh, số lượng, size
user: Tên, ảnh, gmail, phone,address
chức năng: 1- đang chuẩn bị, 2 là chờ lấy hàng, 3 chờ giao hàng, 4 đã đến nơi, 5 hủy đơn hàng do admin. 6 hủy đơn hàng do user. 7 Trả hàng do user
-->
<?php
trait OderModels{
    public $data = array();

    public function listOder(){
        $conn = Connection::getInstance();
        $query = $conn->query("
        SELECT ord.*, p.IdProduct, p.NameProducts, p.NumberProduct, i.Image, ac.Name, ac.Gmail, ac.Phone, ac.Image, ac.Address
        FROM orderconfirmation ord
        INNER JOIN (
            SELECT IdProduct, MAX(Image) AS Image
            FROM image
            GROUP BY IdProduct
        ) i ON ord.IdProduct = i.IdProduct
        JOIN product p ON ord.IdProduct = p.IdProduct
        JOIN account ac ON ord.IdAccount = ac.Id
        ORDER BY ord.IdOrder DESC
        
        
        ");

        if($query){
            while($row = $query->fetch_assoc()){
                $this->data['listOder'][] = $row;
            }
        }
        return $this->data;
    }

    public function deliveryOder(){
        $IdOrder = $_GET['id'];
        $conn = Connection::getInstance();
        $query = $conn->query("update orderconfirmation set	Status = 2 where IdOrder = '$IdOrder'");
        if($query){
            $this->data['message'] = 'The product is being delivered';
        }else{
            $this->data['message'] = 'Failure';
        }
        return $this->data;
    }
    public function BeingShippedOder(){
        $IdOrder = $_GET['id'];
        $IdProduct = $_GET['IdProduct'];
        $Number = $_GET['quantity'];
        // echo $Number; die();
        $conn = Connection::getInstance();
        $query = $conn->query("update orderconfirmation set	Status = 3 where IdOrder = '$IdOrder'");
        if($query){
            $queryUpdateNumberProduct = $conn->query("update product set NumberProduct = NumberProduct-$Number where IdProduct = $IdProduct");
            if($queryUpdateNumberProduct){
                $this->data['message'] = 'Product is on its way';

            }else{
                $this->data['message'] = 'Failure';
            }
        }else{
            $this->data['message'] = 'Failure';
        }
        return $this->data;
    }
    public function ArrivedOder(){
        $IdOrder = $_GET['id'];
        $conn = Connection::getInstance();
        $query = $conn->query("update orderconfirmation set	Status = 4 where IdOrder = '$IdOrder'");
        if($query){
            $this->data['message'] = 'Product delivered successfully';
        }else{
            $this->data['message'] = 'Failure';
        }
        return $this->data;
    }
    public function CanceldOder(){
        $IdOrder = $_GET['id'];
        $conn = Connection::getInstance();
        $query = $conn->query("update orderconfirmation set	Status = 5 where IdOrder = '$IdOrder'");
        if($query){
            $this->data['message'] = 'Cancel product successfully';
        }else{
            $this->data['message'] = 'Failure';
        }
        return $this->data;
    }
}
?>