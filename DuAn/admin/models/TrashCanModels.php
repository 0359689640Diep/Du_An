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
    
}
?>