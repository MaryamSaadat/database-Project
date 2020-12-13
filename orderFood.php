<html>
<title>ORDER FOOD</title>
<head>
<link rel="stylesheet" href="./style4.css">
</head>
 <body>

 <h2> ORDER FOOD! </h2>
  <?php
        if (isset( $_GET['Error'])) 
        {
            echo "<p>THIS BOOKING ID DOES NOT EXIST.</p>";
        }
        
?>
<p>
<h3> FOOD ITEMS AVAILABLE</h3>
</p>

<?php

//Resource used to echo the result in a fancy way: https://www.w3schools.com/php/php_mysql_select.asp
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Food ID</th><th>Food Item</th><th>Price</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HotelManagement";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT foodID, foodItem, price FROM menu");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

//mysqli_close($conn);
?>

<p> 
<h3> ENTER YOUR BOOKING ID AND ORDER FOOD </h3>
</p>

<form name = "myform" action="foodValidate" method ="post">
</p>
<label  for="o_date">Order date:</label>
<input type="date" id="order" name="o_date">
</p>
<p>
   <label for="booking_id">Book ID:</label>
<input type="number" name="book_id" id="booking_id" />
 </p>

 <p>
 <label for="khana">Food ID:</label>
 <input type="number" name="food_id" id="khana" />
 </p>

 <input type="submit" value = "Order">
</form>


<img src="https://oxygenna.com/wp-content/uploads/2014/05/foodiconset.jpg">

</body>
</html>
