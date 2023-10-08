<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link rel="stylesheet" href="../assets/css/Home.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<link rel="stylesheet" href="../assets/css/responsive/ResponsiveHome.css">
<body>
    <section class="page" >
        <section class="contener">
            <?php include "masterLayout/header.php" ?>
            <section class="Banner">
                <section class="contentBanner">
                    <h1>FIND CLOTHES THAT MATCHES YOUR STYLE</h1>
                    <h5>Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.</h5>
                    <button>Shop Now</button>
                    <footer>
                        <article class="InternationalBrands contentFooterBanner">
                            <h1>200+</h1>
                            <p>International Brands</p>
                        </article>
                        <article class="High-QualityProducts contentFooterBanner">
                            <h1>2,000+</h1>
                            <p>International Brands</p>
                        </article>
                        <article class="HappyCustomers contentFooterBanner">
                            <h1>30,000+</h1>
                            <p>Happy Customers</p>
                        </article>

                    </footer>
                </section>
                <article class="imageLeft">
                    <img src="../assets/img/Banner.png" alt="banner">
                    <img src="../assets/img/icon1.png" alt="icon">
                    <img src="../assets/img/icon1.png" alt="icon">
                </article>
            </section>
            <section class="BrandName">
                <img src="../assets/img/verasace.png" alt="logo">
                <img src="../assets/img/zara.png" alt="logo">
                <img src="../assets/img/gucci.png" alt="logo">
                <img src="../assets/img/prada.png" alt="logo">
                <img src="../assets/img/calvinKlein.png" alt="logo">
            </section>
            <main>
                <section class="NewProduct">
                    <h1>NEW PRODUCTS</h1>
                    <section class="ListNewProduct">
                        <?php 
                         foreach($data['showProduct'] as $value){
                             echo "
                             <section class='NewProduct' onclick = Render('ProductDetail&id','$value[IdProduct]')>
                                <article class='img'>
                                    <img src='../assets/img/$value[image]' alt='product'>
                                </article>
                                <article class='$value[NameProducts]'>
                                    <h1>title</h1>
                                </article> 
                                <article class='evaluate'>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                </article> 
                                <section class='price'>
                                    <h1>$value[Price]</h1>
                                </section>
                            </section>                            
                            ";
                                }                            
                            ?>


                    </section>
                </section>
                <section class="Bestseller">
                    <h1>BESTSELLER</h1>
                    <section class="ListBestsellerProduct">
                    <?php 
                         foreach($data['showProduct'] as $value){
                             echo "
                             <section class='BestsellerProduct' onclick = Render('ProductDetail&id','$value[IdProduct]')>
                             
                                <article class='img'>
                                    <img src='../assets/img/$value[image]' alt='product'>
                                </article>
                                <article class='$value[NameProducts]'>
                                    <h1>title</h1>
                                </article> 
                                <article class='evaluate'>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                </article> 
                                <section class='price'>
                                    <h1>$value[Price]</h1>
                                </section>
                            </section>
                            ";
                                }                            
                            ?>                       
                    </section>
                </section>
                <section class="BrowseByDressStyle">
                    <h1>BROWSE BY dress STYLE</h1>
                    <section class="Content">
                        <section class="CasualFormal">
                            <article class="Casual">
                                <h1>Casual</h1>
                                <img src="../assets/img/Casual.png" alt="Casual">

                            </article>
                            <article class="Formal">
                                <h1>Formal</h1>
                                <img src="../assets/img/Formal.png" alt="Formal">
    
                            </article>
                        </section>
                        <section class="PartyGym">
                            <article class="Party">
                                <h1>Party</h1>
                                <img src="../assets/img/Party.png" alt="Party">

                            </article>
                            <article class="Gym">
                                <h1>Gym</h1>
                                <img src="../assets/img/Gym.png" alt="Gym">
    
                            </article>
                        </section>
                    </section>
                </section>
                <section class="Customers">
                    <h1>OUR HAPPY CUSTOMERS</h1>
                    <section class="Content">
                        <?php 
                         foreach($data["showComment"] as $value){
                            echo "
                            <section class='Comment'>
                                <article class='Evaluate'>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                    <i class='ti-star'></i>
                                </article>
                                <article class='NameCustomers'>
                                    <h1>{$value["Name"]}</h1>
                                </article>
                                <article class='CommentContent'>
                                    <p> </p>
                                </article>
                            </section>
                            ";
                         }
                        ?>

                    </section>
                </section>
            </main>
            <?php include "masterLayout/footer.php" ?>

        </section>
    </section>
</body>
<script src="../assets/js/home.js"></script>
</html>