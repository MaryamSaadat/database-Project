<?php

session_start();
$user_ =  $_SESSION['user'];
//echo $user_;
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


//echo $username;
//WANT BOOKING DATE, CHECKIN DATE, CHECKOUT DATE AND THE ROOM TYPE FROM THE HTML PAGE
if (isset($_POST['b_date']) and isset($_POST['in_date']) and isset($_POST['out_date']) and isset($_POST['rooms']))
{
$book_date = $_POST['b_date'];
//echo $book_date;

$check_in = $_POST['in_date'];
//echo $check_in;

$check_out = $_POST['out_date'];
//echo $check_out;

$room_type = $_POST['rooms'];
//echo $room_type;

//CHECK IF THE SELECTED ROOM IS AVAILABLE
$query = "SELECT * FROM `rooms` WHERE type ='$room_type'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

//YES, IT IS AVAILABLE 
if(mysqli_num_rows($result) > 0 )
{
    //GET THE FIRST ROOM THAT IS AVAILABLE AND ASSIGN THAT TO THE GUEST
    /*if ($row = mysqli_fetch_assoc($result)) 
    {
        $frow = $row;
        if 
        echo "<br /> ID: " .$frow['roomID']. "<br /> Price: ".$frow['price']. "<br /> Type: ".$frow['type']. "<br /> Available: ".$frow['available']. "<br />";

    }*/
    //PRINT THE RESULT
    
    while ($row = mysqli_fetch_array ($result)) 
    {
      // echo "<br /> ID: " .$row['roomID']. "<br /> Price: ".$row['price']. "<br /> Type: ".$row['type']. "<br /> Available: ".$row['available']. "<br />";
       if ($row['available'] == 'Y')
       {
        $r_id = $row['roomID'];
        //echo $r_id;
        break;
       }
       else
       {
        echo "ROOM UNAVAILABLE";
        //header('Location:login.php');
        header('Location:bookRoom.php?passwordFailure=1');
       }
    }

    //INSERT ROOMID, BOOK DATE, CHECK IN, CHECK OUT AND GUEST ID IN THE BOOKING TABLE
    //ROOM ID
   // echo $r_id;

   
    //GUEST ID -> we have username, match that in guest table and extract the guest ID
     $query2 = "SELECT * from `guest` WHERE username='$user_'";
     $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
     if ($row2 = mysqli_fetch_assoc($result2)) 
    {
        $grow = $row2;
        $g_id =  $grow['guestID'];
        //echo "<br /> ID: " .$grow['roomID']. "<br /> Price: ".$grow['price']. "<br /> Type: ".$frow['type']. "<br /> Available: ".$frow['available']. "<br />";

    } 
    
    $get_data = "SELECT * from `bookings`";
    $res = mysqli_query($conn, $get_data) or die(mysqli_error($conn));
    $num = mysqli_num_rows($res);
    //echo $num;
    //$p_key = $num + 1;

    //INSERT ALL THIS EXTRACTED INFO IN BOOKING TABLE
    $sql2 = "INSERT INTO `bookings` (`bookingID`,`guestID`, `roomID`,`bookingDate`, `startDate`, `endDate`) 
    VALUES (NULL,'$g_id', '$r_id', '$book_date', '$check_in', '$check_out')";

            $q2 = mysqli_query  ($conn,$sql2) or die(mysqli_error($conn));
            if ($q2 == 1) 
            {
                $q3 = "SELECT * from `bookings` WHERE  guestID = '$g_id' AND roomID='$r_id'";
                $r3 = mysqli_query($conn, $q3) or die(mysqli_error($conn));
                

                if ($ro = mysqli_fetch_assoc($r3)) 
                {
                    $boo = $ro;
                    $your_booking_id =  $boo['bookingID'];
                    $_SESSION['to_display'] = $your_booking_id;
                } 

            //echo "Room Booked Successfully";
                
            //echo "Your booking ID is: ";

            //echo $your_booking_id;

            
            header('Location:bookDone.php?successfulCreation=1');
            
            } 
    //UPDATE THE STATUS OF THE ROOM TO "N"
    $up = "UPDATE `rooms` SET available = 'N' WHERE roomID='$r_id'";
    mysqli_query($conn, $up);
    
}

else
{

    echo "ROOM UNAVAILABLE";
    //header('Location:login.php');
    header('Location:bookRoom.php?passwordFailure=1');

}


//IF YES, THEN STORE THE BOOKING DETAILS IN THE BOOKING TABLE 

}



mysqli_close($conn);
?>
