
<?php

include_once "JWT.php";
session_start();
function postAMovie($movie,$director,$year){
    $url = "https://apisergejus.tictactoe.pokerdash.fun/api/movies";

    $postData = [
        'title' => "$movie",
        'director' => "$director",
        'releaseYear' => "$year",
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: " .  $_SESSION['jwt'],
        "Content-Type: application/json",
    ]);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "cURL error: " . curl_error($ch);
    }

    curl_close($ch);

    $data = json_decode($response, true);

    print_r($data);

}

function getAllMovies(){
    $url = "https://apisergejus.tictactoe.pokerdash.fun/api/movies";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: " .  $_SESSION['jwt'],
        "Content-Type: application/json",
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL error: " . curl_error($ch);
    }

    curl_close($ch);
    $data = json_decode($response, true);
    print_r($data);

}

function searchForMovies($movie){
    $url = "https://apisergejus.tictactoe.pokerdash.fun/api/movies/search?title=$movie";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: " .  $_SESSION['jwt'],
        "Content-Type: application/json",
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL error: " . curl_error($ch);
    }

    curl_close($ch);
    $data = json_decode($response, true);
    print_r($data);

}

?>

