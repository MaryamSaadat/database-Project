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

$open2 = fopen('rooms.txt', 'r');
while (!feof($open2))
{
	$get = fgets($open2);
	$line = array_pad(explode(",", "$get "),2,null);
	//if(isset($line[1]))? $att0 = mysql_real_escape_string($line[1]) : $att0='null'
	if(isset($line)){
	list($price,$type,$available) = $line;}
	$sql3 = "INSERT INTO `roooms` (`roomID`,`price`,`type`,`available`) VALUES (NULL, '$price', '$type', '$available')";
	mysqli_query($conn,$sql3);
}
fclose($open2);



mysqli_close($conn);
?>
