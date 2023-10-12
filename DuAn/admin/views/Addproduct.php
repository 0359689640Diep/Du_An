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
                <label for="NumberProduct">Number Product</label>
                <input required title="Không được để trống" type="number" min =0  name="NumberProduct" id="NumberProduct">
                <label for="Price">Price</label>
                <input required title="Không được để trống" type="number" min =0  name="Price" id="Price">
                <label for="Color">Color</label>
                <article class="color">
                    <input type="checkbox" value="#00C12B" style = "background-color:#00C12B" class="custom-checkbox" name="Color[]">
                    <input type="checkbox" value="#F50606" style = "background-color:#F50606" class="custom-checkbox" name="Color[]">
                    <input type="checkbox" value="#F5DD06" style = "background-color:#F5DD06" class="custom-checkbox" name="Color[]">
                    <input type="checkbox" value="#F57906" style = "background-color:#F57906" class="custom-checkbox" name="Color[]">
                    <input type="checkbox" value="#06CAF5" style = "background-color:#06CAF5" class="custom-checkbox" name="Color[]">
                    <input type="checkbox" value="#063AF5" style = "background-color:#063AF5" class="custom-checkbox" name="Color[]">
                    <input type="checkbox" value="#7D06F5" style = "background-color:#7D06F5" class="custom-checkbox" name="Color[]">
                    <input type="checkbox" value="#F506A4" style = "background-color:#F506A4" class="custom-checkbox" name="Color[]">
                    <input type="checkbox" value="#FFFFFF" style = "background-color:#FFFFFF" class="custom-checkbox" name="Color[]">
                    <input type="checkbox" value="#000000" style = "background-color:#000000" class="custom-checkbox" name="Color[]">
                    <input type="checkbox" value="#A7A7A7" style = "background-color:#A7A7A7" class="custom-checkbox" name="Color[]">
                </article>
                <label for="Size">Size</label>
                <article class="size">
                    <label for="S">S
                        <input type="checkbox" name="Size[]" id="S" value="S">
                    </label>
                    <label for="M">M
                        <input type="checkbox" name="Size[]" id="M" value="M">
                    </label>
                    <label for="L">L
                        <input type="checkbox" name="Size[]" id="L" value="L">
                    </label>
                    <label for="XXL">XXL
                        <input type="checkbox" name="Size[]" id="XXL" value="XXL">
                    </label>
                    <label for="XXXL">XXXL
                        <input type="checkbox" name="Size[]" id="XXXL" value="XXXL">
                    </label>
                </article>
                <label for="Image">Image</label>
                <input required title="Không được để trống" type="file" name="Image[]" id="Image" multiple>
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