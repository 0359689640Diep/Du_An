<?php 
include "models/HomeModels.php";
class HomeController extends Controller{
    use HomeModel;
    public function index(){
        $this->loadView("HomeViews.php");
    }
}
?>