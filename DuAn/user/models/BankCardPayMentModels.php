<?php
trait BankCardPayMentModels{
    public $data = array();
    public function getData(){
        $data = array();
        $IdAccount = $_GET['id'];
        $conn = Connection::getInstance();
        $query = $conn->query("select * from cart where IdAccount = $IdAccount");
        if($query){
            while($row = $query->fetch_assoc()){
                $data[] = $row;
            }
            // $data[] = $IdAccount;
            // echo "<pre>";
            // var_dump($this->data);die();
        }else{
            $data['messageError'] = $conn->error;
        }
        return $data;
    }

    public function Toal(){
        $data = $this->getData();
        $TotalAmountAfterTax = 0;
        $TotalPreTaxMoney  = 0;
        $toaNumberProduct = count($data);
        //
        $toatNumber = 0;
        foreach($data as $value){
            $TotalAmountAfterTax += round((float)$value["Price"] ) ;
            $TotalPreTaxMoney += round(((float)$value["Price"]/(1 + 0.1))) ;
            $toatNumber += (int)$value["Number"];
        }

        $Toatl = $TotalAmountAfterTax + $TotalPreTaxMoney + ($toaNumberProduct *10);
        $rounded_number = round($Toatl, 2);
        $formattedNumber = number_format($rounded_number, 2, ",", ".");
        // echo "<pre>";
        $this->data=[
            "TotalAmountAfterTax"=>$TotalAmountAfterTax,
            "TotalPreTaxMoney"=>$TotalPreTaxMoney,
            "toaNumberProduct"=>$toaNumberProduct,
            "Toatl"=>$formattedNumber
        ];
        // var_dump($data);die();
        
        return $this->data;
    }

    public function BrowseOrdersAll(){
        $data = array();
            $conn = Connection::getInstance();
            $data = $this->getData();
            foreach($data as $value){
                $quey = $conn->query("
                insert into orderconfirmation value(null, '1', '0', '$value[IdProduct]', '$value[IdAccount]',
                '$value[Size]','$value[Price]','$value[Number]','CK')");
                
                if($quey){
                    $queryDelete = $conn->query("Delete from cart where IdAccount = '$value[IdAccount]'");
                    if(!$queryDelete){
                        die("errorDelet");
                    }else{
                        $data = "flase";
                    }
                }else{
                    die("error");

                }
            }
        
    }
}
?>