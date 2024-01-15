<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>
<link rel="stylesheet" href="../assets/css/CommentUser.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">

<body>
    <section class="page">
        <section class="contener">
            <?php require "masterLayout/header.php" ?>
            <?php require "masterLayout/Notification.php" ?>
            <main>
                <?php require "masterLayout/sidebar.php" ?>
                <section class="contentMain">
                    <?php
                    if (isset($data['listProduct'])) {
                        //  
                        // print_r($data['listProduct']);die();
                        foreach ($data['listProduct'] as $value) {
                            echo "
                            <section class='listProduct'>
                                <article class='img'>
                                    <img src='../assets/imgUpload/{$value['Image']}' alt=''>
                                </article>
                                <section class='content'>
                                    <h1>NameProducts: {$value['NameProducts']}</h1>
                                    <h4>Size: {$value['Size']}</h4>
                                    <h4>Quantity: {$value['Number']}</h4>
                                    <h4>Price:$ {$value['Price']}</h4>
                                </section>
                                <form action='index.php?controller=CommentUser&action=addComment&id={$value['IdProduct']}&IdOrder={$value['IdOrder']}' method='post'>
                                    <input type='text' name='comment' autofocus>
                                    <input type='submit' value='Add comment'>
                                </form>
                            </section>                    
                            ";
                        }
                    } else {
                        if (isset($data['listComment'])) {
                            foreach ($data['listComment'] as $value) {
                                echo "
                                <section class='listComment'>
                                    <article class='img'>
                                        <img src='../assets/imgUpload/{$value['Image']}' alt=''>
                                    </article>
                                    <article class='content'>
                                        <h1>Name: {$value['Name']}</h1>
                                        <h4>{$value['Content']}</h4>
                                    </article>
                                    <form id='myForm' action='index.php?controller=CommentUser&action=FixComment&id={$value['IdComment']}' method='post'>
                                        <input type='text' name='comment'>
                                        <article class='button'>
                                            <button type='submit'>Fix</button>
                                            <button><a href='index.php?controller=CommentUser&action=deleteComment&id={$value['IdComment']}'>Delete</a> </button>
    
                                        </article>  
                                    </form>
                                </section>
                                ";
                            }
                        } else {
                            echo "<h1>No orders yet</h1>";
                        }
                    }
                    ?>
                </section>
            </main>
            <?php require "masterLayout/footer.php" ?>
        </section>
    </section>
</body>
<?php
if (isset($data['message'])) {
    $message = $data['message'];
    if ($data['message'] === 'Success') {
        echo "<script>
        toast(
          title= 'Success',
          message= '$success',
          type= 'success',
          duration= 1000,
          quantity = '0'
      )
        </script>";
    } else {
        echo "<script>
    toast(
      title= 'Error',
      message= '$message',
      type= 'error',
      duration= 1000,
      quantity = '0'
  )
  ";
    }
}
?>

</html>