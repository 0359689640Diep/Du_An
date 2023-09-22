<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="assets/css/FixProduct.css">
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
            <section class="setting" onclick="redirectToPage('index.php?controller=product')">
                <i class="ti-cloud-up"></i>
                <a href="index.php?controller=product"> Product</a>
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
            <form action="index.php?controller=FixProduct" method="post" enctype="multipart/form-data">
                <label for="NameProducts">Name Products</label>
                <input value="<?php echo $data['display']['display']["NameProducts"]; ?>"  type="text" name="NameProducts" id="NameProducts">

                <label for="Details">Details</label>
                <input value="<?php echo $data['display']['display']["ProductDetails"];?>" type="text" name="Details" id="Details">

                <label for="ProductDescription">Product Description</label>
                <input value="<?php echo $data['display']['display']["ProductDescription"]; ?>"  type="text" name="ProductDescription" id="ProductDescription">
                <label for="Color">Color</label>
                <input value="<?php echo $data['display']['display']["Color"]; ?>"  type="color" name="Color" id="Color">
                <label for="NumberProduct">Number Product</label>
                <input value="<?php echo $data['display']['display']["NumberProduct"]; ?>"  type="number" min =0  name="NumberProduct" id="NumberProduct">
                <label for="Price">Price</label>
                <input value="<?php echo $data['display']['display']["Price"]; ?>"  type="number" min =0  name="Price" id="Price">
                <label for="Size">Size</label>
                <select name="Size" id="Size" >
                    <option value="<?php echo $data['display']['display']["Size"]; ?>"><?php echo $data['display']['display']["Size"]; ?></option>
                    <option value="S">S</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
                <label for="Image">Image</label>
                <input   type="file" name="Image" id="Image">
                <label for="Category">Category</label>
                <select name="Category" id="Category" >

                    <option value="<?php echo $data['display']['display']["IdCategory"]; ?>">
                        <?php echo $data['display']['display']["NameCategory"]; ?>
                    </option>
                    <?php 
                        if(!empty($data['dataCategory']['result'])){
                            foreach($data['dataCategory']['result'] as $value){
                                echo "
                                <option value='{$value['IdCategory']}'>{$value['NameCategory']}</option>
                                
                                ";
                            }

                        }
                    ?>
                </select>                
                <button type="submit">Add Product</button>
            </form>
        </main>
    </section>
</body>
<?php 

if(!empty($data['dataMessage'][0]) ){
    $message = $data['dataMessage'][0];
// hàm json_encode() để mã hóa giá trị của biến $message thành chuỗi JSON trước khi truyền vào đoạn mã JavaScript, để đảm bảo rằng các ký tự đặc biệt sẽ được mã hóa đúng và không gây ra lỗi cú pháp
    echo "<script>alert(" . json_encode($message) . ");</script>";

}

 ?>
<script src="assets/js/product.js"></script>

</html>