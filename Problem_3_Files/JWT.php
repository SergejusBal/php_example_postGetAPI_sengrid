
<?php

require '/var/www/pokerdash.fun/html/Sergejus/vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secretKey = "fj39sd89fjs92+kljdsdf9340jfsd9f0sd8fsd9fsd==";
function generateGWT($username)
{
    global $secretKey;

    $payload = [
        'iat' => time(),                   // Issued at: current time
        'exp' => time() + 3600,            // Expiration time: 1 hour from now
        'username' => $username,
    ];
    $jwt = JWT::encode($payload, $secretKey, 'HS256');
    return $jwt;
    }
function getUsernameFromToken($jwt){
    global $secretKey;
    try {
        $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));
        $decodedArray = (array) $decoded;
        return isset($decodedArray['username']) ? $decodedArray['username'] : null;
    } catch (Exception $e) {
        return null;
    }
}

function checkIfValid($jwt)
{
    global $secretKey;
    try {
        JWT::decode($jwt, new Key($secretKey, 'HS256'));
        return true;
    } catch (Exception $e) {

        return false;

    }
}
?>