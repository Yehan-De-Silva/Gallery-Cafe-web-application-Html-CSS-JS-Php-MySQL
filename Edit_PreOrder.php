<?php
    include('DBconnection.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET'  && isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM confirmed_pre_orders  WHERE Po_Id = '$id'";
        $result = mysqli_query($conn,$sql);

        if($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $date = $row['Date'];
            $time = $row['Time'];
            $food = $row['Food Item'];
            $quantity = $row['Quantity'];
            $total = $row['Total'];
            $name = $row['Name'];
            $email = $row['Email'];
            $phone = $row['Phone'];

        }else{
            echo "<script>
                    alert('No pre orders found with this ID');
                    window.location.href='Pre_Order_MNG.php';
                </script>";
            exit;
        }

    }
    else if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $id = $_POST['id'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $food = $_POST['food'];
        $quantity = $_POST['quantity'];
        $total = $_POST['total'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "UPDATE confirmed_pre_orders SET Date = '$date', Time = '$time', `Food Item` = '$food', Quantity = '$quantity', Total = '$total', Name = '$name', Email = '$email', Phone = '$phone' WHERE Po_Id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "<script>
                    alert('Order Edited Successfully');
                    window.location.href='Pre_Order_MNG.php';
                </script>";
            exit;
        } else {
            echo "<script>
                        alert('Failed to edit Order...!');
                        window.location.href='Pre_Order_MNG.php';
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
    <h3>Edit Pre Order</h3>
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
                <label>Food:</label>
                <input type="text" name="food" value="<?php echo $food; ?>" required>
            </div>
            <div class="addItem">
                <label>Quantity:</label>
                <input type="text" name="quantity" value="<?php echo $quantity; ?>" required>
            </div>
            <div class="addItem">
                <label>Total:</label>
                <input type="text" name="total" value="<?php echo $total; ?>" required>
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
                <button type="submit" class="button" name="editRes">Edit Pre-Order</button>
            </div>
        </form>
    </div>
</div>
</section>

</body>
</html>
