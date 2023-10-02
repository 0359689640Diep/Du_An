<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 
<link rel="stylesheet" href="../assets/css/signInUser.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
        <section class="Notification" id="Notification"> </section>
        <section class="left">
            <article class="Wellcome">
            <h1>Create  Account </h1>
            </article>
            <article class="icont">
                <img src="../assets/img/traidat.png" alt="icont">
                <img src="../assets/img/phihanhgia.png" alt="icont">
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
                    <form action="index.php?controller=ConfirmAccound" method="post">
                        <input type="text" placeholder="Enter the confirmation code from your gmail" name ="codeEmail"  id ="codeEmail"  >
                        <button  type="submit" name="submit" >Confirm</button>
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
<script src="../assets/js/SignInUser.js" ></script>

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
            duration= 5000,
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
              duration= 5000,
              quantity = '0'
          )
            </script>";        
        }
        header("location:index.php?controller=login");
      }
    

}
 ?>
</html>