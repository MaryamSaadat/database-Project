<?php
ob_start();
require('connect.php');
//CONNECT TO THE DATABASE
/*
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
{
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}
*/
//WANT ORDER DATE, BOOKING ID, FOOD ID
if (isset($_POST['o_date']) and isset($_POST['book_id']) and isset($_POST['food_id']))
{
    
    $order = $_POST['o_date'];
    //echo $order;
    $book = $_POST['book_id'];
    //echo $book;
    $food = $_POST['food_id'];
    //echo $food;

    $sql = "INSERT INTO `roomservice` (`orderID`,`bookingID`,`foodID`,`orderDate`) VALUES (NULL, '$book', '$food', '$order')";
    $q = mysqli_query ($conn,$sql) or die(mysqli_error($conn));

    if ($q==1)
    {
        // EXTRACTING ORDER ID
        $sql2 = "SELECT orderID FROM `roomservice` WHERE bookingId ='$book' AND foodID = '$food' AND orderDate = '$order'";
		$res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

		$oid = $res2 -> fetch_assoc();
        $oid = $oid['orderID'];

        // EXTRACTING PRICE OF FOOD ID
        $sql3 = "SELECT price FROM `menu` WHERE foodID = '$food'";
		$res = mysqli_query($conn, $sql3) or die(mysqli_error($conn));

		$price = $res -> fetch_assoc();
        $price = $price['price'];
        
        // PUSHING INTO PAYMENTS TABLE
        $sql4 = "INSERT INTO `paymentsservice` (`bookingID`, `orderID`, `price`) VALUES ('$oid', '$book', '$price')";
        $quer = mysqli_query ($conn,$sql4) or die(mysqli_error($conn)); 
        
        if ($quer == 1) {
            //echo "your order have been placed";
            header('Location:orderDone.php');
        }
    }


}

mysqli_close($conn);
ob_end_flush();
?>