<?php include('server.php'); 


$displayUser = "SELECT * FROM users";
$res_query = mysqli_query($db,$displayUser);

$total_users = mysqli_num_rows($res_query);
$act = "active";
$active_query= "SELECT * FROM users WHERE status='$act'";
$active_result = mysqli_query($db,$active_query);
$total_active = mysqli_num_rows($active_result);

$errors = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>GSO Invsys</title>
    <style>
     
    </style>
  
</head>

<body class=" text-black w-full h-screen grid grid-cols-5">

    <?php 
        if (isset($_SESSION['success'])): 
    ?>

    <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    ?>
    <?php endif ?>

    <?php 
    if (isset($_SESSION['username'])): 
    ?>

<!-- Navbar -->
    <nav class=" p-6 fixed h-full w-[20%]">
        <div class="drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] h-full w-full rounded-xl bg-white p-8 text-center">
            <a href="index.php" class="text-2xl font-bold"><span class="text-[red]">GSO</span> InvSystem</a>
            <hr class="mt-5 border border-black">
            <div class="text-start w-full mt-10">
            <ul>
                    <a aria-current="page" href="index.php">
                        <li class="mb-5 w-full hover:bg-red-300/20 p-3 rounded-md">Dashboard</li>
                    </a>
                    <a href="user_management.php">
                        <li class="mb-5 w-full p-3 rounded-md bg-red-300/20 p-3 font-bold">User Management</li>
                    </a>
                    
                    <a href="offices.php">
                        <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">Office</li>
                    </a>

                    <a href="#">
                        <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">Reports</li>   
                    </a>

                    <a href="update_account.php">
                        <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">My Profile</li>
                    </a>
                </ul>  
        
            </div>
        </div>
    </nav>

    <div class=" absolute top-0 left-0 -z-10 h-80 w-full welcomePageBg">
    </div>

    <nav class="p-6 ">
    </nav>

    <article class=" col-span-4 py-6 pr-6 w-full h-full ">
        
        <div class="flex justify-between text-white">
            <p> Welcome  Admin <strong><?php echo $_SESSION['firstname'] ." ". $_SESSION['lastname'];?></strong></p>
            <p> <a href="index.php?logout='1'" class=" font-bold"> Logout </a> </p>
            <?php endif ?>
        </div>

        <div class="w-full grid grid-cols-4 mt-10 h-1/6 gap-6 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
            <div class="bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                total user
                <br>
                <?php  echo $total_users; ?>
            </div>

            <div class="bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                active user
                <br>
                <?php  echo $total_active; ?>
            </div>

            <div class="bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                total item
            </div>

            <div class="bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                
            </div>
        </div>

        <div class="grid grid-cols-5 mt-6 h-full pb-6 gap-6">
            <div class="col-span-4  h-full bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] mb-5">
                 

                <h1> List of Users </h1>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Contact#</th>
                            <th>Address</th>
                            <th>Username</th>
                            <th>Department</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                         </tr>
                    </thead>

                    <tbody>
                        <tr>
                    <?php   
                            
                            $num = 0;
                            while($row = mysqli_fetch_assoc($res_query)){
                                $num++;
                                ?>
                                
                                    <!-- rowsss from database will be displayed -->
                                    <td> <?php echo  $num; ?> </td>
                                    <td> <?php echo  $row['firstname'] ?>  </td>
                                    <td> <?php echo  $row['lastname'] ?>  </td>
                                    <td> <?php echo  $row['email'] ?>  </td>
                                    <td> <?php echo  $row['phone_num'] ?>  </td>
                                    <td> <?php echo  $row['u_address'] ?>  </td>
                                    <td> <?php echo  $row['username'] ?>  </td>
                                    <td> <?php echo  $row['department'] ?>  </td>
                                    <td> <?php echo  $row['role'] ?>  </td>
                                    <td> <?php echo  $row['status'] ?>  </td>

                                    </tr>
                                <?php
                            }
                    
                    ?>
                         
                    </tbody>

                </table>


            </div>

              <div class="col-span-1  h-full bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] mb-5">
               Add departments

               <form method="POST">
                    
               <label>Department: </label> <input type="text" name="dep" placeholder="Enter department" 
               value="<?php if(isset($_POST['post_dep'])){
                        echo $_POST['dep'];
                    }?>"   required > 
                    
                <br><br>
               <label>Enter your password: </label> <br>
               <input type="password" name="pass1" placeholder="Password" id="pass1" required>
               <button type="submit" name="post_dep"> Save Changes</button>

               </form>


               <?php

              

                
                if(isset($_POST['post_dep'])){
                    $u_id = $_SESSION['user_id'];
                    $department = mysqli_real_escape_string($db, $_POST['dep']);
                    $password = mysqli_real_escape_string($db, $_POST['pass1']);


                    if(strlen(trim($department))==0 || empty($department)){
                        array_push($errors, "Please enter a valid department.");
                        echo "<div class='error' style='width: 90%;
                        margin: 0px auto;
                        padding: 10px;
                        border: 1px solid #a94442;
                        color: #a94442;
                        background: #f2dede;
                        border-radius: 5px;
                        text-align: left;'>Department name must not be empty!. </div>";
                    }


                    $query1 = "SELECT * FROM users WHERE user_id = '$u_id'";
                    $result1 = mysqli_query($db, $query1);
                    $row1 = mysqli_fetch_assoc($result1);

                    $enc_pass = md5($password);


                    $dep_q =  "SELECT * FROM department WHERE dep_name = '$department'";
                    $res = mysqli_query($db, $dep_q);
                    $dep_row = mysqli_num_rows($res);

                    if($enc_pass !== $row1['password']){
                        array_push($errors, "Invalid password.");
                        echo "<div class='error' style='width: 90%;
                        margin: 0px auto;
                        padding: 10px;
                        border: 1px solid #a94442;
                        color: #a94442;
                        background: #f2dede;
                        border-radius: 5px;
                        text-align: left;'>Invalid password. </div>";
                    }


                    if($dep_row != 0){
                        array_push($errors, "Department already exists.");
                        echo "<div class='error' style='width: 90%;
                        margin: 0px auto;
                        padding: 10px;
                        border: 1px solid #a94442;
                        color: #a94442;
                        background: #f2dede;
                        border-radius: 5px;
                        text-align: left;'>Department already exists. </div>";
                    }


                    if(count($errors) === 0){

                            $sql2 = "INSERT INTO department (dep_name) VALUES ('$department')";

                            mysqli_query($db, $sql2);  //insert to database
                        ?>
                        <script>
                                swal({title: "Success!", text: "New department has been added.", type: 
                                        "success"}).then(function(){ 
                                            location.href="user_management.php";
                                        }
                                        );
                        </script>

                        <?php


                    }


                }


                ?>




            </div> 
        </div>



                




    </article>

<script href="./script/jscript.js"></script>
<script src="" ></script>
</body>
</html>