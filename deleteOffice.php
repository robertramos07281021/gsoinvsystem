<?php
if (isset($_GET["id"])) {
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "gsoinventory";

    // Connect to the database
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM office WHERE office_id = ?"; // Changed "id" to "office_id"
    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $id);
    $statement->execute();
    $statement->close();
}

header("Location: /GSOInvSys/offices.php");
exit;
?>
