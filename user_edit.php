<?php include('server.php'); 

$id_view = $_GET['id'];
$view_q = mysqli_query($db, "SELECT * FROM users WHERE user_id='$id_view'");
$row_view = mysqli_fetch_array($view_q);


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
    if (isset($_SESSION['username'])): 
    ?>

<!-- Navbar -->
<nav class=" p-6 fixed h-full w-[20%]">
        <div class="drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] h-full w-full rounded-xl bg-white p-8 text-center flex flex-col">
            <a href="index.php" class="text-2xl font-bold"><span class="text-[red]">GSO</span> InvSystem</a>
            <hr class="mt-5 border border-black">
            <div class="text-start w-full mt-10">
                <ul>
                    <a aria-current="page" href="index.php">
                        <li class="mb-2 w-full hover:bg-red-300/20 p-3 rounded-md font-semibold flex gap-1 transition ease-out duration-300 "><img src="./image/dashboard.png" class="rounded w-6 h-6">Dashboard</li>
                    </a>
                    <a href="user_management.php">
                        <li class="mb-2 w-full p-3 bg-red-300/20 rounded-md font-bold flex gap-1 items-center transition ease-out duration-300"><img src="./image/users.png" class="bg-white p-1 rounded w-6 h-6">Users</li>
                    </a>

                    <a href="user_management_dept.php">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/department.png"  class="bg-white p-1 rounded w-6 h-6">Departments</li>
                    </a>
                    
                    <a href="offices.php">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/office.png"  class="bg-white p-1 rounded w-6 h-6">Office</li>
                    </a>

                    <a href="item.php">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/packaging.png"  class="bg-white p-1 rounded w-6 h-6">Items</li>
                    </a>

                    <a href="#">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/report.png"  class="bg-white p-1 rounded w-6 h-6">Reports</li>   
                    </a>

                    <a href="update_account.php">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/user.png"  class="bg-white p-1 rounded w-6 h-6">My Profile</li>
                    </a>
                </ul>  
            </div>
            <div class="flex  h-full w-full items-end">
                <button onclick="logoutModal()" class="font-semibold hover:font-bold w-full items-center py-2 pl-2 flex rounded-md hover:bg-red-300/20 hover:pr-2 transition ease-out duration-300"><img src="./image/icons8-logout-64.png" alt="logut" width="20" height="20"><p class="flex items-center">Log Out</p></button>
            </div>
        </div>
    </nav>
    
    <div class=" absolute top-0 left-0 -z-10 h-80 w-full welcomePageBg">
        
    </div>

    <nav>
    
    </nav>

    <article class=" col-span-4 py-6 pr-6 w-full h-screen  ">
        
        <div class="flex justify-between text-white ">
            <p class="font-semibold text-2xl "><a href="user_management.php">Users</a> / <span class="text-gray-300">User Profile</span></p>
            <p class="font-semibold"> Welcome  Admin <span class="font-bold text-xl" ><?php echo ucfirst($_SESSION['firstname']) ." ".ucfirst ($_SESSION['lastname']);?></span></p>
        </div>

       

        <div class="grid grid-flow-row-dense grid-cols-6 h-[95.5%]  grid-rows-6 mt-6 pb-6 gap-6">
            <div class="col-span-3 row-span-6 h-full bg-white rounded-xl drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] mb-5 ">
                
                <div class="grid grid-rows-6 h-full ">
                    <div class="row-span-2 flex justify-center items-center">   
                        <div class="text-center border-b w-full flex flex-row items-center pb-6">
                            <img src="https://static.vecteezy.com/system/resources/previews/002/002/403/original/man-with-beard-avatar-character-isolated-icon-free-vector.jpg" class="w-44 h-44">
                            <p class="ml-5 text-3xl font-semibold"><?php echo ucfirst($row_view['firstname'])." ". ucfirst($row_view['lastname']); ?></p>
                        </div>
                    </div>
                    <div class="row-span-3 flex flex-col justify-center ">             
                        <div class="  pl-10 " id="detailDiv">
                            <p class="mt-4 mb-5">Address: <?php echo $row_view['u_address']; ?> </p> 
                            <p class="mb-5">Email: <?php echo $row_view['email']; ?> </p>  
                            <p class="mb-5">Phone: <?php echo $row_view['phone_num']; ?> </p>  
                            <p class="mb-5">Username: <?php echo $row_view['username']; ?> </p> 
                            <p class="mb-5">Department: <?php echo $row_view['department']; ?> </p> 
                            <p class="mb-5">Role: <?php echo $row_view['role']; ?> </p>  
                            <p class="mb-5">Status: <?php echo $row_view['status']; ?> </p>
                        </div>
                        <div id="editDiv"  style="display:none">
                            asdasdasd   
                        </div>
                      
                    </div>
                    <div class=" flex justify-start items-end pl-6 pb-6 text-white gap-5">
                            <button class="py-2 px-12  bg-red-500 rounded-lg" onclick="editDetails()" id="editButton">Edit</button>
                            <button class="py-2 px-12  bg-red-500 rounded-lg hidden" id="saveButton">Save</button>
                            <button class="py-2 px-12  bg-red-500 rounded-lg hidden" onclick="cancelEdit()" id="cancelButton">Cancel</button>
                    </div>
                        
                </div>  
                

            </div>
            <div class="col-start-4 row-span-6 col-span-3 bg-white drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)] rounded-xl">
                <div>
                    <form action="">
                        <label for=""></label>
                    </form>
                </div>
            </div>
            
        
        </div>


       
            
    </article>
    <div class="fixed top-0 left-0 h-full w-full bg-white/30 backdrop-blur-sm" id="logoutModal" >
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

<script src="./script/jscript.js"></script>
<script>

</script>
<?php endif ?>
</body>
</html>