<?php include('server.php'); ?>
<?php include('errors.php');  ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
 
<style>
    .goBack{
        text-decoration:none; 
        color: black;
    }

    .goBack:hover{
        color: blue;
    }
</style>


    <title>GSO Invsys Sample</title>
</head>
<body>
    <div class="header">
        <h2>Update Your Account</h2>
    </div>

    

    </div>
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

              <!-- Show hidden input textbox for updating -->
              <div id="address" style="display:none;"> 

                <form method="POST">
                    <input type="text" name="up_address" placeholder="Address" required> 
                        <button type="submit" name="post_address"> Save Changes</button>
                            </form>

                            </div> 
                                <button onclick="showAddress()">Edit</button>



        <br>
        <?php  echo "Username: ".$row['username']; ?>

                <!-- Show hidden input textbox for updating -->
                <div id="username" style="display:none;"> 

                    <form method="POST">
                        <input type="text" name="up_username" placeholder="Username" required> 
                            <button type="submit" name="post_username"> Save Changes</button>
                                </form>

                                </div> 
                                    <button onclick="showUsername()">Edit</button>


        <br>
        <?php  echo "Role: ".ucfirst($row['role']); ?>
        <br><br>

        <p>
        

            <!-- Change password -->
        <div id="pass" style="display:none;"> 

            <form method="POST">
                <input type="password" name="up_pass1" placeholder="Password" id="pass1" required>
                <!-- An element to toggle between password visibility -->
                    <input type="checkbox" onclick="myFunction1()">Show Password 
                    <br><br>

                    <input type="password" name="up_pass2" placeholder="Confirm Password" id="pass2"  required> 
                    <!-- An element to toggle between password visibility -->
                    <input type="checkbox" onclick="myFunction2()">Show Password 
                    <br><br>

                    <button type="submit" name="post_password"> Save Changes</button>
                        </form>

                        </div> <br>
                            <button onclick="showPassword()">Change Password</button>

        </p>
           

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
                 swal({title: "Success!", text: "Firstname has been updated.", type: 
                        "success"}).then(function(){ 
                            location.href="update_account.php";
                        }
                        );
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

                swal({title: "Success!", text: "Lastname has been updated.", type: 
                        "success"}).then(function(){ 
                            location.href="update_account.php";
                        }
                        );
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
                 swal({title: "Success!", text: "Email address has been updated.", type: 
                        "success"}).then(function(){ 
                            location.href="update_account.php";
                        }
                        );
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
                 swal({title: "Success!", text: "Contact number has been updated.", type: 
                        "success"}).then(function(){ 
                            location.href="update_account.php";
                        }
                        );
        </script>

        <?php

    }

}




//update Address in Accounts
if(isset($_POST['post_address'])){
    $u_id = $_SESSION['user_id'];
    $address = mysqli_real_escape_string($db, $_POST['up_address']);

    if(strlen(trim($address))==0 || empty($address)){
        array_push($errors, "Please enter your address.");
        echo "<div class='error' style='width: 90%;
        margin: 0px auto;
        padding: 10px;
        border: 1px solid #a94442;
        color: #a94442;
        background: #f2dede;
        border-radius: 5px;
        text-align: left;'>Your address must not be empty!. </div>";
    }

    $query = "SELECT * FROM users WHERE user_id = '$u_id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if($address === $row['u_address']){
        array_push($errors, "Your address is same as before.");
       echo "<div class='error' style='width: 90%;
       margin: 0px auto;
       padding: 10px;
       border: 1px solid #a94442;
       color: #a94442;
       background: #f2dede;
       border-radius: 5px;
       text-align: left;'>Your address is same as before. </div>";
   }

    if(count($errors) === 0){

        $sql= "UPDATE users SET u_address='$address' WHERE user_id='$u_id' ";

        mysqli_query($db, $sql);  //update to database
        ?>
        <script>
                 swal({title: "Success!", text: "Address has been updated.", type: 
                        "success"}).then(function(){ 
                        location.href="update_account.php";
                        }
                        );
        </script>

        <?php
            
    }

}





