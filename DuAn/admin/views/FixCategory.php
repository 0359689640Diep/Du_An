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
        </aside>
        <main>
            <form action="index.php?controller=FixCategory" method="post" enctype="multipart/form-data">
                <label for="NameCategory">Name Category</label>
                <input value="<?php echo $data['display']['display']['NameCategory'] ;?>" type="text" name="NameCategory" id="NameCategory">
                <label for="Status">Status</label>
                <select name="Status" id="Status"  >
                <option value="<?php echo $data['display']['display']['Status']; ?>">
                    <?php echo ($data['display']['display']['Status'] == 1) ? "Display" : "Hidden"; ?>
                </option>

                    <option value="1">Hidden</option>
                    <option value="0">Display</option>
                </select>
                <button type="submit">Fix Category</button>
            </form>
        </main>
    </section>
</body>
<?php 
if(!empty($data['dataMessage'][0]) ){
    $message = $data['dataMessage'][0];
// hàm json_encode() để mã hóa giá trị của biến $message thành chuỗi JSON trước khi truyền vào đoạn mã JavaScript, để đảm bảo rằng các ký tự đặc biệt sẽ được mã hóa đúng và không gây ra lỗi cú pháp
    echo "<script>alert(" . json_encode($message) . ");</script>";
    header("location:index.php?controller=LisstCategory");

}
 ?>
<script src="../assets/js/product.js"></script>

</html>