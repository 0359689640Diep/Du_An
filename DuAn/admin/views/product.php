<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="assets/css/product.css">
<link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>
        <aside>
            <section class="setting">
                <i class="ti-view-list-alt"></i>
                <a href="">Home</a>
            </section>
            <section class="setting">
                <i class="ti-cloud-up"></i>
                <a href="index.php?controller=Addproduct">Product</a>
            </section>
            <section class="setting">
                <i class="ti-list"></i>
                <a href="">Account</a>
            </section>
            <section class="setting">
                <i class="ti-settings"></i>
                <a href="">Setting</a>
            </section>
            <section class="setting">
                <i class="ti-id-badge"></i>
                <a href="">Profile</a>
            </section>
            <section class="setting">
                <i class="ti-share-alt"></i>
                <a href="">Log out</a>

            </section>
        </aside>
        <main>
            <table>
                <?php 
                if(!empty($data['result'])){
                    echo "
                    <tr>
                        <th>Details	</th>
                        <th>Name Products</th>
                        <th>Details	</th>
                        <th>Comment	</th>
                        <th>Color </th>
                        <th>Number Product </th>
                        <th>Price </th>
                        <th>Evalute </th>
                        <th>Size </th>
                        <th>Image </th>
                    </tr>
                    <tr>
                        <td> {$data['result']['Details']} </td>
                        <td> {$data['result']['NameProducts']}</td>
                        <td> {$data['result']['Details']} </td>
                        <td> {$data['result']['Comment']} </td>
                        <td> {$data['result']['Color']} </td>
                        <td> {$data['result']['NumberProduct']} </td>
                        <td> {$data['result']['Price']} </td>
                        <td> {$data['result']['Evalute']} </td>
                        <td> {$data['result']['Size']} </td>
                        <td> <img src='assets/imgUpload/{$data['result']['image']}' alt='product'> </td>
                    </tr>
                ";
                
                }else{
                    echo "<h1>không có dữ liệu</h1>";
                }
            ?>

            </table>
        </main>
    </section>
</body>
</html>