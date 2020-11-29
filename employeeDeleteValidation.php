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

if ( isset($_POST['username']))
{
    // Assigning POST values to variables of start date and finish date. 
    $employeeName = $_POST['username'];
        $query = "UPDATE employee SET status= 'fired' WHERE username LIKE '$employeeName'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($result == 0)
        {
        header('Location:employeeDelete.php?noemployee=1'); 
        }
        else
        {
            header('Location:employeeDelete.php?deletionSuccessful=1'); 
        }
}

    mysqli_close($conn);
    ?>
