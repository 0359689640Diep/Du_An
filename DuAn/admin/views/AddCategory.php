<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>


<link rel="stylesheet" href="../assets/css/AddCategory.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">

<body>
    <section class="page">
        <?php require_once "masterLayout/header.php"?>
        <aside>
            <?php require_once "masterLayout/navigation.php"?>
            <?php require_once "masterLayout/Notification.php"?>
        </aside>
        <main>
            <form action="index.php?controller=AddCategory" method="post" enctype="multipart/form-data">
                <label for="NameCategory">Name Category</label>
                <input required title="Không được để trống" type="text" name="NameCategory" id="NameCategory">
                <label for="Status">Status</label>
                <select name="Status" id="Status" required title="Không được để trống">
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
 
if(isset($data) ){
    if (isset($data['messageError'])) {
          $error = $data['messageError'];
          echo "<script>
          toast(
            title= 'Error',
            message= '$error',
            type= 'error',
            duration= 10000,
            quantity = '1'
        )
          </script>";
        }else{
            if(isset($data['message'])){
                $success = $data['message'];
                echo "<script>
                toast(
                  title= 'Success',
                  message= '$success',
                  type= 'success',
                  duration= 10000,
                  quantity = '0'
              )
                </script>";        

            }
            
        }
}
 ?>
<script src="../assets/js/product.js"></script>

</html>