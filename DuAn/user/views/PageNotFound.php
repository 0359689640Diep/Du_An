<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>
<link rel="stylesheet" href="../assets/css/PageNotFound.css">
<body>
    <section class="page">
        <header>
            <article class="logo">
                <canvas id="myCanvas"></canvas>
            </article>
            <section class="contentHeader">
                <a href="index.php?controller=home">Home</a>
                <a href="">Projects</a>
                <a href="">About us</a>
                <a href="">Contact</a>
            </section>
        </header>
        <main>
            <section class="contentMain">
                <h1>404</h1>
                <h2>Page Not Fount</h2>
                <h3>Sorry, we couldn’t find the page you ‘re looking for </h3>
            </section>
        </main>
        <img src="../assets/img/Rectangle.png" alt="image">
    </section>
</body>
<script>
let canvas = document.getElementById('myCanvas');
let context = canvas.getContext('2d');
context.font = "70px Times News Roman"; // font và kích cỡ chữ
context.fillStyle = "#FFFFFF"; // màu chữ
context.fillText("Shop.com", 1, 60);

</script>
</html>