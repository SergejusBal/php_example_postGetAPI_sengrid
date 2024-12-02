<?php

function checkUserNameIsExists($username) {
    $mysqli = new mysqli("127.0.0.1:3306", "sergejus", "JavaVakariniai123", "sergejus");
    $stmt = $mysqli->prepare("SELECT * FROM user WHERE user_email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0){
        $stmt->close();
        $mysqli->close();
        return true;
    }
    else {
        $stmt->close();
        $mysqli->close();
        return false;
    }
}

function setPasswordResetKey($username, $randomKey) {
    $mysqli = new mysqli("127.0.0.1:3306", "sergejus", "JavaVakariniai123", "sergejus");
    $stmt = $mysqli->prepare("UPDATE user SET password_reset_key = ? WHERE user_email = ?");
    $stmt->bind_param("ss", $randomKey, $username);
    $stmt->execute();
    $stmt->close();
    $mysqli->close();
}

function getPasswordResetKey($username) {
    $mysqli = new mysqli("127.0.0.1:3306", "sergejus", "JavaVakariniai123", "sergejus");
    $stmt = $mysqli->prepare("SELECT * FROM user WHERE user_email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $stmt->close();
        $mysqli->close();
        return $row['password_reset_key'];
    }
   else {
       $stmt->close();
       $mysqli->close();
       return null;
   }
}

function resetPassword($username, $password) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $mysqli = new mysqli("127.0.0.1:3306", "sergejus", "JavaVakariniai123", "sergejus");
    $stmt = $mysqli->prepare("UPDATE user SET user_password = ? WHERE user_email = ?");
    $stmt->bind_param("ss", $hashedPassword, $username);
    if($stmt->execute()){
        $stmt->close();
        $mysqli->close();
        return true;
    }
   return false;

}

?>