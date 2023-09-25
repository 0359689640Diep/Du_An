<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="../assets/css/Addproduct.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>
        <aside>
        <?php require_once "masterLayout/navigation.php"?>
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
                <label for="Category">Category</label>
                <select name="Category" id="Category" required title="Không được để trống">
                    <option value="">Category</option>
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
<script src="../assets/js/product.js"></script>

</html>