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

            <form method="POST">
                <input type="text" name="up_lastname" placeholder="Last Name" required> 
                    <button type="submit" name="post_lname"> Save Changes</button>
                        </form>

                        </div> 
                            <button onclick="showLastname()">Edit</button>

        <br>

        <?php  echo "Email: ".$row['email']; ?>
        <br>
        <?php "Phone Number: ".$row['phone_num']; ?>  
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

    if(strlen(trim($firstname))==0){
        array_push($errors, "Please enter your firstname.");
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
                swal("Success!", "Firstname updated.", "success");
        </script>

        <?php

    }

}



  //update Lastname in Accounts
  if(isset($_POST['post_lname'])){
    $u_id = $_SESSION['user_id'];
    $lastname = mysqli_real_escape_string($db, $_POST['up_lastname']);

    if(strlen(trim($lastname))==0){
        array_push($errors, "Please enter your lastname.");
    }

    $query = "SELECT * FROM users WHERE user_id = '$u_id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);

    if($lastname === $row['lastname']){
        array_push($errors, "Your lastname is same as before.");
    }

    if(count($errors) === 0){

        $sql= "UPDATE users SET lastname='$lastname' WHERE user_id='$u_id' ";

        mysqli_query($db, $sql);  //update to database
        ?>
        <script>
                swal("Success!", "Lastname updated.", "success");
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
    
</script>
</body>
</html>