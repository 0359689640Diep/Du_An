<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/signIn.css">
<body>
    <section class="page">
        <section class="left">
            <article class="Wellcome">
                <h1>Wellcome</h1>
            </article>
            <article class="icont">
                <img src="../assets/img/traidat.png" alt="icont">
                <img src="../assets/img/phihanhgia.png" alt="icont">
            </article>
        </section>
        <section class="right">
            <section class="contentRight">
                <header>
                    <h1>Create  Account </h1>
                    <button>
                        <img src="../assets/img/Googlelogo.png" alt="Google">
                        <h5>Sign up with Google</h5>
                    </button>
                    <button>
                        <img src="../assets/img/facebool.png" alt="Facebook">
                        <h5>Sign up with Facebook</h5>
                    </button>
                </header>
                <article class="or">
                    <h1>--OR--</h1>
                </article>
                <main>
                    <form action="" method="post">
                        <input type="text" placeholder="Full Name " name ="FullName">
                        <input type="text" placeholder="Gmail" name ="Gmail">
                        <input type="password" placeholder="Password" name ="Password">
                        <input type="text" placeholder="Confirmation password " name ="ConfirmationPassword ">
                        <select name="Permission" id="Permission" required title="Không được để trống" >
                            <option value="">Permission</option>
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                        </select>                        
                        <button type="submit" name="submit" >Create  Account</button>
                        <span id="messageError" style="color:red;"></span>
                        
                    </form>
                </main>
                <footer>
                    <h3>
                    Already have an account ? 
                        <a href="">Login</a>
                    </h3>
                </footer>
            </section>
        </section>
    </section>
</body>
</html>