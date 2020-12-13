<?php
ob_start();
session_start();
require('connect.php');
?>

<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>Hotel Transylvania</title> 
    
    <!-- BOOTSTRAP LINKS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    /*
        session_start();
        // connecting to the database
        $conn = mysqli_connect('localhost', 'root', '');
        if (!$conn) {
            die("Database conn Failed" . mysqli_error($conn));
        }
        $select_db = mysqli_select_db($conn, 'HotelManagement');
        if (!$select_db) {
            die("Database Selection Failed" . mysqli_error($conn));
        }
*/
        $bID = $_SESSION["bookingID"];
        $sqlii = "UPDATE `payments` SET `paymentStatus` = 'Y' WHERE `bookingID` = '$bID'";
        $reh = mysqli_query($conn, $sqlii) or die(mysqli_error($conn));

        mysqli_close($conn);
    ?>

    <p><h2>PAYMENT DONE</h2></p>
    <p>Return to <a href = "guest.php">Menu</a></p>
  
</body>

</html>

<?php
ob_end_flush();
?>