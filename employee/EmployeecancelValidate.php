<?php
ob_start();
require ('connect.php');
?>
<?php

//CONNECT TO THE DATABASE

//WANT USERNAME AND BOOKING ID FROM THE INPUT
if (isset($_POST['bookingID']))
{
    //echo"lala";
   // $username = $_POST['user_name'];
    $booking = $_POST['bookingID'];

   // echo $username;
   // echo $books;

    //USE THIS BOOK ID TO GET THE ROOM ID 
    $q1 = "SELECT * FROM `bookings` WHERE `bookingID` = $booking";
    $r1 = mysqli_query($conn, $q1);
    $row=mysqli_fetch_array($r1);

    $room_id =  $row['roomID'];
    

    //DELETE THE TUPLE WITH THIS BOOKING ID
    $q2 = "DELETE FROM `bookings` WHERE `bookingID` = '$booking'";
    mysqli_query($conn, $q2);

    //UPDATE ROOM AVAILABILITY STATUS
    $up = "UPDATE `rooms` SET available = 'Y' WHERE roomID='$room_id'";
    if(mysqli_query($conn, $up))
    {
       echo "BOOKING CANCELLED SUCCESSFULLY";
       //header('Location:guest.php?successfulCancel=1');
    }

    
}



mysqli_close($conn);
?>
<?php
ob_end_flush();
?>
