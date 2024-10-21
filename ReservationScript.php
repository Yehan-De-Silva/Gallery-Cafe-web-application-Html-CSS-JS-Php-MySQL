
<?php

include('DBconnection.php');

if(isset($_POST['bookTbl'])){

    if (isset($_SESSION["userId"])) {
        $U_id = $_SESSION["userId"];
    } else {
        echo "<script>
                alert('You must be logged in to make a reservation..!');
                window.location.href='Login.php'; 
              </script>";
        exit();
    }

    $date =  $_POST['date'];
    $time =  $_POST['time'];
    $party = $_POST['party'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];

    $sql = "INSERT INTO `reservation` (`User_Id`, `Date`, `Time`, `Party`, `Name`, `Email`, `Phone`) 
            VALUES ('$U_id', '$date', '$time', '$party', '$name', '$email', '$tel')";
    $result = mysqli_query($conn,$sql);

    if($result){
        echo "<script>
                alert('Reservation Successful...');
                window.location.href='Reservation.php';
              </script>";
    }else{
        echo "<script>
                alert('Reservation Fail..Please Try Again...!');
                window.location.href='Reservation.php';
              </script>";
    }


$conn->close();
}

?>