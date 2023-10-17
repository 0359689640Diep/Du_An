<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>
<link rel="stylesheet" href="../assets/css/WaitForConfirmation.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
        <section class="contener">
            <?php include "masterLayout/header.php" ?>
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
</html>