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
    
	<h3>Check Guest Detail</h3>

    <form action="guestReport.php" method="post">
        <table align="center">
        <tr>
            <h3>List of Guests who made bookings on this date </h3>
        Date: <input type="text" name="bookingDate"><br>
        </tr>
        </table>
        </form>
    </form>
    <form action="guestReport.php" method="post">
        <table align="center">
        <tr>
            <h3>Enter anything here if you want to see the list of all the guests </h3>
        Type: <input type="text" name="Ans1"><br>
        </tr>
        </table>
        </form>
    <form action="guestReport.php" method="post">
            <table align="center">
            <tr>
                <h3>Enter anything here if you want to see the list of currently checked in guests </h3>
            Type: <input type="text" name="Ans2"><br>
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