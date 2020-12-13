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
            $sql = "DELETE FROM `account` WHERE `username` LIKE '$employeeName'";
            $result2 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            header('Location:employeeDelete.php?deletionSuccessful=1'); 
        }
}

    mysqli_close($conn);
    ?>
<?php
ob_end_flush();
?>
