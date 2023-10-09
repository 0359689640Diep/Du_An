<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/Oder.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
    <?php require_once "masterLayout/header.php"?>
    <?php require_once "masterLayout/Notification.php"?>
    <aside>
        <?php require_once "masterLayout/navigation.php"?>
    </aside>
    <main>
        <?php 
        if(isset($data["listOder"])){
            foreach($data["listOder"] as $value){
                $type = $value['Type'] === "TM" ? "Cash":"Transfer";
                echo "
                <section class='lisstOder'>
                    <section class='product'>
                        <article class='imgProduct'>
                            <img src='../assets/imgUpload/{$value['image']}' alt='imageProduct'>
                        </article>
                        <section class='contentProduct'>
                            <ul>
                                <li>Name Products: {$value['NameProducts']}</li>
                                <li>The number of products: {$value['NumberProduct']}</li>
                                <li>Price: $ {$value['Price']}</li>
                                <li>Number of products ordered: {$value['Number']}</li>
                                <li>Size: {$value['Size']}</li>
                                <li>Payments: {$type}</li>   
        
                            </ul>
        
                        </section>
                    </section>
                    <section class='user'>
                        <article class='imgUser'>
                            <img src='../assets/imgUpload/{$value['Image']}' alt='imageProduct'>
                        </article>
                        <section class='contentUser'>
                            <ul>
                            <li>Name: {$value['Name']}</li>
                            <li>Gmail: {$value['Gmail']}</li>
                            <li>Address: {$value['Address']}</li>
                            <li>Phone: {$value['Phone']}</li>
                            </ul>
        
                        </section>
                    </section>
                    <section class='function'>
                        <button><a href='index.php?controller=Oder&action=Delivery&id={$value['IdOrder']}'>Waiting for delivery</a></button>
                        <button><a href='index.php?controller=Oder&action=BeingShipped&id={$value['IdOrder']}'>Being shipped</a></button>
                        <button><a href='index.php?controller=Oder&action=Arrived&id={$value['IdOrder']}'>Arrived</a></button>
                        <button><a href='index.php?controller=Oder&action=CancelOrder&id={$value['IdOrder']}'>Cancel order</a></button>
                    </section>
                </section>
                ";
            }
        }
        ?>
    </main>
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
        // header("location:index.php?controller=Oder");
    }
    

}
?>
</html>