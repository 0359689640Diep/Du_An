<?php 

$mau = [];
$sanpham = [];
foreach (){}

$arr = array("1", "2", "3", "4", "a5", "a6");
$arrDB = array(
    array(
        "Id" => "11",
        "Name" => "1"
    ),
    array(
        "Id" => "21",
        "Name" => "2"
    ),
    array(
        "Id" => "31",
        "Name" => "3"
    ),
    array(
        "Id" => "41",
        "Name" => "4"
    )
);

// Tạo một mảng chứa dữ liệu trùng
$dupData = array();

// Tạo mảng chứa dữ liệu không trùng
$uniqueData = array();

// Duyệt qua mảng $arrDB
// Duyệt qua mảng $arrDB
foreach ($arrDB as $itemDB) {
    // Kiểm tra xem $itemDB["Name"] có tồn tại trong mảng $arr không
    if (in_array($itemDB["Name"], $arr)) {
        // Dữ liệu trùng
        $dupData[] = $itemDB;
    } else {
        // Dữ liệu không trùng, lưu cùng với ID
        $uniqueData[$itemDB["Name"]] = $itemDB["Id"];
    }
}

// In ra dữ liệu trùng
// echo "Dữ liệu trùng:\n";
// print_r($dupData);

// In ra dữ liệu không trùng
echo "Dữ liệu không trùng:\n";
// print_r($uniqueData);


    
?>
