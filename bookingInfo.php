
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>CodePen - Hotel Use Case</title> 
	<link rel="stylesheet" href="./style.css">

</head>

<body>
	<form action="bookingqueryValidation.php" method="post">
			<tr>
				<td align="left"><h2>Please enter the dates from which you want to generate booking query:</h2></td>
			</tr>

			<tr>
	            <td align="middle"><label for="firstTime">From Date:</label></td>
	            <td><input type="date" name="firstTime" id="fTime" placeholder="yyyy-mm-dd" /></td>
			</tr>

			<tr>
	            <td align="middle"><label for="secondTime">To Date:</label></td>
	            <td><input type="date" name="secondTime" id="sTime" placeholder="yyyy-mm-dd" /></td>
            </tr>
            <tr>
				<td colspan = "2" align="right"><input type="submit"></td>
			</tr>

    </form>
    
    <?php
    if (isset( $_GET['bookingDates']) ) {
        echo "<p>Sorry, no bookings were found during the mentioned dates.</p>";
    }
	?>

</body>


</html>