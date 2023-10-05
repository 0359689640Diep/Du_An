<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/BankCardPayMent.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
        <section class="contener">
            <?php include "masterLayout/header.php" ?>
    
            <main>
                <section class="mainOrder">
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
                        <section class="contentMainOrderFooter">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </section>
                    </section>
                </section>
                <section class="mainCart">
                    <article class = 'img'>
                        <img src="../assets/img/the-vietcombank.jpg" alt="the-vietcombank">
                    </article>
                    <form action="index.php?controller=BankCardPayMent&action=browseOrders&id=<?=$_GET['id']?>" method="post" class="contentMainCart">
                        <section class="contentMainCartHeader">
                            <article class="input">
                                <input required title = "Cannot be left blank" type="text" placeholder="Cardholder Name" name = "CardholderName">
                                <input required title = "Cannot be left blank" type="number" placeholder="Card Number" name="CardNumber" min = 0>
                            </article>
                            <article class="rules">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <label for="rules">
                                    <input required title = "Cannot be left blank" type="checkbox" name="rules" id="rules">
                                    I Agree to Terms & Conditions
                                </label>
                            </article>

                        </section>
                        
                        <section class="contentMainCartFooter">
                            <input required title = "Cannot be left blank" type="date" name="ExpirationDate" placeholder="Expiration date" id="">
                            <input required title = "Cannot be left blank" type="text" name="SecurityCode" placeholder="Security Code" id="">
                            <input type="submit" value="Pay Now">
                        </section>
                    </form>
                </section>
            </main>
        
            <?php include "masterLayout/footer.php" ?>

        </section>

    </section>
</body>
</html>