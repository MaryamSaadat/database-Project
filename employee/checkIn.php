<?php
ob_start();
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

	<!-- UMMES STYLESHEET -->
	<link rel="stylesheet" href="./style.css">
</head>

<?php
ob_end_flush();
?>
<body>
	<h1>HOTEL TRANSYLVANIA</h1>
    <h3>Guest Check In</h3>
    
	<?php
        if (isset( $_GET['noBooking']) ) {
            echo "<p>Booking does not exist, try again.</p>";
		}
		if (isset( $_GET['failedAccess']) ) {
            echo "<p>Failed to access database, try again</p>";
		}
		if (isset( $_GET['successfulCheckIn']) ) {
            echo "<p>Guest Checked In successfully</p>";
		}
		if (isset( $_GET['noInsert']) ) {
            echo "<p>Error! Failed to Check In</p>";
		}
		if (isset($_GET['dobara'])) {
			echo "<p>Error! Cannot Check In Twice</p>";
		}
    ?>

    <p>Enter the following details:</p>
	<form action = "checkInValidate.php" method = "get" >
		<!-- ADD ROOM ID-->
		<table align="center">
			<tr>
	            <td align="right"><label for="guestID">Guest ID:</label></td>
	            <td><input type="text" name="guestID" id="guestID" placeholder="Guest ID" /></td>
			</tr>
			<tr>
	            <td align="right"><label for="roomID">Room ID:</label></td>
	            <td><input type="text" name="roomID" id="roomID" placeholder="Room ID" /></td>
			</tr>
			<tr>
	            <td align="right"><label for="bookingID">Booking ID:</label></td>
	            <td><input type="text" name="bookingID" id="bookingID" placeholder="Booking ID" /></td>
			</tr>
			<tr>
	            <td align="right"><label for="thedate">Today's Date:</label></td>
	            <td><input type="date" name="thedate" id="thedate"/></td>
			</tr>
			<tr>
				<td colspan = "2" align="right"><input type="submit"></td>
			</tr>
		</table>
	</form>




</body>


</html>




