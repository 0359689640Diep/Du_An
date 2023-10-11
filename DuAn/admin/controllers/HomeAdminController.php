<?php 
include "models/HomeAdminModels.php";
class HomeAdminController extends Controller{
    use HomeAdminModels;
    public function index(){
        $data = $this->modelHomeAdmin();
        // echo "<pre>";
        // print_r($data); die();
        $this->loadView('homeAdmin.php', $data);
            }
}
?>