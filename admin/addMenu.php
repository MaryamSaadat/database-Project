<?php
ob_start();
require ('connect.php');
?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
    <title>ADD FOOD</title> 

</head>
<?php

    $sql = "SELECT *  FROM `menu`";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    if ($count == 0)
    {
        echo "Currently nothing is present in the inventory". "<br>";
        echo  "<br>". "<br>". "<br>";
    }
    else
    {
        echo "ITEMS PRESENT IN THE INVENTORY ARE". "<br>";
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
             <td width=100>Food ID::</td> 
            <td width=100>Item name:</td> 
            <td width=100>Price:</td> 
            <td width=100>Availablility:</td> 
            </tr>"; 
           while($row = mysqli_fetch_array($result))
           { 
          print "<tr>"; 
          print "<td>" . $row['foodID'] . "</td>"; 
          print "<td>" . $row['foodItem'] . "</td>"; 
          print "<td>" . $row['price'] . "</td>"; 
          print "<td>" . $row['available'] . "</td>";
          print "</tr>"; 
          } 
          print "</table>"; 
    }
    mysqli_close($conn);
    ?>

<body>
	<form action="addMenuValidation.php" method="post">
			<tr>
				<td align="left"><h2>ADD IN INVENTORY:</h2></td>
			</tr>
            <tr>
	            <td align="right"><label for="naam">FOOD NAME:</label></td>
	            <td><input type="text" name="naam" id="namee"  /></td>
			</tr>
			<tr>
	            <td align="right"><label for="price">PRICE:</label></td>
	            <td><input type="number" name="price" id="pr" placeholder="enter price" /></td>
			</tr>
            <tr>
				<td colspan = "2" align="right"><input type="submit"></td>
			</tr>

    </form>
    <?php
	if (isset( $_GET['added']) ) 
	{
        echo "<p>THE ITEM HAS BEEN ADDED.</p>";
    }
	?>

    <form action="addMenuValidation.php" method="post">
			<tr>
				<td align="left"><h2>DELETE FROM INVENTORY:</h2></td>
			</tr>
            <tr>
	            <td align="right"><label for="id">FOOD ID:</label></td>
	            <td><input type="text" name="id" id="id" placeholder="enter id" /></td>
			</tr>
            <tr>
				<td colspan = "2" align="right"><input type="submit"></td>
			</tr>

    </form>
    <?php
	if (isset( $_GET['deleted']) ) 
	{
        echo "<p>THE ITEM HAS BEEN MADE UNAVAILABLE FOR THE GUEST.</p>";
    }
	?>

<form action="addMenuValidation.php" method="post">
			<tr>
				<td align="left"><h2>MAKE AVAILABLE FOR CUSTOMER:</h2></td>
			</tr>
            <tr>
	            <td align="right"><label for="ida">FOOD ID:</label></td>
	            <td><input type="text" name="ida" id="ida" placeholder="enter id" /></td>
			</tr>
            <tr>
				<td colspan = "2" align="right"><input type="submit"></td>
			</tr>

    </form>
    <?php
	if (isset( $_GET['available']) ) 
	{
        echo "<p>THE ITEM HAS BEEN MADE AVAILABLE FOR THE GUEST.</p>";
    }
	?>
</body>
</html>
<?php
ob_end_flush();
?>