<?php
include "models/LisstCommentModels.php";
class LisstCommentController extends Controller
{
    use LisstCommentModels;
    public function index()
    {
        $data = $this->LisstCommentAdmin();
        $this->loadView("LisstComment.php", $data);
    }

    public function Delete()
    {
        $data = $this->DeleteComment();
        $data = $this->LisstCommentAdmin();
        $this->loadView("LisstComment.php", $data);
    }
    public function Restore()
    {
        $this->RestoreComment();
        $data = $this->LisstCommentAdmin();
        $this->loadView("LisstComment.php", $data);
    }
}