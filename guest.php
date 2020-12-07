<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<title>CodePen - Hotel Use Case</title> 
	<link rel="stylesheet" href="./style.css">

</head>

<body>
<!-- partial:index.partial.html -->
	<h1>HOTEL TRANSYLVANIA</h1>
	<?php
	if (isset( $_GET['successfulCreation']) ) 
        {
            echo "<p>YOU HAVE BOOKED A ROOM!.</p>";
		}
		if (isset( $_GET['successfulCancel']) ) 
        {
            echo "<p>YOU HAVE CANCELLED BOOKING.</p>";
        }
	?>

	<div class = "s">
		<p> 
		  <form method="post" action="bookRoom.php">
			<button type="submit">BOOK ROOM</button>
		  </form>
		
		</p>
		<p>
		<form method="post" action="cancelBook.php">
			<button type="submit">CANCEL BOOKING</button>
		</form>
		
		</p>

		<p> 
		  <form method="post" action="orderFood.php">
			<button type="submit">ORDER ROOMSERVICE</button>
		  </form>
		</p>

		<p> 
		  <form method="post" action="">
			<button type="submit">INVOICE GENERATION</button>
		  </form>
		</p>

		<p>
		<form method="post" action="">
			<button type="submit">ONLINE PAYMENT</button>
		</form>
		</p>

		<p>
		<form method="post" action="">
			<button type="submit">VIEW REWARDS</button>
		</form>
		</p>

	</div>

	<img src="https://miro.medium.com/max/2800/1*7jDLREu-uME27nRvzwckBw.jpeg">
<!-- partial -->
  
</body>

</html>
