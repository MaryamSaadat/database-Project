<?php
ob_start();
session_start();
require('connect.php');

$user_ =  $_SESSION['user'];
/*
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
{
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');
if (!$select_db)
{
    die("Database Selection Failed" . mysqli_error($conn));
}
*/

//POPULATE ACCOUNTS
$open = fopen('accounts_info.txt','r');
while (!feof($open)) 
{
	$getTextLine = fgets($open);
    $explodeLine = explode(",",$getTextLine);
    if ( count($explodeLine) != 3)   {
        continue;
    }
    $un = $explodeLine[0];
    $u  = $explodeLine[1];
    $p  = $explodeLine[2];
	
    //list($un,$u,$p) = $explodeLine;

    
	$sql2 = "INSERT INTO `account` (`username`,`user`, `password`) VALUES ('$un', '$u', '$p')";
	//$qry = "insert into empoyee_details (name, city,postcode,job_title) values('".$name."','".$city."','".$postcode."','".$job_title."')";
	mysqli_query($conn,$sql2);
}
fclose($open);
echo "ACCOUNTS TABLE SUCCESSFULLY POPULATED";

//POPULATE GUEST TABLE
$open_ = fopen('guest_info.txt','r');
while (!feof($open_)) 
{
	$getTextLine = fgets($open_);
    $explodeLine = explode(",",$getTextLine);
    if (count($explodeLine) != 6)   {
        continue;
    }
    $un = $explodeLine[0];
    $f  = $explodeLine[1];
    $l  = $explodeLine[2];
    $g  = $explodeLine[3];
    $a  = $explodeLine[4];
    $em  = $explodeLine[5];
	
    //list($un,$u,$p) = $explodeLine;

    
	$sql2 = "INSERT INTO `guest` (`guestID`,`username`,`firstName`, `lastName`, `gender`, `age`, `email`) VALUES (NULL,'$un', '$f', '$l','$g','$a','$em')";
	//$qry = "insert into empoyee_details (name, city,postcode,job_title) values('".$name."','".$city."','".$postcode."','".$job_title."')";
	mysqli_query($conn,$sql2);
}
fclose($open_);
echo "GUEST TABLE SUCCESSFULLY POPULATED";

//POPULATE ADMIN TABLE
$open_1 = fopen('admin_info.txt','r');
while (!feof($open_1)) 
{
	$getTextLine = fgets($open_1);
    $explodeLine = explode(",",$getTextLine);
    if (count($explodeLine) != 6)   {
        continue;
    }
    $un = $explodeLine[0];
    $f  = $explodeLine[1];
    $l  = $explodeLine[2];
    $g  = $explodeLine[3];
    $a  = $explodeLine[4];
    $em  = $explodeLine[5];
	$sql2 = "INSERT INTO `admin` (`adminID`,`username`,`adminFirstName`, `adminLastName`, `gender`, `age`, `email`) VALUES (NULL,'$un', '$f', '$l','$g','$a','$em')";
	//$qry = "insert into empoyee_details (name, city,postcode,job_title) values('".$name."','".$city."','".$postcode."','".$job_title."')";
	mysqli_query($conn,$sql2);
}
fclose($open_1);
echo "ADMIN TABLE SUCCESSFULLY POPULATED";


//POPULATE EMPLOYEE TABLE
$open_2 = fopen('employee_info.txt','r');
while (!feof($open_2)) 
{
	$getTextLine = fgets($open_2);
    $explodeLine = explode(",",$getTextLine);
    if (count($explodeLine) != 9)  {
        continue;
    }
    
    $un = $explodeLine[0];
    $f  = $explodeLine[1];
    $l  = $explodeLine[2];
    $g  = $explodeLine[3];
    $a  = $explodeLine[4];
    $em  = $explodeLine[5];
    $level  = $explodeLine[6];
    $sal  = $explodeLine[7];
    $stat = $explodeLine[8];
	$sql2 = "INSERT INTO `employee` (`employeeID`,`username`,`employeeFirstName`, `employeeSecondName`, `gender`, `age`, `email`, `level`,`salary`, `status`) VALUES (NULL,'$un', '$f', '$l','$g','$a','$em','$level','$sal','$stat')";
	//$qry = "insert into empoyee_details (name, city,postcode,job_title) values('".$name."','".$city."','".$postcode."','".$job_title."')";
	mysqli_query($conn,$sql2);
}
fclose($open_2);
echo "EMPLOYEE TABLE SUCCESSFULLY POPULATED";



//POPULATE MENU TABLE
$open_4 = fopen('menu.txt','r');
while (!feof($open_4)) 
{
	$getTextLine = fgets($open_4);
	$explodeLine = explode(",",$getTextLine);
	
    list($food,$price,$status) = $explodeLine;
    
	$sql2 = "INSERT INTO `menu` (`foodID`,`foodItem`, `price`,`available`) VALUES (NULL,'$food', '$price', '$status')";
	//$qry = "insert into empoyee_details (name, city,postcode,job_title) values('".$name."','".$city."','".$postcode."','".$job_title."')";
	mysqli_query($conn,$sql2);
}
fclose($open_4);
echo "FOOD MENU SUCCESSFULLY POPULATED";


$open_5 = fopen('rooms.txt', 'r');
while (!feof($open_5))
{
	$get = fgets($open_5);
    $explodeLine = explode(",",$get);
    if (count($explodeLine) != 3)  {
        continue;
    }
    
    $price = $explodeLine[0];
    $type  = $explodeLine[1];
    $status  = $explodeLine[2];
    
    $sql3 = "INSERT INTO `rooms` (`roomID`,`price`,`type`,`available`) VALUES (NULL, '$price', '$type', '$status')";

	mysqli_query($conn,$sql3);
    

}
fclose($open_5);
echo "ROOM TABLE SUCCESSFULLY POPULATED";




mysqli_close($conn);
ob_end_flush();
?>