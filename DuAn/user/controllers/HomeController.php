<?php 
include "models/HomeModels.php";
class HomeController extends Controller{
    use HomeModel;
    public function index(){
        $data = $this->toString();
        $this->loadView("HomeViews.php", $data);
    }
    
}
?>