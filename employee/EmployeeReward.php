<?php
ob_start();
require ('connect.php');
?>
<html>
<title> VIEW REWARDS </title>
<head>
<link rel="stylesheet" href="./style6.css">
</head>


<?php
if(isset($_POST['guestID']))
{
  $g_id=$_POST['guestID'];
//CORRESPONDING TO THIS FIND ALL BOOKINGS AND DISPLAY THE BOOKING DATES
$get_data = "SELECT * from `bookings` WHERE guestID='$g_id'";
$res = mysqli_query($conn, $get_data) or die(mysqli_error($conn));
$num = mysqli_num_rows($res); //COUNT OF BOOKINGS
echo"YOUR BOOKING HISTORY";
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
//up = "UPDATE `rewards` SET `status` = 'Y' WHERE guestID='$g_id'";
//mysqli_query($conn, $up);


if($num==0)
{
    echo "<h3> NO SUCH BOOKING EXISTS </h3> ";
}

if ($num < 2 && $num>0)
{
    echo "<h3> YOU DO NOT HAVE ANY REWARDS YET </h3> ";
}
//CALCULATE ACTUAL REWARDS AND SHOW THE DISCOUNT
else
{
    $discount = $num * 10;
    echo "<h3> YOU HAVE BEEN GIVEN THE FOLLOWING DISCOUNT! </h3> ";
    echo "<h3>" . $discount . "</h3>";
}


}
if(isset($_POST['Ans1']))
{

    $query="SELECT guest.guestID, guest.username,guest.firstName,guest.lastName
     FROM rewards LEFT JOIN guest ON rewards.guestID = guest.guestID 
     WHERE rewards.status='Y'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $num = mysqli_num_rows($res); 

     
    if ($num == 0)
    {
    echo "No rewards have been availed !";
   
    }
    
    else
    {
      
       
    
        print "  <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
            
            <td width=100>Guest ID:</td> 
            <td width=100>Username:</td> 
            <td width=100>Guest Name :</td> 
            
           
            
            </tr>"; 
            while($row = mysqli_fetch_array($res))
           { 
                print "<tr>"; 
                print "<td>" . $row['guestID'] . "</td>";
                print "<td>" . $row['username'] . "</td>"; 
                print "<td>" . $row['firstName'] . ' '. $row['lastName'] . "</td>";
                //print "<td>" . $row['lastName'] . "</td>";
               
          } 
        }
          print "</table>"; 
          
      
              
       
}
?>
<img  src="https://i.pinimg.com/originals/6d/49/9c/6d499cc89b1e9290af515ce5e9a0f3d7.jpg" width="1000" height="1000">

</body>
<?php
ob_end_flush();
?>