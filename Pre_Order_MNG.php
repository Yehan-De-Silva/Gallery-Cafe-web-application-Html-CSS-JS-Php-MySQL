<?php
include('DBconnection.php');

if(isset($_GET['id'])){
    $p_id = $_GET['id'];

    $del_PO = "DELETE from pre_orders WHERE Po_Id = '$p_id'";
    $del = mysqli_query($conn,$del_PO);

}
if(isset($_GET['Pid'])){
    $P_id = $_GET['Pid'];
    $del_po = "DELETE from confirmed_pre_orders WHERE Po_Id = '$P_id'";
    $delete = mysqli_query($conn,$del_po);

}

if(isset($_GET["ConId"])){
   $ConId = $_GET["ConId"];
   $cut = "INSERT INTO confirmed_pre_orders (User_Id, Date, Time, `Food Item`, Quantity, Total, Name, Email, Phone)
            SELECT User_Id, Date, Time, `Food Item`, Quantity, Total, Name, Email, Phone FROM pre_orders WHERE Po_Id ='$ConId'";

   $insert = mysqli_query($conn,$cut);

    // Check if the insert query was successful
   if($insert){
    // Execute the delete query
    $del_po = "DELETE FROM  pre_orders WHERE Po_Id ='$ConId'";
    $delete_result = mysqli_query($conn, $del_po);
    
    if(!$delete_result){
        // If the delete query failed
        echo "Error deleting Pre order: " . mysqli_error($conn);
    }
} else {
    // If the insert query failed, log the error
    echo "Error inserting pre order: " . mysqli_error($conn);
}

}

$sql = "SELECT * from pre_orders";
$result = mysqli_query($conn,$sql);

$sql2 = "SELECT * from confirmed_pre_orders";
$result2 = mysqli_query($conn,$sql2);


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

<section class="viewPO">

<h3>Pre-Order Requests</h3>

<div class="tbp" >
    
    <table class="tbPoReq">
        <tr>
            <th><h4>Po_Id</h4></th>
            <th><h4>User_Id </h4></th>
            <th><h4>Date</h4></th>
            <th><h4>Time</h4></th>
            <th><h4>Food Item</h4></th>
            <th><h4>Quantity</h4></th>
            <th><h4>Total</h4></th>
            <th><h4>Name</h4></th>
            <th><h4>Email</h4></th>
            <th><h4>Phone</h4></th>
            <th><h4>Action</h4></th>
        </tr>
    <?php
          while($row=mysqli_fetch_assoc($result))
          {
    ?>  
        <tr>
            <td><?php echo $row['Po_Id'] ?></td>
            <td><?php echo $row['User_Id'] ?></td>
            <td><?php echo $row['Date'] ?></td>
            <td><?php echo $row['Time'] ?></td>
            <td><?php echo $row['Food Item'] ?></td>
            <td><?php echo $row['Quantity'] ?></td>
            <td><?php echo $row['Total'] ?></td>
            <td><?php echo $row['Name'] ?></td>
            <td><?php echo $row['Email'] ?></td>
            <td><?php echo $row['Phone'] ?></td>
            <td id="ACT"><a class="confirmBtn" href="Pre_Order_MNG.php?ConId=<?php echo $row['Po_Id']?>">Confirm</a>
                <a onclick="return confirm('Are you sure you want to delete this..?')" class="DelBtn" href="Pre_Order_MNG.php?id=<?php echo $row['Po_Id']?>">Cancel</a>
            </td>
        </tr>
    <?php
        } 
    ?>
    </table>
   </div>


</section>

<section class="confPO">

    <h3>Confirmed Pre-Orders</h3>
    
   <div class="tbp" >
   
    <table class="tbPo">
        <tr>
            <th><h4>Po_Id</h4></th>
            <th><h4>User_Id </h4></th>
            <th><h4>Date</h4></th>
            <th><h4>Time</h4></th>
            <th><h4>Food Item</h4></th>
            <th><h4>Quantity</h4></th>
            <th><h4>Total</h4></th>
            <th><h4>Name</h4></th>
            <th><h4>Email</h4></th>
            <th><h4>Phone</h4></th>
            <th><h4>Action</h4></th>
        </tr>
    <?php
          while($row2=mysqli_fetch_assoc($result2))
          {
    ?>  
        <tr>
            <td><?php echo $row2['Po_Id'] ?></td>
            <td><?php echo $row2['User_Id'] ?></td>
            <td><?php echo $row2['Date'] ?></td>
            <td><?php echo $row2['Time'] ?></td>
            <td><?php echo $row2['Food Item'] ?></td>
            <td><?php echo $row2['Quantity'] ?></td>
            <td><?php echo $row2['Total'] ?></td>
            <td><?php echo $row2['Name'] ?></td>
            <td><?php echo $row2['Email'] ?></td>
            <td><?php echo $row2['Phone'] ?></td>
            <td id="act">
                <a class="editPo" id="edt" href="Edit_PreOrder.php?id=<?php echo $row2['Po_Id'] ?>">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this..?')" class="DelBtn" href="Pre_Order_MNG.php?Pid=<?php echo $row2['Po_Id']?>">Cancel</a>
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

