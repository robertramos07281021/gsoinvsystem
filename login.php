<?php include('server.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" type="text/css" href="./css/style2.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->


    <title>GSO Invsys Sample</title>
</head>
<body class="h-screen bg-red-500/90">
   

  

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
<div class="w-full p-12 h-full ">    
    <div class="w-full grid grid-cols-3 loginRight h-full rounded-[20px] drop-shadow-[0_0px_10px_rgba(0,0,0,0.5)]">
        <div class="w-full h-full p-9 ">
            <div class="border w-full h-full bg-white flex justify-center items-center rounded-lg">
                <div class=" w-54">
                    <div class="text-center flex justify-center">
                        <img src="./image/icons8-human-64.png" height="10px" width="50px">
                        <h2 class="text-2xl pl-1 flex items-end">Log in</h2>
                    </div>
                    <form method="POST" action="login.php" class="w-full">
                        <div class=" mb-4 mt-8">
                            <label class="font-bold" >Username</label>
                            <input type="text" name="log_username" placeholder="Username" class="w-full border p-3 mt-2">
                        </div>
                        <div class="mb-4">
                            <label class="font-bold">Password</label>
                            <input type="password" name="log_password" placeholder="Password" class="w-full border p-3 mt-2">
                        </div>
                        <div class="mt-8">
                            
                            <button type="submit" name="login" class="font-bold text-white border px-4 py-1 rounded-lg w-full flex justify-center items-center" id="btnLog">
                                <img src="./image/icons8-login-64.png" class="w-6 h-6">
                                Login
                            </button>
                            <button class="w-full btnRegister px-4 py-1 mt-2 rounded-lg font-bold text-white">
                                <a href="create_account.php">Register</a>
                            </button>
                        </div>
                       
                    </form>
                </div>   
            </div>
        </div>

    </div>
</div>   




</body>
</html>