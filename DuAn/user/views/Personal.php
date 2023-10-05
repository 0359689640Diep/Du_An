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
                    <form action="index.php?controller=Personal&action=UpdateAccount&id=<?= $_GET['id']?>" method="post">
                        <section class="fromLeft">
                            <h4>User name:  <?= $data["showAccount"]["Name"]?></h4>
                            <input required title="Cannot be left blank" type="text" name="name" >
                            <h4>Email: <?= $data["showAccount"]["Gmail"]?></h4>
                            <input required title="Cannot be left blank" type="email" name="email" id="">
                            <h4>Phone number: <?= $data["showAccount"]["Phone"]?></h4>
                            <input required title="Cannot be left blank" type="number" name="phone" id="">
                            <h4>Sex: <?= $data["showAccount"]["Sex"]?></h4>
                            <article class="sex">
                                <label  for="male">Male</label>
                                <input required title="Cannot be left blank" type="radio" name="sex" id="male">
                                <label for="female">Female</label>
                                <input type="radio" name="sex" id="female">
                                <label for="other">Other</label>
                                <input type="radio" name="sex" id="other">
                            </article>
                            <h4>Address: <?= $data["showAccount"]["Address"]?></h4>
                            <input required title="Cannot be left blank" type="text" name="address" id="">
                            <button type="submit">Save</button>
                        </section>
                        
                        <section class="fromRight">
                            <article class="ContentFromRight">
                                <img src="../assets/img/<?= $data["showAccount"]["Image"]?>" alt="image">
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
</html>