<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="assets/css/LisstCategory.css">
<link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>
<aside>
            <section class="setting" onclick="redirectToPage('index.php?controller=homeAdmin')">
                <i class="ti-home"></i>
                <a href="index.php?controller=homeAdmin">Home</a>
            </section>
            <section class="setting">
                <i class="ti-comment-alt"></i>
                <a href="">Comment</a>
            </section>
            <section class="setting">
                <i class="ti-list"></i>
                <a href="">Lisst Account</a>
            </section>
            <section class="setting" onclick="redirectToPage('index.php?controller=Addproduct')">
                <i class="ti-cloud-up"></i>
                <a href="index.php?controller=Addproduct">Add Product</a>
            </section>
            <section class="setting" onclick="redirectToPage('index.php?controller=LisstProduct')">
                <i class="ti-list"></i>
                <a href="index.php?controller=LisstProduct">Lisst product</a>
            </section>
            <section class="setting" onclick="redirectToPage('index.php?controller=AddCategory')">
                <i class="ti-write"></i>
                <a href="index.php?controller=AddCategory">Add Category</a>
            </section>
            <section class="setting">
                <i class="ti-package"></i>
                <a href="">Trash can</a>
            </section>
            <section class="setting">
                <i class="ti-settings"></i>
                <a href="">Setting</a>
            </section>
            <section class="setting">
                <i class="ti-share-alt"></i>
                <a href="">Log out</a>

            </section>
        </aside>
        <main>
            <table>
                <tr>
                    <th>Name Category</th>
                    <th>Status</th>
                    <th>Date Edit</th>
                </tr>
                <?php 
                if(!empty($data['result'])){
                    foreach($data['result'] as $value){
                        echo "
                        <tr >
                            <td>{$value['NameCategory']}</td>
                            <td>{$value['Status']}</td>
                            <td>{$value['DateEdit']}</td>
                            <td><button onclick='deleteProduct({$value['IdCategory']})'>Delete</button></td>
                            <td><button onclick='fixProduct({$value['IdCategory']})'>Fix</button></td>
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
<script src="assets/js/LisstCategory.js"></script>
</html>