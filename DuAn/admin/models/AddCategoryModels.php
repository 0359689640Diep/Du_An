<?php
trait AddCategoryModels{
    public function modelAddCategory(){
        $NameCategory = isset($_POST['NameCategory']) ? $_POST['NameCategory']: "";
        $Status = isset($_POST['Status']) ? $_POST['Status']: "";
        $data = array();
        // $data["message"] = "Thêm sản phẩm thất bại";
        // return $data;
        // die();

        if(!empty($NameCategory)){
            // echo $NameCategory; 
            $conn = Connection::getInstance();
            $query = $conn->query("insert into category (NameCategory, Status ) values ('$NameCategory', '$Status')");
                    if($query){
                        $data["message"] = "Thêm sản phẩm thành công";
                    }else{
                        $data["messageError"] = "Thêm sản phẩm thất bại";
                    }
        }

        return $data;
    }
}
// }
?>  