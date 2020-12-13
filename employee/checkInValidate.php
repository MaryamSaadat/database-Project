<?php
ob_start();
require ('connect.php');
?>
<?php

// Assigning GET values to variables.
$gID = $_GET['guestID'];
$rID = $_GET['roomID'];
$bID = $_GET['bookingID'];
$datee = $_GET['thedate'];

// CHECK FOR THE RECORD FROM TABLE, IF RECORD EXISTS, PROCESS WITH CHECK IN
$sql1 = "SELECT * FROM `bookings` WHERE bookingID = '$bID'"; // CORRECT -> CHECK GUEST ID AND ROOM ID AS WELL

$result = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

if ($count == 0) {
	echo "Check In Failed, booking does not exist";
	header('Location:checkIn.php?noBooking=1');
}

else {
	$spaa = "SELECT * FROM `checkin` WHERE bookingID = '$bID'";
	$wapis = mysqli_query($conn, $spaa) or die(mysqli_error($conn));
	$ginja = mysqli_num_rows($wapis);

	if ($ginja == 0) {
		// ADDING INTO THE CHECK IN TABLE
		$sql2 = "INSERT INTO `checkin` (`bookingID`, `status`) VALUES ('$bID', '1')";
		$query1 = mysqli_query ($conn,$sql2) or die(mysqli_error($conn));


		if ($query1 == 1) 
		{
			// ADDING INTO THE PAYMENT BOOKING TABLE
			// Extract room price, and then push to table the price + bookingID
			$sql3 = "SELECT price FROM `rooms` WHERE roomID = '$rID'";
			$res = mysqli_query($conn, $sql3) or die(mysqli_error($conn));

			$row = $res -> fetch_assoc();
			$row = $row['price']; // CHECK WHETHER REQUIRED


			$sql4 = "INSERT INTO `paymentsbooking` (`bookingID`, `price`) VALUES ('$bID', '$row')";
			$query4 = mysqli_query ($conn,$sql4) or die(mysqli_error($conn));
			
			if ($query4 == 1) {
				echo "Check In done successfully";
				header('Location:checkIn.php?successfulCheckIn=1');
			}
			else {
				$sql5 = "DELETE from `checkin` where bookingID = '$bID'";
				$query5 = mysqli_query($conn, $sql5) or die(mysqli_error($conn));	

				echo "Error! Could not access payments";
				header('Location:checkIn.php?noInsert=1');			
			}
		} 
		else 
		{
			echo "Error! Could not access the database";
			header('Location:checkIn.php?failedAccess=1');
		}
	}

	else {
		echo "Error! Can not check in twice";
		header('Location:checkIn.php?dobara=1');
	}

} 


mysqli_close($conn);
?>
<?php
ob_end_flush();
?>