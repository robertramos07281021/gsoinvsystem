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
        array_push($errors, "alreadyexist");
    } else {
        unset($errors["alreadyexist"]);
    }

    if(strlen(trim($firstname))==0 || empty($firstname)){
        array_push($errors, "firstname");
    } else {
        unset($errors["firstname"]);
    }

    if(strlen(trim($lastname))==0 || empty($lastname)){
        array_push($errors, "lastname.");
    } else {
        unset($errors["lastname"]);
    }

    if(strlen(trim($email))==0 || empty($email)){
        array_push($errors, "email");
    } else {
        unset($errors["email"]);
    }


    if(strlen(trim($phone))==0 || empty($phone)){
        array_push($errors, "phonenum");
    } else {
        unset($errors["phonenum"]);
    }

    if(strlen($phone) != 11 ){
        array_push($errors, "phoneinvalid");
    } else {
        unset($errors["phoneinvalid"]);
    }

    if(strlen(trim($address))==0 || empty($address)){
        array_push($errors, "address");
    } else {
        unset($errors["address"]);
    }


    if(strlen(trim($department))==0 || empty($department)){
        array_push($errors, "department");
    } else {
        unset($errors["department"]);
    }

    if(strlen(trim($username))==0 || empty($username)){
        array_push($errors, "usernameReq");
    } else {
        unset($errors["usernameReq"]);
    } 

    if(strlen(trim($password1))==0 || empty($password1)){
        array_push($errors, "passReq");
    } else {
        unset($errors["passReq"]);
    } 

    if($password1 !== $password2){
        array_push($errors, "passNotMatch");
    } else {
        unset($errors["passNotMatch"]);
    }

    if(strlen($password1) < 8 || strlen($password1) > 16 ) {
        array_push($errors, "816character");
    } else {
        unset($errors["816character"]);
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
    $row = mysqli_fetch_assoc($result);
    $stat = "active";

    if( $count === 1 && $row['status']=== $stat){
        

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