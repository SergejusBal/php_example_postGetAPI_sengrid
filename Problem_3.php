<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Problem_3</title>
</head>
<body>

<h1>Log In</h1>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Username: <input type="text" name="username" placeholder="Enter your username">
    <br><br>
    Password: <input type="password" name="password" placeholder="Enter your password">
    <br><br>
    <input type="submit" name="Login" value="Login">
    <input type="submit" name="Register" value="Register">
</form>
    <br>
    <a href="https://pokerdash.fun/Sergejus/Problem_3_Files/retrievePasswords.php">Forgot password?</a>



<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = null;
$password = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    if(isset($_POST['Login'])){
        include 'Problem_3_Files/MySQL_files/db_Connect.php';
    }
    elseif (isset($_POST['Register'])) {
        if(checkIfPasswordIsValid($password) && checkIfUsernameIsValid($username)) include 'Problem_3_Files/MySQL_files/db_Register.php';
        else echo  "<br><br>" . "Invalid Username or Password";
    }
}

function checkIfUserNameIsValid($username){
    $regex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    return preg_match($regex, $username) === 1;
}
function  checkIfPasswordIsValid($password){
    return true;
}

?>
</body>