//update Username in Accounts
if(isset($_POST['post_username'])){
    $u_id = $_SESSION['user_id'];
    $username = mysqli_real_escape_string($db, $_POST['up_username']);

    if(strlen(trim($username))==0 || empty($username)){
        array_push($errors, "Please enter your username.");
        echo "<div class='error' style='width: 90%;
        margin: 0px auto;
        padding: 10px;
        border: 1px solid #a94442;
        color: #a94442;
        background: #f2dede;
        border-radius: 5px;
        text-align: left;'>Your username must not be empty!. </div>";
    }

    $query = "SELECT * FROM users WHERE user_id = '$u_id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if($username === $row['username']){
         array_push($errors, "Your username is same as before.");
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

        $sql= "UPDATE users SET username='$username' WHERE user_id='$u_id' ";

        mysqli_query($db, $sql);  //update to database
        ?>
        <script>
                 swal({title: "Success!", text: "Your username has been updated.", type: 
                        "success"}).then(function(){ 
                            location.href="update_account.php";
                        }
                        );
        </script>

        <?php
            
    }

}




//Update password

if(isset($_POST['post_password'])){
    $u_id = $_SESSION['user_id'];
    $passw = mysqli_real_escape_string($db, $_POST['up_pass1']);
    $passw2 = mysqli_real_escape_string($db, $_POST['up_pass2']);
    $password = md5($passw);
    $password2 = md5($passw2);

    if(strlen(trim($password))==0 || empty($password)){
        array_push($errors, "Please enter a new password.");
        echo "<div class='error' style='width: 90%;
        margin: 0px auto;
        padding: 10px;
        border: 1px solid #a94442;
        color: #a94442;
        background: #f2dede;
        border-radius: 5px;
        text-align: left;'>Your new password must not be empty!. </div>";
    }

    if(strlen(trim($passw2))==0 || empty($passw2)){
        array_push($errors, "Please confirm new password to continue.");
        echo "<div class='error' style='width: 90%;
        margin: 0px auto;
        padding: 10px;
        border: 1px solid #a94442;
        color: #a94442;
        background: #f2dede;
        border-radius: 5px;
        text-align: left;'>Please confirm new password to continue. </div>";
    }

    $query = "SELECT * FROM users WHERE user_id = '$u_id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if($password === $row['password']){
        array_push($errors, "Your password is same as before.");
       echo "<div class='error' style='width: 90%;
       margin: 0px auto;
       padding: 10px;
       border: 1px solid #a94442;
       color: #a94442;
       background: #f2dede;
       border-radius: 5px;
       text-align: left;'>Your password is same as before. </div>";
   }


        if($passw !== $passw2){
            array_push($errors, "Password does not match!");
            echo "<div class='error' style='width: 90%;
       margin: 0px auto;
       padding: 10px;
       border: 1px solid #a94442;
       color: #a94442;
       background: #f2dede;
       border-radius: 5px;
       text-align: left;'>Password does not match! </div>";
        }

        if(strlen($passw) < 8){
            array_push($errors, "Password should be 8 characters long or more.");
            echo "<div class='error' style='width: 90%;
       margin: 0px auto;
       padding: 10px;
       border: 1px solid #a94442;
       color: #a94442;
       background: #f2dede;
       border-radius: 5px;
       text-align: left;'>Password should be 8 characters long or more. </div>";
        }



    if(count($errors) === 0){

        $sql= "UPDATE users SET password='$password' WHERE user_id='$u_id' ";

        mysqli_query($db, $sql);  //update to database
        ?>
        <script>
                 swal({title: "Success!", text: "Password has been updated.", type: 
                        "success"}).then(function(){ 
                        location.href="update_account.php";
                        }
                        );
        </script>

        <?php
            
    }

}




?>
    




<!--Bootstrap script-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>


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