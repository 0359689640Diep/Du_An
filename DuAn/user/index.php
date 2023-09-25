<?php 
session_start();
// load file controller
include "../app/Connection.php";
include "../app/Controller.php";
include "../app/validate.php";

// lay bien controller truyen tu url
$controller = isset($_GET['controller']) ? $_GET["controller"]: "Home";
$action = isset($_GET['action']) ? $_GET['action']:"index";

// Hàm ucfirst() sẽ chuyển đổi kí tự đầu tiên trong chuỗi thành in hoa nếu kí tự đó là một chữ cái, ghép đường dẫn file controller
$fileController = "controllers/".ucfirst($controller). "Controller.php";
// tên class
$classController = ucfirst($controller)."Controller";
// print_r($fileController); die();
// print_r($action);
// load file controller
include $fileController;
// kiểm tra class có tồn tại hay không, nếu không thì khởi tạo
if(class_exists($classController)){
    $object = new $classController();
    $object->$action();

}else die("$fileController khong ton tai");

?>