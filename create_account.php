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
        <h2>Create Account</h2>
    </div>



    <form method="POST" action="create_account.php">

        <?php include('errors.php');  ?>   <!--Error Validation-->

        <!-- <div class="success">
    
        </div> -->

            <div class="input-group">
                <label >First Name</label>
                <input type="text" name="firstname" value="<?php if(isset($_POST['submit'])){ echo $firstname; } else { echo "";}  ?>" required>
            </div>

            <div class="input-group">
                <label >Last Name</label>
                <input type="text" name="lastname" value="<?php if(isset($_POST['submit'])){ echo $lastname; } else { echo "";} ?>" required>
            </div>

            <div class="input-group">
                <label >Email</label>
                <input type="email" name="email" value="<?php if(isset($_POST['submit'])){ echo $email; } else { echo "";} ?>" required>
            </div>
            <div class="input-group">
                <label >Contact number</label>
                <input type="number" name="phone" value="<?php if(isset($_POST['submit'])){ echo $phone; } else { echo "";} ?>" required>
            </div>

            <div class="input-group">
                <label for="address">Address</label>
                <input type="text" name="address" value="<?php if(isset($_POST['submit'])){ echo $address; } else { echo "";} ?>" required>
            </div>

            <div class="input-group">
                <label >Department</label>
                <input type="text" name="department" value="<?php if(isset($_POST['submit'])){ echo $department; } else { echo "";} ?>" required>
            </div>

            <div class="input-group">
                <label >Preferred Username</label>
                <input type="text" name="username" value="<?php if(isset($_POST['submit'])){ echo $username; } else { echo "";} ?>" required>
            </div>

            <div class="input-group">
                <label >Password</label>
                <input type="password" name="password_1" value="<?php if(isset($_POST['submit'])){ echo $password1; } else { echo "";} ?>" required>
            </div>

            <div class="input-group">
                <label >Confirm Password</label>
                <input type="password" name="password_2" value="<?php if(isset($_POST['submit'])){ echo $password2; } else { echo "";} ?>" required>
            </div>

            <div class="input-group">
                 
                <button type="submit" name="submit" class="btn">Register</button>
            </div>

        <p>
        I already have an account. <a href="login.php">Sign-in</a>   
        </p>

    </form>





<!--Bootstrap script-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>
</html>