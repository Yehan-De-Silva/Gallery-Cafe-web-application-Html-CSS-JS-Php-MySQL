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
    <section class="event-hero" id="event-hero"> 
            <h1>Events</h1>         
    </section>

    <section class="evnt-container">

        <div class="event-heading">
            <h2>Celebrate at Gallery Cafe !</h2>
            <hr>
        </div>
        <div class="upcoming-events">

        </div>
        <div class="eventTypes">
        <h3>Plan Your Event With Us</h3>
        <p>Looking for the perfect spot to host your next event? Gallery Cafe has got you covered! From intimate 
        gatherings to grand celebrations, we’ve got the ideal space and vibe for every occasion.</p>
        <div class="eventGrid">
            <div class="evt">
                <img src="Images/Event/birthday.jpg"  alt="birthdays">
                <h4>Birthday Parties</h4>
            </div>
            <div class="evt">
                <img src="Images/Event/annivers.jpg" alt="anniversary">
                <h4>Anniversary Parties</h4>
            </div>
            <div class="evt">
                <img src="Images/Event/bachelParty.jpg" alt="Bachelor-party">
                <h4>Bachelor & Bachelorette Parties</h4>
            </div>
            <div class="evt">
                <img src="Images/Event/corpGather.jpg" alt="corporate-gatherings">
                <h4>Corporate Gatherings</h4>
            </div>
            <div class="evt">
                <img src="Images/Event/famGather.jpg" alt="family-gatherings">
                <h4>Family Gatherings</h4>
            </div>
            <div class="evt">
                <img src="Images/Event/holiParty.jpg" alt="holiday-party">
                <h4>Holiday Parties</h4>
            </div> 
        </div>
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