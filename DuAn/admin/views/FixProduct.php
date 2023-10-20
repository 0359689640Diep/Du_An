<!DOCTYPE html>
<html lang="en">
<?php require "masterLayout/head.php" ?>


<link rel="stylesheet" href="../assets/css/FixProduct.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>

        <aside>
        <?php require_once "masterLayout/navigation.php"?>
        </aside>
        <main>
        <?php 
//   die();
// echo "<pre>";
// var_dump($data["display"]["IdDetails"]);         
        // foreach($data["Color"] as $value){

        // } 
                    // die();
        $IdDetails = $data['display']["IdDetails"];
        $IdProduct = $data['display']["IdProduct"];
                    ?>
            <form action="index.php?controller=FixProduct&IdProduct=<?=$IdProduct?>&IdDetails=<?=$IdDetails?>
            " method="post" enctype="multipart/form-data">
                <label for="NameProducts">Name Products</label>
                <input value="<?php echo $data['display']["NameProducts"]; ?>"  type="text" name="NameProducts" id="NameProducts">

                <label for="Details">Details</label>
                <input value="<?php echo $data['display']["ProductDetails"];?>" type="text" name="Details" id="Details">

                <label for="ProductDescription">Product Description</label>
                <input value="<?php echo $data['display']["ProductDescription"]; ?>"  type="text" name="ProductDescription" id="ProductDescription">
                <label for="Color">Color</label>
                <article class="color">
                    <?php 
                    // echo "<input type='checkbox' style='background-color:{$valueColor}' 
                    // checked value='" . $valueDB['IdColor'] . ":" . $valueColor . "'>";
                    if(isset($data['dataColorSizeDefault']['Color'])){
                        foreach($data['dataColorSizeDefault']['Color'] as $valueColor){
                            echo "
                            <input type='checkbox' value='$valueColor[IdColor]' style = 'background-color:$valueColor[NameColor]' class='custom-checkbox' name='Color[]' checked>
                            ";
                        }
                    }
                    if(isset($data['dataColorSizeDefault']['ColorDefault'])){
                        foreach($data['dataColorSizeDefault']['ColorDefault'] as $valueColor){
                            echo "
                            <input type='checkbox' value='$valueColor[IdColor]' style = 'background-color:$valueColor[NameColor]' class='custom-checkbox' name='Color[]'>
                            ";
                        }
                    }
                    else{
                        echo "<h1> 404 Not Fount </h1>";

                    }
                    ?>


                

                </article>
                <label for="NumberProduct">Number Product</label>
                <input value="<?php echo $data['display']["NumberProduct"]; ?>"  type="number" min =0  name="NumberProduct" id="NumberProduct">
                <label for="Price">Price</label>
                <input value="<?php echo $data['display']["Price"]; ?>"  type="number" min =0  name="Price" id="Price">
                <label for="Size">Size</label>
                <article class="size">
                <?php 
                    if(isset($data['dataColorSizeDefault']['Size'])){
                        foreach($data['dataColorSizeDefault']['Size'] as $valueSize){
                            echo "
                            <label for='$valueSize[NameSize]'>$valueSize[NameSize]
                                <input type='checkbox' name='Size[]' id='$valueSize[NameSize]' value='$valueSize[IdSize]' checked>
                            </label>
                            ";
                        }
                    }
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
                <label for="Image">Image</label>
                <section class="Image">
                    <?php 
                    // echo "<pre>";
                    // var_dump($data['display']['Image']); die();
                    foreach($data['display']['Image'] as $value){
                        echo "
                        <article class='ContentImage'>
                            <img src='../assets/imgUpload/{$value['Image']}' alt='{$value['Image']}'>
                            <input type='hidden' name='IdImageUpdate[]' value='{$value['IdImage']}' >
                            <input type='file' name='ImageUpdate[]' id='' >
                        </article>
                        ";
                    }
                    ?>
                </section>
                <label for="Category">Category</label>
                <select name="Category" id="Category" >

                    <option value="<?php echo $data['display']["IdCategory"]; ?>">
                        <?php echo $data['display']["NameCategory"]; ?>
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
    header("location:index.php?controller=LisstProduct");

}

 ?>
<script src="../assets/js/product.js"></script>

</html>