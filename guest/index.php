<?php
ob_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Hotel Transylvania</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   

    <link rel="stylesheet" href="./style.css">

</head>


<body>
    <h1>HOTEL TRANSYLVANIA</h1>

    <?php
        if (isset( $_GET['passwordFailure']) ) {
            echo "<p>Enter the correct credentials.</p>";
        }
        if (isset( $_GET['successfulCreation']) ) {
            echo "<p>Your account has been successfully created. Please login to access.</p>";
        }
    ?>

    <form id="form1" name="form1" method="post" action="validate.php">
        <table align="center">
            <tr>
            <td><label for="username">Username:</label></td>
            <td><input type="text" name="user_name" id="username" /></td>
            </tr>

            <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" name="pass_word" id="password" /></td>
            </tr>

            <tr>
            <td colspan="2"><input type="submit" name="login" id="login" value="Login" /></td>
            </tr>
        </table>
        
        <br>
        <p >   
            Don't have an account? Sign up <a href ="signup.php">here.</a> 
        </p>

    </form>

</body>

</html>
<?php
ob_end_flush();
?>