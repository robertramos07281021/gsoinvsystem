<?php
session_start();

$errors = array();


//connect to db

$db = mysqli_connect('localhost','root', '','gsoinventory');

//if register is clicked

if(isset($_POST['submit'])){

    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $department = mysqli_real_escape_string($db, $_POST['department']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password_2']);
    

    $user_query = "SELECT * FROM users WHERE username='$username'";
    $user_query_run = mysqli_query($db, $user_query);

    if(mysqli_num_rows($user_query_run) > 0){
        array_push($errors, "Username already exists. Please try again.");
    }

    if(strlen(trim($firstname))==0){
        array_push($errors, "First name is required.");
    }
    if(strlen(trim($lastname))==0){
        array_push($errors, "Last name is required.");
    }
    if(strlen(trim($email))==0){
        array_push($errors, "Email is required.");
    }
    if(strlen(trim($phone))==0){
        array_push($errors, "Contact number is required.");
    }
    if(strlen($phone) < 11 ){
        array_push($errors, "Contact number is invalid.");
    }

    if(strlen(trim($address))==0){
        array_push($errors, "Address is required.");
    }
    if(strlen(trim($department))==0){
        array_push($errors, "Department is required.");
    }
    if(strlen(trim($username))==0){
        array_push($errors, "Username is required.");
    }
    if(strlen(trim($password1))==0){
        array_push($errors, "Password is required.");
    }

    if($password1 !== $password2){
        array_push($errors, "Password does not match!");
    }

    if(strlen($password1) < 8){
        array_push($errors, "Password should be 8 characters long or more.");
    }

//no errors

    if(count($errors) === 0){

        $password = md5($password1); //encrypt password.

        $sql = "INSERT INTO users (firstname, lastname, email, phone_num, u_address, username, password, department, role, status)
                VALUES ('$firstname', '$lastname', '$email', '$phone', '$address' , '$username', '$password', '$department', 'user', 'active')";

        mysqli_query($db, $sql);  //insert to database

        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;


       
        $_SESSION['register'] = "Account created!";

         

            

 
        header('location: login.php');  //redirect to create account

        


    }

}



//login page

if(isset($_POST['login'])){
    $log_user = mysqli_real_escape_string($db, $_POST['log_username']);
    $log_password = mysqli_real_escape_string($db, $_POST['log_password']);
    $pass = md5($log_password);

    $sql = "SELECT * FROM users WHERE username = '$log_user' AND password ='$pass'";

    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);
    
    if( $count === 1){
        $row = mysqli_fetch_assoc($result);

        if($row['username'] === $log_user && $row['password'] === $pass){

        $_SESSION['username'] = $row['username'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['user_id'] = $row['user_id'];

        header('location: index.php');

        
        }

        
    } 


 

}








//logout

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}

?>