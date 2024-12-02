<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Problem_3</title>
</head>
<body>


<h1>Retrieve Password</h1>

    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Username: <input type="text" name="username" placeholder="Enter your username">
    <br><br>

    <input type="submit" name="Retrieve" value="Retrieve">
</form>

<?php
    include_once "MySQL_files/db_Methods.php";

    include_once "JWT.php";
    include_once "sendGrind.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        if(checkUserNameIsExists($username)){
            $randomKey = generateGWT($username);
            setPasswordResetKey($username,$randomKey);
            sendPasswordReset(getPasswordResetKey($username),$username);
            echo "<br>" . "Password reset email was sent";

           // header("Location: passwordResetPage.php?key=" . getPasswordResetKey($username));

        } else {
            echo "<br>";
            echo "Username doesn't exist";
        }


    }



?>
</body>