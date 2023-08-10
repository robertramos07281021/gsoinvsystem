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

$departments = array(); // Initialize an array to hold department names

// Fetch the list of departments from the database
$sql = "SELECT dep_name FROM department"; // Modify the query to match your table structure
$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $departments[] = $row['dep_name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GSO Invsys</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-theme.min.css">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <center>
        <h2>GSO Invsys Inventory Report</h2>
        <h3>As of <?= date('m-d-Y'); ?></h3>
    </center>
    <br />
    
    <!-- Add the dropdown for selecting the department -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label for="departmentSelect">Select Department:</label>
                <select id="departmentSelect" class="form-control">
                    <option value="">Select Department</option>
                    <?php foreach ($departments as $dept): ?>
                        <option value="<?= $dept; ?>"><?= $dept; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    
    <br />
    <div class="table-responsive">
        <table id="myTable-report" class="table table-bordered table-hover" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Department</th>
                    <th>Property Code</th>
                    <th>Quantity</th>
                    <th>End User</th>
                    <th>Created At</th>
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
                        LEFT JOIN department ON items.dep_name = department.dep_name";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // Initialize an array to store the item counts per department
                $itemCounts = array();

                // Read data of each row and display in the table
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr data-dep-id='{$row['dep_name']}'>
                        <td>{$row['item_name']}</td>
                        <td>{$row['dep_name']}</td>
                        <td>{$row['property_code']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['end_user']}</td>
                        <td>{$row['created_at']}</td>
                    </tr>
                    ";

                    // Count the items per department and store it in the array
                    $department = isset($row['dep_name']) ? ucfirst($row['dep_name']) : '';
                    if (isset($itemCounts[$department])) {
                        $itemCounts[$department]++;
                    } else {
                        $itemCounts[$department] = 1;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button id="printButton" class="btn btn-primary">Print Report</button>
            </div>
        </div>
    </div>  
    <script>
        document.getElementById('printButton').addEventListener('click', function () {
        // Call the browser's print function
        window.print();
        });
        // Add event listener to the department select dropdown
        document.getElementById('departmentSelect').addEventListener('change', function () {
            var selectedDepartment = this.value;
            var rows = document.querySelectorAll('#myTable-report tbody tr');

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var department = row.getAttribute('data-dep-id');

                // If no department is selected or the row's department matches the selected department, show the row
                if (!selectedDepartment || department === selectedDepartment) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>
