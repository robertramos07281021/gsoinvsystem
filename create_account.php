<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        #registerForm{
            background-image: url("./image/registerbg1.jpg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
    }
    </style>


    <title>GSO Invsys</title>
</head>
<body class="w-screen border-2 border-red-500 h-screen bg-red-500/90 p-12">

    <div class="grid grid-cols-2 h-full drop-shadow-[0_0px_10px_rgba(0,0,0,0.5)]">
        <div class=" h-full w-full registerRight rounded-l-[20px]">

        </div>
        <div class=" border w-full px-28 py-12 h-full  rounded-r-[20px]" id="registerForm">
            <div class=" h-full rounded-[10px] border-4 border-double p-3 border-red-500 bg-white" >
                <div class="header">
                    <h2>Create Account</h2>
                </div>
                <form method="POST" action="create_account.php" class="w-full">
                    <?php include('errors.php');  ?>   <!--Error Validation-->
                    <div class="w-full grid grid-cols-2 gap-2">
                        <div >
                            <label >First Name</label>
                            <input type="text" name="firstname" value="<?php if(isset($_POST['submit'])){ echo $firstname; } else { echo "";}  ?>"  required class="w-full border">
                        </div>
                        <div>
                            <label >Last Name</label>
                            <input type="text" name="lastname" value="<?php if(isset($_POST['submit'])){ echo $lastname; } else { echo "";} ?>" required class="w-full border">
                        </div>
                    </div>    
                    <div>
                        <label >Email</label>
                        <input type="email" name="email" value="<?php if(isset($_POST['submit'])){ echo $email; } else { echo "";} ?>" required class=" w-full border">
                    </div>
                    <div>
                        <label >Contact number</label>
                        <input id="mobileNum" type="number" name="phone" value="<?php if(isset($_POST['submit'])){ echo $phone; } else { echo "";} ?>" required class="w-full border">
                    </div>
                    <div>
                        <label for="address">Address</label>
                        <input type="text" name="address" value="<?php if(isset($_POST['submit'])){ echo $address; } else { echo "";} ?>" required class="w-full border">
                    </div>
                    <div>
                        <label >Department</label>
                        <input type="text" name="department" value="<?php if(isset($_POST['submit'])){ echo $department; } else { echo "";} ?>" required class="w-full border">
                    </div>
                    <div>
                        <label >Preferred Username</label>
                        <input type="text" name="username" value="<?php if(isset($_POST['submit'])){ echo $username; } else { echo "";} ?>" required class="w-full border">
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label >Password</label>
                            <input type="password" name="password_1" value="<?php if(isset($_POST['submit'])){ echo $password1; } else { echo "";} ?>" required class="w-full border">
                        </div>
                        <div>
                            <label >Confirm Password</label>
                            <input type="password" name="password_2" value="<?php if(isset($_POST['submit'])){ echo $password2; } else { echo "";} ?>" required class="w-full border">
                        </div>
                    </div>
                    <div class="input-group">
                        <button type="submit" name="submit" class="w-full bg-[red] my-3 p-1 text-white font-semibold">Register</button>
                    </div>
                    <p>
                    I already have an account. <a href="login.php">Sign-in</a>   
                    </p>

                </form>
            </div>    
        </div>
        

    </div>





</body>
</html>