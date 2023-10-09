<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="../assets/css/AddCategory.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>
        <aside>
        <?php require_once "masterLayout/navigation.php"?>
        </aside>
        <main>
            <form action="index.php?controller=AddCategory" method="post" enctype="multipart/form-data">
                <label for="NameCategory">Name Category</label>
                <input required title="Không được để trống" type="text" name="NameCategory" id="NameCategory">
                <label for="Status">Status</label>
                <select name="Status" id="Status" required title="Không được để trống" >
                    <option value="">Status</option>
                    <option value="1">Hidden</option>
                    <option value="0">Presently</option>
                </select>
                <button type="submit">Add Category</button>
            </form>
        </main>
    </section>
</body>
<?php 
 $test = !empty($data[0]) ? "<script>alert('$data[0]');</script>" : ""; 
 echo ($test);
 ?>
<script src="../assets/js/product.js"></script>

</html>