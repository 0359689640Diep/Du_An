<!DOCTYPE html>
<html lang="en">
<?php include "masterLayout/head.php" ?>
<link rel="stylesheet" href="../assets/css/TrashCan.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
        <?php require_once "masterLayout/header.php" ?>
        <?php require "masterLayout/Notification.php" ?>
        <aside>
            <?php require_once "masterLayout/navigation.php" ?>
        </aside>
        <main>
            <section class="account">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Item type</th>
                    </tr>
                    <?php
                    if(isset($data['Account'])){
                        foreach($data['Account'] as $value){
                            echo "
                            <tr>
                                <td> {$value['Name']} </td>
                                <td>Account</td>
                                <td>
                                    <a href='index.php?controller=TrashCan&action=Delete&Type=account&id={$value['Id']}'><button>Delete</button></a>
                                </td>
                                <td>
                                    <a href='index.php?controller=TrashCan&action=Restore&Type=account&id={$value['Id']}'><button>Restore</button></a>
        
                                </td>
                            </tr>
                            ";
                        }
                    }
                    ?>
                </table>
            </section>
            <section class="category">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Item type</th>
                    </tr>
                    <?php
                    if(isset($data['Category'])){
                        foreach($data['Category'] as $value){
                            echo "
                            <tr>
                                <td> {$value['NameCategory']} </td>
                                <td>Category</td>
                                <td>
                                    <a href='index.php?controller=TrashCan&action=Delete&Type=category&id={$value['IdCategory']}'><button>Delete</button></a>
                                </td>
                                <td>
                                    <a href='index.php?controller=TrashCan&action=Restore&Type=category&id={$value['IdCategory']}'><button>Restore</button></a>
        
                                </td>
                            </tr>
                            ";
                        }
                    }
                    ?>
                </table>
            </section>
            <section class="orderconfirmation">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Item type</th>
                    </tr>
                    <?php
                    if(isset($data['Order'])){
                        foreach($data['Order'] as $value){
                            echo "
                            <tr>
                                <td> {$value['Name']} </td>
                                <td>Order</td>
                                <td>
                                    <a href='index.php?controller=TrashCan&action=Delete&Type=order&id={$value['IdOrder']}'><button>Delete</button></a>
                                </td>
                            </tr>
                            ";
                        }
                    }
                    ?>
                </table>
            </section>
            <section class="product">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Item type</th>
                    </tr>
                    <?php
                    if(isset($data['Product'])){
                        foreach($data['Product'] as $value){
                            echo "
                            <tr>
                                <td> {$value['NameProducts']} </td>
                                <td>Product</td>
                                <td>
                                    <a href='index.php?controller=TrashCan&action=Delete&Type=product&id={$value['IdProduct']}'><button>Delete</button></a>
                                </td>
                                <td>
                                    <a href='index.php?controller=TrashCan&action=Restore&Type=product&id={$value['IdProduct']}'><button>Restore</button></a>
        
                                </td>
                            </tr>
                            ";
                        }
                    }
                    ?>
                </table>
            </section>
        </main>
        
    </section>
</body>
<?php
if(isset($data["message"])){
    $success = $data['message'];
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
if(isset($data["Failure"])){
    $success = $data['Failure'];
            echo "<script>
            toast(
              title= 'Error',
              message= '$success',
              type= 'error',
              duration= 10000,
              quantity = '0'
          )
            </script>";  
}
?>
</html>
