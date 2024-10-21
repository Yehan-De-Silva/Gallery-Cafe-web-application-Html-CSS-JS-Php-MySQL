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
    <section class="reserv-hero" id="reserve-hero"> 
            <h1>Reservations</h1>         
    </section>

    <section class="reserve-form">

        <div class="resFormContainer">
            <form method="post" action="ReservationScript.php">
                <div class="resTitle">
                <h3>Reserve Your Table</h3>
                <hr>
                </div>
                <label>Date</label>
                <input type="date" name="date" required>
                <label>Time</label>
                <select name="time" required>
                    <option>10.00.A.M</option>
                    <option>10.30.A.M</option>
                    <option>11.00.A.M</option>
                    <option>11.30.A.M</option>
                    <option>12.00.P.M</option>
                    <option>12.30.P.M</option>
                    <option>1.00.P.M</option>
                    <option>1.30.P.M</option>
                    <option>2.00.P.M</option>
                    <option>2.30.P.M</option>
                    <option>3.00.P.M</option>
                    <option>3.30.P.M</option>
                    <option>4.00.P.M</option>
                    <option>4.30.P.M</option>
                    <option>5.00.P.M</option>
                    <option>5.30.P.M</option>
                    <option>6.00.P.M</option>
                    <option>6.30.P.M</option>
                    <option>7.00.P.M</option>
                    <option>7.30.P.M</option>
                    <option>8.00.P.M</option>
                    <option>8.30.P.M</option>
                    <option>9.00.P.M</option>
                    <option>9.30.P.M</option>
                </select>
                <label>Party</label><br><br>
                <select name="party" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>     
                </select><br>
                <label>Name</label>
                <input type="text" name="name" required>
                <label>Email</label>
                <input type="email" name="email" required>
                <label>Phone</label>
                <input type="tel" name="tel" required>

                <button type="submit" class="button" name="bookTbl">Book Now</button>

            
            </form>
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