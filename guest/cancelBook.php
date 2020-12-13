<?php
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Cancel Booking</title>
  <link rel="stylesheet" href="./style3.css">

</head>
<body>
<!-- partial:index.partial.html -->
<h1> CANCEL BOOKING </h1>

<p>
<h2> Enter your username and booking ID in order to confirm the cancellation. </h2>
</p>


 <form action="cancelValidate" method ="post">
 <p>
   <label for="username">Username:</label>
<input type="text" name="user_name" id="username" />
 </p>

 <p>
   <label for="booking_id">Book ID:</label>
<input type="number" name="book_id" id="booking_id" />
 </p>
 
<input type="submit" value = "Confirm">
</form>
<!-- partial -->
  
</body>
</html>
