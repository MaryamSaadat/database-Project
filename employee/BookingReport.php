<?php
ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hotel Transylvania</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   

    <link rel="stylesheet" href="./style.css">

</head>


<body>
    
	<h3>Check Bookings</h3>

    <form id="form1" name="form1" method="post" action="roomReport.php">
        <table align="center">
            <tr>
                <h3>Enter the Room ID to know if its available or not</h3>
            <td><label for="roomID">Room no:</label></td>
            <td><input type="text" name="roomID" id="roomID" /></td>
            </tr>

           
        </table>
        
        <br>
      

    </form>
    <form action="roomReport.php" method="post">
        <table align="center">
        <tr>
            <h3>Enter 'A' if you want to see number of available rooms </h3>
        Type: <input type="text" name="Ans1"><br>
        </tr>
        </table>
        </form>
    <form action="roomReport.php" method="post">
            <table align="center">
            <tr>
                <h3>Enter 'B' if you want to see number of booked rooms </h3>
            Type: <input type="text" name="Ans2"><br>
            </tr>
            </table>    
            </form>

     <form id="form1" name="form1" method="post" action="roomReport.php">
        <table align="center">
            <tr>
                <h3>Enter the Booking ID to see its details</h3>
            <td><label for="bookingID">Booking ID:</label></td>
            <td><input type="text" name="bookingID" id="bookingID" /></td>
            </tr>

           
        </table>
        
        <br>
      

    </form>

    <form id="form1" name="form1" method="post" action="roomReport.php">
        <table align="center">
            <tr>
                <h3>Enter the Guest ID to see what type of room he/she has booked</h3>
            <td><label for="guestID">Guest ID:</label></td>
            <td><input type="text" name="guestID" id="guestID" /></td>
            </tr>

           
        </table>
        
        <br>
      

    </form>
      <form action="roomReport.php" method="post">
            <table align="center">
            <tr>
                <h3>Enter 'C' if you want to see details of all the bookings</h3>
            Type: <input type="text" name="Ans3"><br>
            </tr>
            </table>
            <br>
        <p >   
            Go back to main employee <a href ="EmployeePage.php">menu.</a> 
        </p>
            </form>
               
    
</body>

</html>
<?php
ob_end_flush();
?>










