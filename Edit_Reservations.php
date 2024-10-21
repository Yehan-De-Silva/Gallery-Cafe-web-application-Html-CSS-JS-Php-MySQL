<?php
    include('DBconnection.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET'  && isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM confirmed_reservation  WHERE Res_Id = '$id'";
        $result = mysqli_query($conn,$sql);

        if($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $date = $row['Date'];
            $time = $row['Time'];
            $party = $row['Party'];
            $name = $row['Name'];
            $email = $row['Email'];
            $phone = $row['Phone'];

        }else{
            echo "<script>
                    alert('No bookings found with this ID');
                    window.location.href='Reservation_MNG.php';
                </script>";
            exit;
        }

    }
    else if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $party = $_POST['party'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "UPDATE confirmed_reservation SET Date = '$date', Time = '$time', Party = '$party', Name = '$name', Email = '$email', Phone = '$phone' WHERE Res_Id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "<script>
                    alert('Booking Edited Successfully');
                    window.location.href='Reservation_MNG.php';
                </script>";
            exit;
        } else {
            echo "<script>
                        alert('Failed to edit an Item...!');
                        window.location.href='Reservation_MNG.php';
                </script>";

        } 


    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu Item</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header class="admin-dashboard">
    <h2><a href="StaffPage.php">Dashboard</a></h2>
    <a href="Logout.php" class="button">Logout</a>
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

<section class="ResMNG">
<div class="edit-res">
    <h3>Edit Reservation</h3>
    <div class="edit-res-form">
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
    
            <div class="addItem">
                <label>Date:</label>
                <input type="date" name="date" value="<?php echo $date; ?>" required>
            </div>
            <div class="addItem">
                <label>Time:</label>
                <input type="text" name="time" value="<?php echo $time; ?>" required>
            </div>
            <div class="addItem">
                <label>Party:</label>
                <input type="text" name="party" value="<?php echo $party; ?>" required>
            </div>
            <div class="addItem">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="addItem">
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="addItem">
                <label>Phone:</label>
                <input type="tel" name="phone" value="<?php echo $phone; ?>" required>
            </div>
            <div class="addItem">
                <button type="submit" class="button" name="editRes">Edit Reservation</button>
            </div>
        </form>
    </div>
</div>
</section>

</body>
</html>
