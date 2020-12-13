<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>INCREMENT SALARY</title> 
	<link rel="stylesheet" href="./style.css">

</head>

<body>
	<form action="employeeSalInctValidation.php" method="post">
            <tr>
				<td align="left"><h2>Please enter the level of the employees whose salary you want to increment:</h2></td>
            </tr>

            <tr>
	            <td align="right"><label for="level">Type:</label></td>
	            <td align="left">
	            	<select name="level">
	            		<option value="A">A</option>
	            		<option value="B">B</option>
	            		<option value="C">C</option>
	            	</select>
	            </td>
            </tr>
			<tr>
				<td align="left"><h3>Please enter in percentage how much do you want to increment:</h3></td>
			</tr>
            
            <tr>
	            <td align="right"><label for="percentage"></label></td>
	            <td><input type="text" name="percentage" id="per" placeholder="Enter in percentage" /></td>
			</tr>

            <tr>
				<td colspan = "2" align="right"><input type="submit"></td>
			</tr>

    </form>
    
    <?php
    if (isset( $_GET['altered']) ) {
        echo "<p>The salary is incremented.</p>";
    }
	?>

</body>

<?php
ob_end_flush();
?>
</html>