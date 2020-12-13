<?php
ob_start();
require('connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Booking</title>
  <link rel="stylesheet" href="./style2.css">

</head>
<body>
<!-- partial:index.partial.html -->
<h1> BOOK A ROOM! </h1>

<?php
        if (isset( $_GET['passwordFailure'])) 
        {
            echo "<p>THIS ROOM IS UNAVAILABLE. PLEASE SELECT AGAIN.</p>";
        }
        
?>


 <form name = "myform" action="bookValidate" method ="post">

 </p>
<label  for="b_date">Booking date:</label>
<input type="date" id="start" name="b_date">
</p>

<p>
<label for="in_date">Checkin Date:</label>
<input type="date" id="start" name="in_date">
 <label for="out_date">Checkout Date:</label>
<input type="date" id="start" name="out_date">
</p>
  

<p>
<label for="rooms">Choose Room:</label>

<select id="rooms" name="rooms">

    <option value='S'>S</option>
    <option value='D'>D</option>
    <option value='Q'>Q</option>
    <option value='K'>K</option>

</select>


</p>
<input type="submit">
</form>


<h3 style="color:white;"> NUMBER OF AVAILABLE ROOMS! </h3>

<p>
<?php
/*
session_start();
$user_ =  $_SESSION['user'];
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
$get_data = "SELECT * from `rooms` WHERE `type`='S' AND `available` = 'Y'"; 
$res = mysqli_query($conn, $get_data) or die(mysqli_error($conn));
$num = mysqli_num_rows($res); //COUNT OF SINGLE AVAILABLE ROOMS

$get_ = "SELECT * from `rooms` WHERE `type`='D' AND `available` = 'Y'"; 
$res_ = mysqli_query($conn, $get_) or die(mysqli_error($conn));
$num_ = mysqli_num_rows($res_); //COUNT OF DOUBLE AVAILABLE ROOMS

$get_3 = "SELECT * from `rooms` WHERE `type`='Q' AND `available` = 'Y'"; 
$res_3 = mysqli_query($conn, $get_3) or die(mysqli_error($conn));
$num_3 = mysqli_num_rows($res_3); //COUNT OF QUEEN AVAILABLE ROOMS

$get_4 = "SELECT * from `rooms` WHERE `type`='K' AND `available` = 'Y'"; 
$res_4 = mysqli_query($conn, $get_4) or die(mysqli_error($conn));
$num_4 = mysqli_num_rows($res_4); //COUNT OF KING AVAILABLE ROOMS


//echo "<h3> NUMBER OF AVAILABLE ROOMS </h3> ";

echo "<table align = 'center' border='1'>
<tr>
<th>SINGLE</th>
<th>DOUBLE</th>
<th>QUEEN</th>
<th>KING</th>
</tr>";


    echo "<tr>";
    echo "<td>" . $num . "</td>";
    echo "<td>" . $num_. "</td>";
    echo "<td>" . $num_3. "</td>";
    echo "<td>" . $num_4. "</td>";
    echo "</tr>";

 
echo "</table>";

mysqli_close($conn);


?>
</p>



<table class = "center">
  <tr>
    <th>Room Type</th>
    <th>Room Price</th>
  </tr>
  <tr>
    <td>SINGLE (S)</td>
    <td>1000</td>
  </tr>
  <tr>
    <td>DOUBLE (D)</td>
    <td>2000</td>
  </tr>
  <tr>
    <td>QUEEN (Q)</td>
    <td>3000</td>
  </tr>
  <tr>
    <td>KING (K)</td>
    <td>4000</td>
  </tr>
</table>


<!-- partial -->
<p>   
  <h3 style="color:white;">  Go back to main guest page <a href ="guest.php">click.</a> </h3>
</p>
  
</body>
</html>

<?php
ob_end_flush();
?>