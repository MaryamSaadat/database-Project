<html>
<title> VIEW REWARDS </title>
<head>
<link rel="stylesheet" href="./style6.css">
</head>

<h3> YOUR BOOKING HISTORY </h3>
<?php
session_start();
$user_ =  $_SESSION['user'];
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
{
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');
if (!$select_db)
{
    die("Database Selection Failed" . mysqli_error($conn));
}

//GUEST ID -> we have username, match that in guest table and extract the guest ID
$query2 = "SELECT * from `guest` WHERE username='$user_'";
$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
$number = mysqli_num_rows($result2);

if ($row2 = mysqli_fetch_assoc($result2)) 
{
   $grow = $row2;
   $g_id =  $grow['guestID'];
} 
//$get_data = "SELECT * from `bookings` WHERE guestID in (SELECT * from `guest` WHERE username='$user_')";

//CORRESPONDING TO THIS FIND ALL BOOKINGS AND DISPLAY THE BOOKING DATES
$get_data = "SELECT * from `bookings` WHERE guestID='$g_id'"; //->CONVERT THIS TO A NESTED SUB-QUERY
$res = mysqli_query($conn, $get_data) or die(mysqli_error($conn));
$num = mysqli_num_rows($res); //COUNT OF BOOKINGS

if ($num == 0) 
{
    echo "YOU DO NOT HAVE ANY BOOKINGS YET";
}
else{

echo "<table border='1'>
<tr>
<th>Booking ID</th>
<th>Booking Date</th>
</tr>";
while ($rows = mysqli_fetch_assoc($res)) 
{
    echo "<tr>";
    echo "<td>" . $rows['bookingID'] . "</td>";
    echo "<td>" . $rows['bookingDate']. "</td>";
    echo "</tr>";

} 
echo "</table>";
//CHANGE REWARD STATUS OF THIS GUEST ID TO "Y" 
$up = "UPDATE `rewards` SET `status` = 'Y' WHERE guestID='$g_id'";
mysqli_query($conn, $up);

if ($num==0)
{
    echo "<h3> YOU DO NOT HAVE ANY REWARDS </h3> ";
}
if ($num > 0 && $num < 2)
{
    echo "<h3> YOU DO NOT HAVE ANY REWARDS YET </h3> ";
}
else
{
//CALCULATE ACTUAL REWARDS AND SHOW THE DISCOUNT
$discount = $num * 10;

echo "<h3> YOU HAVE BEEN GIVEN THE FOLLOWING DISCOUNT! </h3> ";
echo "<h3>" . $discount . "</h3>";

}

}

?>
<p>   
  <h3>  Go back to main guest page <a href ="guest.php">click.</a> </h3>
</p>
<img  src="https://i.pinimg.com/originals/6d/49/9c/6d499cc89b1e9290af515ce5e9a0f3d7.jpg" width="1000" height="1000">

</body>
