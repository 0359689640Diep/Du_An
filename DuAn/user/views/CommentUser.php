<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
                    foreach($data['listProduct'] as $value){
                        echo "
                        <section class='listProduct'>
                            <article class='img'>
                                <img src='../assets/imgUpload/{$value['image']}' alt=''>
                            </article>
                            <section class='content'>
                                <h1>NameProducts: {$value['NameProducts']}</h1>
                                <h4>Size: {$value['Size']}</h4>
                                <h4>Quantity: {$value['Number']}</h4>
                                <h4>Price: {$value['Price']}</h4>
                            </section>
                            <form action='index.php?controller=CommentUser&action=addComment&id={$value['IdProduct']}' method='post'>
                                <input type='text' name='comment' autofocus>
                                <input type='submit' value='Add comment'>
                            </form>
                        </section>                    
                        ";
                    }
                    ?>
                </section>
            </main>
            <?php require "masterLayout/footer.php" ?>
        </section>
    </section>
</body>
<?php 
if(isset($data['message'])){
    $message = $data['message'];
    if( $data['message'] === 'Success'){
        echo "<script>
        toast(
          title= 'Success',
          message= '$success',
          type= 'success',
          duration= 500,
          quantity = '0'
      )
        </script>";        

    }else{
    echo "<script>
    toast(
      title= 'Error',
      message= '$message',
      type= 'error',
      duration= 500,
      quantity = '0'
  )
  ";
    
}
}
?>
</html>