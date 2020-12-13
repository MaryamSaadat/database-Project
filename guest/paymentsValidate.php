<?php
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

	// connecting to the database
	$conn = mysqli_connect('localhost', 'root', '');
	if (!$conn) {
		die("Database conn Failed" . mysqli_error($conn));
	}
	$select_db = mysqli_select_db($conn, 'HotelManagement');
	if (!$select_db) {
		die("Database Selection Failed" . mysqli_error($conn));
	}
		

	// Assigning GET values to variables.
	$bID = $_GET['bookingID'];


	// GETTING TUPLES FROM PAYMENTSBOOKING
	$sql = "SELECT * FROM `paymentsbooking` WHERE bookingID = '$bID'";
	$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	$count = mysqli_num_rows($result);

	if ($count == 0) {
		echo "Invoice Generation failed, invalid booking ID";
		header('Location:payments.php?invalidID=1');
	}

	else {
		// NUMBER OF DAYS STAYED???
		$row = $result -> fetch_assoc();
		$bookPrice = $row['price'];

		// EXTRACTING NUMBER OF DAYS GUEST HAS STAYED
		$sql = "SELECT startDate, endDate FROM `bookings` WHERE bookingID = '$bID'";
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
		$something = $result -> fetch_assoc();

		// Calculating days
		$start = $something['startDate'];
		$end = $something['endDate'];
		$diff = abs(strtotime($start) - strtotime($end));

		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));


		$invoice = "<h2>INVOICE</h2></br></br>";
		$invoice = $invoice . "<b>Room Charges:</b> Rs. " . $bookPrice*$days . "</br>";
		$totalPrice = $bookPrice * $days;

		// GETTING TUPLES FROM PAYMENTSSERVICE
		$sql2 = "SELECT * FROM `paymentsservice` WHERE bookingID = '$bID'";
		$result2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

		if (mysqli_num_rows($result2) > 0) {
			$invoice = $invoice . "<b>Room Service Charges</b>" . "</br>";
			while($row = $result2 -> fetch_assoc()) {
				$totalPrice = $totalPrice + $row['price'];
				$invoice = $invoice . "Order " . $row['orderID'] . ": Rs. " . $row['price'] . "</br>";
			}
		}

		$invoice = $invoice . "</br><b>TOTAL CHARGES:</b> Rs. " . $totalPrice . "</br>";

		// CHECKING AND PUSHING TO PAYMENTS
		$secondlast = "SELECT * FROM `payments` WHERE bookingID = '$bID'";
		$la = mysqli_query($conn, $secondlast) or die(mysqli_error($conn));
		$gin = mysqli_num_rows($la);

		if ($gin == 0) {
			$last = "INSERT INTO `payments` (`paymentID`, `bookingID`, `amount`, `paymentStatus`) VALUES (NULL, '$bID', '$totalPrice', 'N')";
			$q = mysqli_query ($conn,$last) or die(mysqli_error($conn));
		}
	}

	echo $invoice;
	?>


	<form action="finalpay.php?" method="get" target="_blank">
		<?php
			session_start();
			$_SESSION["bookingID"] = $bID;
		?>
		<button type="submit">FINALISE PAYMENT</button>
	</form>
	
	<p>Return to <a href = "guest.php">Menu</a></p>

	<?php mysqli_close($conn); ?>


</body>
</html>