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
    <h1>HOTEL TRANSYLVANIA</h1>
    <h1>Cancel Booking Page </h1>
    <p>
        Enter the booking ID that you want to cancel 

   </p>

    <form id="form1" name="form1" method="post" action="EmployeecancelValidate.php">
        <table align="center">
            
            <tr>
            <td><label for="bookingID"> BookingID:</label></td>
            <td><input type="text" name="bookingID" id="bookingID" /></td>
            </tr>

           
        </table>
        
        <br>
        <p >   
              Go back to main employee <a href ="EmployeePage.php">menu.</a> 

    </form>

</body>

</html>
<?php
ob_end_flush();
?>