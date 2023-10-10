<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/Casual.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
        <section class="contener">
            <?php include "masterLayout/header.php" ?>
            <main>
                <form action="index.php?controller=Casual" method="post" class="sidebar">
                    <section class="headerSidebar">
                        <article class="filter">
                            <h1>Filters</h1>
                            <i class="ti-filter"></i>
                        </article>
                        <?php 
                            if(isset($data["showCategory"])){
                                foreach($data["showCategory"] as $value){
                                    echo "
                                    <section class='nav'>
                                        <a href='index.php?controller=Casual&id={$value['IdCategory']}'>{$value['NameCategory']}</a>
                                        <i class='ti-angle-right'></i>
                                    </section> 
                                    ";
                                }
                            }
                        ?>
                    </section>
                    <section class="mainSidebar">
                        <article class="Price">
                            <h1>Price</h1>
                            <input type="range" min="1" max="">
                        </article>
                        <section class="Color">
                            <article class="titleColor">
                                <h1>Color</h1>
                            </article>
                            <article class="contentColor">
                                <?php
                                    if(isset($data["showProduct"])){
                                        foreach($data["showProduct"] as $value){
                                            echo "
                                                <svg>
                                                    <circle fill='{$value['Color']}'></circle>
                                                </svg>
                                            ";
                                        }
                                    }
                                    ?>

                            </article>
                        </section>
                        <article class="Size">
                            <section class="titleSize">
                                <h1>Size</h1>
                            </section>
                            <article class="contentSize">
                                <?php 
                                    if(isset($data["showProduct"])){
                                        foreach($data["showProduct"] as $value){
                                            echo "
                                            <a href=''>
                                                <button>{$value['Size']}</button>
                                            </a>
                                            ";
                                        }
                                    }else{
                                        echo "<h1>There are no products you are looking for</h1>";
                                    }
                                ?>
                                
                            </article>
                        </article>

                    </section>
                    <section class="footerSidebar">
                            <article class="headerFooterSidebar">
                                <h1>Dress Style</h1>
                            </article>
                            <section class="mainFooterSidebar">
                                <article class="content">
                                    <h4>Casual</h4>
                                    <i class="ti-angle-right"></i>
                                </article>  
                                <article class="content">
                                    <h4>Formal</h4>
                                    <i class="ti-angle-right"></i>
                                </article>
                                <article class="content">
                                    <h4>Party</h4>
                                    <i class="ti-angle-right"></i>
                                </article>
                                <article class="content">
                                    <h4>Gym</h4>
                                    <i class="ti-angle-right"></i>
                                </article>
                            </section>
                            <article class="footerSidebar">
                                <button>Apply Filter</button>
                            </article>
                    </section>
                </form>
                <section class="contentMain">
                    <section class="headerContentMain">
                        <h1>Casual</h1>
                        <section class="showing">
                            <p>Showing 1-10 of 100 Products</p>
                            <p>Sort by: </p>
                            <select name="" id="">
                                <option value="">Most Popular</option>
                                <option value="">
                                    <a href="index.php?controller=Casual&action=fillter&id=10">10-25</a>
                                </option>
                                <option value="">
                                    <a href="index.php?controller=Casual&action=fillter&id=10">10-25</a>
                                </option>
                                <option value="">
                                    <a href="index.php?controller=Casual&action=fillter&id=25">25-50</a>
                                </option>
                                <option value="">
                                    <a href="index.php?controller=Casual&action=fillter&id=50">50-100</a>
                                </option>
                            </select>
                        </section>
                    </section>
                    <section class="mainContentMain">
                        <?php 
                        if(isset($data["showProduct"])){
                            foreach($data["showProduct"] as $value){
                                echo "
                                <section class='lissProduct'>
                                    <article class='imgProduct'>
                                        <img src='../assets/imgUpload/{$value['image']}' alt='{$value['image']}'>
                                    </article>
                                    <article class='nameProduct'>
                                        <h2>{$value['NameProducts']}</h2>
                                    </article>
                                    <article class='evaluate'>
                                            <i class='ti-star'></i>
                                            <i class='ti-star'></i>
                                            <i class='ti-star'></i>
                                            <i class='ti-star'></i>
                                            <i class='ti-star'></i>
                                        </article>
                                    <article class='priceProduct'>
                                        <h2>{$value['Price']}</h2>
                                    </article>
                                </section>
                                ";
                            }
                        }
                        ?>
                    </section>
                    <section class="footerContentMain"></section>
                </section>
            </main>
            <?php include "masterLayout/footer.php" ?>

        </section>
    </section>
</body>
</html>