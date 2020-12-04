<?php

$conn = mysqli_connect('localhost', 'root', '');
if (!$conn)
{
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}

$open = fopen('menu.txt','r');


while (!feof($open)) 
{
	$getTextLine = fgets($open);
	$explodeLine = explode(",",$getTextLine);
	
    list($food,$price,$status) = $explodeLine;
    
	$sql2 = "INSERT INTO `menu` (`foodID`,`foodItem`, `price`,`available`) VALUES (NULL,'$food', '$price', '$status')";
	//$qry = "insert into empoyee_details (name, city,postcode,job_title) values('".$name."','".$city."','".$postcode."','".$job_title."')";
	mysqli_query($conn,$sql2);
}

fclose($open);
mysqli_close($conn);
?>
