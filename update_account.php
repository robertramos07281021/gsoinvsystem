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
        <div class="drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] h-full w-full rounded-xl bg-white p-8 text-center flex flex-col">
            <a href="index.php" class="text-2xl font-bold"><span class="text-[red]">GSO</span> InvSystem</a>
            <hr class="mt-5 border border-black">
            <div class="text-start w-full mt-10">
                <ul>
                <a aria-current="page" href="index.php">
                        <li class="mb-2 w-full hover:bg-red-300/20 p-3 rounded-md font-semibold flex gap-1 "><img src="./image/dashboard.png" class="rounded w-6 h-6">Dashboard</li>
                    </a>
                    <a href="user_management.php">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center"><img src="./image/users.png" class="bg-white p-1 rounded w-6 h-6">Users</li>
                    </a>

                    <a href="user_management_dept.php">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center"><img src="./image/department.png"  class="bg-white p-1 rounded w-6 h-6">Departments</li>
                    </a>
                    
                    <a href="offices.php">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center"><img src="./image/office.png"  class="bg-white p-1 rounded w-6 h-6">Office</li>
                    </a>

                    <a href="item.php">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center"><img src="./image/packaging.png"  class="bg-white p-1 rounded w-6 h-6">Items</li>
                    </a>

                    <a href="#">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center"><img src="./image/report.png"  class="bg-white p-1 rounded w-6 h-6">Reports</li>   
                    </a>

                    <a href="update_account.php">
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
            <p class="font-semibold"> Welcome  Admin <span class="font-bold text-xl" ><?php echo ucfirst($row['firstname']) ." ".ucfirst ($row['lastname']);?></span></p>
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
                                $pass2 = mysqli_real_escape_string($db, $_POST['up_pass2']);
                                if(count($errors) === 0){
                                    $sql= "UPDATE users SET firstname='$firstname',lastname='$lastname',
                                    email='$email', phone_num='$phone', u_address='$address', username='$username', password='$password' WHERE user_id='$u_id' ";

                                    mysqli_query($db, $sql);  //update to database
                        ?>
                                        <script>
                                                swal({title: "Success!", text: "Your Account has been updated.", type:"success"})
                                                .then(function(){ 
                                                    location.href="update_account.php";
                                                });
                                        </script>
                                        <?php
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
                                    <p class="border w-full pl-2 bg-gray-200/20"><?php echo $row['username'];?></p>
                                    </div>
                                    <div>
                                        <label for="role">Role:</label>
                                        <input type="text" name="role" id="role" class="border w-full pl-2" value="<?php echo $row['role']?>" disabled>
                                    </div>
                                </div>
                                <div class="pt-3">
                                    <label for="department">Department:</label>
                                    <input type="text" name="department" id="department" class="border w-full pl-2" value="<?php echo $row['department']?>" disabled>
                                </div>
                            </div>
                           
                            
                            <div class="pt-5">
                                <div class="flex justify-end gap-5 " id="saveForm" >
                                    <button class="border px-5 py-1" type="submit" name="">Save</button>
                                    <div class=" border px-4 py-1 cursor-pointer" onclick="cancelButton()">
                                        Cancel
                                    </div>
                                </div>

                                <div class="flex justify-end" id="editButton">
                                    <div class="border px-5 py-1" onclick="editForm()"  style="cursor:pointer;">Edit</div>
                                </div>
                            </div>
                        </form>
                        
                    

                    </div> 
                </div>
                
                   


            </div>
            <div class="bg-white drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] border col-start-2 row-start-2 row-span-4 col-start-3 rounded-xl">

            </div>

        </div>
           
    </article>





<!-- Script for hidden textbox -->

<script src="./script/accountcreate.js">

</script>
</body>
</html>