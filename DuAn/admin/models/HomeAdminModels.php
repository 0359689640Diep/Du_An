<?php
trait HomeAdminModels
{
    public function modelHomeAdmin()
    {
        $IdAccountAdmin = isset($_SESSION["IdAccountAdmin"]) ? $_SESSION["IdAccountAdmin"] : "";
        $data = array();
        if (!empty($IdAccountAdmin)) {
            $conn = Connection::getInstance();
            $query = $conn->query("SELECT Name, Image, Permission FROM account WHERE  Id = '$IdAccountAdmin'");
            if ($query) {
                $result = $query->fetch_assoc();
                $data['result'] = $result;
                // truy vấn lấy tổng số account admin
                $queryAdmin = $conn->query("select count(Id) from account where Permission = 0  and Status =0 ");
                $resultAdmin = $queryAdmin->fetch_assoc();
                $data['Admin'] = $resultAdmin;
                // truy vấn lấy tổng số account user
                $queryUser = $conn->query("select count(Id) from account where Permission = 1  and Status =0 ");
                $resultUser = $queryUser->fetch_assoc();
                $data['User'] = $resultUser;
                // truy vấn lấy tổng số account  đã hủy
                $queryAdmin = $conn->query("select count(Id) from account where  Status =1 ");
                $resultAdmin = $queryAdmin->fetch_assoc();
                $data['Canceled'] = $resultAdmin;
                // truy vấn lấy tổng số account admin đã hủy
                $queryAdmin = $conn->query("select count(Id) from account where Permission = 0  and Status =1 ");
                $resultAdmin = $queryAdmin->fetch_assoc();
                $data['AdminCanceled'] = $resultAdmin;
                // truy vấn lấy tổng số account user đã hủy
                $queryUser = $conn->query("select count(Id) from account where Permission = 1  and Status =1 ");
                $resultUser = $queryUser->fetch_assoc();
                $data['UserCanceled'] = $resultUser;
                // truy vấn lấy tổng số tiền, số lượng, và lấy ra số lượng người thanh toán bằng thẻ và tiền mặt 
                $query = $conn->query("
                        SELECT 
                            SUM(oc.Price) AS sumPrice, 
                            SUM(oc.Number) AS sumNumber, 
                            COUNT(CASE WHEN oc.Type = 'CK' THEN 1 END) AS number_type_ck,
                            COUNT(CASE WHEN oc.Type = 'TM' THEN 1 END) AS number_type_tm,
                            SUM(p.NumberProduct) as sumProduct
                        FROM 
                            orderconfirmation AS oc
                        INNER JOIN
                            product AS p ON 1=1
                        WHERE 
                            oc.Type IN ('CK', 'TM')
                    ");
                // lay order

                // sp: Tên, giá, ảnh, số lượng, size
                // user: Tên, ảnh, gmail, phone,address
                // chức năng: 1- đang chuẩn bị, 2 là chờ lấy hàng, 3 chờ giao hàng, 4 đã đến nơi, 5 hủy đơn hàng do admin. 6 hủy đơn hàng do user. 7 Trả hàng do user

                $data['SumProduct'] = $query->fetch_assoc();

                $query = $conn->query("
                    SELECT 
                    count(*) as sumOrder,
                    SUM(case when status = 1 then 1 else 0 end) as sumOrderWaitForConfirmation,
                    SUM(case when status = 2 then 1 else 0 end) as sumOrderWaitingForDelivery,
                    SUM(case when status = 3 then 1 else 0 end) as sumOrderBeingShipped,
                    SUM(case when status = 4 then 1 else 0 end) as sumOrderDeliveredSuccessfully,
                    SUM(case when status = 5 then 1 else 0 end) as OrderCancellationAdmin,
                    SUM(case when status = 6 then 1 else 0 end) as OrderCancellationUser,
                    SUM(case when status = 7 then 1 else 0 end) as ReturnTheProduct
                    FROM orderconfirmation
                
                    ");
                $data['SumOrder'] = $query->fetch_assoc();

                //  
                // var_dump($data);



            } else {
                $data['messageError '] = "Hệ thống đang bảo trì";
            }
        } else {
            header("location:index.php?controller=login");
        }

        return $data;

        //  
        // print_r($data['result']['Name']);
        //  
    }
}
