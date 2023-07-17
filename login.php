<?php include('server.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <title>GSO Invsys</title>
</head>
<body>
    <div class="header">
        <h2>Log in</h2>
    </div>

    

    </div>
<?php


    if(isset($_SESSION['register']) && $_SESSION['register'] != ''){
        ?> 
    <script>
      swal("Success!", "You have created an account.", "success");

    </script>

<?php
unset($_SESSION['register']);
    }
?>

    <form method="POST" action="login.php">
             

            

            <div class="input-group">
                <label >Username</label>
                <input type="text" name="log_username" placeholder="Username">
            </div>

            <div class="input-group">
                <label >Password</label>
                <input type="password" name="log_password" placeholder="Password">
            </div>

           

            <div class="input-group">
                 
                <button type="submit" name="login" class="btn">Login</button>
            </div>

        <p>
        I do not have an account. <a href="create_account.php">Sign-up</a>   
        </p>

    </form>





<!--Bootstrap script-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>
</html>