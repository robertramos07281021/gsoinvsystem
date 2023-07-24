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
<body class="w-screen h-screen bg-red-500/90 p-12">

    <div class="grid grid-cols-2 h-full drop-shadow-[0_0px_10px_rgba(0,0,0,0.5)]">
        <div class=" h-full w-full registerRight rounded-l-[20px]">

        </div>
        <div class=" border w-full px-28 py-5 h-full  rounded-r-[20px]" id="registerForm">
            <div class=" h-full rounded-[10px] border-4 border-double p-3 border-red-500 bg-white" >
                <div class="header flex justify-center">
                    <div>
                        <p class="text-xl font-semibold">Create Account</p>
                        <?php if(count($errors) > 0):?>
                            <p class="text-xs text-center text-red-500">All fields are required</p>
                        <?php endif ?>
                    </div>
                </div>
                <form method="POST" action="create_account.php"  class="w-full " novalidate>
                   
                    <div class="w-full grid grid-cols-2 gap-2">
                        <div class="">
                            <label class="text-sm" for="firstname">First Name:</label>
                            <input type="text" name="firstname" id="firstname" onchange="accountGenerate()" value="<?php if(isset($_POST['submit'])){ echo $firstname; } else { echo "";} ?>"  required class="w-full border pl-1 <?php 
                            if(isset($_POST['submit'])) {
                                if(strlen(trim($firstname))==0 || empty($firstname)) { 
                                    echo "border-red-500 "; 
                                } else {
                                    echo "border-[green] border-2";
                                }
                            } ?>">
                        </div>
                        <div>
                            <label class="text-sm" for="lastname">Last Name:</label>
                            <input type="text" name="lastname" id="lastname" onchange="accountGenerate()" value="<?php if(isset($_POST['submit'])){ echo $lastname; } else { echo "";} ?>" required class="w-full border pl-1 <?php 
                            if(isset($_POST['submit'])) {
                                if(strlen(trim($lastname))==0 || empty($lastname)) { 
                                    echo "required:border-red-500"; 
                                } else {
                                    echo "border-[green] border-2";
                                }
                            } ?>">
                        </div>

                    </div>    
                    <div>
                        <label class="text-sm" for="email">Email:</label>
                        <input type="email" name="email" value="<?php if(isset($_POST['submit'])){ echo $email; } else { echo "";} ?>" required class=" w-full border pl-1 <?php 
                            if(isset($_POST['submit'])) {
                                if(strlen(trim($email))==0 || empty($email)) { 
                                    echo "required:border-red-500"; 
                                } else {
                                    echo "border-[green] border-2";
                                }
                            } ?>">
                    </div>
                    <div>
                        <label class="text-sm" for="phone">Contact number:</label>
                        <input id="mobileNum" type="number" name="phone" value="<?php if(isset($_POST['submit'])){ echo $phone; } else { echo "";} ?>" required class="w-full border pl-1 <?php 
                            if(isset($_POST['submit'])) {
                                if(strlen(trim($phone))==0 || empty($phone)) { 
                                    echo "required:border-red-500"; 
                                } else {
                                    echo "border-[green] border-2";
                                }
                            } ?>" >
                    </div>
                    <div>
                        <label for="address" class="text-sm">Address:</label>
                        <input type="text" name="address" value="<?php if(isset($_POST['submit'])){ echo $address; } else { echo "";} ?>" required class="w-full border pl-1 <?php 
                            if(isset($_POST['submit'])) {
                                if(strlen(trim($address))== 0 || empty($address)) { 
                                    echo "required:border-red-500"; 
                                } else {
                                    echo "border-[green] border-2";
                                }
                            } ?>">
                    </div>
                
                    <div>   
                        <label for="department" class="text-sm">Department:</label>
                        <select name="department" id="department" value="<?php if(isset($_POST['submit'])){ echo $department; } else { echo $department=""; }?>" class="w-full border pl-1 <?php 
                            if(isset($_POST['submit'])) {
                                if(trim($errors[array_search("department",$errors)]) == "department" ) {
                                    echo "required:border-red-500";
                                } else {
                                    echo "border-[green] border-2";
                                }
                            }
                            
                        ?>" required>
                                <option value="" <?php if($department == "" ) { echo "selected";}?> >Select Department</option>
                            <?php if(count($deptChoice) > 0 ) {?>
                                <?php foreach($deptChoice as $deptChoices) { ?>
                                <option value="<?php echo $deptChoices ?>" <?php if($department == $deptChoices) { echo "selected";} ?>><?php echo $deptChoices ?></option>
                                <?php } ?>
                            <?php } ?>

                        </select>

                    </div>

                    <div class="mt-5">
                        <div class="flex gap-2">
                            <label for="username" class="text-sm">Preferred Username:</label>
                            <?php 
                            if(isset($_POST['submit'])){
                                $user_query = "SELECT * FROM users WHERE username='$username'";
                                $user_query_run = mysqli_query($db, $user_query);
                                
                                if(mysqli_num_rows($user_query_run) > 0) { 
                               
                            ?>  
                                <p class="text-xs self-center text-red-500">Username is already exist</p>
                            <?php } }?>
                             </div>

                        <input type="text" name="username" id="username" value="<?php if(isset($_POST['submit'])){ echo $username; } else { echo "";}?>" required  class="w-full border pl-1
                        <?php  
                            $user_query = "SELECT * FROM users WHERE username='$username'";
                            $user_query_run = mysqli_query($db, $user_query);
                        
                            if(isset($_POST['submit'])) {
                                if((strlen(trim($username))==0 || empty($username)) || (mysqli_num_rows($user_query_run) > 0)) { 
                                    echo "required:border-red-500"; 
                                } else {
                                    echo "border-[green] border-2";
                                }

                            } 
                        ?>">
                   
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label for="password_1" class="text-sm">Password:</label>
                            <input type="password" name="password_1" value="<?php if(isset($_POST['submit'])){ echo $password1; } else { echo "";} ?>" required  class="w-full border pl-1
                            <?php 
                                if(isset($_POST['submit'])) {
                                    if((strlen(trim($password1))==0 || empty($password1)) || (strlen(trim($password1)) < 8 || strlen(trim($password1)) > 16) ) { 
                                        echo "required:border-red-500"; 
                                    } else if ( strlen(trim($password1)) >= 8 && strlen(trim($password1)) <= 16){
                                        echo "border-[green] border-2";
                                    }
                                } 
                            ?> ">

                            <?php 
                                if(isset($_POST['submit'])) {
                                    if(strlen(trim($password1)) < 8 || strlen(trim($password1)) > 16) { ?>
                                      <p class="text-xs text-red-500">Should be 8-16 characters</p>
                                    <?php }  else {
                                        echo "";
                                    }

                                } 
                            ?>
                        
                        </div>

                        <div>
                            <label for="password_2" class="text-sm">Confirm Password</label>
                            <input type="password" name="password_2" value="<?php if(isset($_POST['submit'])){ echo $password2; } else { echo "";} ?>" required class="w-full border pl-1
                            <?php 
                                if(isset($_POST['submit'])) {
                                    if($password1 !== $password2 || strlen(trim($password2))==0 || empty($password2)) {                                         
                                        echo "required:border-red-500"; 
                                    } else {
                                        echo "border-[green] border-2";
                                    }
                                }
                            ?>">

                            <?php
                                if(isset($_POST['submit'])) {
                                    if($password1 !== $password2) { 
                                        echo    '<p class="text-xs text-red-500">Password does match!</p>';
                                    } else {
                                        echo "";
                                    }
                                }
                            ?>
                            
                        </div>
                    </div>
                    <div class="input-group">
                      
                        <button type="submit" name="submit" class="w-full bg-[red] my-3 p-1 text-white font-semibold" >Register</button>
                    </div>
                    <p>
                    I already have an account. <a href="login.php">Sign-in</a>   
                    </p>

                </form>
            </div>    
        </div>
        

    </div>



<script src="./script/register.js">

</script>



</body>
</html>