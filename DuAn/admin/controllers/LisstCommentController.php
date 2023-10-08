<?php 
include "models/LisstCommentModels.php";
class LisstCommentController extends Controller{
    use LisstCommentModels;
    public function index(){
        $data = $this->LisstCommentAdmin();
        // echo "<pre>";
        // var_dump($data); die();
        $this->loadView("LisstComment.php", $data);
    }

    public function Delete(){
        $this->DeleteComment();
        header("Location: index.php?controller=LisstComment");
    }
    public function Restore(){
        $this->RestoreComment();
        header("Location: index.php?controller=LisstComment");
    }
}
?>