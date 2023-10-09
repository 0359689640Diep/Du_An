<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 
<link rel="stylesheet" href="../assets/css/signIn.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
        <?php include "masterLayout/Notification.php" ?>
        <section class="left">
            <article class="Wellcome">
            <h1>Create  Account </h1>
            </article>
            <article class="icont">
                <img src="../assets/img/background_login_SignIn.png" alt="icont">
            </article>
        </section>
        <section class="right">
            <section class="contentRight">
                <header>
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
                    <form action="index.php?controller=SignIn" method="post">
                        <input type="text" placeholder="Full Name " name ="FullName" required title="Không được để trống">
                        <input type="text" placeholder="Gmail" name ="Gmail" required title="Không được để trống">
                        <input type="number" placeholder="Phone" name ="Phone" required title="Không được để trống">
                        <input type="text" placeholder="Address" name ="Address" required title="Không được để trống">
                        <input type="password" placeholder="Password" name ="Password" required title="Không được để trống">
                        <input type="password" placeholder="Confirmation Password" name ="ConfirmationPassword" required title="Không được để trống">
                        <select name="Permission" id="Permission" required title="Không được để trống" >
                            <option value="">Permission</option>
                            <option value="0">Admin</option>
                            <option value="1">User</option>
                        </select>                        
                        <button  type="submit" name="submit" >Create  Account</button>
               
                    </form>
                </main>
                <footer>
                    <h3>
                    Already have an account ? 
                        <a href="index.php?controller=login">Login</a>
                    </h3>
                </footer>
            </section>
        </section>
    </section>
</body>
<script src="../assets/js/SignIn.js" ></script>

<?php 
if(!empty($data)){
    foreach ($data as $item) {
        if (isset($item['error'])) {
        $sumData = count($data);
          $error = $item['error'];
          echo "<script>
          toast(
            title= 'Error',
            message= '$error',
            type= 'error',
            duration= 10000,
            quantity = '$sumData'
        )
          </script>";
        }else{
            $success = $item['success'];
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
      }
    

}
 ?>
</html>