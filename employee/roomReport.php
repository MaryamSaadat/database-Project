<?php
ob_start();
require ('connect.php');
?>
<?php
if (isset($_POST['roomID']) ) 
{
	
    // Assigning POST values to variables.
    $RoomID = $_POST['roomID'];
    
    
    // CHECK FOR THE RECORD FROM TABLE
    $query = "SELECT * FROM `rooms` WHERE roomid='$RoomID'";
     
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);

    
    if ($count == 0)
    {
    echo "No such room found!";
    //header('Location:login.php');
    header('BookingReport.php');
    
    
    }
    
    else
    {
      
       
       $row=$result->fetch_assoc();
      
       
       if($row["available"]=='Y')
       {
           echo"Yes, this room is avaialable." ;
       }
    
       if($row["available"]=='N')
       {
          echo"No, the  room is not  avaialable." ;
     

          
       }

    }

}
if (isset($_POST['bookingID']) ) 
{
	
    // Assigning POST values to variables.
    $BookingID = $_POST['bookingID'];
    
    
    // CHECK FOR THE RECORD FROM TABLE
   // $query = "SELECT * FROM `bookings` WHERE bookingid='$BookingID'";
     $query="SELECT bookings.bookingID, bookings.guestID,bookings.roomID,bookings.bookingDate,bookings.startDate,bookings.endDate,guest.firstName, guest.lastName
     FROM bookings LEFT JOIN guest ON bookings.guestID = guest.guestID ";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);

    
    if ($count == 0)
    {
    echo "No such booking found!";
    header('BookingReport.php');
    
    
    }
    
    else
    {
      
       
       
    
        print "  <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
             <td width=100>Booking ID::</td> 
            <td width=100>Guest ID:</td> 
            <td width=100>Guest First Name :</td> 
            <td width=100>Guest Last Name :</td> 
            <td width=100>Room ID:</td> 
            <td width=100>Booking Date:</td> 
            <td width=100>Check-In Date:</td>
            <td width=100>Check Out Date:</td> 
            </tr>"; 
           $row = $result->fetch_assoc();
            
          print "<tr>"; 
          print "<td>" . $row['bookingID'] . "</td>"; 
          print "<td>" . $row['guestID'] . "</td>"; 
          print "<td>" . $row['firstName'] . "</td>"; 
          print "<td>" . $row['lastName'] . "</td>";
          print "<td>" . $row['roomID'] . "</td>"; 
          print "<td>" . $row['bookingDate'] . "</td>";
          print "<td>" . $row['startDate'] . "</td>";
          print "<td>" . $row['endDate'] . "</td>";
          print "</tr>"; 
          } 
          print "</table>";
      
            
       

 }

    if(isset($_POST['guestID']))
    {
        $GuestID=$_POST['guestID'];

        $query = "SELECT bookings.bookingID, bookings.guestID,rooms.type
         FROM bookings LEFT JOIN rooms ON bookings.roomID = rooms.roomID 
         WHERE bookings.guestID='$GuestID'";

       
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $count = mysqli_num_rows($result);
        /////////////NEW PART //////////
        $query2="SELECT * FROM `guest` WHERE guestID='$GuestID'";
        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
        $count2 = mysqli_num_rows($result2);
  

        $row2= mysqli_fetch_array($result2);


       
        if($count==0)
        {
            echo"No such guest found !";
        }       

        if($count>0)
        {
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
             <td width=100>Booking  ID::</td> 
            <td width=100>Guest ID :</td> 
            <td width=100>Guest First Name :</td> 
            <td width=100>Guest Last Name :</td> 
            <td width=100>Room Type :</td> 
            

            </tr>"; 
           while($row = mysqli_fetch_array($result))
           { 
                print "<tr>"; 

                print "<td>" . $row['bookingID'] . "</td>"; 
                print "<td>" . $row['guestID'] . "</td>";
                print "<td>" . $row2['firstName'] . "</td>";
                print "<td>" . $row2['lastName'] . "</td>";
                print "<td>" . $row['type'] . "</td>";
          } 

          print "</table>"; 
          
          //$row=mysqli_fetch_array($result);
          //print "<td>" . $row['bookingID'] . "</td>"; 
          



        }







    }

    if (isset($_POST['Ans1']) ) 
    {
        $query = "SELECT * FROM `rooms` WHERE `available` LIKE 'Y'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
        if($count==0)
        {
            echo"Sorry, no rooms available.";
        }
        if($count>0)
        {
            echo"Number of available rooms=$count";
        }

    }
    if (isset($_POST['Ans2']) ) 
    {
        $query = "SELECT * FROM `rooms` WHERE `available` LIKE 'N'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
        if($count==0)
        {
            echo"None of the rooms are booked.";
        }
        if($count>0)
        {
            echo"Number of booked rooms=$count";
        }

    }
    if (isset($_POST['Ans3']) ) 
    {
        $query = "SELECT * FROM `bookings`";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
        if($count==0)
        {
            echo"No current bookings.";
        }
        if($count>0)
        {
            
            echo"THIS IS THE LIST OF  ALL THE GUESTS :";
            echo $count. "<br>";
          /*  while($row=mysqli_fetch_assoc($result))

            {
                echo "BookingID: " . $row["bookingID"].
                "     ----GuestID: " . $row["guestID"].
                "     ----RoomID: " . $row["roomID"].
                "     ----BookingDate :" . $row["bookingDate"].
                "     ----Start Date : " . $row["startDate"].
                "     ----End Date : " . $row["endDate"]."<br>";
               
            }*/
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
<?php
ob_end_flush();
?>