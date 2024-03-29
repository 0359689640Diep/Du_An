<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>
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
                $status = '';
                switch ($value['Status']){
                    case $value['Status'] = 1:
                        $status = "Wait for confirmation";
                    break;
                    case $value['Status'] = 2:
                        $status = "Waiting for delivery";
                    break;
                    case $value['Status'] = 3:
                        $status = "Being shipped";
                    break;
                    case $value['Status'] = 4:
                        $status = "Delivered Successfully";
                    break;
                    case $value['Status'] = 5:
                        $status = "Order was canceled due to Admin";
                    break;
                    case $value['Status'] = 6:
                        $status = "Order was canceled due to {$value['Name']}";
                    break;
                    case $value['Status'] = 7:
                        $status = "Order returned due to {$value['Name']}";
                    break;
                }
                echo "
                <section class='lisstOder'>
                    <section class='product'>
                        <article class='imgProduct'>
                            <img src='../assets/imgUpload/{$value['Image']}' alt='imageProduct'>
                        </article>
                        <section class='contentProduct'>
                            <ul>
                                <li>Name Products: {$value['NameProducts']}</li>
                                <li>The number of products: {$value['NumberProduct']}</li>
                                <li>Price: $ {$value['Price']}</li>
                                <li>Number of products ordered: {$value['Number']}</li>
                                <li>Size: {$value['Size']}</li>
                                <li>Payments: {$type}</li>   
                                <li style = 'color: orangered'>Status: {$status}</li>   
        
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
                        <button><a href='index.php?controller=Oder&action=BeingShipped&id={$value['IdOrder']}&IdProduct={$value['IdProduct']}&quantity={$value['Number']}'>
                        Being shipped</a></button>
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
      );
      setTimeout(() => {
          window.location.replace('index.php?controller=Oder');
      }, 2000)
      </script>";
    }else{
        $success = $data['message'];
        echo "<script>
        toast(
          title= 'Success',
          message= '$success',
          type= 'success',
          duration= 10000,
        );
        setTimeout(() => {
            window.location.replace('index.php?controller=Oder');
        }, 2000)
        </script>";        
    }
    

}
?>

</html>