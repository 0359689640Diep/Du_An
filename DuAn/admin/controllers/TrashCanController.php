<?php
include "models/TrashCanModels.php";
class TrashCanController extends Controller{
    use TrashCanModels;
    public function index(){
        // echo "<pre>";
        // var_dump($data); die();
        $data = $this->showTrashCan();
        $this->loadView("TrashCan.php", $data);
    }

    public function Restore(){
        $data = $this->restoreTrashCan();
        $data = $this->showTrashCan();
        $this->loadView("TrashCan.php", $data);
    }
    public function Delete(){
        $data = $this->deleteTrashCan();
        $data = $this->showTrashCan();
        $this->loadView("TrashCan.php", $data);
    }
}
?>