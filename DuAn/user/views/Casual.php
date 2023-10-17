<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>
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
                                <input type="checkbox" value="#00C12B" style = "background-color:#00C12B" class="custom-checkbox" name="Color[]">
                                <input type="checkbox" value="#F50606" style = "background-color:#F50606" class="custom-checkbox" name="Color[]">
                                <input type="checkbox" value="#F5DD06" style = "background-color:#F5DD06" class="custom-checkbox" name="Color[]">
                                <input type="checkbox" value="#F57906" style = "background-color:#F57906" class="custom-checkbox" name="Color[]">
                                <input type="checkbox" value="#06CAF5" style = "background-color:#06CAF5" class="custom-checkbox" name="Color[]">
                                <input type="checkbox" value="#063AF5" style = "background-color:#063AF5" class="custom-checkbox" name="Color[]">
                                <input type="checkbox" value="#7D06F5" style = "background-color:#7D06F5" class="custom-checkbox" name="Color[]">
                                <input type="checkbox" value="#F506A4" style = "background-color:#F506A4" class="custom-checkbox" name="Color[]">
                                <input type="checkbox" value="#FFFFFF" style = "background-color:#FFFFFF" class="custom-checkbox" name="Color[]">
                                <input type="checkbox" value="#000000" style = "background-color:#000000" class="custom-checkbox" name="Color[]">
                                <input type="checkbox" value="#A7A7A7" style = "background-color:#A7A7A7" class="custom-checkbox" name="Color[]">

                            </article>
                        </section>
                        <article class="Size">
                            <section class="titleSize">
                                <h1>Size</h1>
                            </section>
                            <article class="contentSize">
                                <label for="S">S
                                    <input type="checkbox" name="Size[]" id="S" value="S">
                                </label>
                                <label for="M">M
                                    <input type="checkbox" name="Size[]" id="M" value="M">
                                </label>
                                <label for="L">L
                                    <input type="checkbox" name="Size[]" id="L" value="L">
                                </label>
                                <label for="XXL">XXL
                                    <input type="checkbox" name="Size[]" id="XXL" value="XXL">
                                </label>
                                <label for="XXXL">XXXL
                                    <input type="checkbox" name="Size[]" id="XXXL" value="XXXL">
                                </label>
                                
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
                            <!-- chúng ta đã sử dụng thuộc tính onchange của thẻ select để thiết lập một sự kiện khi giá trị của option thay đổi. Khi sự kiện này xảy ra, chúng ta sẽ chuyển hướng trang đến URL tương ứng với giá trị của option được chọn. -->
                            <select name="" id="mySelect" onchange="location = this.value;">
                                <option value="">Most Popular</option>
                                <option value="index.php?controller=Casual&action=sheach&id=<?=isset($_GET['id']) ?? ""?>&quantity=25">25</option>
                                <option value="index.php?controller=Casual&action=fillter&id=<?=isset($_GET['id']) ?? ""?>&quantity=50">50</option>
                                <option value="index.php?controller=Casual&action=fillter&id=<?=isset($_GET['id']) ?? ""?>&quantity=100">100</option>
                            </select>

                        </section>
                    </section>
                    <section class="mainContentMain">
                        <?php 
                        if(isset($data["showProduct"])){
                            foreach($data["showProduct"] as $value){
                                echo "
                                <section class='lissProduct' onclick = Render('ProductDetail&id','$value[IdProduct]')>
                                    <article class='imgProduct'>
                                        <img src='../assets/imgUpload/{$value['Image']}' alt='{$value['Image']}'>
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
<script src="../assets/js/home.js"></script>
</html>