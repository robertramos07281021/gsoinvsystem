<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Items</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Items</h2>
        <a class="btn btn-primary" href="/GSOInvSys/additem.php" role="button">New Item</a>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Office Name</th>
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

            // Read all rows from the database table "items" and join with "office" table to get office name
            $sql = "SELECT items.*, office.officeName FROM items 
                    LEFT JOIN office ON items.office_id = office.office_id";
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
                    <td>{$row['officeName']}</td>
                    <td>{$row['property_code']}</td>
                    <td>{$row['end_user']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/GSOInvSys/editItem.php?id={$row['id']}'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/GSOInvSys/deleteitem.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>
</html>