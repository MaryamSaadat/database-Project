<?php
ob_start();
?>
<!DOCTYPE html>
<html>
   <head>
    <meta charset="UTF-8">
	<title>Employee menu</title> 
	<link rel="stylesheet" href="./style.css">
   </head>



   <body>
    <h1>HOTEL TRANSYLVANIA</h1>
    <h1>EMPLOYEE PAGE</h1>
    <div class = "s">
    <p>
        <form action="BookingReport.php" method="get" target="_blank">
            <button type="submit">CHECK BOOKING </button>
        </form>
        <form action="GuestDetails.php" method="get" target="_blank">
             <button type="submit">CHECK GUEST DETAILS</button>
        </form>
    <p>

    <p>
        <form action="checkIn.php" method="get" target="_blank">
            <button type="submit">CHECK IN </button>
        </form>
        <form action="checkOut.php" method="get" target="_blank">
             <button type="submit">CHECK OUT</button>
        </form>
    <p>

    <p>
        <form action="EmployeeEditBooking.php" method="get" target="_blank">
            <button type="submit">EDIT BOOKING </button>
        </form>
        <form action="EmployeeCancelPage.php" method="get" target="_blank">
             <button type="submit">CANCEL BOOKING</button>
        </form>

    </p>

    <p>
        <form action="RewardPage.php" method="get" target="_blank">
            <button type="submit">REWARD CHECKING </button>
        </form>
        <form action="invoiceemp.php" method="get" target="_blank">
             <button type="submit">INVOICE GENERATION</button>
        </form>

    </p>


    <p>
        <form action="https://thehoteltransylvania.000webhostapp.com" method="get" target="_blank">
            <button type="submit">BACK TO LOGIN MENU</button>
       </form>


    </p>
</div>
<img src="https://miro.medium.com/max/2800/1*7jDLREu-uME27nRvzwckBw.jpeg">
   </body>
</html>
<?php
ob_end_flush();
?>