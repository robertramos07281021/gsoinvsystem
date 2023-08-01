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

    <link rel="stylesheet" type="text/css" href="../GSOInvSys/css/department_mgmt.css">

    <script src="https://cdn.tailwindcss.com"></script>
    
    <title>GSO Invsys</title>
   
  
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
                    <a aria-current="page" href="index.php">
                        <li class="mb-2 w-full hover:bg-red-300/20 p-3 rounded-md font-semibold flex gap-1 transition ease-out duration-300 "><img src="./image/dashboard.png" class="rounded w-6 h-6">Dashboard</li>
                    </a>
                    <a href="user_management.php">
                        <li class="mb-2 w-full p-3 hover:bg-red-300/20 rounded-md font-semibold flex gap-1 items-center transition ease-out duration-300"><img src="./image/users.png" class="bg-white p-1 rounded w-6 h-6">Users</li>
                    </a>

                    <a href="user_management_dept.php">
                        <li class="mb-2 w-full p-3 bg-red-300/20 rounded-md font-bold flex gap-1 items-center "><img src="./image/department.png"  class="bg-white p-1 rounded w-6 h-6">Departments</li>
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
                <button onclick="logoutModal()" class="font-semibold hover:font-bold w-full justify-end items-center  py-2 pl-2 flex rounded-md hover:bg-red-300/20 hover:pr-2"><img src="./image/icons8-logout-64.png" alt="logut" width="20" height="20"><p class="flex items-center">Log Out</p></button>
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

    <article class=" col-span-4 pt-6 pr-6 w-full h-full  ">
        
            <div class="flex justify-between text-white">
                <p class="font-semibold "><a href="user_management_dept.php">Departments</a> / <span class="text-gray-300">Manage Departments</span></p>
                <p class="font-semibold"> Welcome  Admin <span class="font-bold text-xl" ><?php echo ucfirst($row['firstname']) ." ".ucfirst ($row  ['lastname']);?></span></p>
            </div>
            <div class="w-full h-[93%] ">
                <div class="w-full h-full gap-6 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                    <div class="w-full h-full grid-flow-row-dense grid grid-cols-6 grid-rows-6 gap-6  pt-6">
                        <div class="bg-white col-span-3 rounded-lg p-2 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]">
                <!-- Add department -->
                            <form class="w-full flex-col flex items-end gap-1">
                                <input type="text" class="w-full border-2 pl-1 py-[2px] focus:outline-none border-gray-400 rounded" name="dept_name" placeholder="Department Name">
                                <button class="px-4 py-1 bg-red-500 rounded text-white border border-red-500 font-semibold transition ease-out duration-300 hover:bg-white hover:text-red-500 hover:border-red-500 " id="addDeptButton">Add Department</button>
                            </form>

                        </div>
                        <div class="row-start-2 col-span-3 row-span-5 border bg-white rounded-lg p-6 drop-shadow-[0_0px_3px_rgba(0,0,0,0.5)]" >
                <!-- Display department -->
                <!-- sample only -->
                            <table class="w-full ">
                                <thead>
                                    <tr>
                                        <td class="text-lg pb-5 font-bold" colspan="2">Departments</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>HR</td>
                                        <td class="flex justify-end gap-2"><span class="border-r border-gray-500/50 px-2">Edit</span><span>Delete</span></td>
                                        
                                    </tr>
                                </tbody>
                            </table>


                            
                        </div>
                        <div class="col-start-4 col-span-3 row-span-3 bg-white rounded-lg p-3">
                            <form class="flex h-[100%] flex-col ">
                                <p class="text-xl font-semibold">Merge Department</p>
                                <ul class="w-full grid grid-cols-4 mt-2"> 
                                    <?php if(count($deptChoice) > 0 ) {?>
                                        <?php foreach($deptChoice as $deptChoices) { ?>
                                            <li class=" w-full  flex justify-center">
                                                <input type="checkbox" name="<?php echo $deptChoices ?>" id="<?php echo $deptChoices ?>" value="<?php echo $deptChoices ?>">
                                                <label for="<?php echo $deptChoices ?>" class="  w-full ">
                                                <p class="w-full flex items-center ml-2"><?php echo $deptChoices ?></p>
                                                </label>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                                
                                <div class=" h-full flex items-end ">
                                    <div class="w-full flex justify-between border-t-2 border-gray-200 pt-3">
                                        <input type="text" name="newDepartmentName" placeholder="New Department Name" class="p-1 border-2 border-gray-400 rounded focus:outline-none" size="50">
                                        <button class="px-14 border border-red-500 text-white bg-red-500 text-lg font-semibold rounded transition ease-out duration-300 hover:bg-white hover:text-red-500 hover:border-red-500" id="logOutButton">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-start-4 col-span-3 row-start-4 row-span-3 bg-white rounded-lg">
                            
                        </div>

                    </div>
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
                            <a href="index.php?logout='1'" class=" font-bold"><button class="p-1  w-20 bg-red-500 rounded text-white border border-red-500 font-semibold transition ease-out duration-300 hover:bg-white hover:text-red-500 hover:border-red-500" id="logOutButton">Yes</button></a>
                            
                            <button class="p-1 w-20 bg-red-500 rounded text-white border border-red-500 font-semibold transition ease-out duration-300 hover:bg-white hover:text-red-500 hover:border-red-500" onclick="noLogout()" id="logOutButton">No</button>
                        </div>    
                    </div>
                </div>
            <div>
        </div>
    </div>

<script src="./script/jscript.js" > 

 </script>
<?php endif ?>
</body>
</html>