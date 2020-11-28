<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Booking</title>
  <link rel="stylesheet" href="./style2.css">

</head>
<body>
<!-- partial:index.partial.html -->
<h1> BOOK A ROOM! </h1>

<?php
        if (isset( $_GET['passwordFailure']) ) 
        {
            echo "<p>THIS ROOM IS UNAVAILABLE. PLEASE SELECT AGAIN.</p>";
        }

        

        
?>


 <form name = "myform" action="bookValidate" method ="post">

 </p>
<label  for="b_date">Booking date:</label>
<input type="date" id="start" name="b_date">
</p>

<p>
<label for="in_date">Checkin Date:</label>
<input type="date" id="start" name="in_date">
 <label for="out_date">Checkout Date:</label>
<input type="date" id="start" name="out_date">
</p>
  

<p>
<label for="rooms">Choose Room:</label>

<select id="rooms" name="rooms">

    <option value='S'>S</option>
    <option value='D'>D</option>
    <option value='Q'>Q</option>
    <option value='K'>K</option>

</select>


</p>
<input type="submit">
</form>

<table class = "center">
  <tr>
    <th>Room Type</th>
    <th>Room Price</th>
  </tr>
  <tr>
    <td>SINGLE (S)</td>
    <td>1000</td>
  </tr>
  <tr>
    <td>DOUBLE (D)</td>
    <td>2000</td>
  </tr>
  <tr>
    <td>QUEEN (Q)</td>
    <td>3000</td>
  </tr>
  <tr>
    <td>KING (K)</td>
    <td>4000</td>
  </tr>
</table>


<!-- partial -->
  
</body>
</html>
