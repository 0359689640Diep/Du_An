<?php
trait LisstCommentModels{
    public $data = array();
    public function LisstCommentAdmin(){
        $conn = Connection::getInstance();

        $query = $conn->query("
        select
        comment.IdComment, comment.Content , comment.Date , 
        comment.Status ,account.Name,account.Gmail ,product.NameProducts , product.image
        from comment
        join account on comment.IdAccount = account.Id
        join product on comment.IdProduct = product.IdProduct
        ");

        if($query){
            while($row = $query->fetch_assoc()){
                $this->data['lisstComment'][] = $row;
            }
        }else{
            $this->data['message'] = $conn->error;
        }
        
        return $this->data;
    }

    public function RestoreComment(){
        $IdComment  = $_GET['id'];
        $conn = Connection::getInstance();

        $query = $conn->query("update comment set Status = 0 where IdComment = '$IdComment '");
        if($query){
            $this->data['message'] = "Comments restored successfully";
        }else{
            $this->data['message'] = "Comments restored successfully failure";

        }
        return $this->data;
    }
    public function DeleteComment(){
        $IdComment  = $_GET['id'];
        $conn = Connection::getInstance();

        $query = $conn->query("update comment set Status = 1 where IdComment = '$IdComment '");
        if($query){
            $this->data['message'] = "Comment deleted successfully";
        }else{
            $this->data['message'] = "Comment deleted failure";

        }
        return $this->data;
    }
}
?>