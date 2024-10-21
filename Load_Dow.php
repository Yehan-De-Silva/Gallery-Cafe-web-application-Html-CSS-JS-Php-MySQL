
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

   
    $sql = "SELECT * FROM  dow";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) 
    {
?>
    <div class="box">
        <img src="Images/DOW/<?php echo $row['Image'] ?>" alt="dow1">
        <h3><?php echo $row['Title'] ?></h3>
            <div class="dow-content">
                <p><?php echo $row['Description'] ?></p>
            </div>
    </div>
<?php
    }

?>