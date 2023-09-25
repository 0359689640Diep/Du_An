<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link rel="stylesheet" href="../assets/css/FixAccount.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
<?php require_once "masterLayout/header.php"?>

        <aside>
        <?php require_once "masterLayout/navigation.php"?>
        </aside>
        <main>
            <form action="index.php?controller=FixAccount" method="post" enctype="multipart/form-data">
                <label for="Gmail">	Gmail</label>
                <input value="<?php echo $data['display']['display']["Gmail"]; ?>"  type="text" name="Gmail" id="Gmail">

                <label for="Password">Password</label>
                <input value="<?php echo $data['display']['display']["Password"];?>" type="password" name="Password" id="Password">

                <label for="Name">Name</label>
                <input value="<?php echo $data['display']['display']["Name"]; ?>"  type="text" name="Name" id="Name">

                <label for="Phone">Phone</label>
                <input value="<?php echo $data['display']['display']["Phone"]; ?>"  type="number" name="Phone" id="Phone" min =0>

                <label for="Permission">Permission</label>
                <select name="Permission" id="Permission"  >
                <option value="<?php echo $data['display']['display']['Permission']; ?>">
                    <?php echo ($data['display']['display']['Permission'] == 1) ? "User" : "Admin"; ?>
                </option>
                <option value="0">Admin</option>
                    <option value="1">User</option>
                </select>

                <label for="Address">Address</label>
                <input value="<?php echo $data['display']['display']["Address"]; ?>"  type="text"   name="Address" id="Address">

                <label for="Image">Image</label>
                <input   type="file" name="Image" id="Image">
                
                <button type="submit">Add Account</button>
            </form>
        </main>
    </section>
</body>
<?php 
if(!empty($data['dataMessage'][0]) ){
    $message = $data['dataMessage'][0];
    setcookie('IdAccount', '', time() - 100000, '/');
    header("location:index.php?controller=LisstAccount");
}

 ?>
<script src="../assets/js/product.js"></script>

</html>