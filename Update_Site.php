<?php 
 include('DBconnection.php');

 if(isset($_POST['addDow'])){
     $title = $_POST['title'];
     $description = $_POST['description'];

     $image_name = $_FILES['image']['name'];
     $tmp = explode(".",$image_name);
     $newfilename = round(microtime(true)).'.'.end($tmp);
     $uploadpath = "Images/DOW/" .$newfilename;
     move_uploaded_file($_FILES['image']['tmp_name'],$uploadpath);
     
     $sql = "INSERT into dow (Title,Description,Image) values ('$title','$description','$newfilename')";
     $result = mysqli_query($conn,$sql);

     if($result){
         echo "<script>alert('Item Added Successfully');</script>";
     }
     else{
         echo "<script>alert('Failed to add an Item...!');</script>";
     }

 }


 if(isset($_POST['addPromo'])){

    $image_name = $_FILES['image']['name'];
    $tmp = explode(".",$image_name);
    $newfilename = round(microtime(true)).'.'.end($tmp);
    $uploadpath = "Images/Promo/" .$newfilename;
    move_uploaded_file($_FILES['image']['tmp_name'],$uploadpath);
    
    $sql = "INSERT into promotions (Image) values ('$newfilename')";
    $result = mysqli_query($conn,$sql);

    if($result){
        echo "<script>alert('Promo details Added Successfully');</script>";
    }
    else{
        echo "<script>alert('Failed to add details...!');</script>";
    }

}
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

<section class="DowMNG">

<div class="add-dow">
        <h3>Add DOW Items</h3>
        <div class="add-dow-form">

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="addItem">
                    <label>Title:</label>
                    <input type="text" name="title" required>
                </div>
                <div class="addItem">
                    <label>Description:</label>
                    <input type="textarea" name="description" required>
                </div>
                <div class="addItem">
                    <label>Image:</label>
                    <input type="file" name="image" required><br><br>
                </div>
                <div class="addItem">
                    <button type="submit" class="button" name="addDow">Add Item</button>
                </div>
            </form>
        </div>
</div>

<div class="add-promo">
        <h3>Add Promotions</h3>
        <div class="add-dow-form">

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="addItem">
                    <label>Image:</label>
                    <input type="file" name="image" required><br><br>
                </div>
                <div class="addItem">
                    <button type="submit" class="button" name="addPromo">Add Promo</button>
                </div>
            </form>
        </div>
</div>
</section>

</body>
</html>

