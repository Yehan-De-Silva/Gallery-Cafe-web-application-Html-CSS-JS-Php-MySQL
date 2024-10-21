<?php
    include('DBconnection.php');

    $image = '';

    if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        
        $sql = "SELECT * FROM menuitems WHERE Id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['Title'];
            $price = $row['Price'];
            $category = $row['Category_ID']; 
            $image = $row['Image'];
        }else {
            echo "<script>
                    alert('No item found with this ID');
                    window.location.href='Update_Menu.php';
                  </script>";
            
            exit;
        }
    } 
    else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $old_image = $_POST['old_image'];

    if($_FILES['image']['name']) {    
        $image_name = $_FILES['image']['name'];
        $tmp = explode(".", $image_name);
        $newfilename = round(microtime(true)) . '.' . end($tmp);
        $uploadpath = "Images/menu/" . $newfilename;
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadpath);

    } else {
        $newfilename = $old_image;
       
    }
        

        $sql = "UPDATE menuitems SET Title = '$title', Price = '$price', Image = '$newfilename', Category_ID = '$category' WHERE Id = '$id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "<script>
                    alert('Item Edited Successfully');
                    window.location.href='Update_Menu.php';
                </script>";
            exit;
        } else {
            echo "<script>
                        alert('Failed to edit an Item...!');
                        window.location.href='Update_Menu.php';
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

<section class="menuMNG">
<div class="edit-menu">
    <h3>Edit Menu Item</h3>
    <div class="edit-menu-form">
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="old_image" value="<?php echo $image; ?>">
            <div class="addItem">
                <label>Title:</label>
                <input type="text" name="title" value="<?php echo $title; ?>" required>
            </div>
            <div class="addItem">
                <label>Price:</label>
                <input type="text" name="price" value="<?php echo $price; ?>" required>
            </div>
            <div class="addItem">
                <label>Category:</label>
                <select name="category">
                    <?php 
                        $categories = mysqli_query($conn, "SELECT * FROM category");
                        while($c = mysqli_fetch_array($categories)) {
                            $selected = ($c['Id'] == $category) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $c['Id']; ?>" <?php echo $selected; ?>><?php echo $c['Category_Name']; ?></option>
                    <?php } ?>
                </select>
            </div><br>
            <div class="addItem">
                <label>Image:</label>
                <input type="file" name="image">
            </div>
            <div class="addItem">
                <button type="submit" class="button" name="editFood">Edit Item</button>
            </div>
        </form>
    </div>
</div>
</section>

</body>
</html>
