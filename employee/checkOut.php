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


<body>
	<h1>HOTEL TRANSYLVANIA</h1>
    <h3>Guest Check Out</h3>
    
	<?php
        if (isset( $_GET['noCheckIn']) ) {
            echo "<p>Check Out Failed, no Check In on this booking ID</p>";
		}
		if (isset( $_GET['failedAccess']) ) {
            echo "<p>Failed to access database, try again</p>";
		}
		if (isset( $_GET['successfulCheckOut']) ) {
            echo "<p>Guest Checked Out successfully</p>";
		}
    ?>

	<p>Enter the following details:</p>
	<form action = "checkOutValidate.php" method ="get">
		<table align="center">	
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
<?php
ob_end_flush();
?>