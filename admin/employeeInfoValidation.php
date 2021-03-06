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

        // CHECK FOR THE RECORD FROM TABLE, IF RECORD EXISTS, TELL THE USER THAT USERNAME EXISTS
        $query = "SELECT *  FROM `employee` WHERE `username` LIKE '$employeeName'";
        
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
        // IF NOTHING WAS FOUND, RETURN THAT NO BOOKING DATES WERE FOUND
        if ($count == 0)
        {
        header('Location:employeeInfo.php?noemployee=1'); 
        }
        else
        {
            echo "Employee information: <br>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "Employee ID: "       . $row["employeeID"]."<br>";
                echo "Employee username: " . $row["username"]."<br>";
                echo "Employee Name: "     . $row["employeeFirstName"]." ".$row["employeeSecondName"]."<br>";
                echo "Gender: "            . $row["gender"]."<br>";
                echo "Employee Email: "    . $row["email"]."<br>";
                echo "Employee level: "    . $row["level"]. "<br>";
                echo "Employee salary: "   . $row["salary"]. "<br>";
                echo "Employee status: "   . $row["status"]. "<br>";
              }
        }
}

    mysqli_close($conn);
    ?>
<?php
ob_end_flush();
?>