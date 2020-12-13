<?php
ob_start();
require('connect.php');
?>



<html>
<title>ORDER FOOD</title>
<head>
<link rel="stylesheet" href="./style4.css">
</head>
 <body>

 <h2> ORDER FOOD! </h2>
 <?php
        if (isset( $_GET['Error'])) 
        {
            echo "<p>THIS BOOKING ID DOES NOT EXIST.</p>";
        }
        
?>
<p>
<h3> FOOD ITEMS AVAILABLE</h3>
</p>

<?php

//CONNECT TO THE DATABASE

/*
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
{
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}
*/

//DISPLAY MENUE IN A TABLE 
$query = "SELECT * FROM `menu` WHERE `available` = 'Y'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
echo "<table align = 'center' border='1'>
<tr>
<th>Food ID</th>
<th>Food Item</th>
<th>Price</th>

</tr>";
while ($row = mysqli_fetch_assoc($result)){


    echo "<tr>";
    echo "<td>" . $row["foodID"] . "</td>";
    echo "<td>" . $row["foodItem"]. "</td>";
    echo "<td>" . $row["price"]. "</td>";
    //echo "<td>" . $num_4. "</td>";
    echo "</tr>";
}
 
echo "</table>";

mysqli_close($conn);
?>


<p> 
<h3> ENTER YOUR BOOKING ID AND ORDER FOOD </h3>
</p>

<form name = "myform" action="foodValidate" method ="post">
</p>
<label  for="o_date">Order date:</label>
<input type="date" id="order" name="o_date">
</p>
<p>
   <label for="booking_id">Book ID:</label>
<input type="number" name="book_id" id="booking_id" />
 </p>

 <p>
 <label for="khana">Food ID:</label>
 <input type="number" name="food_id" id="khana" />
 </p>

 <input type="submit" value = "Order">
</form>


<img src="https://oxygenna.com/wp-content/uploads/2014/05/foodiconset.jpg">

<p>   
  <h3>  Go back to main guest page<a href ="guest.php">click.</a> </h3>
</p>

</body>
</html>

<?php
ob_end_flush();
?>