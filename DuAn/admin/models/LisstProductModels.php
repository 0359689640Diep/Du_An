<?php
trait LisstProductModels{
    public function LisstProductModels() {
        $conn = Connection::getInstance();
        //  Sử dụng GROUP_CONCAT để kết hợp các giá trị tương ứng thành một chuỗi, sau đó sử dụng explode để chuyển chuỗi thành mảng.LEFT JOIN là một loại join trong SQL, cho phép kết hợp dữ liệu từ hai hoặc nhiều bảng dựa trên một điều kiện kết nối. LEFT JOIN trả về tất cả các hàng từ bảng bên trái (bảng đầu tiên) và các hàng khớp từ bảng bên phải (bảng thứ hai) dựa trên điều kiện kết nối.
        $query = $conn->query("
            SELECT p.*, i.Image,
                GROUP_CONCAT(DISTINCT s.Size) AS Sizes,
                GROUP_CONCAT(DISTINCT  c.Color) AS Colors
            FROM product p
            LEFT JOIN image i ON p.IdProduct = i.IdProduct
            LEFT JOIN color c ON p.IdProduct = c.IdProduct
            LEFT JOIN size s ON p.IdProduct = s.IdProduct
            WHERE p.Status = 0
            GROUP BY p.IdProduct
            ORDER BY p.IdProduct
        ");
        $data = array();
    
        if($query) {
            while($row = $query->fetch_assoc()) {
                $row['Sizes'] = explode(',', $row['Sizes']);
                $row['Colors'] = explode(',', $row['Colors']);
                $data['result'][] = $row;
            }
            return $data;
        } else {
            $data['messageError'] = "Hệ thống đang bảo trì";
            return $data;
        }
    }
    

    public function delete($id){
        $currentDate = date("Y/m/d");
        $conn = Connection::getInstance();
        $query = $conn->query("UPDATE product SET Status = 1 , DateEdit = $currentDate where IdProduct = '$id' ");
        $data = array();
        if($query){
            $data[] = true;
        }else{
            $data[] = false;
        }
        return $data;
    }
}
?>