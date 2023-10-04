<?php 
include "models/HomeModels.php";
class HomeController extends Controller{
    use HomeModel;
    public function index(){
        $data = $this->toString();
        // echo "<pre>";
        // var_dump($data); die();
        $idAccount = isset($_SESSION['IdAccountUser']) && !empty($_SESSION['IdAccountUser']) ? $_SESSION['IdAccountUser'] : '';
        // var_dump($idAccount); die();
        $this->loadView("HomeViews.php", $data);
    }
    
}
?>