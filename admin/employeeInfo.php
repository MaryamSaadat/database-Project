<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./style.css">

</head>

<body>
	<form action="employeeInfoValidation.php" method="post">
			<tr>
				<td align="left"><h2>Please enter the username of the employee you want to search for:</h2></td>
			</tr>

			<tr>
	            <td align="right"><label for="username">Username:</label></td>
	            <td><input type="text" name="username" id="usrname" placeholder="Username" /></td>
			</tr>
            <tr>
				<td colspan = "2" align="right"><input type="submit"></td>
			</tr>

    </form>
    
    <?php
	if (isset( $_GET['noemployee']) ) 
	{
        echo "<p>Sorry, no employee with this username is available.</p>";
    }
	?>

</body>


</html>
<?php
ob_end_flush();
?>