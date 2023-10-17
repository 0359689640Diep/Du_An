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
                <!-- <label for="NameProducts">Name Products</label>
                <input value="<?php echo $data['display']["NameProducts"]; ?>"  type="text" name="NameProducts" id="NameProducts">

                <label for="Details">Details</label>
                <input value="<?php echo $data['display']["ProductDetails"];?>" type="text" name="Details" id="Details">

                <label for="ProductDescription">Product Description</label>
                <input value="<?php echo $data['display']["ProductDescription"]; ?>"  type="text" name="ProductDescription" id="ProductDescription">
                <label for="Color">Color</label> -->
                <article class="color">
                    <?php
                    $tableColor = array('#F5DD06','#F57906','#06CAF5','#7D06F5','#F506A4','#FFFFFF','#000000','#a7a7a7');
                    $foundColors = array(); // Mảng lưu trữ những giá trị tìm thấy
                    
                    foreach($tableColor as $valueColor){
                        foreach($data["display"]["Color"] as $valueDB) {
                        $found = false; // Cờ kiểm tra xem có tìm thấy phần tử hay không
                    
                        // echo "<input type='checkbox' style='background-color:{$valueColor}' 
                        // checked value='" . $valueDB['IdColor'] . ":" . $valueColor . "'>";
                            if($valueDB['Color'] === $valueColor){
                                $found = true;// Thêm IdColor vào mảng $arrIdColor
                                $foundColors['IdColor'] = $valueDB['IdColor']; // Thêm giá trị tìm thấy vào mảng $foundColors
                                $foundColors['Color'] = $valueDB['Color']; // Thêm giá trị tìm thấy vào mảng $foundColors
                                // break;
                            } 
                        }
                    
                        if(!$found){
                            $arrIdColor[] = $valueDB['IdColor']; // Thêm IdColor vào mảng $arrIdColor
                        }
                    }
                    echo "<pre>";
                    var_dump($foundColors); die();
                    // In ra những checkbox có giá trị không tìm thấy
                    foreach($arrIdColor as $idColor) {
                        foreach($tableColor as $value){
                            if(!in_array($value, $foundColors)) {
                                echo "<input type='checkbox' style='background-color:{$value}' 
                                 value='" . $idColor. ":" . $value . "'>";
                            }
                        }
                    }
                    

                    ?>


                

                </article>
                <label for="NumberProduct">Number Product</label>
                <input value="<?php echo $data['display']["NumberProduct"]; ?>"  type="number" min =0  name="NumberProduct" id="NumberProduct">
                <label for="Price">Price</label>
                <input value="<?php echo $data['display']["Price"]; ?>"  type="number" min =0  name="Price" id="Price">
                <label for="Size">Size</label>
                <article class="size">
                    <label for="S">S
                        <input type="checkbox" name="Size[]"
                        <?php
                            $isCheckedSize = false; 
                            foreach($data["display"]["Size"] as $value){
                                if($value['Size'] === "S"){
                                    echo "checked id='S' value='" . $value['IdSize'] . ":" . $value['Size'] . "'";
                                    $isCheckedSize = true;
                                    break;
                                }
                                
                            }
                            if(!$isCheckedSize){
                                echo "id='S' value='S'";
                            }
                        ?>
                        >
                    </label>
                    <label for="M">M
                        <input type="checkbox" name="Size[]"
                        <?php
                            $isCheckedSize = false; 
                            foreach($data["display"]["Size"] as $value){
                                if($value['Size'] === "M"){
                                    echo "checked id='M' value='" . $value['IdSize'] . ":" . $value['Size'] . "'";
                                    $isCheckedSize = true;
                                    break;
                                }
                                
                            }
                            if(!$isCheckedSize){
                                echo "id='M' value='M'";
                            }
                        ?>
                        >
                    </label>
                    <label for="L">L
                        <input type="checkbox" name="Size[]"
                        <?php
                            $isCheckedSize = false; 
                            foreach($data["display"]["Size"] as $value){
                                if($value['Size'] === "L"){
                                    echo "checked id='L' value='" . $value['IdSize'] . ":" . $value['Size'] . "'";
                                    $isCheckedSize = true;
                                    break;
                                }
                                
                            }
                            if(!$isCheckedSize){
                                echo "id='L' value='L'";
                            }
                        ?>
                        >
                    </label>
                    <label for="XXL">XXL
                        <input type="checkbox" name="Size[]"
                        <?php
                            $isCheckedSize = false; 
                            foreach($data["display"]["Size"] as $value){
                                if($value['Size'] === "XXL"){
                                    echo "checked id='XXL' value='" . $value['IdSize'] . ":" . $value['Size'] . "'";
                                    $isCheckedSize = true;
                                    break;
                                }
                                
                            }
                            if(!$isCheckedSize){
                                echo "id='XXL' value='XXL'";
                            }
                        ?>
                        >
                    </label>
                    <label for="XXXL">XXXL
                        <input type="checkbox" name="Size[]"
                        <?php
                            $isCheckedSize = false; 
                            foreach($data["display"]["Size"] as $value){
                                if($value['Size'] === "XXXL"){
                                    echo "checked id='XXXL' value='" . $value['IdSize'] . ":" . $value['Size'] . "'";
                                    $isCheckedSize = true;
                                    break;
                                }
                                
                            }
                            if(!$isCheckedSize){
                                echo "id='XXXL' value='XXXL'";
                            }
                        ?>
                        >
                    </label>
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