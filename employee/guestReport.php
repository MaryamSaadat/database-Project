<?php
ob_start();
require ('connect.php');
?>
<?php
    if(isset($_POST['bookingDate']))  
    {
        $BookingDate=$_POST['bookingDate'];
        $query="SELECT bookings.bookingID, bookings.guestID,bookings.roomID,bookings.bookingDate,bookings.startDate,bookings.endDate,guest.firstName, guest.lastName,guest.username,guest.gender,guest.age,guest.email
        FROM bookings LEFT JOIN guest ON bookings.guestID = guest.guestID 
        WHERE  bookings.bookingDate='$BookingDate'" ;
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
        if($count==0)
        {
            echo"No bookings made on this date";
        }

        if($count>0)
        {
            echo"LIST OF BOOKINGS MADE ON THIS DATE :";
            echo $count. "<br>";
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
            <td width=100>BookingID</td> 
            <td width=100>Guest ID</td> 
            <td width=100>Booking Date</td> 
            <td width=100>Username</td> 
            <td width=100>First Name</td> 
            <td width=100>Last Name</td> 
            <td width=100>Gender</td>
            <td width=100>Email</td> 
            <td width=100>Age</td> 

            </tr>"; 
           while($row = mysqli_fetch_array($result))
           { 
          print "<tr>"; 
          print "<td>" . $row['bookingID'] . "</td>"; 
          print "<td>" . $row['guestID'] . "</td>"; 
          print "<td>" . $row['bookingDate'] . "</td>"; 
          print "<td>" . $row['username'] . "</td>"; 
          print "<td>" . $row['firstName'] . "</td>";
          print "<td>" . $row['lastName'] . "</td>";
          print "<td>" . $row['gender'] . "</td>";
          print "<td>" . $row['email'] . "</td>";
          print "<td>" . $row['age'] . "</td>";
          } 
          print "</table>";

        }


    }  


    if (isset($_POST['Ans1']) ) 
    {   
        $query = "SELECT * FROM `guest` ";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
        if($count==0)
        {
            echo"No guest found in the database";
        }
        if($count>0)
        {   
            echo"THIS IS THE LIST OF  ALL THE GUESTS :";
            echo $count. "<br>";
           /* while($row=mysqli_fetch_assoc($result))

            {
                echo "Guest ID: " . $row["guestID"].
                "     ----Username: " . $row["username"].
                "     ----First Name: " . $row["firstName"].
                "     ----Last Name :" . $row["lastName"].
                "     ----Gander : " . $row["gender"].
                "     ----Email Address : " . $row["email"].
                "     ----Age: " . $row["age"]. "<br>";
            }*/
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
             <td width=100>Guest ID::</td> 
            <td width=100>Username:</td> 
            <td width=100>First Name:</td> 
            <td width=100>Last Name:</td> 
            <td width=100>Gender:</td>
            <td width=100>Email:</td> 
            <td width=100>Age:</td> 

            </tr>"; 
           while($row = mysqli_fetch_array($result))
           { 
          print "<tr>"; 

          print "<td>" . $row['guestID'] . "</td>"; 
          print "<td>" . $row['username'] . "</td>"; 
          print "<td>" . $row['firstName'] . "</td>";
          print "<td>" . $row['lastName'] . "</td>";
          print "<td>" . $row['gender'] . "</td>";
          print "<td>" . $row['email'] . "</td>";
          print "<td>" . $row['age'] . "</td>";
          } 
          print "</table>";

        }

    }
    if (isset($_POST['Ans2']) ) 
    {


       

        $query = "SELECT  distinct bookings.guestID, bookings.bookingID,bookings.roomID, checkin.status,guest.firstName,guest.lastName,guest.username
        FROM checkin  
        JOIN bookings ON checkin.bookingID = bookings.bookingID 
        JOIN guest ON   bookings.guestID=guest.guestID  
        WHERE checkin.status LIKE 'Y' ";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);

    
        if($count==0)
        {
            echo"None of guests have  checkedIn any rooms right now ";
        }
        if($count>0)
        {
            echo"THIS IS THE LIST OF DETAILS OF  THE GUESTS THAT ARE CHECKED IN RIGHT NOW:";
            echo $count. "<br>";
           
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
             <td width=100>Guest ID::</td> 
            <td width=100>Username:</td> 
            <td width=100>First Name:</td> 
            <td width=100>Last Name:</td> 
            <td width=100>Room ID:</td>

            </tr>"; 
           while($row = mysqli_fetch_array($result))
           { 
          print "<tr>"; 

          print "<td>" . $row['guestID'] . "</td>"; 
          print "<td>" . $row['username'] . "</td>"; 
          print "<td>" . $row['firstName'] . "</td>";
          print "<td>" . $row['lastName'] . "</td>";
          print "<td>" . $row['roomID'] . "</td>";
         
          } 
          print "</table>";
        }

    }
    mysqli_close($conn);
    ?>
<?php
ob_end_flush();
?>