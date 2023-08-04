<?php
// Assuming $db is your database connection
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

// Function to remove special characters from a string (you can define this function elsewhere in your code)
function remove_junk($str)
{
    return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
}

// Fetch item data from the "items" table
$sql = "SELECT * FROM items";
$result = $connection->query($sql);

// Store the item data in the $items array
$items = array();
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

// Close the database connection
$connection->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Report</title>
   <style>
    @media print {
    html, body {
        font-size: 9.5pt;
        margin: 0;
        padding: 0;
    }
    .page-break {
        page-break-before: always;
        width: auto;
        margin: auto;
    }
  }
  .page-break {
    width: 980px;
    margin: 0 auto;
  }
  .sale-head {
    margin: 40px 0;
    text-align: center;
  }
  .sale-head h1, .sale-head strong {
    padding: 10px 20px;
    display: block;
  }
  .sale-head h1 {
    margin: 0;
    border-bottom: 1px solid #212121;
  }
  .table>thead:first-child>tr:first-child>th {
    border-top: 1px solid #000;
  }
  table thead tr th {
    text-align: center;
    border: 1px solid #ededed;
  }
  table tbody tr td {
    vertical-align: middle;
  }
  .sale-head, table.table thead tr th, table tbody tr td, table tfoot tr td {
    border: 1px solid #212121;
    white-space: nowrap;
  }
  .sale-head h1, table thead tr th, table tfoot tr td {
    background-color: #f8f8f8;
  }
  tfoot {
    color: #000;
    text-transform: uppercase;
    font-weight: 500;
  }
   </style>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="sale-head">
                    <h1>Item Report</h1>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Item Name</th>
                                <th class="text-center" style="width: 15%;">End User</th>
                                <th class="text-center" style="width: 15%;">Quantity</th>
                                <th class="text-center" style="width: 15%;">Date Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item): ?>
                                <tr>
                                    <td class="text-center"><?php echo remove_junk($item['id']); ?></td>
                                    <td><?php echo remove_junk($item['item_name']); ?></td>
                                    <td><?php echo remove_junk($item['end_user']); ?></td>
                                    <td class="text-center"><?php echo (int)$item['dep_name']; ?></td>
                                    <td class="text-center"><?php echo $item['created_at']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Print Button -->
    <button onclick="window.print()">Print Report</button>
</body>
</html>
