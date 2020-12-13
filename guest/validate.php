<?php
ob_start();
session_start();
require ('connect.php');
?>
<?php
//$username = $_POST['user_name'];
//$password = $_POST['pass_word'];

if (isset($_POST['user_name']) and isset($_POST['pass_word'])){
	
    // Assigning POST values to variables.
    $username = $_POST['user_name'];
    $password = $_POST['pass_word'];
    $_SESSION['user'] = $username;
    // CHECK FOR THE RECORD FROM TABLE
    $query = "SELECT * FROM `account` WHERE username='$username' and password='$password'";
     
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    
    if ($count == 0)
    {
    echo "INVALID CREDENTIALS";
    //header('Location:login.php');
    header('Location:login.php?passwordFailure=1');
    
    
    }
    
    else
    {
        $row = $result->fetch_assoc();
        $typeOfUser = $row ["user"];
        if ($typeOfUser == 'guest')
        {
            header('Location:guest.php');
        }
        if ($typeOfUser == 'employee')
        {
            header('Location:employee/EmployeePage.php');
        }
        if ($typeOfUser == 'admin')
        {
            header('Location:admin/adminPage.html');
        }
    
    }

    }

    mysqli_close($conn);
    ?>
<?php
ob_end_flush();
?>