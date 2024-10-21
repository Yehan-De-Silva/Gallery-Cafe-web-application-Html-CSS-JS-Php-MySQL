<?php 

include('DBconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['NewUsername'], $_POST['NewPassword'], $_POST['NewEmail'],$_POST['userType'])) {
    $Nusername = $_POST['NewUsername'];
    $Npassword = (string)$_POST['NewPassword'];
    $Nemail = $_POST['NewEmail'];
    $userType = $_POST['userType'];
    $Hash =  password_hash($Npassword, PASSWORD_DEFAULT);



    $sql2 = "INSERT INTO user (UserName, Password, UserType, Email) VALUES (?,?,?,?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("ssss", $Nusername, $Hash, $userType, $Nemail);

    if ($stmt2->execute()) {
        echo "<script>
                alert('User Added Successfully..');
                window.location.href='Manage_Users.php';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Fail to add user..Try Again..');
                window.location.href='Manage_Users.php';
              </script>";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header class="admin-dashboard">
    <h2><a href="StaffPage.php">Dashboard</a></h2>
    <a  href="Home.php" class="button" id="HBtn">Visit Site</a>
    <a  href="Logout.php" class="button">Logout</a>
</header>

<aside class="dashAside">
    <div class="welcome">
    <h4>Welcome <?php echo $_SESSION["username"]; ?>!</h4>
    </div>
    <ul class="dashOptions">
        <!-- checking user type -->
        <?php if($_SESSION['UserType'] == "admin") { ?>
        
        <li><a href="Manage_Users.php"><h4>Manage Users</h4></a></li>
        <li><a href="Add_Menu.php"><h4>Add Menu Items</h4></a></li>
        <li><a href="Update_Menu.php"><h4>Update Menu</h4></a></li>
        <li><a href="Update_Site.php"><h4>Update Site Information</h4></a></li>

        <?php } else if ($_SESSION['UserType'] == "staff"){ ?>
        <!-- if user type staff , then admin features disabled -->
        <li><h4 class="disabled">Manage Users</h4></li>
        <li><h4 class="disabled">Add Menu Items</h4></li>
        <li><h4 class="disabled">Update Menu</h4></li>
        <li><h4 class="disabled">Update Site Information</h4></li>
        <?php } ?>

        <li><a href="Reservation_MNG.php"><h4>Reservations</h4></a></li>
        <li><a href="Pre_Order_MNG.php"><h4>Pre Orders</h4></a></li>
    </ul>
</aside>

<section>
     <!-- Register form -->
      <div class="addUser">
     <form method="post" id="regForm" action="">
        <h3>Add New User</h3>
        <input type="text" name="NewUsername" placeholder="Username" required>
        <input type="email" name="NewEmail" placeholder="Email" required>
        <input type="password" name="NewPassword" placeholder="Password" required><br><br>
        <label>User Type :</label>
        <select name="userType">
            <option>customer</option>
            <option>staff</option>
            <option>admin</option>
        </select><br>
        <button class="button"type="submit">Add User</button>
    </form>
    </div>
</section>

</body>
</html>

