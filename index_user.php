<?php include('server.php');   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <title>GSO Invsys</title>
</head>
<body>
<h1>Welcome Regular user!</h1>
<?php 
    if (isset($_SESSION['success'])): 

?>
<h3>
    <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    ?>
</h3>


<?php endif ?>

<?php 
if (isset($_SESSION['username'])): ?>

    <p> Welcome <strong> <?php echo $_SESSION['firstname'] ." ". $_SESSION['lastname'];  ?>  </strong></p>
    <p> <a href="index.php?logout='1'"> Logout </a></p>
<?php endif ?>

    
</body>
</html>