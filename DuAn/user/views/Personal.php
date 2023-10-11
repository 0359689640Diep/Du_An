<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/Personal.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
        <section class="contener">
            <?php require "masterLayout/header.php" ?>
            <main>
                <?php require "masterLayout/sidebar.php" ?>
                <section class="contentMain">
                    <section class="headerContentMain">
                        <h1>My profile</h1>
                        <p>Manage profile information for account security</p>
                    </section>
                    <form action="index.php?controller=Personal&action=UpdateAccount" method="post" enctype="multipart/form-data">
                        <section class="fromLeft">
                            <h4>User name:  </h4>
                            <input required value="<?= $data["showAccount"]["Name"]?>" title="Cannot be left blank" type="text" name="name" >

                            <h4>Email: </h4>
                            <input required value="<?= $data["showAccount"]["Gmail"]?>" title="Cannot be left blank" type="email" name="email" id="">

                            <h4>Phone number: </h4>
                            <input required value="<?= $data["showAccount"]["Phone"]?>" title="Cannot be left blank" type="number" name="phone" id="">

                            <h4>Gender: </h4>
                            <article class="sex">
                                <label  for="male">Male</label>
                                <input <?= $data["showAccount"]["Sex"] ==  0 ? 'checked': "" ?> required title="Cannot be left blank" type="radio" value="0" name="sex" id="male">
                                <label value = "" for="female">Female</label>
                                <input <?= $data["showAccount"]["Sex"] ==  1 ? 'checked': "" ?> type="radio" value="1" name="sex" id="female">
                                <label value = "" for="other">Other</label>
                                <input <?= $data["showAccount"]["Sex"] == 2 ? 'checked': "" ?> type="radio" value="2" name="sex" id="other">
                            </article>
                            <h4>Address: </h4>
                            <input value="<?= $data["showAccount"]["Address"]?>" required title="Cannot be left blank" type="text" name="address" id="">
                            <h4>Password: </h4>
                            <input type="password" name="password" id="Password" value="<?= $data["showAccount"]["Password"]?>">
                            <i class="ti-eye" onclick="display('Password')"></i>
                            <button type="submit">Save</button>
                        </section>
                        
                        <section class="fromRight">
                            <article class="ContentFromRight">
                                <img src="../assets/imgUpload/<?= $data["showAccount"]["Image"]?>" alt="image">
                                <input required title="Cannot be left blank" type="file" name="image" value="Select photo" id="">
                            </article>
                        </section>

                    </form>
                </section>
            </main>
            <?php require "masterLayout/footer.php" ?>
        </section>
    </section>
</body>
<script>
function display(id) {
    let inputElement = document.getElementById(id);
    if (inputElement.type === 'password') {
        inputElement.type = 'text'; // Hiển thị văn bản thường
    } else {
        inputElement.type = 'password'; // Hiển thị mật khẩu
    }
}

</script>
</html>