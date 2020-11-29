<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./style.css">

</head>
<?php
// connecting to the database
$conn = mysqli_connect('localhost', 'root', 'root');//<---- ALSO CHANGE PASSWORD TO THE PASSWORD YOU HAVE SET FOR PHPMYADMIN IF IT IS NOT ROOT
if (!$conn){
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');//<---CHANGE TO THE NAME OF YOUR MANAGEMENT DATABASE
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}

if ( isset($_POST['firstTime']) and isset($_POST['secondTime']))
{
    // Assigning POST values to variables of start date and finish date. 
    $sd = $_POST['firstTime'];
    $fd = $_POST['secondTime'];

        // CHECK FOR THE RECORD FROM TABLE, IF RECORD EXISTS, TELL THE USER THAT USERNAME EXISTS
        $query = "SELECT *  FROM `bookings` WHERE `bookingDate` BETWEEN '$sd' AND '$fd'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
        // IF NOTHING WAS FOUND, RETURN THAT NO BOOKING DATES WERE FOUND
        if ($count == 0)
        {
        header('Location:bookingInfo.php?bookingDates=1'); 
        }
        else
        {
            echo "TOTAL NUMBER OF BOOKINGS: ";
            echo $count. "<br>";
            echo "The bookings between prescribed dates are: <br>";
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
             <td width=100>Booking ID::</td> 
            <td width=100>Guest ID:</td> 
            <td width=100>Room ID:</td> 
            <td width=100>Booking Date:</td> 
            <td width=100>Check-In Date:</td>
            <td width=100>Check Out Date:</td> 
            </tr>"; 
           while($row = mysqli_fetch_array($result))
           { 
          print "<tr>"; 
          print "<td>" . $row['bookingID'] . "</td>"; 
          print "<td>" . $row['guestID'] . "</td>"; 
          print "<td>" . $row['roomID'] . "</td>"; 
          print "<td>" . $row['bookingDate'] . "</td>";
          print "<td>" . $row['startDate'] . "</td>";
          print "<td>" . $row['endDate'] . "</td>";
          print "</tr>"; 
          } 
          print "</table>"; 
          
            }
    
}

    mysqli_close($conn);
    ?>
