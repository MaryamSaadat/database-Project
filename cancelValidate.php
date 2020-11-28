<?php

//CONNECT TO THE DATABASE
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
{
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'hotel management');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}

//WANT USERNAME AND BOOKING DATE FROM THE INPUT
if (isset($_POST['user_name']))
{
    $username = $_POST['user_name'];
    //echo $username;
    //FIND THE USERNAME IN GUEST TABLE AND EXTRACT THE GUEST ID CORESPONDING TO IT
    //THERE WILL ONLY BE ONE SUCH ENTRY SINCE USERNAME IS UNIQUE SO NO NEED FOR LOOPING
    $q = "SELECT * from `guest` WHERE username='$username'";
    $r = mysqli_query($conn, $q) or die(mysqli_error($conn));
    if ($row = mysqli_fetch_assoc($r)) 
    {
        $grow = $row;
        $g_id =  $grow['guestID'];
        //echo $g_id;
        //echo "<br /> ID: " .$grow['roomID']. "<br /> Price: ".$grow['price']. "<br /> Type: ".$frow['type']. "<br /> Available: ".$frow['available']. "<br />";

    }

    //USING THIS GUEST ID, SEARCH THE BOOKING TABLE AND EXTRACT THE ROOM ID CORRESPONDING TO IT AND THEN 
   
    $q2 = "SELECT * from `bookings` WHERE  guestID='$g_id'";
    $r2 = mysqli_query($conn, $q2) or die(mysqli_error($conn));
    if ($row2 = mysqli_fetch_assoc($r2)) 
    {
        $rrow = $row2;
        $r_id =  $rrow['roomID'];
        $b_id = $rrow['bookingID'];
        //echo $r_id;
        //echo $g_id;
        //echo "<br /> ID: " .$grow['roomID']. "<br /> Price: ".$grow['price']. "<br /> Type: ".$frow['type']. "<br /> Available: ".$frow['available']. "<br />";

    }
    //DELETE THIS BOOKING RECORD
    // sql to delete a record
    $q3 = "DELETE FROM bookings WHERE bookingID='$b_id'";
    mysqli_query($conn, $q2);

    //USING THIS ROOMID, SERACH THE ROOMS AND MAKE STATUS "N" FROM "Y"
    $up = "UPDATE `rooms` SET available = 'Y' WHERE roomID='$r_id'";
    if(mysqli_query($conn, $up))
    {
       echo "BOOKING CANCELLED SUCCESSFULLY";
       header('Location:guest.php?successfulCancel=1');
    }

}



mysqli_close($conn);
?>

