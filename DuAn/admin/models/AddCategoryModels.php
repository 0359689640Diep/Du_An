<?php

trait AddCategoryModels{
    public function modelAddCategory(){
        $NameCategory = isset($_POST['NameCategory']) ? $_POST['NameCategory']: "";
        $Status = isset($_POST['Status']) ? $_POST['Status']: "";
        $data = array();
        if(
            !empty($NameCategory) &&
            !empty($Status) 
        ){
            $conn = Connection::getInstance();
            $query = $conn->query("insert into category (NameCategory, Status ) values ('$NameCategory', '$Status')");
                    if($query){
                        $data[] = "Thêm sản phẩm thành công";
                    }else{
                        $data[] = "Thêm sản phẩm thất bại";
                    }
        }

        return $data;
    }
}
// }
?>  