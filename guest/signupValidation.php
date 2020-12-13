<?php
ob_start();
require ('connect.php');
?>
<?php
// connecting to the database

if ( isset($_POST['firstname']) and isset($_POST['secondname']) and isset($_POST['age']) 
    and isset($_POST['gender']) and isset($_POST['emailID'])
    and isset($_POST['username']) and isset($_POST['pwd1']) and isset($_POST['pwd2']))
    {

	
    // Assigning POST values to variables.
    $fName = $_POST['firstname'];
    $sName = $_POST['secondname'];
    $ageUser = $_POST['age'];
    $genderUser = $_POST['gender'];
    $email = $_POST['emailID'];
    $uName = $_POST['username'];
    $password1 = $_POST['pwd1'];
    $password2 = $_POST['pwd2'];
    if ($password1!==$password2)
        {
            echo "Password already exists";
            header('Location:signup.php?notSamePassword=1');

        }
    else
    {

        // CHECK FOR THE RECORD FROM TABLE, IF RECORD EXISTS, TELL THE USER THAT USERNAME EXISTS
        $query = "SELECT * FROM `account` WHERE username='$uName'";
        
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $count = mysqli_num_rows($result);
        
        if ($count != 0)
        {
        echo "Username already exists";
        header('Location:signup.php?usernameExists=1');
        
        }
        
        else
        {
            // CHECKING IF BOTH THE PASSWORDS ARE THE SAME
            // ADDING INTO THE ACCOUNT

            $sql = "INSERT INTO `account` (`username`, `user`, `password`) 
            VALUES ('$uName', 'guest', '$password1')";
            $query1 = mysqli_query ($conn,$sql) or die(mysqli_error($conn));

            if ($query1 == 1) 
            {
            echo "New record created successfully";
            // ADDING INTO THE GUEST TABLE
            $sql2 = "INSERT INTO `guest` (`guestID`, `username`, `firstName`, `lastName`, `gender`, `age`, `email`) 
            VALUES (NULL, '$uName', '$fName', '$sName', '$genderUser', '$ageUser', '$email')";
            $query2 = mysqli_query  ($conn,$sql2) or die(mysqli_error($conn));
            // adding into rewards table
            $sql4 = $sql = "SELECT `guestID` FROM `guest` WHERE `username` LIKE '$uName'";
            $query4 = mysqli_query  ($conn,$sql4) or die(mysqli_error($conn));
            $row = $query4->fetch_assoc();
            $User = $row ["guestID"];
            $sql1 = "INSERT INTO `rewards` (`guestID`, `status`) VALUES ('$User', 'N')";
            $query3 = mysqli_query  ($conn,$sql1) or die(mysqli_error($conn));
            if ($query2 == 1) {
            echo "New record created successfully";
            // ONCE ACCOUNT IS CREATED SEND USER BACK TO LOGIN PAGE
            header('Location:index.php?successfulCreation=1');
            } 
            else {
                echo "ERROR OCCURED IN GUEST TABLE";
                header('Location:signup.php?errorOccuredguest=1');
            }

            } else 
            {
                echo "ERROR OCCURED IN ACCOUNT TABLE";
                header('Location:signup.php?errorOccuredaccount=1');
            }    
        }
    }
}

    mysqli_close($conn);
    ?>
<?php
ob_end_flush();
?>
