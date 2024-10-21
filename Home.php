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

    <!-- account icon-->
    <div class="header-icon">
        <a href="Login.php"><i class='bx bx-user-circle' id="loginIcon"></i></a> 
    </div>
    
    </header>

    <!--Hero Section-->
    <section class="hero" id="hero">
        <div class="hero-text">
            <h1>The Gallery Café</h1><br><br>
            <p>Indulge in a Fusion of Flavors at the Heart of Colombo. </p>
        </div>      
    </section>

    <!--About section-->
    <section class="about" id="about">
        <div class="about-img">
            <img src="Images/logo2.PNG" alt="logo">
        </div>
        <div class="about-text">
            <h2>Our Story</h2>
            <p>Since 2008, The Gallery Café has been a culinary gem in Colombo, 
                born from a shared passion for food. Inspired by Sri Lanka’s rich culture, 
                we blend traditional and contemporary flavors to create a unique dining experience. 
                Join us and savor the fusion of Asian tastes in a welcoming atmosphere.
            </p>
            <a href="About.php" class="button">Learn More</a>
        </div>
    </section>

    <!--Book Table Section-->
    <section class="book-table" id="animate">
        <div class="book-text">
            <h2>Book Your Table</h2>

            <p class="nor">Whether it’s a special occasion or a casual night out, we’ve got the 
                perfect table for you. At The Gallery Café, you can reserve your spot 
                in advance and even pre-order your favorite dishes to enjoy a seamless 
                dining experience.</p>

            <h3> 30+ 50+ </h3>
            <h4>Tables Meals</h4><br>
            
            <a href="Reservation.php" class="button" id="book-btn">Book Now</a>
        </div>
        <div class="book-img">
            <img src="Images/booking.jpg" alt="booking">
        </div>

    </section>

    <!--Dishes week section-->
    <section  class="dow">
        <div class="dow-heading">
            <h2>Dishes of the Week</h2>
        </div>

    <!--Container-->
        <div class="dow-container">

        <?php
        // Include the PHP script to load the DOW details
        include 'Load_Dow.php';
        ?>
        </div>
            <a href="Menu.php" class="button" id="dow-btn">Explore Our Full Menu</a>
    </section>

    <!--pre order section-->
    <section class="pre-order" id="pre-order">
        <div class="po-img">
            <img src="Images/po.jpg" alt="po">
        </div>
        <div class="po-text">
            <h2>Pre order Your Meal</h2>
            <p>Save time and skip the wait by pre-ordering your favorite dishes at 
               The Gallery Café. Whether you're on the go or planning a special meal, 
               our pre-order service ensures your food is ready when you are arrive. Simply choose 
               your dishes, pick your time, and we'll handle the rest.
            </p>
            <a href="Pre-Order.php" class="button">Pre Order Now</a>
        </div>
    </section>

    <!--Opening hours section-->
    <section class="OH">

        <div class="oh-container">
         <i class='bx bx-time-five' ></i>
         <h2>Opening Hours</h2>
         
            <p>Monday to Thursday:<br>
               10:00 AM – 10:00 PM</p><br>
            <p>Friday to Sunday:<br>
               10:00 AM – 11:00 PM</p><br><br>
        <i class='bx bxs-map' ></i>
         <h2>Address</h2>
            <p>The Gallery Café, <br>123 Main Street, <br> Colombo 07, <br>Sri Lanka</p>
        </div>
        <div class="oh-img">
            <img src="Images/oh.jpg" alt="oh">
        </div>
    </section>


    <!--Promo section-->
    <section class="promotions">
        <h2>promotions</h2>
        <div class="promo-container">
        <?php
        // Include the PHP script to load the promotion details
        include 'Load_promo.php';
        ?>
        </div>
    </section>

    <!--parking section-->
    <section class="parking" >
        <div class="park-head">
            <h2>Convenient Parking</h2>

            <p class="pk">Enjoy your visit without the hassle of finding a parking 
                spot. The Gallery Café offers ample on-site parking, ensuring a stress-free 
                dining experience from the moment you arrive.</p>
            <h3> 30+ 15+ </h3>
            <h4>Cars Bikes</h4>
        </div>
        <div class="park-img">
            <img src="Images/parking.jpg" alt="parking">
        </div>
    </section>

    <!--Review section-->

    <section class="review">
        <h2 class="heading">What Our Customers Say</h2>

        <div class=" swiper review-slider">
            <div class="swiper-wrapper">

                <div class="swiper-slide">   
                        <div class="stars">
                            <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                            <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                            <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                            <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                            <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        </div>
                            <p>“The Gallery Café is a hidden gem in Colombo! 
                            The food is consistently amazing, and the atmosphere is perfect for any 
                            occasion. Highly recommend!”
                            </p>
                        <div class="user">
                            <img src="Images/c1 (1).jpg" alt="user">
                            <h3>R.P Silva</h3>
                        </div>
                </div>

                <div class="swiper-slide">   
                    <div class="stars">
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                    </div>
                        <p>“From the Double Chicken Burger to the Special Masala Biriyani, 
                            every dish is a flavor explosion. Highly recommend!”
                        </p>
                    <div class="user">
                        <img src="Images/c1 (2).jpg" alt="user">
                        <h3>M.A Perera</h3>
                    </div>
                </div>

                <div class="swiper-slide">   
                    <div class="stars">
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                    </div>
                        <p>“Excellent service, delicious food, and a warm, welcoming vibe. The Gallery 
                            Café is my go-to spot in Colombo.”
                        </p>
                    <div class="user">
                        <img src="Images/c1 (3).jpg" alt="user">
                        <h3>S.G Fernando </h3>
                    </div>
                </div>

                <div class="swiper-slide">   
                    <div class="stars">
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                    </div>
                        <p>"The team was soo good.I am so glad to work with this team.they helped me a lot to do 
                            everything what i expected.The food and everything was perfect.I recommend this place to have any 
                            type of party and events.Thank you soo much"
                        </p>
                    <div class="user">
                        <img src="Images/c1 (4).jpg" alt="user">
                        <h3>K .A Jayawardena</h3>

                    </div>
                </div>

                <div class="swiper-slide">   
                    <div class="stars">
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                    </div>
                        <p>" Very nice atmosphere. The staff was very friendly, and the service throughout 
                            was really good. The food was very tasty. Overall, I loved the experience. It's 
                            definitely a place to visit..."

                        </p>
                    <div class="user">
                        <img src="Images/c1 (5).jpg" alt="user">
                        <h3>R. kavindu</h3>
                    </div>
                </div>
                
                <div class="swiper-slide">   
                    <div class="stars">
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                        <i class='bx bxs-star' style='color:#fbbf24'  ></i>
                    </div>
                        <p>"Food was very good, highly recommend the chicken burgers and egg noodles. Service 
                            is very good and helpful. Menu is simple and awesome. Keep up the great service 
                            and food quality"
                        </p>
                    <div class="user">
                        <img src="Images/c1 (6).jpg" alt="user">
                        <h3>L.A Nimal</h3>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div><br><br>
            <div class="swiper-pagination"></div>
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
                    <li><a href="Login.php">Reservation</a></li>
                    <li><a href="Login.php">Pre-Order</a></li>
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

<script>
    </script>

</body>
</html>