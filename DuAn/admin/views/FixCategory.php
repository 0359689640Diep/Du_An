<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="assets/css/AddCategory.css">
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
            <section class="setting" onclick="redirectToPage('index.php?controller=LisstCategory')">
                <i class="ti-cloud-up"></i>
                <a href="index.php?controller=LisstCategory">Lisst Category</a>
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
            <form action="index.php?controller=FixCategory" method="post" enctype="multipart/form-data">
                <label for="NameCategory">Name Category</label>
                <input value="<?php echo $data['display']['display']['NameCategory'] ;?>" type="text" name="NameCategory" id="NameCategory">
                <label for="Status">Status</label>
                <select name="Status" id="Status"  >
                <option value="<?php echo $data['display']['display']['Status']; ?>">
                    <?php echo ($data['display']['display']['Status'] == 1) ? "Display" : "Hidden"; ?>
                </option>

                    <option value="0">Hidden</option>
                    <option value="1">Display</option>
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
<script src="assets/js/product.js"></script>

</html>