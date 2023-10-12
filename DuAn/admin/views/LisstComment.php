<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="../assets/css/LisstComment.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>
<aside>
    <?php require_once "masterLayout/navigation.php"?>
</aside>

<?php require_once "masterLayout/Notification.php"?>
        <main>
            <table>
                <tr>
                    <th>Name Products</th>
                    <th>Image Product</th>
                    <th>Customer name</th>
                    <th>Gmail</th>
                    <th>Comment</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
                <?php 
                if(!empty($data['lisstComment'])){
                    foreach($data['lisstComment'] as $value){
                        $Status = $value['Status'] == '1' ? "Deleted" : "Showing";
                        echo "
                        <tr>
                            <td>{$value['NameProducts']}</td>
                            <td><img src='../assets/imgUpload/{$value['Image']}' alt='product'></td>
                            <td>{$value['Name']}</td>
                            <td>{$value['Gmail']}</td>
                            <td>{$value['Content']}</td>
                            <td>{$Status}</td>
                            <td>{$value['Date']}</td>
                            <td><button>
                                <a href='index.php?controller=LisstComment&action=Delete&id={$value['IdComment']}'>Delete</a>
                            </button></td>
                            <td><button>
                                <a href='index.php?controller=LisstComment&action=Restore&id={$value['IdComment']}'>Restore</a>
                            </button></td>
                        </tr>
                    ";
                    

                    }
                
                }else{
                    echo "<script> alert('No data displayed, please update the data'); </script>";

                }
            ?>

            </table>
        </main>
    </section>
</body>
<script src="../assets/js/LisstComment.js"></script>
<?php 
if(isset($data['message'])){
    echo $data['message'] ;
    if ($data['message'] === 'Failure') {
      $error = $data['message'];
      echo "<script>
      toast(
        title= 'Error',
        message= '$error',
        type= 'error',
        duration= 10000,'
    )
      </script>";
    }else{
        $success = $data['message'];
        echo "<script>
        toast(
          title= 'Success',
          message= '$success',
          type= 'success',
          duration= 10000,
      )
        </script>";        
        // header("location:index.php?controller=Oder");
    }
    

}
?>
</html>