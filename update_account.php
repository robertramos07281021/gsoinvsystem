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

    </style>


    <title>GSO Invsys Sample</title>
</head>
<body class=" text-black w-full h-screen grid grid-cols-5">
   


<nav class=" p-6 fixed h-full w-[20%]">
        <div class="drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] h-full w-full rounded-xl bg-white p-8 text-center">
            <a href="index.php" class="text-2xl font-bold"><span class="text-[red]">GSO</span> InvSystem</a>
            <hr class="mt-5 border border-black">
            <div class="text-start w-full mt-10">
                <ul>
                    <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">
                      <a  aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">
                        <a href="#">User Management</a>
                    </li>
                    <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">
                        <a href="#">Office</a>
                    </li>
                    <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">
                      <a href="#">Reports</a>
                    </li>   
                    <li class="mb-5 w-full p-3 bg-red-300/20 rounded-md font-bold">
                      <a  href="update_account.php">My Profile</a>
                    </li>
                </ul>  
        
            </div>
        </div>
    </nav>

    <div class=" absolute top-0 left-0 -z-10 h-80 w-full welcomePageBg">
    </div>

    


    <article class="col-span-4 py-6 pr-6 w-full h-full col-start-2 ">
        <div class="flex justify-between text-white">
            <p> Welcome  Admin <strong><?php echo $_SESSION['firstname'] ." ". $_SESSION['lastname'];?></strong></p>
            <button onclick="logoutModal()" class="font-bold"> Logout  </button>
        </div>
    
      
        <div class=" grid grid-flow-row-dense grid-cols-3 grid-rows-5 gap-6 h-full pb-6">
            <div class="bg-white row-start-2 row-span-4 col-span-2 col-start-1 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] rounded-xl static">
              
                <img src="https://media.gettyimages.com/id/1180926773/photo/studio-waist-up-portrait-of-a-beautiful-businesswoman-with-crossed-arms.jpg?s=612x612&w=gi&k=20&c=BlCz_Y26FpXviP-1E7P9uISFsbO-W9ducNo0gJ8r9jM="  class="border-4 border White h-36 w-36 rounded-full absolute -top-16 left-5 ">

                <?php
                    //connect to db and display account details
                    $user = $_SESSION['user_id'];
                    $sql = "SELECT * FROM users WHERE user_id = '$user'";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_assoc($result);
                ?>
                <div class=" grid grid-flow-row-dense grid-cols-4 grid-rows-5  h-full">
                    <div class="col-start-2 col-span-3 pt-5 pr-5">
                        <p class="text-4xl"><?php echo $row['firstname']; echo $row['lastname']?></p>
                        <hr class="border-2 border-[black]/60">
                    </div>
                    <div class="row-start-2 col-span-5 row-span-4">
                        <form class="h-full w-full px-5 pt-5">
                            <div class="grid grid-cols-2 gap-5">
                                <div>
                                    <label for="firstName">Firstname: </label>
                                    <input type="text" name="firstName" class="border w-full pl-2" max="50" value="<?php echo $row['firstname']?>" disabled>
                                </div>
                                <div>
                                    <label for="lastName">Lastname: </label>
                                    <input type="text" name="lastName" class="border w-full pl-2" max="50" value="<?php echo $row['lastname']?>" disabled>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-5 pt-3">
                                <div>
                                    <label for="email">Email address:</label>
                                    <input type="text" name="email" class="border w-full pl-2" value="<?php echo $row['email']?>" disabled>
                                </div>
                                <div>
                                    <label for="mobileNum">Phone Number:</label>
                                    <input type="number" name="mobileNum" class="border w-full pl-2" min="0" max="11" value="<?php echo $row['phone_num']?>" disabled>
                                </div>
                            </div>
                            <div class="pt-3">
                                <label for="address">Address:</label>
                                <input type="text" name="address" class="w-full border pl-2" max="30" value="<?php echo $row['u_address']?>" disabled>
                            </div>
                            <div class="grid grid-cols-2 gap-5 pt-3">
                                <div>
                                    <label for="userName">Username:</label>
                                    <input type="text" name="userName" class="border w-full pl-2" value="<?php echo $row['username']?>" disabled >
                                </div>
                                <div>
                                    <label for="role">Role:</label>
                                    <input type="text" name="role" class="border w-full pl-2" value="<?php echo $row['role']?>" disabled>
                                </div>
                            </div>
                            <div class="pt-3">
                                <label for="role">Department:</label>
                                <input type="text" name="role" class="border w-full pl-2" value="<?php echo $row['department']?>" disabled>
                            </div>
                            <div class="flex justify-center mt-5 gap-10">
                                <button class="border px-5 py-1">Edit</button>
                                <button class="border px-5 py-1">Save</button>
                                
                            </div>
                        </form>
                    </div> 
                </div>
                
                   


            </div>
            <div class="bg-white drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] border col-start-2 row-start-2 row-span-4 col-start-3 rounded-xl">

    <?php
        //connect to db and display account details
        $user = $_SESSION['user_id'];
        $sql = "SELECT * FROM users WHERE user_id = '$user'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>


    <?php echo "Firstname: ". $row['firstname'];?> 
    <!-- Show hidden input textbox for updating -->
    <div id="firstname" style="display:none;"> 
        <form method="POST">
            <input type="text" name="up_firstname" placeholder="First Name" required> 
            <button type="submit" name="post_fname"> Save Changes</button>
        </form>
    </div> 
    <button onclick="showFirstname()">Edit</button>
    <br>

    <?php echo "Lastname: ". $row['lastname'];?>
    <!-- Show hidden input textbox for updating -->
    <div id="lastname" style="display:none;"> 
        <form method="POST"  >
            <input type="text" name="up_lastname" placeholder="Last Name" required> 
            <button type="submit" name="post_lname"> Save Changes</button>
        </form>
    </div> 
    <button onclick="showLastname()">Edit</button>

    <br>
    <?php  echo "Email: ".$row['email']; ?>
    <!-- Show hidden input textbox for updating -->
    <div id="email" style="display:none;"> 
        <form method="POST">
            <input type="email" name="up_email" placeholder="Email" required> 
            <button type="submit" name="post_email"> Save Changes</button>
        </form>
    </div> 
    <button onclick="showEmail()">Edit</button>

    <br>
    <?php echo "Phone Number: ".$row['phone_num']; ?> 
    <!-- Show hidden input textbox for updating -->
    <div id="phone" style="display:none;"> 
        <form method="POST">
            <input type="number" name="up_phone" placeholder="Phone number" required> 
            <button type="submit" name="post_phone"> Save Changes</button>
        </form>
    </div> 
    <button onclick="showPhone()">Edit</button>
    <br>
    <?php  echo "Address: ".$row['u_address']; ?>
    <br>
    <?php  echo "Username: ".$row['username']; ?>
    <br>
    <?php  echo "Role: ".ucfirst($row['role']); ?>
    <br><br>
    <p><a href="index.php"  class="goBack">Go to Main page</a></p>

