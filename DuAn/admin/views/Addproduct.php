<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>
<link rel="stylesheet" href="../assets/css/Addproduct.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>
        <aside>
        <?php require_once "masterLayout/navigation.php"?>
        <?php require_once "masterLayout/Notification.php"?>
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
                    <?php 
                    if(isset($data['dataColorSizeDefault']['ColorDefault'])){
                        foreach($data['dataColorSizeDefault']['ColorDefault'] as $valueColor){
                            echo "
                            <input type='checkbox' value='$valueColor[IdColor]' style = 'background-color:$valueColor[NameColor]' class='custom-checkbox' name='Color[]'>
                            ";
                        }
                    }elseif(isset($data['dataColorSizeDefault']['Color'])){
                        echo "<h1> 404 Not Fount </h1>";
                    }
                    ?>
                    
                </article>
                <label for="Size">Size</label>
                <article class="size">
                <?php 
                    if(isset($data['dataColorSizeDefault']['SizeDefault'])){
                        foreach($data['dataColorSizeDefault']['SizeDefault'] as $valueSize){
                            echo "
                            <label for='$valueSize[NameSize]'>$valueSize[NameSize]
                                <input type='checkbox' name='Size[]' id='$valueSize[NameSize]' value='$valueSize[IdSize]'>
                            </label>
                            ";
                        }
                    }else{
                        echo "<h1> 404 Not Fount </h1>";
                    }
                    ?>
                </article>
                <label for="Image">Images</label>
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
if(isset($data['dataMessage']) ){
    if (isset($data['dataMessage']['messageError'])) {
          $error = $data['dataMessage']['messageError'];
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
            if(isset($data['dataMessage']['message'])){
                $success = $data['dataMessage']['message'];
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