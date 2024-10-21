<?php
    include('DBconnection.php');

    if(isset($_POST['addFood'])){
        $title = $_POST['title'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        $image_name = $_FILES['image']['name'];
        $tmp = explode(".",$image_name);
        $newfilename = round(microtime(true)).'.'.end($tmp);
        $uploadpath = "Images/menu/" .$newfilename;
        move_uploaded_file($_FILES['image']['tmp_name'],$uploadpath);
        
        $sql = "INSERT into menuitems (Title,Price,Image,Category_ID) values ('$title','$price','$newfilename','$category')";
        $result = mysqli_query($conn,$sql);

        if($result){
            echo "<script>alert('Item Added Successfully');</script>";
        }
        else{
            echo "<script>alert('Failed to add an Item...!');</script>";
        }

    }

    if(isset($_POST['addCategory'])){
        $categoryName = $_POST['categoryName'];
        $sql2 = "INSERT into category (Category_Name) values ('$categoryName')";
        $result = mysqli_query($conn,$sql2);

        if($result){
            echo "<script>alert('Category Added Successfully');</script>";
        }
        else{
            echo "<script>alert('Failed to add category...!');</script>";
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

<section class="menuMNG">

<div class="add-menu">
        <h3>Add Menu Item</h3>
        <div class="add-menu-form">

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="addItem">
                    <label>Title:</label>
                    <input type="text" name="title" required>
                </div>
                <div class="addItem">
                    <label>Price:</label>
                    <input type="text" name="price" value="Rs." required>
                </div>
                <div class="addItem">
                    <label>Category:</label>
                    <select name="category">
                        <?php 
                            include('DBconnection.php');
                            $categories = mysqli_query($conn, "select * from category");
                            while($c = mysqli_fetch_array($categories)) {
                        ?>
                        <option value="<?php echo $c['Id']?>"><?php echo $c['Category_Name'] ?></option>
                        <?php } ?>
                    </select>
                </div><br>
                <div class="addItem">
                    <label>Image:</label>
                    <input type="file" name="image" required>
                </div>
                <div class="addItem">
                    <button type="submit" class="button" name="addFood">Add Item</button>
                </div>
            </form>
        </div>
</div>

<div class="addCat">
    <h3>Add Category</h3>
    <div class="add-menu-form">

            <form method="POST" action="">
                <div class="addItem">
                    <label>Category Name:</label>
                    <input type="text" name="categoryName" required>
                </div>
                <div class="addItem">
                    <button type="submit" class="button" name="addCategory">Add Category</button>
                </div>
            </form>
    </div>                            
</div>



</section>






</body>
</html>

