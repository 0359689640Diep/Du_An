<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/CashPayMent.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
        <section class="contener">
            <?php include "masterLayout/header.php" ?>
    
            <main>
                <section class="mainOrder">
                    <section class="contentMainOrder">
                        <section class="contentMainOrderHeader">
                            <h1>Order No: 35264555</h1>
                            <p>USD</p>
                        </section>
                        <section class="contentMainOrderMain">
                            <section class="listItem">
                                <article class="item">
                                    <h4>Item</h4>
                                    <h4>$7</h4>
                                </article>
                            </section>
                            <section class="subTotal">
                                <article class="item">
                                    <h4>Item</h4>
                                    <h4>$6</h4>
                                </article>
                            </section>
                            <section class="total">
                                <article class="item">
                                    <h4>Item</h4>
                                    <h4>$6</h4>
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
                    <section class="contentMainCart">
                        <section class="contentMainCartHeader">
                            <article class="input">
                                <input type="text" placeholder="Cardholder Name" name = "CardholderName">
                                <input type="text" placeholder="Card Number" name="CardNumber">
                            </article>
                            <article class="rules">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <label for="rules">
                                    <input type="checkbox" name="rules" id="rules">
                                    I Agree to Terms & Conditions
                                </label>
                            </article>

                        </section>
                        
                        <form action="" method="post" class="contentMainCartFooter">
                            <input type="date" name="ExpirationDate" placeholder="Expiration date" id="">
                            <input type="text" name="SecurityCode" placeholder="Security Code" id="">
                            <input type="submit" value="Pay Now">
                        </form>
                    </section>
                </section>
            </main>
        
            <?php include "masterLayout/footer.php" ?>

        </section>

    </section>
</body>
</html>