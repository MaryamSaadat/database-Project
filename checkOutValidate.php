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
$datee = $_GET['thedate'];

// CHECK FOR THE RECORD FROM TABLE, IF RECORD EXISTS, PROCESS WITH CHECK IN
$sql1 = "SELECT * FROM `checkIn` WHERE bookingID = '$bID'";

$result = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);

if ($count == 0) {
	echo "Check Out Failed, no Check In on this booking ID";
	header('Location:checkOut.php?noCheckIn=1');

}

else {
	// MODIFYING IN THE CHECK IN TABLE
	$sql2 = "UPDATE `checkin` SET `status` = '0' WHERE `checkin`.`bookingID` = 1;";
	$query1 = mysqli_query ($conn,$sql2) or die(mysqli_error($conn));


	if ($query1 == 1) 
	{
		echo "Check Out done successfully";
		header('Location:checkOut.php?successfulCheckOut=1');
	} 
	else 
	{
		echo "Error! Could not access the database";
		header('Location:employeeSignup.php?failedAccess=1');
	}
} 


mysqli_close($conn);
?>