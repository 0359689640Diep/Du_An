<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="../assets/css/LisstCategory.css">
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
                    <th>Name Category</th>
                    <th>Status</th>
                    <th>Date Edit</th>
                </tr>
                <?php 
                if(!empty($data['result'])){
                    foreach($data['result'] as $value){
                        $status = $value['Status'] == 1 ? "Display":"Hidden";
                        echo "
                        <tr >
                            <td>{$value['NameCategory']}</td>
                            <td>{$status}</td>
                            <td>{$value['DateEdit']}</td>
                            <td><button onclick='deleteCategory({$value['IdCategory']})'>Delete</button></td>
                            <td><button onclick='fixCategory({$value['IdCategory']})'>Fix</button></td>
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
<script src="../assets/js/LisstCategory.js"></script>
</html>