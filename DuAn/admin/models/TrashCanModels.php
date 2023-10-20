<?php
trait TrashCanModels{
    public $data = array();
    public function showTrashCan()
    {
        $conn = Connection::getInstance();
        
        $this->data["Account"] = $this->fetchData($conn, "select Id, Name from account where Status = 1");
        $this->data["Category"] = $this->fetchData($conn, "select IdCategory, NameCategory from category where Status = 1");
        $this->data["Order"] = $this->fetchData($conn, "select ac.Name, ord.IdOrder from orderconfirmation ord
                                                        join account ac on ac.Id = ord.IdAccount 
                                                        where ord.Status = 6");
        $this->data["Product"] = $this->fetchData($conn, "select IdProduct, NameProducts from product where Status = 1");
        
        return $this->data;
    }
    
    private function fetchData($conn, $query)
    {
        $data = array();
        $result = $conn->query($query);
        
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        
        return $data;
    }
    private function message($conn, $query, $messageSuccess, $messageFailure) {
        $data = array();
        $result = $conn->query($query);
    
        if ($result) {
            $data['message'] = "{$messageSuccess}";
        } else {
            $data['Failure'] = "{$messageFailure}";
        }
    
        return $data;
    }
    
    public function deleteTrashCan() {
        $type = $_GET['Type'];
        $id = $_GET['id'];
        $conn = Connection::getInstance();
    
        switch ($type) {
            case 'account':
                $this->data = $this->message($conn, "DELETE FROM cart WHERE IdAccount = {$id} ", "Success", "Failure");
                
                $this->data = $this->message($conn,"DELETE FROM orderconfirmation WHERE IdAccount = {$id}" , "Success", "Failure");
                
                $this->data = $this->message($conn, "DELETE FROM account WHERE Id = {$id}", "Success", "Failure");
                break;
            case 'category':
                $IdProducts  = $this->fetchData($conn, "Select IdProduct from product where IdCategory = {$id}");
                
                foreach($IdProducts as $value ){
                    $IdProduct =$value["IdProduct"];
                    // var_dump(); die();
                    $this->data = $this->message($conn,"DELETE FROM color WHERE IdProduct = {$IdProduct}" , "Success", "Failure");

                    $this->data = $this->message($conn, "DELETE FROM image WHERE IdProduct = {$IdProduct}", "Success", "Failure");
   
                    $this->data = $this->message($conn, "DELETE FROM size WHERE IdProduct = {$IdProduct}", "Success", "Failure");
                }
                $this->data = $this->message($conn, "DELETE FROM product WHERE IdCategory = {$id}", "Success", "Failure");
                $this->data = $this->message($conn, "DELETE FROM category WHERE IdCategory = {$id}", "Success", "Failure");
                break;
            case 'product':
                 $this->data = $this->message($conn,"DELETE FROM color WHERE IdProduct = {$id}; " , "Success", "Failure");

                 $this->data = $this->message($conn, "DELETE FROM image WHERE IdProduct = {$id}; ", "Success", "Failure");

                 $this->data = $this->message($conn, "DELETE FROM size WHERE IdProduct = {$id}; ", "Success", "Failure");

                 $this->data = $this->message($conn, "DELETE FROM comment WHERE IdProduct = {$id}; ", "Success", "Failure");

                 $this->data = $this->message($conn, "DELETE FROM cart WHERE IdProduct = {$id}; ", "Success", "Failure");

                 $this->data = $this->message($conn, "DELETE FROM orderconfirmation WHERE 	IdProduct = {$id}", "Success", "Failure");

                 $this->data = $this->message($conn, 
                 "DELETE p, d FROM product p JOIN productdetails d ON p.IdDetails = d.IdProductDetails WHERE p.IdProduct = {$id}; "
                 , "Success", "Failure");
                break;
            default:
                echo "404";
             break;
        }
        // echo $query; die();
        // $this->data = $this->message($conn, $query, "Success", "Failure");
        return $this->data;
    }
    
    public function restoreTrashCan() {
        $type = $_GET['Type'];
        $id = $_GET['id'];
        $conn = Connection::getInstance();
        $table = '';
        $idColumn = '';
    
        switch ($type) {
            case 'account':
                $table = 'account';
                $idColumn = 'Id';
                break;
            case 'category':
                $table = 'category';
                $idColumn = 'IdCategory';
                break;
            case 'product':
                $table = 'product';
                $idColumn = 'IdProduct';
                break;
            default:
                echo "404";
                break;
        }
    
        if (!empty($table)) {
            $query = "UPDATE {$table} SET Status = 0 WHERE {$idColumn} = {$id}";
            $this->data = $this->message($conn, $query, "Success", "Failure");
        }
    
        return $this->data;
    }
    
    
}
?>