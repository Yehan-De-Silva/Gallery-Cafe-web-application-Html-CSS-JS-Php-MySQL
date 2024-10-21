<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "gallery_cafe";

session_start();

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE UserName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row["Password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["userId"] = $row['Id'];
            $_SESSION["UserType"] = $row['UserType'];
            if ($row["UserType"] == "customer") {
                header("Location: UserPage.php");
                exit;
            } elseif (($row["UserType"] == "admin") || ($row["UserType"] == "staff")) {

                header("Location: StaffPage.php");
                exit;
            }
        } else {
            echo "<script>alert('Incorrect Username or Password...Try Again...');</script>";
        }
    } else {
        echo "<script>alert('Incorrect Username or Password...Try Again...');</script>";
    }
   
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Cafe</title>
    <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    
 <!-- Login page section -->
<section class="loginPage">

<div class="form-container">
        <div class="close">
        <a href="Home.php"><i class='bx bx-x-circle' style='color:#de1f1f' ></i></a>
        </div>
    <div class="form-btn">
        <h4><span onclick="login()">Login</span></h4>
        <h4><span onclick="register()">Register</span></h4>
        <hr id="loginIndicator">
    </div>
    <!-- Login form -->
    <form method="post" id="loginForm" action="Login.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button class="button"type="submit">Login</button>
        
    </form>
    <!-- Register form -->
    <form method="post" id="regForm" action="Register.php">
        <input type="text" name="NewUsername" placeholder="Username" required>
        <input type="email" name="NewEmail" placeholder="Email" required>
        <input type="password" name="NewPassword" placeholder="Password" required>
        <button class="button"type="submit">Register</button>
    </form>
    
</div>
</section>



<!--local script-->
<script src="Script.js"></script>
<script>
    // script for toggle login & register form
let loginForm = document.getElementById("loginForm");
let regForm = document.getElementById("regForm");
let loginIndicator = document.getElementById("loginIndicator");

function register(){
    regForm.style.transform = "translateX(-400px)";
    loginForm.style.transform = "translateX(-400px)";
    loginIndicator.style.transform = "translateX(135px)";
}
function login(){
    regForm.style.transform = "translateX(0px)";
    loginForm.style.transform = "translateX(0px)";
    loginIndicator.style.transform = "translateX(0px)";
}
</script>
</body>
</html>