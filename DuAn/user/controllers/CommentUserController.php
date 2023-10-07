<?php
include "models/CommentUserModels.php";
class CommentUserController extends Controller{
    use CommentUserModel;
    public function index(){
        $data = $this->showPoduct();
        $this->loadView("CommentUser.php", $data);
    }
    
    public function addComment(){
        $data = $this->addCommentUser();
        $data = $this->showPoduct();
        // echo "<pre>";
        // print_r($data);
        // echo "<pre>";
        $this->loadView("CommentUser.php", $data);

    }
}
?>