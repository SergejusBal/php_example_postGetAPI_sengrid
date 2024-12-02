<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Problem_3</title>
</head>
<body>

<h1>Reset Password</h1>

<?php
include_once "JWT.php";

$key = htmlspecialchars($_GET['key']);
if(!checkIfValid($key)) {
    header("Location: retrievePasswords.php");
    exit();
}
?>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]. '?key=' . urlencode($key));?>" method="post">
    Password: <input type="password" name="newPassword" placeholder="Enter your new password">
    <br><br>
    <input type="submit" name="Reset" value="Reset">
</form>

<?php
include_once "MySQL_files/db_Methods.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST["newPassword"];
    $username = getUsernameFromToken($key);
    if (resetPassword($username, $newPassword)){
        setPasswordResetKey($username, null);
        header("Location: ../Problem_3.php");
    } else echo "Password reset failed!.";

    exit();
}

?>


</body>
