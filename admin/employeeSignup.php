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
	<h3>Create an employee account</h3>
	<br>

	<?php
        if (isset( $_GET['notSamePassword']) ) {
            echo "<p>Incorrect password, please try again.</p>";
		}
		if (isset( $_GET['errorOccuredaccount']) ) {
            echo "<p>Error occured. Please try again later.</p>";
		}
		if (isset( $_GET['errorOccured']) ) {
            echo "<p>Error occured. Please try again later.</p>";
		}
		if (isset( $_GET['usernameExists']) ) {
            echo "<p>Username already exists. Try again</p>";
        }
        if (isset( $_GET['successfulCreation']) ) {
            echo "<p>The employee account has been successfully created.</p>";
		}
    ?>

	<form action="employeeSignupValidation.php" method="post">
		<table align = "center">
			<tr>
				<td align="left"><h6>Add employee Details:</h6></td>
			</tr>

			<tr>
	            <td align="right"><label for="firstname">First Name:</label></td>
	            <td><input type="text" name="firstname" id="frstname" placeholder="First Name" /></td>
			</tr>

			<tr>
	            <td align="right"><label for="secondname">Second Name:</label></td>
	            <td><input type="text" name="secondname" id="scndname" placeholder="Second Name"/></td>
			</tr>

			<tr>
	            <td align="right"><label for="age">Age:</label></td>
	            <td align="left"><input type="number" name="age" id="umer" min="18" max="120" placeholder="Age" /></td>
			</tr>

			<tr>
	            <td align="right"><label for="gender">Gender:</label></td>
	            <td align="left">
	            	<select name="gender">
	            		<option value="male">Male</option>
	            		<option value="female">Female</option>
	            		<option value="nonbinary">Non Binary</option>
	            		<option value="na">Prefer not to say</option>
	            	</select>
	            </td>
			</tr>

            <tr>
	            <td align="right"><label for="position">Employee position:</label></td>
	            <td align="left">
	            	<select name="position">
	            		<option value="A">A</option>
	            		<option value="B">B</option>
	            		<option value="C">C</option>
	            	</select>
	            </td>
			</tr>

            <tr>
	            <td align="right"><label for="salary">Salary:</label></td>
	            <td><input type="number" name="salary" id="sal"  min= "1000" placeholder="Enter Salary" /></td>
			</tr>

			<tr>
				<td align="left"><h6>Account Details:</h6></td>
			</tr>

			<tr>
	            <td align="right"><label for="email">Email:</label></td>
	            <td><input type="email" name="emailID" id="emailKaID" placeholder="Email ID" /></td>
			</tr>

			<tr>
	            <td align="right"><label for="username">Username:</label></td>
	            <td><input type="text" name="username" id="usrname" placeholder="Username" /></td>
			</tr>

			<tr>
	            <td align="right"><label for="password1">Password:</label></td>
	            <td><input type="password" name="pwd1" id="pwd_1" placeholder="Password" /></td>
			</tr>

			<tr>
	            <td align="right"><label for="password2">Confirm Password:</label></td>
	            <td><input type="password" name="pwd2" id="pwd_2" placeholder="Confirm Password" /></td>
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