<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Problem_1</title>
</head>
<body>
<h1>Calculator</h1>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Number one: <input type="text" name="n1" placeholder="Enter number">
    <br><br>
    Number two: <input type="text" name="n2" placeholder="Enter number">
    <br><br>
    Operation:
    <input type="radio" name="operation" value="+">+
    <input type="radio" name="operation" value="-">-
    <input type="radio" name="operation" value="/">/
    <input type="radio" name="operation" value="*">*
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php

$n1 = $n2 = $operation = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    $operation = $_POST["operation"];
}
echo '<br><br>';

echo 'Result: ';
if (is_numeric($n1) && is_numeric($n2) && $operation != null) {
    switch ($operation) {
        case "+":
            echo $n1 + $n2;
            break;
        case "-":
            echo $n1 - $n2;
            break;
        case "/":
            echo $n1 / $n2;
            break;
        case "*":
            echo $n1 * $n2;
            break;
    }
}
else{
    echo "Invalid data!";
}


?>
</body>