<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>
<link rel="stylesheet" href="../assets/css/Cart.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<link rel="stylesheet" href="../assets/css/responsive/ResponsiveCart.css">

<body>
    <section class="page">
        <section class="contener">
            <?php include "masterLayout/header.php" ?>
            <?php include "masterLayout/Notification.php" ?>
            <main>
                <?php $idAccount = !empty($_SESSION['IdAccountUser']) ? $_SESSION['IdAccountUser']: "";
                    ?>

                <form action="index.php?controller=Cart&id=<?php echo $idAccount;?>" method="post" id="form">
                    <h1>Your cart</h1>
                    <section class="contentCart">
                        <section class="product">
                            <?php 
                            
                                if(!empty($data['showCart'])){
                                    foreach($data['showCart'] as $value){
                                        echo "
                                        <section class='listProduct'>
                                            <article class='img'>
                                                <img src='../assets/imgUpload/$value[Image] ' alt=''>
                                            </article>
                                            <section class='contentProduct'>
                                                <section class='contentProductLeft'>
                                                    <h1>Gradient Graphic T-shirt</h1>
                                                    <h4>Size :$value[Size] </h4>
                                                    <h4>Color : <input type='checkbox' style='background-color:$value[Color]'> </h4>
                                                    <h1 name ='Price'>$ {$value['Price']}</h1>
                                                </section>
                                                <section class='contentProductRight'>
                                                    <i onclick='deleteCart($value[IdCart])'class='ti-trash'></i>
                                                    <input type='number' name='number[$value[IdCart]]' id='' min = 1 max = $value[NumberProduct] value='$value[Number]' oninput='checkQuantity(this)' >
                                                </section>
                                                
                                            </section>
                                        </section>
                                        
                                        ";
                                    }
                                }else{
    
                                        echo "<h1>'Hống' có gì trong giỏ hàng hết</h1>";
                                    }
                                    
                                ?>

                        </section>
                        <section class="detail">
                            <?php 
                                    $total =0 ;
                                  if(!empty($data['showCart'])){
                                    foreach($data['showCart'] as $value){
                                        $total += (float)$value['Price'];
                                    }
                                }else{
                                    echo "";
                                    
                                };
                                ?>
                            <h1>Order Summary</h1>
                            <section class="detailSEO">

                                <article class="contentDetailSEO">
                                    <h4>Total VAT</h4>
                                    <h4>$<?php echo $total*0.1 ?></h4>
                                </article>
                            </section>
                            <section class="Totail">
                                <h4>Total</h4>
                                <h4>$<?php echo ($total*0.1) + $total ?></h4>
                            </section>
                            <section class="AddCromoCode">
                                <input type="text" placeholder="Add promo code">
                                <input type="submit" value="Apply">
                            </section>
                            <section class="Payment">
                                <i class="ti-arrow-right"></i>
                                <i class="ti-arrow-right"></i>


                                <button type="submit" value="<?= $idAccount ?>" name="CashPayment">Cash payment</button>
                                <button type="submit" value="<?= $idAccount ?>" name="BankCardPayment">Bank card
                                    payment</button>
                            </section>
                        </section>
                    </section>
                </form>
            </main>
            <?php include "masterLayout/footer.php" ?>

        </section>
    </section>
</body>
<script>
function checkQuantity(input) {
    let currentValue = parseInt(input.value);
    let maxValue = parseInt(input.getAttribute('max'));
    if (currentValue > maxValue) {
        toast("Warning", "Product quantity is not enough", "warning", 5000, 0);
        input.value = maxValue;
    }
}
</script>

</html>