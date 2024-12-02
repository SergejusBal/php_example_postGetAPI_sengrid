<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

global $username;
global $password;
include_once 'Problem_3_Files/JWT.php';


$mysqli = new mysqli("127.0.0.1:3306", "sergejus", "JavaVakariniai123", "sergejus");

$stmt = $mysqli->prepare("SELECT * FROM user WHERE user_email = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if(password_verify($password, $row['user_password'])){
        session_start();
        generateGWT($username);
        $_SESSION['jwt'] = generateGWT($username);
        header("Location: ../Sergejus/Problem_3_Files/WelcomePage.php");
        exit();
    }
    else echo "<br>" ."Invalid Username or Password";
} else {
    echo '<p>No users found.</p>';
}
$stmt->close();
$mysqli->close();
?>
