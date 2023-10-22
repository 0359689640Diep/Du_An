<?php 
class PageNotFoundController extends Controller{
    public function index(){
        $this->loadView("PageNotFound.php");
    }
}
?>