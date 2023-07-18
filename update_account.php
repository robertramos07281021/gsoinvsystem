<?php include('server.php'); ?>


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

        echo $row['firstname']. " ". $row['lastname'];

 ?>
<br>
<?php  echo "Email: ".$row['email']. "&nbsp&nbsp&nbsp". "Phone Number: ".$row['phone_num']; ?>
<br>
<?php  echo "Address: ".$row['u_address']; ?>
<br>
<?php  echo "Username: ".$row['username']; ?>
<br>
<?php  echo "Role: ".ucfirst($row['role']); ?>
<br><br>
    <form method="POST" action="login.php">
             

             <div class="input-group">
                <label >First Name</label>
                <input type="text" name="up_firstname" placeholder="First Name">
            </div>

            <div class="input-group">
                <label >Last Name</label>
                <input type="text" name="up_lastname" placeholder="Last Name">
            </div>

            <div class="input-group">
                <label >Email &nbsp; </label>
                <input type="email" name="up_email" placeholder="Email">
            </div>

            <div class="input-group">
                <label >Address</label>
                <input type="text" name="up_address" placeholder="Address">
            </div>
            <div class="input-group">
                <label >Phone</label>
                <input type="text" name="up_phone" placeholder="Phone Number">
            </div>

            <div class="input-group">
                <label >Username</label>
                <input type="text" name="up_username" placeholder="Username">
            </div>

            <div class="input-group">
                <label >Password</label>
                <input type="password" name="up_password" placeholder="Password">
            </div>

           

            <div class="input-group">
                 
                <button type="submit" name="update_acct" class="btn">Save Changes</button>
            </div>

            <p><a href="index.php"  class="goBack">Go to Main page</a></p>
        

    </form>





<!--Bootstrap script-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

</body>
</html>