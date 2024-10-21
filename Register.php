
<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "gallery_cafe";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['NewUsername'], $_POST['NewPassword'], $_POST['NewEmail'])) {
    $Nusername = $_POST['NewUsername'];
    $Npassword = (string)$_POST['NewPassword'];
    $Nemail = $_POST['NewEmail'];
    $Hash =  password_hash($Npassword, PASSWORD_DEFAULT);



    $sql2 = "INSERT INTO user (UserName, Password, Email) VALUES (?,?,?)";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("sss", $Nusername, $Hash, $Nemail);

    if ($stmt2->execute()) {
        echo "<script>
                alert('Registration Complete..Login to continue..');
                window.location.href='login.php';
              </script>";
        exit;
    } else {
        echo "<script>
                alert('Registration Fail.. Try again..');
                window.location.href='login.php';
              </script>";
        exit;
    }

}

$conn->close();


?>