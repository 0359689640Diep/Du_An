<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="assets/css/Addproduct.css">
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
                <i class="ti-comment-alt"></i>
                <a href="">Add product</a>
            </section>
            <section class="setting">
                <i class="ti-list"></i>
                <a href="">The number of products</a>
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
            <form action="" method="post">
                <label for="NameProducts">Name Products</label>
                <input type="text" name="NameProducts" id="NameProducts">
                <label for="IdDetails">Name Products</label>
                <input type="text" name="IdDetails" id="IdDetails">
            </form>
        </main>
    </section>
</body>
</html>