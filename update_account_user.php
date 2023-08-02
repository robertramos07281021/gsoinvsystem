<?php include('server.php'); ?>
<?php include('errors.php');  ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <style>
        .welcomePageBg{
            background-image: url('./image/welcomeBg.jpg');
        }

        #logoutModal{
    display: none;
        }   
        #logOutButtonYes{
            box-shadow: 2px 2px 0px 0px #000000;
        }
        #logOutButtonNo{
            box-shadow: 2px 2px 0px 0px #000000;
        }
        #logOutButtonYes:hover{
            box-shadow:2px 2px 0px 0px #66cc00;
}
#logOutButtonNo:hover{
            box-shadow:2px 2px 0px 0px #ff4d4d; 
    }
    </style>


    <title>GSO Invsys Sample</title>
</head>
<body class=" text-black w-full h-screen grid grid-cols-5">
   


<nav class=" p-6 fixed h-full w-[20%]">
        <div class="drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] h-full w-full rounded-xl bg-white p-8 text-center flex flex-col">
            <a href="index.php" class="text-2xl font-bold"><span class="text-[red]">GSO</span> InvSystem</a>
            <hr class="mt-5 border border-black">
            <div class="text-start w-full mt-10">
                <ul>
                <a aria-current="page" href="index_user.php">
                        <li class="mb-2 w-full hover:bg-red-300/20 p-3 rounded-md font-semibold flex gap-1 "><img src="./image/dashboard.png" class="rounded w-6 h-6">Dashboard</li>
                    </a>
                    <a href="#">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center"><img src="./image/users.png" class="bg-white p-1 rounded w-6 h-6">Users</li>
                    </a>

                    <a href="#">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center"><img src="./image/department.png"  class="bg-white p-1 rounded w-6 h-6">Departments</li>
                    </a>
                    

                    <a href="#">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center"><img src="./image/packaging.png"  class="bg-white p-1 rounded w-6 h-6">Items</li>
                    </a>

                    <a href="#">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center"><img src="./image/report.png"  class="bg-white p-1 rounded w-6 h-6">Reports</li>   
                    </a>

                    <a href="update_account_user.php">
                        <li class="mb-2 w-full p-3 bg-red-300/20 rounded-md font-bold flex gap-1 items-center"><img src="./image/user.png"  class="bg-white p-1 rounded w-6 h-6">My Profile</li>
                    </a>
                </ul>  
            </div>
            <div class="flex  h-full w-full items-end">
                <button onclick="logoutModal()" class="font-semibold hover:font-bold w-full justify-end items-center  py-2 pl-2 flex rounded-md hover:bg-red-300/20 hover:pr-2"><img src="./image/icons8-logout-64.png" alt="logut" width="20" height="20"><p class="flex items-center">Log Out</p></button>
            </div>
        </div>
    </nav>

    <div class=" absolute top-0 left-0 -z-10 h-80 w-full welcomePageBg">
    </div>

    <?php
        //connect to db and display account details
        $user = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE user_id = '$user'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>


    <article class="col-span-4 py-6 pr-6 w-full h-full col-start-2 ">
        <div class="flex justify-end text-white">
            <p class="font-semibold"> Welcome &nbsp; <span class="font-bold text-xl" ><?php echo ucfirst($row['firstname']) ." ".ucfirst ($row['lastname']);?></span></p>
        </div>
    
      
        <div class=" grid grid-flow-row-dense grid-cols-3 grid-rows-5 gap-6 h-full pb-6">
            <div class="bg-white row-start-2 row-span-4 col-span-2 col-start-1 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] rounded-xl static">
              
                <img src="https://media.gettyimages.com/id/1180926773/photo/studio-waist-up-portrait-of-a-beautiful-businesswoman-with-crossed-arms.jpg?s=612x612&w=gi&k=20&c=BlCz_Y26FpXviP-1E7P9uISFsbO-W9ducNo0gJ8r9jM="  class="border-4 border White h-36 w-36 rounded-full absolute -top-16 left-5 ">

                
                <div class=" grid grid-flow-row-dense grid-cols-4 grid-rows-5  h-full">
                    <div class="col-start-2 col-span-3 pt-5 pr-5">
                        <p class="text-4xl"><?php echo ucfirst($row['firstname']). " " .ucfirst($row['lastname'])?></p>
                        <hr class="border-2 border-[black]/60">
                    </div>
                    <div class="row-start-2 col-span-5 row-span-4">
                        <!-- php code  -->
                        <?php
                            $errors = array();
                            //update user Account
                            if(isset($_POST['post_update'])){
                            
                                $u_id = $_SESSION['user_id'];
                                $firstname = mysqli_real_escape_string($db, $_POST['firstName']);
                                $lastname = mysqli_real_escape_string($db, $_POST['lastName']);
                                $email = mysqli_real_escape_string($db, $_POST['email']);
                                $address = mysqli_real_escape_string($db, $_POST['address']);
                                $phone = mysqli_real_escape_string($db, $_POST['mobileNum']);
                                $username = mysqli_real_escape_string($db, $_POST['userName']);
                                $pass1 = mysqli_real_escape_string($db, $_POST['up_pass1']);
                                // $pass2 = mysqli_real_escape_string($db, $_POST['up_pass2']);
                                
                                $pass_enc = md5($pass1);
                            //check password is match
                                $sql_pass = "SELECT * FROM users WHERE user_id='$u_id' ";

                                if(count($errors) === 0){

                                        if($pass_enc === $row['password']){

                                    $sql= "UPDATE users SET firstname='$firstname',lastname='$lastname',
                                    email='$email', phone_num='$phone', u_address='$address', username='$username' WHERE user_id='$u_id' ";

                                    mysqli_query($db, $sql);  //update to database
                        ?>
                                        <script>
                                                swal({title: "Success!", text: "Your Account has been updated.", type:"success"})
                                                .then(function(){ 
                                                    location.href="update_account_user.php";
                                                });
                                        </script>
                                        <?php

                                            }else {
                                                ?>

                                        <script>
                                                swal({title: "Sorry!", text: "Your current password is invalid. Try again.", type:"error", icon: "error"})
                                                // .then(function(){ 
                                                //     location.href="update_account.php";
                                                // });
                                        </script>


                                                <?php

                                            }
                                }
                            }
                        ?>


                        <form class="h-full w-full grid grid-row-6 px-5 pt-5 " method="POST">
                            <div class="row-span-5">
                                <div class="grid grid-cols-2 gap-5 ">
                                    <div>
                                        <label for="firstName">Firstname: </label>
                                        <input type="text" name="firstName" id="firstName" class="border w-full pl-2" max="50" value="<?php 
                                        if(isset($_POST['post_update'])){
                                            echo $_POST['firstName'];
                                        }else{ echo ucfirst($row['firstname']); } ?>" required disabled>
                                    </div>
                                    <div>
                                        <label for="lastName">Lastname: </label>
                                        <input type="text" name="lastName" id="lastName" class="border w-full pl-2" max="50" value="<?php 
                                        if(isset($_POST['post_update'])){

                                            echo $_POST['lastName'];
                                        }else{
                                            echo ucfirst($row['lastname']); } ?>" required disabled>
                                    </div>
                                </div>
                        
                                <div class="grid grid-cols-2 gap-5 pt-3">
                                    <div>
                                        <label for="email">Email address:</label>
                                        <input type="text" name="email" id="email" class="border w-full pl-2" value="<?php 
                                        if(isset($_POST['post_update'])){

                                            echo $_POST['email'];
                                        }else{
                                            echo $row['email']; } ?>" required disabled>
                                    </div>
                                    <div>
                                        <label for="mobileNum">Phone Number:</label>
                                        <input type="number" name="mobileNum" id="mobileNum" class="border w-full pl-2"   value="<?php 
                                        if(isset($_POST['post_update'])){

                                        echo $_POST['mobileNum'];
                                    }else{
                                        echo $row['phone_num']; } ?>" required disabled>
                                </div>
                            </div>
                            <div class="pt-3">
                                <label for="address">Address:</label>
                                <input type="text" name="address" id="address" class="w-full border pl-2" max="30" value="<?php 
                                if(isset($_POST['post_update'])){
                                    echo $_POST['address'];
                                }else{ echo $row['u_address']; } ?>" required disabled>
                            </div>
                            <div class="grid grid-cols-2 gap-5 pt-3">
                                <div>
                                    <label for="userName">Username:</label>
                                    <input type="text" name="userName" id="userName" class="border w-full pl-2" value="<?php 
                                    if(isset($_POST['post_update'])){
                                        echo $_POST['userName'];
                                    }else{
                                         echo $row['username']; }?>" required disabled>
                                </div>
                                <div>
                                    <label for="role">Role:</label>
                                    <input type="text" name="role" id="role" class="border w-full pl-2" value="<?php echo $row['role']?>" disabled>
                                </div>
                            </div>
                            <div class="pt-3">
                                <label for="department">Department:</label>
                                <!-- <input type="text" name="department" id="department" class="border w-full pl-2" value="#" disabled> -->
                                <select name="department" id="department" class="border w-full pl-2" disabled>
                                        <?php  
                                            $dp_query = "SELECT * FROM department";
                                            $res_q = mysqli_query($db,$dp_query);
                                            while($deprow = mysqli_fetch_assoc($res_q)){
                                                ?>

                                            <option value="<?php echo $deprow['dep_name']; ?>" >
                                            <?php echo $deprow['dep_name']; ?>  </option>
                                                <?php

                                            }

                                        ?>
                                </select>
                            </div>

                            <div class=" flex grid grid-cols-2 gap-5 pt-3 border w-full " id="changePass"  style="display:none;">
                                <div class=" w-full">
                                    <label for="up_pass1">To save changes, confirm current Password:</label>
                                    
                                    <input type="password" name="up_pass1" id="up_pass1"  class="border w-full pl-2" placeholder="Password" required>
                                </div>
                                <!-- <div class=" w-full">
                                    <label for="up_pass2">Confirm Password:</label>
                                    <input type="password" name="up_pass2" class="border w-full pl-2" placeholder="Confirm Password" id="passw2" required>
                                </div> -->
                            </div>
                           
                            
                            <div class="pt-5">
                                <div class="flex justify-end gap-5 " id="saveForm" >
                                    <button class="border px-5 py-1" type="submit" name="post_update" style="background-color: green; color: white;">Save</button>
                                    <div class=" border px-4 py-1 cursor-pointer" onclick="cancelButton()" style="background-color: red; color: white;">
                                        Cancel
                                    </div>
                                </div>

                                <div class="flex justify-end" id="editButton">
                                    <div class="border px-5 py-1" onclick="editForm()"  style="cursor:pointer;" style="background-color: #808080; color: white;">Edit</div>
                                </div>
                            </div>
                        </form><br>
                        
                    <h3 >Change password? </h3>

                    <br>

                    <form method="POST"> 
                    <label>New Password: </label><br>
                    <input type="password" name="change1" class="border w-full pl-2" placeholder="Password" required>
                    <br>
                    <label>Confirm Password: </label> <br>
                    <input type="password" name="change2" class="border w-full pl-2" placeholder="Password" required>
                    <br>
                    <button type="submit" name="change_pass" class="border px-5 py-1" style="background-color: green; color: white;"> Save </button>
                    </form>

                    </div> 
                </div>
                
                   <?php

                        //update Password
                        if(isset($_POST['change_pass'])){
                            $u_id = $_SESSION['user_id'];
                            $change1 = mysqli_real_escape_string($db, $_POST['change1']);
                            $change2 = mysqli_real_escape_string($db, $_POST['change2']);

                            $encPass = md5($change1);

                            if($change1 !== $change2){
                                ?>
                                <script>
                                                swal({title: "Your password does not match!", text: "Try again.", type:"error", icon: "error"})
                                                // .then(function(){ 
                                                //     location.href="update_account.php";
                                                // });
                                        </script>
                                <?php
                            }else if($change1 === $change2 && $encPass === $row['password']){
                                ?>
                                <script>
                                                swal({title: "Sorry! Password already used.", text: "Please enter a new password.", type:"error", icon: "error"})
                                                // .then(function(){ 
                                                //     location.href="update_account.php";
                                                // });
                                        </script>
                                <?php
                               
                            }else if($change1 === $change2 && $encPass !== $row['password']){

                                $sql= "UPDATE users SET password='$encPass' WHERE user_id='$u_id' ";

                                mysqli_query($db, $sql);  //update to database

                                 ?>
                                    <script>
                                            swal({title: "Success!", text: "You have changed your password.", type:"success"})
                                            .then(function(){ 
                                                location.href="update_account_user.php";
                                            });
                                    </script>
                                    <?php

                            }

                        }

                    ?>


            </div>
            <div class="bg-white drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] border col-start-1 row-start-2 row-span-4 col-start-3 rounded-xl">
                                               

            </div>

        </div>
           
    </article>


    <div class="absolute top-0 left-0 h-full w-full bg-white/30 backdrop-blur-sm" id="logoutModal" >
        <div class="flex w-full h-full justify-center items-center">
            <div class="h-56 w-80 fixed rounded drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]" >
                <div class="bg-white h-full w-full flex flex-col rounded-md">
                    <p class="text-black font-bold pl-2 py-2 self-start border w-full flex "><img src="./image/icons8-logout-64.png" alt="logut" width="20" height="20">Log Out</p>
                    <div class="text-center flex flex-col justify-center border w-full h-full">
                        <p class="font-semibold">Do you want to logout?</p>
                        <div class="flex justify-center gap-10 mt-10">
                            <a href="index.php?logout='1'" class=" font-bold"><button class="p-1  w-20 bg-green-500 rounded text-white border border-green-500 font-semibold transition ease-out duration-300 hover:bg-white hover:text-green-500 hover:border-green-500" id="logOutButtonYes">Yes</button></a>
                            
                            <button class="p-1 w-20 bg-red-500 rounded text-white border border-red-500 font-semibold transition ease-out duration-300 hover:bg-white hover:text-red-500 hover:border-red-500" onclick="noLogout()" id="logOutButtonNo">No</button>
                        </div>    
                    </div>
                </div>
            <div>
        </div>
    </div>


