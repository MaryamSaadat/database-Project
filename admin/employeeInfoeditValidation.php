<?php
ob_start();
require ('connect.php');
?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./style.css">

</head>
<?php
if ( isset($_POST['type']) and isset($_POST['username']) and isset($_POST['value']) )
{
    // Assigning POST values to variables of start date and finish date. 
    $userID = $_POST['username'];
    $type = $_POST['type'];
    $valueToChange = $_POST['value'];


    $query1 = "SELECT `username` FROM `employee`  WHERE username LIKE '$userID'";
    $result1 = mysqli_query($conn, $query1) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result1);
    if ($count == 0)
        {
            header('Location:employeeInfoedit.php?noUser=1');  
        }

        // CHECK FOR THE RECORD FROM TABLE, IF RECORD EXISTS, TELL THE USER THAT USERNAME EXISTS
    else
    {
        $query = "UPDATE `employee` SET `$type`= '$valueToChange'  WHERE username LIKE '$userID'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        header('Location:employeeInfoedit.php?altered=1');   
    }   
}

    mysqli_close($conn);
    ?>
<?php
ob_end_flush();
?>
