<?php 
session_start();

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
    <!--account icon-->
    <div class="header-icon">  
        <a href="Login.php"><i class='bx bx-user-circle' id="loginIcon"></i></a> 
    </div>
    
    </header>

    <!--Hero Section-->
    <section class="contact-hero" id="contact-hero"> 
            <h1>Contact US</h1>         
    </section>

    <section class="cont-container">
        <div class="cont-box">
            <div class="no">
                <i class='bx bx-phone bx-tada' ></i>
                <h2>Phone</h2>
                <h3>+94 11 234 5678</h3>
            </div>
            <div class="mail">
                <i class='bx bx-envelope bx-tada' ></i>
                <h2>Email</h2>
                <h3>info@thegallerycafe.lk</h3>
            </div>
            <div class="loc">
                <i class='bx bx-map bx-tada' ></i>
                <h2>Location</h2>
                <h3>The Gallery Café</h3>
                <h3>123 Main Street, Colombo 07,</h3> 
                <h3>Sri Lanka</h3>
            </div>
        </div>
        <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.041693220887!2d79.85776837571429!3d6.885609518847977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25bc4fdc4eac3%3A0xfde7cffd35d72eb9!2sICBT%20Campus!5e0!3m2!1sen!2slk!4v1724680001437!5m2!1sen!2slk" 
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>


   
    

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