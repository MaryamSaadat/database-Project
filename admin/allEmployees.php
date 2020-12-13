<?php
ob_start();
require ('connect.php');
?>
<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./style.css">
	<title>EMPLOYEE INFO</title> 

</head>
<?php
$query = "SELECT * FROM `employee` WHERE employee.salary IN \n"

    . "(SELECT MAX(salary) AS salary FROM employee WHERE employee.status = \"currently hired\" ORDER BY employee.level)";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
        // IF NOTHING WAS FOUND, RETURN THAT NO BOOKING DATES WERE FOUND
        if ($count == 0)
        {
         echo  "<br>". "<br>". "<br>";
        }
        else
        {
            echo "EMPLOYEE WITH HIGHEST SALARY IN EACH LEVEL: ". "<br>";
            print "
            <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
             <tr>
             <td width=100>Employee name:</td> 
             <td width=100>Employee ID:</td> 
            <td width=100>username:</td> 
            <td width=100>gender:</td> 
            <td width=100>age:</td>
            <td width=100>email:</td> 
            <td width=100>level:</td> 
            <td width=100>salary:</td> 
            </tr>"; 
           while($row = mysqli_fetch_array($result))
           { 
          print "<tr>"; 
          print "<td>" . $row['employeeFirstName'] . " ". $row['employeeSecondName'] ."</td>"; 
          print "<td>" . $row['employeeID'] . "</td>"; 
          print "<td>" . $row['username'] . "</td>"; 
          print "<td>" . $row['gender'] . "</td>";
          print "<td>" . $row['age'] . "</td>";
          print "<td>" . $row['email'] . "</td>";
          print "<td>" . $row['level'] . "</td>";
          print "<td>" . $row['salary'] . "</td>";
          print "</tr>"; 
          } 
          print "</table>"; 
          
            }



            $query2 = "SELECT * FROM employee WHERE employee.status = \"currently hired\"ORDER BY `level` ASC";
            $result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
            $count2 = mysqli_num_rows($result2);
                    // IF NOTHING WAS FOUND, RETURN THAT NO BOOKING DATES WERE FOUND
                    if ($count2 == 0)
                    {
                     echo "NO EMPLOYEES CURRENTLY HIRED";
                    }
                    else
                    {
                        echo  "<br>". "<br>". "<br>";
                        echo "EMPLOYEES CURRENTLY HIRED: ". "<br>";
                        print "
                        <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
                         <tr>
                         <td width=100>Employee name:</td> 
                         <td width=100>Employee ID:</td> 
                        <td width=100>username:</td> 
                        <td width=100>gender:</td> 
                        <td width=100>age:</td>
                        <td width=100>email:</td> 
                        <td width=100>level:</td> 
                        <td width=100>salary:</td> 
                        </tr>"; 
                       while($row = mysqli_fetch_array($result2))
                       { 
                      print "<tr>"; 
                      print "<td>" . $row['employeeFirstName'] . " ". $row['employeeSecondName'] ."</td>"; 
                      print "<td>" . $row['employeeID'] . "</td>"; 
                      print "<td>" . $row['username'] . "</td>"; 
                      print "<td>" . $row['gender'] . "</td>";
                      print "<td>" . $row['age'] . "</td>";
                      print "<td>" . $row['email'] . "</td>";
                      print "<td>" . $row['level'] . "</td>";
                      print "<td>" . $row['salary'] . "</td>";
                      print "</tr>"; 
                      } 
                      print "</table>"; 
                      
                        }
                
            $query3 = "SELECT *\n"

    . "FROM `employee`\n"

    . "WHERE employee.status = \"fired\" \n"

    . "ORDER BY employee.level ASC";
            $result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));
            $count3 = mysqli_num_rows($result3);
                    // IF NOTHING WAS FOUND, RETURN THAT NO BOOKING DATES WERE FOUND
                    if ($count3 == 0)
                    {
                     echo "NO EMPLOYEES CURRENTLY FIRED";
                    }
                    else
                    {
                        echo  "<br>". "<br>". "<br>";
                        echo "FIRED EMPLOYEES: ". "<br>";
                        print "
                        <table border=\"5\" cellpadding=\"5\" cellspacing=\"0\" style=\"border-  collapse: collapse\" bordercolor=\"#808080\" width=\"100&#37;\"    id=\"AutoNumber2\" bgcolor=\"#C0C0C0\">
                         <tr>
                         <td width=100>Employee name:</td> 
                         <td width=100>Employee ID:</td> 
                        <td width=100>username:</td> 
                        <td width=100>gender:</td> 
                        <td width=100>age:</td>
                        <td width=100>email:</td> 
                        <td width=100>level:</td> 
                        <td width=100>salary:</td> 
                        </tr>"; 
                       while($row = mysqli_fetch_array($result3))
                       { 
                      print "<tr>"; 
                      print "<td>" . $row['employeeFirstName'] . " ". $row['employeeSecondName'] ."</td>"; 
                      print "<td>" . $row['employeeID'] . "</td>"; 
                      print "<td>" . $row['username'] . "</td>"; 
                      print "<td>" . $row['gender'] . "</td>";
                      print "<td>" . $row['age'] . "</td>";
                      print "<td>" . $row['email'] . "</td>";
                      print "<td>" . $row['level'] . "</td>";
                      print "<td>" . $row['salary'] . "</td>";
                      print "</tr>"; 
                      } 
                      print "</table>"; 
                      
                        }
            

    mysqli_close($conn);
    ?>
<?php
ob_end_flush();
?>