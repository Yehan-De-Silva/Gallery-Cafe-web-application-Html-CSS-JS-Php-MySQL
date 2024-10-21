<?php 
 include('DBconnection.php');

 $categories = mysqli_query($conn, "SELECT * FROM category");

 $menu = mysqli_query($conn, "SELECT * FROM menuitems");

 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Cafe</title>
    <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon"/>
    <!--swiper css import-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!--local css file-->
    <link rel="stylesheet" href="styles.css">
    <!--BoxIcons web site css linked for get icons-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
      
</head>

<body>
    
<!--NavBar-->
    <header>
        
        <a  href="#"><img src="Images/logo2.PNG" alt="logo" class="logo"></a>
    <!--Menu icon-->
        <i class='bx bx-menu' id="menu-icon"></i>

<!--Navlinks-->
   <ul class="nav">
    <li><a href="Home.php" id="home">Home</a></li>
    <li><a href="Menu.php" id="menu">Menu</a></li>   
    <li><a href="Reservation.php" id="reservation">Reservation</a></li>
    <li><a href="Pre-Order.php" id="preOrder">Pre-Order</a></li>
    <li><a href="About.php" id="about">About</a></li>
    <li><a href="Events.php" id="events">Events</a></li>
    <li><a href="Contact.php" id="contact">Contact</a></li>
   </ul>

   <h4 class="displayUname"><?php 
            if (isset($_SESSION["username"])) {
                echo "Hi " . htmlspecialchars($_SESSION["username"]) . "!";
            } else {
                echo "Hi Guest!";
            }
            ?>
        </h4>
    <!--Account icon-->
    <div class="header-icon">  
        <a href="Login.php"><i class='bx bx-user-circle' id="loginIcon"></i></a> 
    </div>
    
    </header>

    <!--Hero Section-->
    <section class="menu-hero" id="menu-hero"> 
            <h1>Discover Our Menu</h1> 
                 
    </section>

    <!--Menu Section-->
<div class="menu-section-container">
    <aside class="menuSideBar">
        <div class="Mcategory">
                <a href="Menu.php">All</a>
            </div>
            <?php
            while($c = mysqli_fetch_array($categories)) {
            ?>
            <div class="Mcategory">
                <a href="Menu.php?Mid=<?php echo $c['Id']?>"><?php echo $c['Category_Name']; ?></a>
            </div>
            <?php
            }
            ?>
    </aside>
    <section class="menuContainer">
        
        <div class="searchBox">
            <form method="GET" action="" class="menuSearchForm">
            <input type="search" name="search" id="search" placeholder="Search Here............" required>
            <button type="submit"><i class='bx bx-search-alt-2' style='color:#0e0e0e'></i></button>
            </form>
        </div>
        
        <div class="menuBoxContainer">
        
        <?php
            if (isset($_GET['search'])) {
                $search = mysqli_real_escape_string($conn, $_GET['search']);
                $search_query = "SELECT * FROM menuitems WHERE Title LIKE '%$search%'";
                $sql = mysqli_query($conn, $search_query);

                if (mysqli_num_rows($sql) > 0) {
                    while ($row = mysqli_fetch_array($sql)) {
            ?>
                        <div class="menuBox">
                            <img src="Images/menu/<?php echo $row['Image']; ?>">
                            <h3><?php echo $row['Title']; ?></h3>
                            <h4><?php echo $row['Price']; ?></h4>
                        </div>
            <?php
                    }
                } else {
            ?>
                        <?php echo "<p>No results found for '" . htmlspecialchars($search) . "'</p>"; ?>
                    
            <?php
                }
            } elseif (isset($_GET['Mid'])) { // If category is selected
                $M_id = $_GET['Mid'];
                $Load_Menu = "SELECT * FROM menuitems WHERE Category_ID = '$M_id'";
                $sql = mysqli_query($conn, $Load_Menu);

                while ($row = mysqli_fetch_array($sql)) {
            ?>
                    <div class="menuBox">
                        <img src="Images/menu/<?php echo $row['Image']; ?>">
                        <h3><?php echo $row['Title']; ?></h3>
                        <h4><?php echo $row['Price']; ?></h4>
                    </div>
            <?php
                }
            } else { // Default: load all menu items
                while ($row = mysqli_fetch_array($menu)) {
            ?>
                    <div class="menuBox">
                        <img src="Images/menu/<?php echo $row['Image']; ?>">
                        <h3><?php echo $row['Title']; ?></h3>
                        <h4><?php echo $row['Price']; ?></h4>
                    </div>
            <?php
                }
            }
            ?> 
       
        </div>
    </section>
</div>






    <!--Footer-->
   <section class="footer">

        <img src="Images/logo2.PNG" alt="logo">
        <div class="footer-box">
            <div class="col1">
                <h3>Address</h3>
                <p>The Gallery Café</p>
                <p>123 Main Street, Colombo 07, Sri Lanka</p>
                <br><br>
                <h3>Contact</h3>
                <p>Phone: +94 11 234 5678</p>
                <p>Email: info@thegallerycafe.lk</p><br>
                <div class="social">
                    <a href="#"><i class='bx bxl-facebook-circle' style='color:#ffffff'  ></i></a>
                    <a href="#"><i class='bx bxl-instagram' style='color:#ffffff' ></i></a>
                    <a href="#"><i class='bx bxl-tiktok' style='color:#ffffff' ></i></a>
                    <a href="#"><i class='bx bxl-youtube' style='color:#ffffff' ></i></a>
                </div>
            </div>
            <div class="col2">
                <h3>Opening Hours</h3>
                <p>Monday - Thursday: <br> 8:00 AM - 10:00 PM</p><br>
                <p>Friday - Sunday: <br>8:00 AM - 11:00 PM</p>
            </div>
            <div class="col3">
                <h3>Quick Links</h3>
                <ul class="foot">
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="Menu.php">Menu </a></li>
                    <li><a href="Reservation.php">Reservation</a></li>
                    <li><a href="Pre-Order.php">Pre-Order</a></li>
                    <li><a href="About.php">About</a></li>
                    <li><a href="Events.php">Events</a></li>
                    <li><a href="Contact.php">Contact</a></li>                   
                </ul>
            </div>
        </div>

        <div class="credits">
            <p><i class='bx bx-copyright bx-tada' style='color:#ffffff' ></i>2024 The Gallery Café. All rights reserved.</p>
        </div>
   </section>
    

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!--swiper script import-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!--local script-->
    <script src="Script.js"></script> 

</body>
</html>