<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Items</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body>
<!-- <nav class=" p-6 fixed h-full w-[20%]">
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
                        
                        <a href="department.php">
                            <li class="mb-5 w-full p-3 hover:bg-red-300/20 rounded-md">department</li>
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
</nav> -->
    <article class=" col-span-4 py-6 pr-6 w-full h-full ">
        <div class="container my-5">
            <h2>List of Items</h2>
            <a class="btn btn-primary" href="/gsoinvsystem/additem.php" role="button">New Item</a>
        </div>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>department Name</th>
                    <th>Property Code</th>
                    <th>User</th>
                    <th>Description</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "gsoinventory";

                // Connection to the database
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // Read all rows from the database table "items" and join with "department" table to get department name
                $sql = "SELECT items.*, department.dep_name FROM items 
                        LEFT JOIN department ON items.dep_id = department.dep_id";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // Read data of each row and display in the table
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['item_name']}</td>
                        <td>{$row['dep_name']}</td>
                        <td>{$row['property_code']}</td>
                        <td>{$row['end_user']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/gsoinvsystem/editItem.php?id={$row['id']}'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/gsoinvsystem/deleteitem.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </article>
</body>
</html>