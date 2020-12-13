<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Rewards</title>
  <link rel="stylesheet" href="./style3.css">

</head>
<body>
<!-- partial:index.partial.html -->
<h1> VIEW REWARDS  </h1>

<p>
<h2 style="color:white;"> Enter the GuestID you want to see rewards of. </h2>
</p>


 <form action="EmployeeReward.php" method ="post">
 <p>
   <label for="guestID"> GuestID:</label>
<input type="text" name="guestID" id="guestID" />
 </p>



</form>
<form action="EmployeeReward.php" method="post">
            <table align="center">
            <tr>
                <h3 style="color:white;">Enter A if you want to see the list of guests who have availed their rewards  </h3>
            Type: <input type="text" name="Ans1"><br>
            </tr>
            </table>    
            </form>
<!-- partial -->
  
</body>
</html>
<?php
ob_end_flush();
?>