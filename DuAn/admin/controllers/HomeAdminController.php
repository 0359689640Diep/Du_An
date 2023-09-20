<?php 
include "models/HomeAdminModels.php";
class HomeAdminController extends Controller{
    use HomeAdminModels;
    public function index(){
        $data = $this->modelHomeAdmin();
        $this->loadView('homeAdmin.php', $data);
    }
}
?>