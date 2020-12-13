<?php

$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
{
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}

$sql = "INSERT INTO `account` (`username`, `user`, `password`) VALUES ('mms', 'guest', '123def')";


$sql2 = "INSERT INTO `guest` (`guestID`, `username`, `firstName`, `lastName`, `gender`, `age`, `email`) VALUES (NULL, 'mms', 'Hello', 'Myname', 'Male', '21', 'killmepls@gmail.com')";
mysqli_query($conn, $sql2);
echo "DONE";