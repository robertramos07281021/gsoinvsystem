<?php include('server.php');   ?>

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
                    <li class="mb-5 w-full bg-red-300/20 p-3 rounded-md font-bold">
                      <a  aria-current="page" href="index.php">Dashboard</a>
                    </li>
                    <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">
                        <a href="user_management.php">User Management</a>
                    </li>
                    <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">
                        <a href="#">Office</a>
                    </li>
                    <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">
                      <a href="#">Reports</a>
                    </li>   
                    <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">
                      <a  href="update_account2.php">My Profile</a>
                    </li>
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
            <button onclick="logoutModal()" class="font-bold"> Logout  </button>
            
        </div>

        <div class="w-full grid grid-cols-4 mt-10 h-1/6 gap-6 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
            <div class="bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                total user
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
            <div class="col-span-3  h-full bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] mb-5">
                users

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