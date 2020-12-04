<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./style.css">

</head>
<?php
// connecting to the database
$conn = mysqli_connect('localhost', 'root', 'root');//<---- ALSO CHANGE PASSWORD TO THE PASSWORD YOU HAVE SET FOR PHPMYADMIN IF IT IS NOT ROOT
if (!$conn){
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');//<---CHANGE TO THE NAME OF YOUR MANAGEMENT DATABASE
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}
if ( isset($_POST['level']) and isset($_POST['percentage']))
{
    // Assigning POST values to variables of start date and finish date. 
    echo hello;
        $level = $_POST['level'];
        $percentage = $_POST['percentage'];
        $increment = ($percentage/100) + 1;
        echo $increment;

        $query =  "UPDATE `employee` SET `salary`= salary * $increment\n"

                . "WHERE level = '$level' and status = 'currently hired'";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        
        header('Location:employeeSalIncrement.php?altered=1'); 
        
        
}

    mysqli_close($conn);
    ?>
