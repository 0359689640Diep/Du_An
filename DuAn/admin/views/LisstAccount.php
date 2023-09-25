<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="../assets/css/LisstAccount.css">
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
                    <th>Gmail</th>
                    <th>Password</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Permission</th>
                    <th>Image </th>
                    <th>Address</th>
                </tr>
                <?php 
                if(!empty($data['result'])){
                    foreach($data['result'] as $value){
                        $Permission = $value['Permission'] == 1 ? "User":"Admin";

                        echo "
                        <tr>
                            <td>{$value['Gmail']}</td>
                            <td>{$value['Password']}</td>
                            <td>{$value['Name']}</td>
                            <td>{$value['Phone']}</td>
                            <td>{$Permission}</td>
                            <td><img src='../assets/imgUpload/{$value['Image']}' alt='img'></td>
                            <td>{$value['Address']}</td>
                            
                            <td><button onclick='deleteAccount({$value['Id']})'>Delete</button></td>
                            <td><button onclick='fixAccount({$value['Id']})'>Fix</button></td>
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
<script src="../assets/js/LisstAccount.js"></script>
</html>