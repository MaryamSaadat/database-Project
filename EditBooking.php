<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Booking</title>
  <link rel="stylesheet" href="./style2.css">

</head>
<body>

<h1> EDIT BOOKING PAGE </h1>


    <p>
        Enter the booking ID that you want to edit 

   </p>

    <!-- <form id="form1" name="form1" method="post" action="sample.php">
        <table align="center">
            
            <tr>
            <td><label for="bookingID"> BookingID:</label></td>
            <td><input type="text" name="bookingID" id="bookingID" /></td>
            </tr>

           
        </table>
        
        <br>
       

    </form> -->


 <form name = "myform" action="EditValidate.php" method ="post">


 <table align="center">
            
            <tr>
            <td><label for="bookingID"> BookingID:</label></td>
            <td><input type="text" name="bookingID" id="bookingID" /></td>
            </tr>

           
        </table>





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



  
</body>
</html>
