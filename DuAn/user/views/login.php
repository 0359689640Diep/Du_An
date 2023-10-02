
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/loginUser.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
    <section class="Notification" id="Notification"> </section>
        <section class="left">
            <article class="Wellcome">
                <h1>Welcome nice to meet you</h1>
            </article>
            <article class="icont">
                <img src="../assets/img/traidat.png" alt="icont">
                <img src="../assets/img/phihanhgia.png" alt="icont">
            </article>
        </section>
        <section class="right">
            <section class="contentRight">
                <header>
                    <h1>Log in to your account</h1>
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
                    <form action="index.php?controller=login&action=login" method="post">
                        <input type="email" required title="Không được để trống" placeholder="Gmail" name ="Gmail">
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
<script src="../assets/js/login.js" ></script>
<?php 
if(!empty($data)){
    foreach ($data as $item) {
        if (isset($item['messageError'])) {
        $sumData = count($data);
          $error = $item['messageError'];
          echo "<script>
          toast(
            title= 'Error',
            message= '$error',
            type= 'error',
            duration= 500000,
            
        )
          </script>";
        }else{
            if(!empty($item['message0'])){
                $success = $item['message0'];
                echo "<script>
                toast(
                  title= 'Success',
                  message= '$success',
                  type= 'success',
                  duration= 5000, 
              )
                </script>";         
                header("location:index.php?controller=homeAdmin");
            }elseif(!empty($item['message1'])){
                $success = $item['message1'];
                echo "<script>
                toast(
                  title= 'Success',
                  message= '$success',
                  type= 'success',
                  duration= 5000, 
              )
                </script>";         
                header("location:index.php?controller=Home");

            }else{
                $success = $item['message0'];
                echo "<script>
                toast(
                  title= 'Success',
                  message= 'Error 404',
                  type= 'success',
                  duration= 5000, 
              )
                </script>";  
            }
        }
      }
    

}
?>
</html>