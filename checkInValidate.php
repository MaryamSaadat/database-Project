<?php

/*$servername = 'localhost'
$username = 'root'
$password = '';
$dbname = 'hotelmanagement';

$conn = mysqli_connect($servername, $username, $password, $dbname);*/


// connecting to the database
/*$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'hotelmanagement');//<---CHANGE TO THE NAME OF YOUR MANAGEMENT DATABASE
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}

$gID = $_GET['guestID'];
$rID = $_GET['roomID'];
$bID = $_GET['bookingID'];
$datee = $_GET['thedate'];


$sql = "SELECT * FROM `bookings` WHERE bookingID = '$bID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
	echo "Check In Failed, booking does not exist";
	header('Location:checkIn.php?noBooking=1');
}
else if (mysqli_num_rows($result) == 1) {
	$sql = "INSERT INTO `checkin` (`bookingID`, `guestID`, `status`) VALUES ('$gID', '$bID', '1')";

	if (myspli_query($conn, $sql)) {
		echo "Check In Successful";
		header('Location:checkIn.php?successfulCheckIn=1');
	}
	else {
		echo "Check In Failed, unable to access the database";
		header('Location:checkIn.php?failedAccess=1');
	}
}


mysqli_close($conn);*/


?>






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

	
// Assigning POST values to variables.
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