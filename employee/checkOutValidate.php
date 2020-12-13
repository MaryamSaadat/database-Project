<?php
ob_start();
require ('connect.php');
?>
<?php
// Assigning GET values to variables.
$bID = $_GET['bookingID'];
$datee = $_GET['thedate'];

// CHECK FOR THE RECORD FROM TABLE, IF RECORD EXISTS, PROCESS WITH CHECK IN
$sql1 = "SELECT * FROM `checkIn` WHERE bookingID = '$bID'";

$result = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

$sequel = "SELECT * FROM `payments` WHERE bookingID = '$bID'";
$niklo = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
$stat = $niklo -> fetch_assoc();
$stat = $stat['paymentStatus'];


if ($count == 0) {
	echo "Check Out Failed, no Check In on this booking ID";
	header('Location:checkOut.php?noCheckIn=1');
}

else if ($stat == 'N') {
	echo "Check Our Failed, payment not done";
	header('Location:checkOut.php?noPayment=1');
}

else {
	// MODIFYING IN THE CHECK IN TABLE
	$sql2 = "UPDATE `checkin` SET `status` = '0' WHERE `bookingID` = $bID;";
	$query1 = mysqli_query ($conn,$sql2) or die(mysqli_error($conn));


	if ($query1 == 1) 
	{
		$naya = "SELECT * FROM `bookings` WHERE bookingID = $bID";
		$raja = mysqli_query($conn, $naya) or die(mysqli_error($conn));
		$nikal = $raja -> fetch_assoc();
		
		$hamarakamra = $nikal['roomID'];
		$duja = "UPDATE `rooms` SET `available` = 'Y' WHERE roomID = $hamarakamra";
		$rani = mysqli_query($conn, $duja) or die(mysqli_error($conn));

		if ($rani == 1) {
			echo "Check Out done successfully";
			header('Location:checkOut.php?successfulCheckOut=1');
		}
	} 
	else 
	{
		echo "Error! Could not access the database";
		header('Location:employeeSignup.php?failedAccess=1');
	}
} 


mysqli_close($conn);
?>
<?php
ob_end_flush();
?>
