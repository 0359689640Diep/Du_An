
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="assets/css/login.css">
<body>
    <section class="page">
        <section class="left">
            <article class="Wellcome">
                <h1>Welcome nice to meet you</h1>
            </article>
            <article class="icont">
                <img src="assets/img/background_login_SignIn.png" alt="icont">
            </article>
        </section>
        <section class="right">
            <section class="contentRight">
                <header>
                    <h1>Log in to your account</h1>
                    <button>
                        <img src="assets/img/Googlelogo.png" alt="Google">
                        <h5>Sign up with Google</h5>
                    </button>
                    <button>
                        <img src="assets/img/facebool.png" alt="Facebook">
                        <h5>Sign up with Facebook</h5>
                    </button>
                </header>
                <article class="or">
                    <h1>--OR--</h1>
                </article>
                <main>
                    <form action="index.php?controller=login&action=login" method="post">
                        <input type="text" required title="Không được để trống" placeholder="Gmail" name ="Gmail">
                        <input type="password" required title="Không được để trống" placeholder="Password" name ="Password">
                        <span id="messageError" style="color:red;">
                        <?php if(!empty($_SESSION['messageError'])){echo $_SESSION['messageError'];}?>
                        </span>
                        <button type="submit" name="submit" >Log in to your account</button>
                    </form>
                </main>
                <footer>
                    <h3>
                    Already have an account ? 
                        <a href="index.php?controller=SignIn">Sign In</a>
                    </h3>
                </footer>
            </section>
        </section>
    </section>
</body>
</html>