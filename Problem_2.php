<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Problem_2</title>
</head>

<h1>Random generator</h1>
<br>
<form action="Problem_2.php" method="get">
    <label for="amount">Enter the size of the random array:</label>
    <br><br>
    <input type="number" id="amount" name="amount" placeholder="Enter number">
    <br><br>
    <button type="submit">Submit</button>
</form>


<?php
if (isset($_GET['amount'])) {
    $amount = htmlspecialchars($_GET['amount']);

    $randomArray = generateRandomArray($amount);
    echo "<br>";
    echo "Array max value: " . findMax($randomArray) . "<br>";
    echo "<br>";
    echo "Array min value: " . findMin($randomArray) . "<br>";
    echo "<br>";
    echo "Array average value:" . findAverage($randomArray) . "<br>";
    echo "<br>";
    echo var_dump($randomArray);

}

function generateRandomArray($amount)
{
    $array = [];
    for ($i = 0; $i < $amount; $i++) {
        $array[] = rand(0, 1000);
    }
    return $array;
}

function findMin($array)
{
    $min = $array[0];
    foreach ($array as $value) {
        if($value < $min) {
            $min = $value;
        }
   };
    return $min;
}

function findMax($array)
{
    $max = $array[0];
    foreach ($array as $value) {
        if($value > $max) {
            $max = $value;
        }
    }
    return $max;
}
function findAverage($array)
{
    $sum = 0;
    foreach ($array as $value) {
        $sum += $value;
    }
    return $sum / count($array);
}

?>