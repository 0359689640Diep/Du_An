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
        select orderconfirmation.IdOrder, orderconfirmation.Status, 
        orderconfirmation.StatusComment, orderconfirmation.Size, 
        orderconfirmation.Price, orderconfirmation.Number, orderconfirmation.Type, 
        product.NameProducts, product.image, product.NumberProduct,   
        account.Name, account.Gmail, account.Phone, account.Image, account.Address 
        from orderconfirmation 
        join account on  orderconfirmation.IdAccount = account.Id
        join product on  orderconfirmation.IdProduct = product.IdProduct
        order by orderconfirmation.IdOrder desc
        ");

        if($query){
            while($row = $query->fetch_assoc()){
                $this->data['listOder'][] = $row;
            }
        }
        // echo "<pre>";
        // var_dump($this->data); die();
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
        $conn = Connection::getInstance();
        $query = $conn->query("update orderconfirmation set	Status = 3 where IdOrder = '$IdOrder'");
        if($query){
            $this->data['message'] = 'Product is on its way';
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