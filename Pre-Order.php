<?php 
include('DBconnection.php');


$menu = mysqli_query($conn, "SELECT * FROM menuitems");


if(isset($_POST['preOrder'])){

    if(isset($_SESSION["userId"])){
        $U_Id = $_SESSION["userId"];
    }else{
        echo "<script>
                alert('You must be logged in to place a pre order..!');
                window.location.href='Login.php'; 
              </script>";
        exit();
    }
    
    $date =  $_POST['date'];
    $time =  $_POST['time'];
    $foodArray = $_POST['food'];
    $quantityArray = $_POST['quantity'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $total = $_POST['total'];

    $foodItems = implode(', ', $foodArray); 
    $quantities = implode(', ', $quantityArray);

        $sql1 = "INSERT INTO `pre_orders` (`User_Id`, `Date`, `Time`, `Food Item`, `Quantity`, `Total`, `Name`, `Email`, `Phone`) 
            VALUES ('$U_Id', '$date', '$time', '$foodItems', '$quantities','$total','$name', '$email', '$tel')";
    
        $result1 = mysqli_query($conn, $sql1);
    
        if($result1){
            echo "<script>
                    alert('Order Placed Successfully...');
                    window.location.href='Pre-Order.php';
                  </script>";
        }else{
            echo "<script>
                    alert('Order Failed..Please Try Again...!');
                    window.location.href='Pre-Order.php';
                  </script>";
        }


$conn->close();

}

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
    <section class="pror-hero" id="pror-hero"> 
            <h1>Pre-Order</h1>         
    </section>

    <section class="po-form">

        <div class="PoFormContainer">
            <form method="post" action="">
                <div class="PoTitle">
                <h3>Pre Order</h3>
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
                <div class="datalist-container">
                <div class="datalist">
                <label>Select Food Items</label><br>


                <div class="item">
                <input list="food-options" class="foodName" name="food[]" >
                <datalist id="food-options">

                <?php
                while($row = mysqli_fetch_array($menu)) {
                    $numericPrice = preg_replace('/[^\d]/', '', $row['Price']);
                ?>
                     <option value="<?php echo $row['Title']; ?>" data-price="<?php echo $numericPrice; ?>">
                     <?php echo $row['Price']; ?></option>
                <?php
                }
                ?>
                </datalist>
                <input type="number" name="quantity[]" class="qty" placeholder="Quantity">
                <button class="addItem" type="button">+</button>
                </div>
                
                </div>
                </div>
                <br>


                <label>Name</label>
                <input type="text" name="name" required>
                <label>Email</label>
                <input type="email" name="email" required>
                <label>Phone</label>
                <input type="tel" name="tel" required>
                <label>Total Price</label>
                <input type="text" name="total" readonly>

                <button type="submit" class="button" name="preOrder">Order</button>

            
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
    

   <script>
    //Duplicate Food select input box
    document.querySelector('.datalist-container').addEventListener('click', function(event) {
        if (event.target.classList.contains('addItem')) {
            // Clone the existing datalist
            const newDatalist = document.querySelector('.datalist').cloneNode(true);
            // Clear the input values
            newDatalist.querySelector('.foodName').value = '';
            newDatalist.querySelector('.qty').value = '';
            // Append the new datalist to the container
            document.querySelector('.datalist-container').appendChild(newDatalist);
        }
    });


    // Function to calculate total price
    function calculateTotalPrice() {
        let total = 0;
        // Loop through all the items
        document.querySelectorAll('.datalist .item').forEach(function(item) {
            const foodInput = item.querySelector('.foodName');
            const quantityInput = item.querySelector('.qty');
            const quantity = parseInt(quantityInput.value) || 0;
            
            // Get selected food and its price
            const foodOption = [...document.querySelectorAll('#food-options option')]
                .find(option => option.value === foodInput.value);
            
            if (foodOption) {
                const price = parseInt(foodOption.getAttribute('data-price')) || 0;
                total += price * quantity;
            }
        });
        // Update the total price input field
        document.querySelector('input[name="total"]').value = total + ' LKR';
    }

    // Add event listeners to foodName and quantity fields to recalculate total price
    document.querySelector('.datalist-container').addEventListener('input', function(event) {
        if (event.target.classList.contains('foodName') || event.target.classList.contains('qty')) {
            calculateTotalPrice();
        }
    });

    </script>




    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!--swiper script import-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!--local script-->
    <script src="Script.js"></script> 
    
    
</body>
</html>