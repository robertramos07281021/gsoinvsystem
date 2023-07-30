<?php include('server.php');   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../GSOInvSys/css/style.css">
    
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
        <div class="drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] h-full w-full rounded-xl bg-white p-8 text-center flex flex-col ">
            <a href="index.php" class="text-2xl font-bold"><span class="text-[red]">GSO</span> InvSystem</a>
            <hr class="mt-5 border border-black">
            <div class="text-start w-full mt-10 ">
                <ul>
                    <a aria-current="page" href="index_user.php">
                        <li class="mb-2 w-full bg-red-300/20 p-3 rounded-md font-bold flex gap-1 "><img src="./image/dashboard.png" class="rounded w-6 h-6">Dashboard</li>
                    </a>
                    <a href="#">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/users.png" class="bg-white p-1 rounded w-6 h-6">Users</li>
                    </a>

                    <a href="#">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/department.png"  class="bg-white p-1 rounded w-6 h-6">Departments</li>
                    </a>
                    

                    <a href="#">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/packaging.png"  class="bg-white p-1 rounded w-6 h-6">Items</li>
                    </a>

                    <a href="#">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/report.png"  class="bg-white p-1 rounded w-6 h-6">Reports</li>   
                    </a>

                    <a href="update_account_user.php">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/user.png"  class="bg-white p-1 rounded w-6 h-6">My Profile</li>
                    </a>
                    
                </ul> 
        
            </div>
            <div class="flex  h-full w-full items-end">
                <button onclick="logoutModal()" class="font-semibold hover:font-bold w-full justify-start items-center  py-2 pl-2 flex rounded-md hover:bg-red-300/20 hover:pr-2 transition ease-out duration-300"><img src="./image/icons8-logout-64.png" alt="logut" width="20" height="20"><p class="flex items-center">Log Out</p></button>
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
            <div class="font-semibold flex flex-cols"><p>DashBoard</p><p></p></div>
            <p class="font-semibold"> Welcome  &nbsp; <span class="font-bold text-xl" ><?php echo ucfirst($row['firstname']) ." ".ucfirst ($row['lastname']);?></span></p>
        </div>

        <div class="w-full grid grid-cols-4 mt-10 h-1/6 gap-6 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
            <div class="bg-white rounded-xl p-5 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                <div class="grid grid-cols-3">
                    <div class="col-span-2">
                        <p class="text-xl flex font-bold">Total Active User</p>
                        <p class="text-lg font-semibold"><?php echo $total_users; ?></p>
                    </div>
                    <div class="flex justify-end">
                        <i><img src="./image/icons8-account-24.png" class="h-10 w-10 rounded-full border p-2 bg-red-200"></img></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-5 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
               

                

                <div class="grid grid-cols-3">
                    <div class="col-span-2">
                        <p class="text-xl flex font-bold">Total Users Online</p>
                        <p class="text-lg font-semibold"><?php echo $total_online; ?></p>
                    </div>
                    <div class="flex justify-end">
                        <i><img src="./image/icons8-account-24.png" class="h-10 w-10 rounded-full border p-2 bg-red-200"></img></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                total item
            </div>

            <div class="bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                
            </div>
        </div>

        <div class="grid grid-cols-5 mt-6 h-full pb-6 gap-6">
            <div class="col-span-3 p-10 h-full bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] mb-5">
                

            </div>

            <div class="col-span-2  h-full bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] mb-5">
                items
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

<script src="./script/jscript.js"> 

 </script>
<?php endif ?>
</body>
</html>