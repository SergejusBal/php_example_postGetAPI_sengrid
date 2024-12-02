<?php

global $username;
global $password;

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$mysqli = new mysqli("127.0.0.1:3306", "sergejus", "JavaVakariniai123", "sergejus");
$stmt = $mysqli->prepare("INSERT INTO user (user_email,user_password) VALUES  (?,?)");
$stmt->bind_param("ss", $username,$hashedPassword);

    echo '<br>';
    if ($stmt->execute()){
        echo "<br>" . "User was registered successfully!";
    }
    else{
        if ($stmt->errno === 1062) echo "<br>" . "Error: User already exists.";
        else echo "<br>" . "Failed to Register user!";
    }

$stmt->close();
$mysqli->close();

?>

