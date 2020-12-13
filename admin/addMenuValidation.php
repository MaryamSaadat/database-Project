<?php
ob_start();
require('connect.php');
?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./style.css">

</head>
<?php
if ( isset($_POST['naam']) and isset($_POST['price'])  )
{
    // Assigning POST values to variables of start date and finish date. 
    $naam = $_POST['naam'];
    $price = $_POST['price'];
       
        $query =  "INSERT INTO `menu` (`foodID`, `foodItem`, `price`, `available`) VALUES (NULL, '$naam', '$price', 'Y')";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        header('Location:addMenu.php?added=1'); 
}
if ( isset($_POST['id']) )
{
    $id = $_POST['id'];
    $sql = "UPDATE `menu` SET `available` = 'N' WHERE `menu`.`foodID` = '$id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header('Location:addMenu.php?deleted=1'); 
}

if ( isset($_POST['ida']) )
{
    $id = $_POST['ida'];
    $sql = "UPDATE `menu` SET `available` = 'Y' WHERE `menu`.`foodID` = '$id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header('Location:addMenu.php?available=1'); 
}

    mysqli_close($conn);
    ?>
<?php
ob_end_flush();
?>