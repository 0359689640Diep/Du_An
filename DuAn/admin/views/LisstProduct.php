<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="../assets/css/LisstProduct.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>
        <aside>
        <?php require_once "masterLayout/navigation.php"?>
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
                            <td><img src='../assets/imgUpload/{$value['image']}' alt='product'></td>
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
<script src="../assets/js/LisstProduct.js"></script>
</html>