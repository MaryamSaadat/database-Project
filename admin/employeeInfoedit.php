<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>EDIT INFO</title> 
	<link rel="stylesheet" href="./style.css">

</head>

<body>
	<form action="employeeInfoeditValidation.php" method="post">
            <tr>
				<td align="left"><h2>Please enter the username of the employee whose information you want to edit:</h2></td>
            </tr>
            <tr>
	            <td align="right"><label for="username">Username:</label></td>
	            <td><input type="text" name="username" id="usrname" placeholder="Username" /></td>
			</tr>
			<tr>
				<td align="left"><h3>Please select the information you want to edit of the employee and what you want to change it to:</h3></td>
			</tr>
			<tr>
	            <td align="right"><label for="type">Type:</label></td>
	            <td align="left">
	            	<select name="type">
	            		<option value="age">Age</option>
	            		<option value="email">Email</option>
	            		<option value="level">Level (A/B/C)</option>
	            		<option value="salary">Salary</option>
	            	</select>
	            </td>
            </tr>
            
            <tr>
	            <td align="right"><label for="value"></label></td>
	            <td><input type="text" name="value" id="val" placeholder="Enter value" /></td>
			</tr>

            <tr>
				<td colspan = "2" align="right"><input type="submit"></td>
			</tr>

    </form>
    
    <?php
    if (isset( $_GET['noUser']) ) {
        echo "<p>Sorry, no employee with that username exists.</p>";
    }
    if (isset( $_GET['altered']) ) {
        echo "<p>The information regarding the employee is updated.</p>";
    }
	?>

</body>


</html>
<?php
ob_end_flush();
?>