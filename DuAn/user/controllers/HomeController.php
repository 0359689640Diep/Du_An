<?php 
include "models/HomeModels.php";
class HomeController extends Controller{
    use HomeModel;
    public function index(){
        $data = $this->toString();
        // echo "<pre>";
        // var_dump($data); die();
        $this->loadView("HomeViews.php", $data);
    }
    
}
?>