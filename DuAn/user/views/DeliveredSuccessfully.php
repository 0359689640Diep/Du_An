<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/WaitForConfirmation.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
        <section class="contener">
            <?php include "masterLayout/header.php" ?>
            <?php include "masterLayout/Notification.php" ?>
            <main>
                <?php include "masterLayout/sidebar.php" ?>
                <section class="contentMain">
                    <?php 
                    if(isset($data["lisstProduct"])){
                        foreach($data["lisstProduct"] as $value){
                            echo "
                            <section class='listContentMain'>
                                <article class='imageProduct'>
                                    <img src='../assets/imgUpload/{$value['Image']}' alt=''>
                                </article>
                                <section class='contentProduct'>
                                    <ul>
                                        <li>Name Product: {$value['NameProducts']}</li>
                                        <li>Price:$ {$value['Price']}</li>
                                        <li>Address: {$value['Address']}</li>
                                        <li>Phone: {$value['Phone']}</li>
                                    </ul>
                                </section>
                                <article class='function'>
                                    <button>
                                        <a href='index.php?controller=DeliveredSuccessfully&action=GiveBack&id={$value['IdOrder']}'>Give back</a>
                                    </button>
                                </article>
                            </section>
                            ";
                        }
                    }else{
                        echo "<h1>No orders yet</h1>";
                    }
                    ?>
                </section>
            </main>
            <?php include "masterLayout/footer.php" ?>

        </section>
    </section>
</body>
<?php 
if(isset($data['message'])){
    echo $data['message'] ;
    if ($data['message'] === 'Failure') {
      $error = $data['message'];
      echo "<script>
      toast(
        title= 'Error',
        message= '$error',
        type= 'error',
        duration= 10000,'
    )
      </script>";
    }else{
        $success = $data['message'];
        echo "<script>
        toast(
          title= 'Success',
          message= '$success',
          type= 'success',
          duration= 10000,
      )
        </script>";        
    }
    

}
?>
</html>