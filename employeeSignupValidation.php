<?php
// connecting to the database
$conn = mysqli_connect('localhost', 'root', 'root');//<---- ALSO CHANGE PASSWORD TO THE PASSWORD YOU HAVE SET FOR PHPMYADMIN IF IT IS NOT ROOT
if (!$conn){
    die("Database conn Failed" . mysqli_error($conn));
}
$select_db = mysqli_select_db($conn, 'HotelManagement');//<---CHANGE TO THE NAME OF YOUR MANAGEMENT DATABASE
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));
}

if ( isset($_POST['firstname']) and isset($_POST['secondname']) and isset($_POST['age']) 
    and isset($_POST['gender']) and isset($_POST['emailID'])
    and isset($_POST['username']) and isset($_POST['pwd1']) and isset($_POST['pwd2'])
    and isset($_POST['position']) and isset($_POST['salary']))
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
    $sal = $_POST['salary'];
    $pos = $_POST['position'];

    //IF BOTH THE PASSWORDS ARE NOT THE SAME, RETURN AN ERROR
    if ($password1!==$password2)
        {
            echo "Password already exists";
            header('Location:employeeSignup.php?notSamePassword=1');

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
        header('Location:employeeSignup.php?usernameExists=1');
        
        }
        
        else
        {
            // ADDING INTO THE ACCOUNT

            $sql = "INSERT INTO `account` (`username`, `user`, `password`) 
            VALUES ('$uName', 'employee', '$password1')";
            $query1 = mysqli_query ($conn,$sql) or die(mysqli_error($conn));


            if ($query1 == 1) 
            {
                echo "New record created successfully";
                // ADDING INTO THE GUEST TABLE
                $sql2 = "INSERT INTO `employee` (`employeeID`, `username`, `employeeFirstName`, `employeeSecondName`, `gender`, `age`, `email`, `level`, `salary`,`status`)
                 VALUES (NULL,'$uName', '$fName', '$sName', '$genderUser', '$ageUser', '$email', '$pos', '$sal','currently hired')";
                
                $query2 = mysqli_query  ($conn,$sql2) or die(mysqli_error($conn));
                if ($query2 == 1) {
                echo "New record created successfully";
                echo "yoloooo";
                // ONCE ACCOUNT IS CREATED SEND USER BACK TO LOGIN PAGE
                header('Location:employeeSignup.php?successfulCreation=1');
            } 
            else 
            {
                echo "ERROR OCCURED IN GUEST TABLE";
                header('Location:employeeSignup.php?errorOccuredguest=1');
            }

            } 



            else 
            {
                echo "ERROR OCCURED IN ACCOUNT TABLE";
                header('Location:employeeSignup.php?errorOccuredaccount=1');
            } 
            
        }
    }
}

    mysqli_close($conn);
    ?>

