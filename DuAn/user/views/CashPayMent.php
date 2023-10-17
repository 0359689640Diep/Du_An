<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>
<link rel="stylesheet" href="../assets/css/CashPayMent.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
        <section class="contener">
            <?php include "masterLayout/header.php" ?>
    
            <main>
                <form action="index.php?controller=CashPayMent&action=browseOrders&id=<?=$_GET['id']?>" method="post" class="mainOrder">
                    <section class="contentMainOrder">
                        <section class="contentMainOrderHeader">
                            <h1>Order No: <?=$_GET['id']?> </h1>
                            <p>USD</p>
                        </section>
                        <section class="contentMainOrderMain">
                            <section class="listItem">
                                <article class="item">
                                    <h4>Total number of products</h4>
                                    <h4><?= $data['toaNumberProduct'] ?></h4>
                                </article>
                                <article class="item">
                                    <h4>Total amount after tax</h4>
                                    <h4><?= $data['TotalAmountAfterTax'] ?></h4>
                                </article>
                                <article class="item">
                                    <h4>Total VAT</h4>
                                    <h4><?= $data['TotalPreTaxMoney'] ?></h4>
                                </article>
                            </section>
                            <section class="subTotal">
                                <article class="item">
                                    <h4>The total amount is reduced</h4>
                                    <h4>$0</h4>
                                </article>
                            </section>
                            <section class="total">
                                <article class="item">
                                    <h4>Total money payable</h4>
                                    <h4>$<?= $data['Toatl'] ?></h4>
                                </article>
                            </section>
                        </section>
                        <input type="submit" value="Pay Now" onclick="onclick()">
                    </section>
                </form>
            </main>
        
            <?php include "masterLayout/footer.php" ?>

        </section>

    </section>
</body>
<script>
    function onclick(){
        let display = document.getElementById("Notification");
        display.display = 'block';
    }
</script>
</html>