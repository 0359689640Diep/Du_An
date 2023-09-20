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
                <i class="ti-home"></i>
                <a href="index.php?controller=product">Home</a>
            </section>
            <section class="setting">
                <i class="ti-cloud-up"></i>
                <a href="">Lisst product</a>
            </section>
            <section class="setting">
                <i class="ti-list-ol"></i>
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
            <form action="index.php?controller=Addproduct" method="post" enctype="multipart/form-data">
                <label for="NameProducts">Name Products</label>
                <input required title="Không được để trống" type="text" name="NameProducts" id="NameProducts">
                <label for="Details">Details</label>
                <input required title="Không được để trống" type="text" name="Details" id="Details">
                <label for="ProductDescription">Product Description</label>
                <input required title="Không được để trống" type="text" name="ProductDescription" id="ProductDescription">
                <label for="Color">Color</label>
                <input required title="Không được để trống" type="color" name="Color" id="Color">
                <label for="NumberProduct">Number Product</label>
                <input required title="Không được để trống" type="number" min =0  name="NumberProduct" id="NumberProduct">
                <label for="Price">Price</label>
                <input required title="Không được để trống" type="number" min =0  name="Price" id="Price">
                <label for="Size">Size</label>
                <select name="Size" id="Size" required title="Không được để trống">
                    <option value="">Size</option>
                    <option value="S">S</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
                <label for="Image">Image</label>
                <input required title="Không được để trống" type="file" name="Image" id="Image">
                <button type="submit">Add Product</button>
            </form>
        </main>
    </section>
</body>
<?php
$khoi=3;
 $test = !$data[0] ??  "<script>alert($data[0]);</script>"; 
 $test = !empty($data[0]) ? "<script>alert('$data[0]');</script>" : ""; 
 echo ($test);
 ?>

    

</html>