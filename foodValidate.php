<?php
//CONNECT TO THE DATABASE
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
{
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}
//WANT ORDER DATE, BOOKING ID, FOOD ID
if (isset($_POST['o_date']) and isset($_POST['book_id']) and isset($_POST['food_id']))
{
    
    $order = $_POST['o_date'];
    //echo $order;
    $book = $_POST['book_id'];
    //echo $book;
    $food = $_POST['food_id'];
    //echo $food;

    $sql = "INSERT INTO `roomservice` (`orderID`,`bookingID`,`foodID`,`orderDate`) VALUES (NULL,'$book', '$food', '$order')";
    $q = mysqli_query ($conn,$sql) or die(mysqli_error($conn));
    if ($q==1)
    {
        //echo "your order have been placed";
        header('Location:orderDone.php');
    }


}

mysqli_close($conn);
?>