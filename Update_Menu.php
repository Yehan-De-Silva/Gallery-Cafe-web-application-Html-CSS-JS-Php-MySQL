<?php
    include('DBconnection.php');

    if(isset($_GET['id'])){
        $m_id = $_GET['id'];

        $del_menu = "DELETE from menuitems where id='$m_id'";
        $del = mysqli_query($conn,$del_menu);

    }



    $sql = "SELECT m.*, c.Category_Name 
            FROM menuitems m
            JOIN category c ON m.Category_ID = c.Id";
    $result = mysqli_query($conn, $sql);



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

<section class="viewMenu">
   <div >
    <h3>Menu Items</h3>
    <table class="tbMenu">
        <tr>
            <th><h4>Title</h4></th>
            <th><h4>Price</h4></th>
            <th><h4>Image</h4></th>
            <th><h4>Category</h4></th>
            <th><h4>Action</h4></th>
        </tr>
    <?php
        while($row=mysqli_fetch_assoc($result))
        {    
    ?>  
        <tr>
            <td><?php echo $row['Title'] ?></td>
            <td><?php echo $row['Price'] ?></td>
            <td>
                <img src="Images/menu/<?php echo $row['Image'] ?>">
            </td>
            <td><?php echo $row['Category_Name'] ?></td>
            <td><a class="MeditBtn" href="Edit_Menu.php?id=<?php echo $row['Id']?>">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this..?')" class="MDelBtn" href="Update_Menu.php?id=<?php echo $row['Id']?>">Delete</a>
            </td>
        </tr>
    <?php
        }  
    ?>
    </table>
   </div>

</section>

</body>
</html>