<?php

    $errors = array();

    //update Firstname in Accounts
    if(isset($_POST['post_fname'])){
        $u_id = $_SESSION['user_id'];
        $firstname = mysqli_real_escape_string($db, $_POST['up_firstname']);

        if(strlen(trim($firstname))==0 || empty($firstname)){
            array_push($errors, "Please enter your firstname.");
            echo "<div class='error' style='width: 90%;
            margin: 0px auto;
            padding: 10px;
            border: 1px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 5px;
            text-align: left;'>Your firstname must not be empty!. </div>";
        }

        $query = "SELECT * FROM users WHERE user_id = '$u_id'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        if($firstname === $row['firstname']){
             array_push($errors, "Your firstname is same as before.");
            echo "<div class='error' style='width: 90%;
            margin: 0px auto;
            padding: 10px;
            border: 1px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 5px;
            text-align: left;'>Your firstname is same as before. </div>";
        }

        if(count($errors) === 0){
            $sql= "UPDATE users SET firstname='$firstname' WHERE user_id='$u_id' ";
            mysqli_query($db, $sql);  //update to database
?>
            <script>
                swal({title: "Success!", text: "Firstname has been updated.", type: "success"})
                    .then(function(){ 
                        location.reload();
                    });
            </script>
<?php            
        }

    }



    //update Lastname in Accounts
    if(isset($_POST['post_lname'])){
        $u_id = $_SESSION['user_id'];
        $lastname = mysqli_real_escape_string($db, $_POST['up_lastname']);

        if(strlen(trim($lastname))==0 || empty($lastname)){
            array_push($errors, "Please enter your lastname.");
            echo "<div class='error' style='width: 90%;
            margin: 0px auto;
            padding: 10px;
            border: 1px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 5px;
            text-align: left;'>Your lastname must not be empty!. </div>";
        }

        $query = "SELECT * FROM users WHERE user_id = '$u_id'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        if($lastname === $row['lastname']){
            array_push($errors, "Your lastname is same as before.");
            echo "<div class='error' style='width: 90%;
            margin: 0px auto;
            padding: 10px;
            border: 1px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 5px;
            text-align: left;'>Your lastname is same as before. </div>";
        }

        if(count($errors) === 0){
            $sql= "UPDATE users SET lastname='$lastname' WHERE user_id='$u_id' ";
            mysqli_query($db, $sql);  //update to database
?>
            <script>
                // swal("Success!", "Lastname updated.", "success");
                swal({title: "Success!", text: "Lastname has been updated.", type: "success"})
                    .then(function(){ 
                        location.reload();
                    });
            </script>
<?php
             
        }

    }




  //update Email in Accounts
    if(isset($_POST['post_email'])){
        $u_id = $_SESSION['user_id'];
        $email = mysqli_real_escape_string($db, $_POST['up_email']);

        if(strlen(trim($email))==0 || empty($email)){
            array_push($errors, "Please enter your email address.");
            echo "<div class='error' style='width: 90%;
            margin: 0px auto;
            padding: 10px;
            border: 1px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 5px;
            text-align: left;'>Please enter your email address. </div>";
        }

        $query = "SELECT * FROM users WHERE user_id = '$u_id'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        if($email === $row['email']){
            array_push($errors, "Your email address is same as before.");
            echo "<div class='error' style='width: 90%;
            margin: 0px auto;
            padding: 10px;
            border: 1px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 5px;
            text-align: left;'>Your email address is same as before. </div>";
        }

        if(count($errors) === 0){
            $sql= "UPDATE users SET email='$email' WHERE user_id='$u_id' ";
            mysqli_query($db, $sql);  //update to database
?>
            <script>
                swal({title: "Success!", text: "Email address has been updated.", type: "success"})
                    .then(function(){ 
                        location.reload();
                    });
            </script>
<?php
        }
    }




  //update Phone number in Accounts
    if(isset($_POST['post_phone'])){
        $u_id = $_SESSION['user_id'];
        $phone = mysqli_real_escape_string($db, $_POST['up_phone']);

        if(strlen(trim($phone))==0 || empty($phone)){
            array_push($errors, "Please enter your Phone number.");
            echo $errors;
        }

        $query = "SELECT * FROM users WHERE user_id = '$u_id'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        if($phone === $row['phone_num']){
            array_push($errors, "Your Contact number is same as before.");
            echo "<div class='error' style='width: 90%;
            margin: 0px auto;
            padding: 10px;
            border: 1px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 5px;
            text-align: left;'>Your Contact number is same as before. </div>";
        }

        if(strlen($phone) != 11){
            array_push($errors, "Contact number is invalid.");
            echo "<div class='error' style='width: 90%;
            margin: 0px auto;
            padding: 10px;
            border: 1px solid #a94442;
            color: #a94442;
            background: #f2dede;
            border-radius: 5px;
            text-align: left;'>Contact number is invalid. </div>";
        }

        if(count($errors) === 0){
            $sql= "UPDATE users SET phone_num='$phone' WHERE user_id='$u_id' ";
            mysqli_query($db, $sql);  //update to database
?>
            <script>
                swal({title: "Success!", text: "Contact number has been updated.", type: "success"})
                    .then( function() { 
                        location.reload();
                    });
            </script>
<?php
        }
    }
