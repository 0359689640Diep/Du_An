function fixAction(action, IdComment) {
    alert(1)
    let form = document.getElementById(action);
    form.action = 'index.php?controller=CommentUser&action=deleteComment&id=' + IdComment;
  }
  