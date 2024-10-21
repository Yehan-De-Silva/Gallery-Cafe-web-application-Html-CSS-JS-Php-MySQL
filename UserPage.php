<?php 
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    
<section class="userpage">

<div class="user-container">

    <h4>Welcome <?php echo $_SESSION["username"]; ?>!!</h4>
    <a href="Reservation.php"><button type="button" class="button">Reservation</button></a>
    <a href="Pre-Order.php"><button type="button" class="button">Pre-Order</button></a>

</div>
</section>

</body>
</html>