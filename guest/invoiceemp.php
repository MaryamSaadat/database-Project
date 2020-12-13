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
<!-- partial:index.partial.html -->
	<h1>HOTEL TRANSYLVANIA</h1>

	<?php
	if (isset( $_GET['invalidID']) ) {
		echo "<p>Invalid ID, unable to proceed with Invoice Generation.</p>";
	}
	?>

	<form action = "invoiceValidateEmp.php" method = "get" >
		<table align="center">
			<tr>
				<td colspan = "2"><h6>PLEASE ENTER THE BOOKING ID</h6></td>
            </tr>
            <tr>
				<td colspan = "2" align="left"></td>
			</tr>
            <tr>
	            <td align="right"><label for="bookingID">Booking ID:</label></td>
	            <td><input type="text" name="bookingID" id="bookingID" placeholder="Booking ID" /></td>
			</tr>
			<tr>
				<td colspan = "2" align="right"><input type="submit"></td>
			</tr>
		</table>
	</form>
  
</body>

</html>