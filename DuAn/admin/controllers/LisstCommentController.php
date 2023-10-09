<?php 
include "models/LisstCommentModels.php";
class LisstCommentController extends Controller{
    use LisstCommentModels;
    public function index(){
        $data = $this->LisstCommentAdmin();
        $this->loadView("LisstComment.php", $data);
        // echo "<pre>";
        // var_dump($data); die();
    }

    public function Delete(){
        $data = $this->DeleteComment();
        // var_dump($data);
        $data = $this->LisstCommentAdmin();
        $this->loadView("LisstComment.php", $data);        
    }
    public function Restore(){
        $this->RestoreComment();
        $data = $this->LisstCommentAdmin();
        $this->loadView("LisstComment.php", $data);        
    }
}
?>