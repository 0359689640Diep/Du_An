<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

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

                <input type="checkbox" style="background-color:#00C12B" <?php 
                    foreach($data["display"]["Color"] as $value){
                        if($value['Color'] === "#00C12B"){
                            echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                        } 
                    } ?> name="Color[]">


                <input type="checkbox" style="background-color:#F50606" <?php 
                foreach($data["display"]["Color"] as $value){
                    if($value['Color'] === "#F50606"){
                        echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                    } 
                } ?> name="Color[]">

                <input type="checkbox" style="background-color:#F5DD06" <?php 
                foreach($data["display"]["Color"] as $value){
                    if($value['Color'] === "#F5DD06"){
                        echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                    } 
                } ?> name="Color[]">

                <input type="checkbox" style="background-color:#F57906" <?php 
                foreach($data["display"]["Color"] as $value){
                    if($value['Color'] === "#F57906"){
                        echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                    } 
                } ?> name="Color[]">

                <input type="checkbox" style="background-color:#06CAF5" <?php 
                foreach($data["display"]["Color"] as $value){
                    if($value['Color'] === "#06CAF5"){
                         echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                      } 
                    } ?> name="Color[]">

                <input type="checkbox" style="background-color:#06CAF5" <?php 
                foreach($data["display"]["Color"] as $value){
                    if($value['Color'] === "#06CAF5"){
                         echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                      } 
                    } ?> name="Color[]">
            <input type="checkbox" style="background-color:#7D06F5" <?php 
            foreach($data["display"]["Color"] as $value){
                if($value['Color'] === "#7D06F5"){
                     echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                      } 
                    } ?> name="Color[]">  <input type="checkbox" style="background-color:#F506A4" <?php 
                foreach($data["display"]["Color"] as $value){
                    if($value['Color'] === "#F506A4"){
                         echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                      } 
                    } ?> name="Color[]">

                <input type="checkbox" style="background-color:#FFFFFF" <?php 
                foreach($data["display"]["Color"] as $value){
                    if($value['Color'] === "#FFFFFF"){
                         echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                      } 
                    } ?> name="Color[]">
                    <input type="checkbox" style="background-color:#000000" <?php 
                    foreach($data["display"]["Color"] as $value){
                        if($value['Color'] === "#000000"){
                             echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                      } 
                    } ?> name="Color[]"> 

                    <input type="checkbox" style="background: #a7a7a7;" <?php 
                    foreach($data["display"]["Color"] as $value){
                        if($value['Color'] === " #a7a7a7;"){
                             echo "checked value='" . $value['IdColor'] . ":" . $value['Color'] . "'";
                      } 
                    } ?> name="Color[]">

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
                            foreach($data["display"]["Size"] as $value){
                                if($value['Size'] === "S"){
                                    echo "checked id='S' value='" . $value['IdSize'] . ":" . $value['Size'] . "'";
                                }
                                
                            }
                        ?>
                        >
                    </label>
                    <label for="M">M
                        <input type="checkbox" name="Size[]"
                        <?php 
                            foreach($data["display"]["Size"] as $value){
                                if($value['Size'] === "M"){
                                    echo "checked id='M' value='" . $value['IdSize'] . ":" . $value['Size'] . "'";
                                }
                                
                            }
                        ?>
                        >
                    </label>
                    <label for="L">L
                        <input type="checkbox" name="Size[]"
                        <?php 
                            foreach($data["display"]["Size"] as $value){
                                if($value['Size'] === "L"){
                                    echo "checked id='L' value='" . $value['IdSize'] . ":" . $value['Size'] . "'";
                                }
                                
                            }
                        ?>
                        >
                    </label>
                    <label for="XXL">XXL
                        <input type="checkbox" name="Size[]"
                        <?php 
                            foreach($data["display"]["Size"] as $value){
                                if($value['Size'] === "XXL"){
                                    echo "checked id='XXL' value='" . $value['IdSize'] . ":" . $value['Size'] . "'";
                                }
                                
                            }
                        ?>
                        >
                    </label>
                    <label for="XXXL">XXXL
                        <input type="checkbox" name="Size[]"
                        <?php 
                            foreach($data["display"]["Size"] as $value){
                                if($value['Size'] === "XXXL"){
                                    echo "checked id='XXXL' value='" . $value['IdSize'] . ":" . $value['Size'] . "'";
                                }
                                
                            }
                        ?>
                        >
                    </label>
                </article>
                <label for="Image">Image</label>
                <input   type="file" name="Image" id="Image">
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