<?php
session_start();
?>


<html> 
 <title>BOOKING SUCCESSFUL!</title>
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
 <h1> BOOKING SUCCESSFUL! </h1>
 <h3> Your Booking ID is: </h3>
 <?php
//your PHP code goes here
 //session_start();
 $book =  $_SESSION['to_display'];
 //echo "NEW PAGE";
 echo $book;
?>

<p >   
    Go back to main guest page <a href ="guest.php">click.</a> 
</p>

 </body>
 </html>







