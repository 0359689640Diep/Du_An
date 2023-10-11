
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../assets/css/ForgotPassword.css">
<link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
<body>
    <section class="page">
    <?php include "masterLayout/Notification.php" ?>
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
                    <h1>Recover your account</h1>
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
                <main id="form">
                    <!--  -->
                    <form action="index.php?controller=ForgotPassword&action=SendGmail" method="post" >
                        <input type="email" required title="Không được để trống" placeholder="Gmail" name ="Gmail">
                        <button type="submit" name="submit" >Verify account</button>
                    </form>
                </main>
                <footer>
                    <h3>
                    Already have an account ? 
                        <a href="index.php?controller=login">Login </a>
                    </h3>
                </footer>
            </section>
        </section>
    </section>
</body>
<?php 
// echo "<pre>";
// var_dump($data["Gmail"]);
if( !empty($data["message"])){
    echo "
    <script>
            const main = document.getElementById('form');
    
            while(main.firstChild){
                main.removeChild(main.firstChild);
            }
            
            let inputCodeEmail = document.createElement('input');
            inputCodeEmail.type = 'text';
            inputCodeEmail.name = 'codeGmail';
            inputCodeEmail.required = true;
            inputCodeEmail.title = 'Không được để trống';
            inputCodeEmail.placeholder = 'Enter the code sent to your gmail';
    
            let inputPassword = document.createElement('input');
            inputPassword.type = 'password';
            inputPassword.name = 'Password';
            inputPassword.required = true;
            inputPassword.title = 'Không được để trống';
            inputPassword.placeholder = 'Enter password';
            
            let ConfirmationPassword= document.createElement('input');
            ConfirmationPassword.type = 'password';
            ConfirmationPassword.name = 'ConfirmationPassword';
            ConfirmationPassword.required = true;
            ConfirmationPassword.title = 'Không được để trống';
            ConfirmationPassword.placeholder = 'Confirmation password';
            
            let button = document.createElement('button');
            button.innerText = 'Update your password';
            button.type = 'submit';
            button.name = 'submit';
            
            let form = document.createElement('form');
            form.action = 'index.php?controller=ForgotPassword&action=updatePassword';
            form.method = 'post';
    
            // thêm các thẻ vào form
            form.appendChild(inputCodeEmail);
           form.appendChild( inputPassword);
           form.appendChild( ConfirmationPassword);
            form.appendChild(button);
            // thêm thẻ form vào thẻ cha
            main.appendChild(form);
    
            
        
    </script>
    
    ";
    if($data["message"] === 'Update successful'){
        $success = $data["message"];
        echo "<script>
        toast(
        title= 'Success',
        message= '$success',
        type= 'success',
        duration= 5000,
        
    )
        </script>";

    }
}else{
    if(isset($data['error'])){
        $error = $data['error'];
        echo "<script>
        toast(
        title= 'Error',
        message= '$error',
        type= 'error',
        duration= 5000,
        
    )
        </script>";

    }
}



?>
</html>