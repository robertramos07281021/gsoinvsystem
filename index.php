<?php include('server.php');   
$displayUser = "SELECT * FROM users";
$res_query = mysqli_query($db,$displayUser);

$total_users = mysqli_num_rows($res_query);
$act = "active";
$active_query= "SELECT * FROM users WHERE status='$act'";
$active_result = mysqli_query($db,$active_query);
$total_active = mysqli_num_rows($active_result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" type="text/css" href="./css/style.css"> -->
    <link rel="stylesheet" type="text/css" src="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>GSO Invsys</title>
    <style>
        .welcomePageBg{
            background-image: url('./image/welcomeBg.jpg');
        }
        #logoutModal{
    display: none;
        }   
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
                        <li class="mb-5 w-full bg-red-300/20 p-3 rounded-md font-bold">Dashboard</li>
                    </a>
                    <a href="user_management.php">
                        <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">User Management</li>
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

    <?php           $user = $_SESSION['user_id'];
                    $sql = "SELECT * FROM users WHERE user_id = '$user'";
                    $result = mysqli_query($db, $sql);
                    $row = mysqli_fetch_assoc($result);  
    ?>

    <article class=" col-span-4 py-6 pr-6 w-full h-full ">
        
        <div class="flex justify-between text-white">
            <p> Welcome  Admin <strong><?php echo $row['firstname'] ." ". $row['lastname'];?></strong></p>
            <button onclick="logoutModal()" class="font-bold"> Logout  </button>
            
        </div>

        <div class="w-full grid grid-cols-4 mt-10 h-1/6 gap-6 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
            <div class="bg-white rounded-xl p-5 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                <div class="grid grid-cols-2">
                    <div>
                        <p class="text-xl flex font-bold">Total User</p>
                        <p class="text-lg font-semibold"><?php echo $total_users; ?></p>
                    </div>
                    <div class="flex justify-end">
                        <i><img src="./image/icons8-account-24.png" class="h-10 w-10 rounded-full border p-2 bg-red-200"></img></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                active user
            </div>

            <div class="bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                total item
            </div>

            <div class="bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                
            </div>
        </div>

        <div class="grid grid-cols-5 mt-6 h-full pb-6 gap-6">
            <div class="col-span-3 p-10 h-full bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] mb-5">
                <table class="w-full">
                    <thead> 
                        <tr >
                            <th class="pb-3">ID</th>
                            <th class="pb-3">Firstname</th>
                            <th class="pb-3">Lastname</th>
                            <th class="pb-3">Username</th>
                            <th class="pb-3">Department</th>
                            <th class="pb-3">Login Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $num = 0;
                            while($row = mysqli_fetch_assoc($res_query)) {
                                $num++;
                        ?>
                            <tr class="border-b">
                                <td class="text-center py-2"> <?php echo $num; ?></td>
                                <td class="text-center py-2"> <?php echo ucfirst($row['firstname']); ?></td>
                                <td class="text-center py-2"> <?php echo ucfirst($row['lastname']); ?></td>
                                <td class="text-center py-2"> <?php echo ucfirst($row['username']); ?></td>
                                <td class="text-center py-2"> <?php echo ucfirst($row['department']);?></td>
                                <td class="text-center py-2"> ???? </td>
                            </tr>
                        <?php  }  ?>
                    </tbody>    
                </table>

            </div>

            <div class="col-span-2  h-full bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] mb-5">
                items
            </div>
        </div>
        
    

    </article>
    
    <div class="absolute top-0 left-0 h-full w-full bg-white/30" id="logoutModal" >
        <div class="flex w-full h-full justify-center items-center">
            <div class="h-56 w-80 bg-[red] fixed rounded px-1 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]" >
                <p class="text-white font-bold">GSO InvSystem</p>
                <div class="bg-white h-[87.2%] w-full flex justify-center items-center">
                    <div class="text-center ">
                        <p>Do you want to logout?</p>
                        <div class="flex justify-center gap-10 mt-10">
                            <button class="p-1 px-5 rounded-lg text-white bg-[red] outline outline-double hover:outline-[red] hover:bg-white hover:text-[red]"><a href="index.php?logout='1'" class=" font-bold"> Yes </a></button>
                            <?php endif ?>
                            <button class="p-1 px-5 rounded-lg text-white bg-[red] outline outline-double hover:outline-[red] hover:bg-white hover:text-[red] font-bold" onclick="noLogout()">No</button>
                        </div>    
                    </div>
                </div>
            <div>
        </div>
    </div>

<script src="./script/jscript.js"> 

 </script>

</body>
</html>