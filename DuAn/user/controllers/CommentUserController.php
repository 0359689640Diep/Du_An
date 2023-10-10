<?php
include "models/CommentUserModels.php";
class CommentUserController extends Controller{
    use CommentUserModel;
    public function index(){
        $data = $this->showPoduct();
        // echo "<pre>";
        // print_r($data);die();
        $data = $this->showCategory();
        $this->loadView("CommentUser.php", $data);
    }
    
    public function addComment(){
        $data = $this->addCommentUser();
        $this->loadView("CommentUser.php", $data);
        header("location:index.php?controller=CommentUser");


    }

    public function FixComment(){
        $data = $this->FixCommentUser();
        header("location:index.php?controller=CommentUser");
    }
    public function deleteComment(){
        $data = $this->deleteCommentUser();
        // echo "<pre>";
        // print_r($data);
        // echo "<pre>";
        header("location:index.php?controller=CommentUser");
    }
}
?>