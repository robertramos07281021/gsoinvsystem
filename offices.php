<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "gsoinventory";

// Connection to the database
$connection = new mysqli($servername, $username, $password, $database);

$ooficeName = "";

function validate_fields($required_fields) {
    global $errors;

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst($field) . " is required.";
        }
    }
}

function remove_junk($value) {
    // Implement your logic to sanitize the data here, for example:
    $value = trim($value);              // Remove leading and trailing spaces
    $value = stripslashes($value);      // Remove backslashes
    $value = htmlspecialchars($value); // Convert special characters to HTML entities
    return $value;
}

function display_msg() {
    if (!empty($_SESSION['message'])) {
        $msg = $_SESSION['message'];
        unset($_SESSION['message']);
        return $msg;
    }
    return '';
}

function redirect($url, $permanent = false) {
    if (headers_sent() === false)
    {
      header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

if (isset($_POST['add_office'])) {
    $req_field = array('officeName');
    validate_fields($req_field);
    $officeName = remove_junk($connection->escape_string($_POST['officeName']));
    if (empty($errors)) {
        $sql  = "INSERT INTO office (officeName)";
        $sql .= " VALUES ('{$officeName}')";
        if ($connection->query($sql)) { 
            display_msg(array('success' => "Successfully Added New Office"));
            redirect('offices.php', false);
        } else {
            display_msg(array('danger' => "Sorry Failed to insert."));
            redirect('offices.php', false);
        }
    } else {
        display_msg(array('danger' => $errors));
        redirect('offices.php', false);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>offices</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
 
</head>
<body>
<div class="row">
     <div class="col-md-12">
        <?php echo display_msg(); ?>
     </div>
  </div>
   <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Office</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="offices.php">
            <div class="form-group">
                <input type="text" class="form-control" name="officeName" placeholder="Office Name">
            </div>
            <button type="submit" name="add_office" class="btn btn-primary">Add Offices</button>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Offices</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Offices</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // read all row from database table
                $sql = "SELECT * from office";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // read data of each row

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['office_id']}</td>
                        <td>{$row['officeName']}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/GSOInvSys/editOffice.php?id={$row['office_id']}'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/GSOInvSys/deleteOffice.php?id={$row['office_id']}'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
    </table>
</body>
</html>