<?php
include "models/TrashCanModels.php";
class TrashCanController extends Controller{
    use TrashCanModels;
    public function index(){
        $data = $this->showTrashCan();
        // echo "<pre>";
        // var_dump($data); die();
        $this->loadView("TrashCan.php", $data);
    }
}
?>