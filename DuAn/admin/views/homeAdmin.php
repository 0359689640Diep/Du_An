<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="assets/css/homeAdmin.css">
<link rel="stylesheet" href="assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>
<aside>
    <section class="individual">
        <article class="img">
            <img src="assets/imgUpload/<?php echo $data['result']['Image'] ?>" alt="img">
        </article>
        <article class="Personal_Information">
            <h2> <?php echo $data['result']['Name'] ?></h2>
            <h4>
                <?php echo $data['result']['Permission']==0 ?  "HR" : "Admin"; ?>
            </h4>
        </article>
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
            <h1>Ứng Dụng Chưa phát triển</h1>
        </main>
    </section>
</body>
</html>