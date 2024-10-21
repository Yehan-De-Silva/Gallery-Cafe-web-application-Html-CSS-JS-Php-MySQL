
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

   
    $sql = "SELECT * FROM  promotions";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) 
    {
?>
    <div class="promo-box">
        <img src="Images/Promo/<?php echo $row['Image'] ?>" alt="promo">
    </div>
<?php
    }

?>