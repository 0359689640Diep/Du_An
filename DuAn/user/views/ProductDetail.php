<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link rel="stylesheet" href="../assets/css/ProductDetail.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<link rel="stylesheet" href="../assets/css/responsive/ResponsiveProductDetail.css">
<body>
    <section class="page" >
        <section class="contener">
            <?php include "masterLayout/header.php" ?>
            <main>
                <section class="ProductDetail">
                    <section class="ProductDetailImg">
                        <article class="ProductDetailImgLeft">
                            <?php 
                            $quanlity = count($data['Image']) <= 3 ? count($data['Image']) :3;
                            // echo $quanlity; die();
                                if (isset($this->data['showProduct'])) {
                                    for ($i = 0; $i < $quanlity; $i++) {
                                        echo "<img src='../assets/imgUpload/". $data['Image'][$i]['Image'] ."'alt='{$data['Image'][$i]['Image']}'>";
                                    }
                                }else{
                                    echo "<h1>Sản phẩm không tồn tại</h1>";
                                }

                            ?>
                            <!-- 
                            <img src="../assets/img/aothun1.png" alt="">
                            <img src="../assets/img/aothun1.png" alt=""> -->
                        </article>
                        <article class="ProductDetailImgRight">
                        <?php
                            $showProduct =  $data['showProduct'][0];
                            $showDetails = isset($data['showProduct'][0]) ? $data['showProduct'][0] : "" ;
                            // echo "<pre>";
                            // var_dump($showProduct); die();
                            echo "
                                <img src='../assets/imgUpload/" . $data['Image'][0]['Image'] . "' alt='showProduct[0][Image]'>
                            ";                            
                        ?>
                        </article>
                    </section>
                    <form action="index.php?controller=ProductDetail&action=addToCart&id=<?php echo $showProduct['IdProduct']?>" method="post" class="ProductDetailContent">
                        <?php 
                            echo "
                            <h1>{$showProduct['NameProducts']}</h1>
                            <article class='evaluate'>
                                <i class='ti-star'></i>
                                <i class='ti-star'></i>
                                <i class='ti-star'></i>
                                <i class='ti-star'></i>
                                <i class='ti-star'></i>
                            </article>   
                            <section class='price'>
                                <input type='text' name='Price' value = '{$showProduct['Price']}' readonly>
                               
                            </section>    
                            <p>{$showDetails['ProductDetails']}</p> 
                            <article class='color'>
                                <h3>Select Colors</h3>
                                <article class='contentColor'>";
                                if(isset($data['Color'])){
                                    foreach($data['Color'] as $value){
                                        echo "
                                        <input type='radio' name='Color' value='$value[Color]' id='' style='background-color: $value[Color]'>
                                        ";
                                    }
                                }
                                // print_r($value);
                            echo "
                                </article>
                            </article> 
                            <article class='side'>
                                <h3>Choose Size</h3>
                                <article class='contentSize'>";

                                if(isset($data['Size'])){
                                    foreach($data['Size'] as $value){
                                        echo "
                                        <label for='$value[IdSize]'>
                                            $value[Size]
                                            <input type='radio' name='Size' id='$value[IdSize]' value = '$value[Size]'>
                                        </label>
         
                                        ";
                                    }
                                }
                                echo "
                            </article>
                            </article>
                            
                            ";
                        ?>
                        <section class="addTocart">
                            <input type="number" name="number" id="" min = 1 max = <?php echo $showProduct['NumberProduct']?> value="1">
                            <button type="submit">Add To Cart</button>
                        </section>

                    </form>

                </section>
                <section class="commentUser">
                    <nav>
                        <a href="#">Product Details</a>
                        <a href="#">Rating & Reviews</a>
                        <a href="#">FAQs</a>
                    </nav>
                    <section class = "header">
                        <article class="left">
                            <h1>All Reviews</h1>
                            <span>(453)</span>
                        </article>
                        <article class="right">
                            <svg height = "50" class="my-svg">
                                <circle cx= "25" cy = "25" r = "25" fill = "#F0F0F0" ></circle>
                            </svg>
                            <i class="ti-filter"></i>
                            <select name="" id="">
                                <option value="">Latest</option>
                            </select>
                            <button>Write a Review</button>
                        </article>
                    </section>
                    <section class="content">                           
                        <?php 
                        if(isset($data["showComment"])){
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
                                       <p>{$value['Content']}</p>
                                   </article>
                               </section>
                               ";
                           }
                        }else{
                            echo "You need to log in to use the service";
                        }
                        ?>
                    </section>
                </section>
                <section class="productSuggestions">
                    <header>
                        <h1>You might also like</h1>
                    </header>
                    <section class="mainproductSuggestions">
                        <?php 
                        foreach($data['GetProductsByCategory'] as $value){
                            echo "
                                <section class='SuggestionsProduct'>
                                    <article class='img'>
                                    <img src='../assets/imgUpload/" . $value['Image'] . "' alt='showProduct[0][Image]'>
                                    </article>
                                    <article class='title'>
                                        <h1>{$value['NameProducts']}</h1>
                                    </article> 
                                    <article class='evaluate'>
                                        <i class='ti-star'></i>
                                        <i class='ti-star'></i>
                                        <i class='ti-star'></i>
                                        <i class='ti-star'></i>
                                        <i class='ti-star'></i>
                                    </article> 
                                    <section class='price'>
                                        <h1>{$value['Price']}</h1>
                                        
                                    </section>
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
<script src="../assets/js/ProductDetail.js"></script>
</html>