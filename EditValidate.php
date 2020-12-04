<?php

$conn = mysqli_connect('localhost', 'root', 'root');
if (!$conn)
{
    die("Database connection Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');
if (!$select_db)
{
    die("Database Selection Failed" . mysqli_error($conn));
}
if(isset($_POST['bookingID']) and isset($_POST['b_date']) and isset($_POST['in_date']) and isset($_POST['out_date']) and isset($_POST['rooms']))
{
   
    $booking_ID=$_POST['bookingID'];
    $query = "SELECT * FROM `bookings` WHERE bookingID ='$booking_ID'";
     $result = mysqli_query($conn, $query) or die(mysqli_error($conn)); 
    if(mysqli_num_rows($result) > 0) 
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
            if(mysqli_num_rows($result) > 0 )
            {
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
                    //header('Location:EditBooking.php?passwordFailure=1');
                   }
                }

                $sql2 = "UPDATE `bookings` SET `roomID`=$r_id,`bookingDate`='$book_date',`startDate`='$check_in',`endDate`='$check_out' WHERE '$booking_ID'";

                $q2 = mysqli_query ($conn,$sql2) or die(mysqli_error($conn));

                //UPDATE THE STATUS OF THE ROOM TO "N"
                $up = "UPDATE `rooms` SET available = 'N' WHERE roomID='$r_id'";
                 mysqli_query($conn, $up);

            }
            else
            {
                echo "ROOM UNAVAILABLE";
                //header('Location:login.php');
                //header('Location:EditBooking.php?passwordFailure=1');
            }

        


    }
    else
    {
        echo"No such booking ID exists!";
        //header('Location:EditBooking.php?passwordFailure=1');
    }




}
mysqli_close($conn);
?>