?>
</div>   

        </div>
           
    </article>





<!-- Script for hidden textbox -->

<script>
        var fname = document.getElementById('firstname');
        var fname_display = 0;


        function showFirstname(){
            if(fname_display == 1){
                fname.style.display = 'none';
                fname_display = 0;
            } else{
                fname.style.display = 'block';
                fname_display = 1;
            }
        }

//Lastname
        var lname = document.getElementById('lastname');
        var lname_display = 0;


        function showLastname(){
            if(lname_display == 1){
                lname.style.display = 'none';
                lname_display = 0;
            } else{
                lname.style.display = 'block';
                lname_display = 1;
            }
        }


//Email
        var email = document.getElementById('email');
        var email_display = 0;


        function showEmail(){
            if(email_display == 1){
                email.style.display = 'none';
                email_display = 0;
            } else{
                email.style.display = 'block';
                email_display = 1;
            }
        }


//Phone
var phone = document.getElementById('phone');
        var phone_display = 0;


        function showPhone(){
            if(phone_display == 1){
                phone.style.display = 'none';
                phone_display = 0;
            } else{
                phone.style.display = 'block';
                phone_display = 1;
            }
        }



        //Address
        var address = document.getElementById('address');
        var address_display = 0;


        function showAddress(){
            if(address_display == 1){
                address.style.display = 'none';
                address_display = 0;
            } else{
                address.style.display = 'block';
                address_display = 1;
            }
        }


        //Username
        var username = document.getElementById('username');
        var username_display = 0;


        function showUsername(){
            if(username_display == 1){
                username.style.display = 'none';
                username_display = 0;
            } else{
                username.style.display = 'block';
                username_display = 1;
            }
        }
    

    //Password
    var password = document.getElementById('pass');
        var password_display = 0;


        function showPassword(){
            if(password_display == 1){
                password.style.display = 'none';
                password_display = 0;
            } else{
                password.style.display = 'block';
                password_display = 1;
            }
        }



        //Show password

        function myFunction1() {
            var x = document.getElementById("pass1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            }

            function myFunction2() {
            var x = document.getElementById("pass2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            }
</script>
</body>
</html>