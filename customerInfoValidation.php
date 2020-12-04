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

if (isset($_POST['username']))
{
    // Assigning POST values to variables of start date and finish date. 
    $userID = $_POST['username'];

    $query1 = "SELECT `username` FROM `guest`  WHERE username LIKE '$userID'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result1);
    if ($count == 0)
        {
            header('Location:customerReport.php?noUser=1');  
        }

    else
    {
        // first query to find ID
        $query2 = "SELECT guestID FROM `guest` WHERE `username` LIKE '$userID'";
        $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

        $res = mysqli_fetch_array($result2);
        $guestID = $res['guestID'];

        // second query to find all the guest info in guest table
        $query3 = "SELECT * FROM `guest` WHERE `username` LIKE '$userID'";
        $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
        echo "Guest information: <br>";

            while($row = mysqli_fetch_assoc($result3)) 
            {
                echo "Guest ID: "       . $row["guestID"]."<br>";
                echo "Guest username: " . $row["username"]."<br>";
                echo "Guest Name: "     . $row["guestFirstName"]." ".$row["guestLastName"]."<br>";
                echo "Gender: "         . $row["gender"]."<br>";
                echo "Guest Email: "    . $row["email"]."<br>";
                echo "Guest age: "      . $row["age"]."<br>"."<br>"."<br>";
            
              }

        // third query to find all the booking under this ID
        while($row = mysqli_fetch_assoc($guestID)) 
            {
                echo "Guest ID: "       . $row["guestID"]."<br>";
            
              }


        $query4 =  "SELECT *  FROM `bookings` WHERE `guestID` = '$guestID'";
        $result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
        $count4 = mysqli_num_rows($result4);
        if ($count4 == 0)
        {
            echo "<br>"."<br>"."<br>";
            echo "Guest has no bookings <br>"."<br>"."<br>";
        }
        else 
        {
            echo "<br>"."<br>"."<br>";
            echo "TOTAL NUMBER OF BOOKINGS: ";
            echo $count4. "<br>";
            echo "The booking(s) made by the guest are: <br>";
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
             <td width=100>Booking ID::</td> 
            <td width=100>Room ID:</td> 
            <td width=100>Booking Date:</td> 
            <td width=100>Check-In Date:</td>
            <td width=100>Check Out Date:</td> 
            </tr>"; 
           while($row = mysqli_fetch_array($result4))
           { 
          print "<tr>"; 
          print "<td>" . $row['bookingID'] . "</td>"; 
          print "<td>" . $row['roomID'] . "</td>"; 
          print "<td>" . $row['bookingDate'] . "</td>";
          print "<td>" . $row['startDate'] . "</td>";
          print "<td>" . $row['endDate'] . "</td>";
          print "</tr>"; 
          } 
          print "</table>"; 
        }


        // fourth query to find payments made by the quest
        $query5 = "SELECT * \n"

                    . "FROM payments\n"
                
                    . "where payments.bookingID IN (SELECT bookingID\n"
                
                    . "                             FROM bookings\n"
                
                    . "                             WHERE bookings.guestID = '$guestID')";
        $result5 = mysqli_query($conn, $query5) or die(mysqli_error($conn));
        $count5 = mysqli_num_rows($result5);
        if ($count5 == 0)
        {
            echo "<br>"."<br>"."<br>";
            echo "Guest has no payments made <br>"."<br>"."<br>";
        }
        else
        {
            echo "<br>"."<br>"."<br>";
            echo "TOTAL NUMBER OF PAYMENTS: ";
            echo $count5. "<br>";
            echo "The payments(s) made by the guest are: <br>";
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
            <td width=100>Payment ID::</td> 
            <td width=100>Booking ID:</td> 
            <td width=100>Amount:</td> 
            <td width=100>Payment Status:</td>
            <td width=100>Payment Date:</td> 
            </tr>"; 
            while($row = mysqli_fetch_array($result5))
            { 
            print "<tr>"; 
            print "<td>" . $row['paymentID'] . "</td>"; 
            print "<td>" . $row['bookingID'] . "</td>"; 
            print "<td>" . $row['amount'] . "</td>";
            print "<td>" . $row['paymentStatus'] . "</td>";
            print "<td>" . $row['paymentDate'] . "</td>";
            print "</tr>"; 
            } 
            print "</table>"; 
        }

        // fifth query to find room service ordered by the guest 
        $query6 = "SELECT * \n"

                . "FROM roomservice\n"
            
                . "WHERE bookingID IN (SELECT bookingID FROM bookings WHERE bookings.guestID = '$guestID')";
        $result6 = mysqli_query($conn, $query6) or die(mysqli_error($conn));
        $count6 = mysqli_num_rows($result6);
        if ($count6 == 0)
        {
            echo "<br>"."<br>"."<br>";
            echo "No room service has been ordered by the guest.<br>"."<br>"."<br>";
        }
        else
        {
            echo "<br>"."<br>"."<br>";
            echo "TOTAL NUMBER OF ROOM SERVICE ORDERS: ";
            echo $count5. "<br>";
            echo "The orders placed by the guest are: <br>";
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
            <td width=100>Order ID::</td> 
            <td width=100>Booking ID:</td> 
            <td width=100>food ID:</td> 
            <td width=100>Order Date:</td> 
            </tr>"; 
            while($row = mysqli_fetch_array($result6))
            { 
            print "<tr>"; 
            print "<td>" . $row['orderID'] . "</td>"; 
            print "<td>" . $row['bookingID'] . "</td>"; 
            print "<td>" . $row['foodID'] . "</td>";
            print "<td>" . $row['orderDate'] . "</td>";
            print "</tr>"; 
            } 
            print "</table>"; 
        }

        // sixth query to find rewards of the guest 
        $query7 = "SELECT *  FROM `rewards` WHERE `guestID` = '$guestID'";
        $result7 = mysqli_query($conn, $query7) or die(mysqli_error($conn));
        $count7 = mysqli_num_rows($result7);
        if ($count7 == 0)
        {
            echo "<br>"."<br>"."<br>";
            echo "The guest has no rewards to avail.<br>"."<br>"."<br>";
        }
        else
        {
            echo "<br>"."<br>"."<br>";
            echo "TOTAL REWARDS: ";
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
            <td width=100>Reward ID:</td> 
            <td width=100>Status:</td> 
            </tr>"; 
            while($row = mysqli_fetch_array($result7))
            { 
            print "<tr>"; 
            print "<td>" . $row['rewardID'] . "</td>"; 
            print "<td>" . $row['status'] . "</td>";
            print "</tr>"; 
            } 
            print "</table>"; 
        }

 
    }   
}

    mysqli_close($conn);
    ?>