<!-- Script for hidden textbox -->

<script src="./script/jscript.js"></script>


<script>
function editForm(){
    document.getElementById("saveForm").style.display="flex";
    document.querySelector("#changePass").style.display = "flex";
    document.getElementById("editButton").hidden = true;
    document.getElementById("firstName").disabled = false;
    document.getElementById("lastName").disabled = false;
    document.getElementById("email").disabled = false;
    document.getElementById("mobileNum").disabled = false;
    document.getElementById("address").disabled = false;
    document.getElementById("userName").disabled = false;
    document.getElementById("role").disabled = true;
    document.getElementById("department").disabled = false;
   
}


function cancelButton(){
    document.getElementById("saveForm").style.display="none";   
    document.getElementById("changePass").style.display="none";   
    document.getElementById("editButton").hidden = false;
    document.getElementById("firstName").disabled = true;
    document.getElementById("lastName").disabled = true;
    document.getElementById("email").disabled = true;
    document.getElementById("mobileNum").disabled = true;
    document.getElementById("address").disabled = true;
    document.getElementById("userName").disabled = true;
    document.getElementById("role").disabled = true;
    document.getElementById("department").disabled = true;
 }


 function noLogout() {
    document.getElementById("logoutModal").style.display="none";
}

 function logoutModal() {
    document.getElementById("logoutModal").style.display="block";
}



</script>

</body>
</html>