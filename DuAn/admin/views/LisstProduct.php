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
                            <td>
                            ";
                            if(isset($value["Colors"])){
                                foreach($value["Colors"] as $ValueColors){
                                    echo "
                                    
                                        <input type='checkbox' style='background-color:{$ValueColors}'>
                                    
                                    ";
                                }
                            }
                            echo "
                            </td>
                            <td>{$value['NumberProduct']}</td>
                            <td>{$value['Price']}</td>
                            <td>{$value['Evalute']}</td>
                            <td>
                            ";
                                    // echo "<pre>";
                                    // print_r($value); die();
                            if(isset($value["Sizes"])){
                                foreach($value["Sizes"] as $ValueSize){
                                    echo "
                                    
                                        <p>{$ValueSize}</p>
                                    
    
                                    ";
                                }
                            }
                            echo "
                            </td>
                            <td><img src='../assets/imgUpload/{$value['Image']}' alt='product'></td>
                            <td>
                                <a href='index.php?controller=FixProduct&IdProduct={$value['IdProduct']}'>
                                    <button > Delete</button>
                                </a>
                                
                                </td>
                            <td>
                                <a href='index.php?controller=FixProduct&IdProduct={$value['IdProduct']}'>
                                <button>Fix</button>
                                </a>
                            </td>
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