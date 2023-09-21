<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="assets/css/LisstProduct.css">
<link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>
        <aside>
        <section class="setting" onclick="redirectToPage('index.php?controller=product')">
                <i class="ti-home"></i>
                <a href="index.php?controller=product">Home</a>
            </section>
            <section class="setting" onclick="redirectToPage('index.php?controller=Addproduct')">
                <i class="ti-cloud-up"></i>
                <a href="index.php?controller=Addproduct">Add Product</a>
            </section>
            <section class="setting">
                <i class="ti-list-ol"></i>
                <a href="">The number of products</a>
            </section>
            <section class="setting">
                <i class="ti-package"></i>
                <a href="">Trash can</a>
            </section>
            <section class="setting">
                <i class="ti-share-alt"></i>
                <a href="">Log out</a>
            </section>
            <section class="setting">
                <i class="ti-settings"></i>
                <a href="">Setting</a>
            </section>
        </aside>
        <main>
            <table>
                <tr>
                    <th>Name Products</th>
                    <th>Details	</th>
                    <th>Color </th>
                    <th>Number Product </th>
                    <th>Price </th>
                    <th>Evalute </th>
                    <th>Size </th>
                    <th>Image </th>
                </tr>
                <?php 
                if(!empty($data['result'])){
                    foreach($data['result'] as $value){
                        echo "
                        <tr id='{$value['IdProduct']}'>
                            <td>{$value['NameProducts']}</td>
                            <td>{$value['IdDetails']}</td>
                            <td><input type='color' name='' id='' value='{$value['Color']}'></td>
                            <td>{$value['NumberProduct']}</td>
                            <td>{$value['Price']}</td>
                            <td>{$value['Evalute']}</td>
                            <td>{$value['Size']}</td>
                            <td><img src='assets/imgUpload/{$value['image']}' alt='product'></td>
                            <td><button onclick='deleteProduct({$value['IdProduct']})'>Delete</button></td>
                            <td><button onclick='fixProduct({$value['IdProduct']})'>Fix</button></td>
                        </tr>
                    ";
                    

                    }
                
                }else{
                    echo "<script> alert('No data displayed, please update the data'); </script>";

                }
            ?>

            </table>
        </main>
    </section>
</body>
<script src="assets/js/LisstProduct.js"></script>
</html>