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
$gID = $_GET['guestID'];
$rID = $_GET['roomID'];
$bID = $_GET['bookingID'];
$datee = $_GET['thedate'];

// CHECK FOR THE RECORD FROM TABLE, IF RECORD EXISTS, PROCESS WITH CHECK IN
$sql1 = "SELECT * FROM `bookings` WHERE bookingID = '$bID'";

$result = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

if ($count == 0) {
	echo "Check In Failed, booking does not exist";
	header('Location:checkIn.php?noBooking=1');

}

else {
	// ADDING INTO THE CHECK IN TABLE
	$sql2 = "INSERT INTO `checkin` (`bookingID`, `guestID`, `status`) VALUES ('$gID', '$bID', '1')";
	$query1 = mysqli_query ($conn,$sql2) or die(mysqli_error($conn));


	if ($query1 == 1) 
	{
		echo "Check In done successfully";
		header('Location:checkIn.php?successfulCheckIn=1');
	} 
	else 
	{
		echo "Error! Could not access the database";
		header('Location:employeeSignup.php?failedAccess=1');
	}
} 


mysqli_close($conn);
?>