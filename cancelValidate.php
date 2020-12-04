<?php

//CONNECT TO THE DATABASE
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
{
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}

//WANT USERNAME AND BOOKING ID FROM THE INPUT
if (isset($_POST['user_name']) and isset($_POST['book_id']))
{
    $username = $_POST['user_name'];
    $books    = $_POST['book_id'];

    echo $username;
    echo $books;

    //USE THIS BOOK ID TO GET THE ROOM ID 
    $q1 = "SELECT * FROM `bookings` WHERE `bookingID` = '$books'";
    $r1 = mysqli_query($conn, $q1);

    while ($row = mysqli_fetch_assoc($r1)) 
    {
    $room_id =  $row['roomID'];
    }

    //DELETE THE TUPLE WITH THIS BOOKING ID
    $q2 = "DELETE FROM `bookings` WHERE `bookings`.`bookingID` = '$books'";
    mysqli_query($conn, $q2);

    //UPDATE ROOM AVAILABILITY STATUS
    $up = "UPDATE `rooms` SET available = 'Y' WHERE roomID='$room_id'";
    if(mysqli_query($conn, $up))
    {
       echo "BOOKING CANCELLED SUCCESSFULLY";
       header('Location:guest.php?successfulCancel=1');
    }

    
}



mysqli_close($conn);
?>

