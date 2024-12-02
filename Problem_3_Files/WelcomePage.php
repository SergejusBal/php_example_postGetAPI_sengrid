<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Problem 3</title>
</head>
<body>
<h1>Welcome to Problem 3 Open Page</h1>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    Movie: <input type="text" name="movie_name" placeholder="Enter your movie name">
    <br><br>
    Director: <input type="text" name="director" placeholder="Enter movie director">
    <br><br>
    Release Year: <input type="date" name="date" placeholder="Enter date">
    <br><br>
    <input type="submit" name="Submit" value="Submit">
    <br><br>
    Search for movie: <input type="text" name="searched_movie_name" placeholder="Enter movie name">
    <br><br>
    <input type="submit" name="Search" value="Search">

</form>


<?php
include_once 'postGetMethods.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['Submit'])){
        $movie_name = $_POST["movie_name"];
        $director = $_POST["director"];
        $date = $_POST["date"];
        postAMovie($movie_name, $director, $date);
    }
    if(isset($_POST['Search'])){
        $searched_movie_name = $_POST["searched_movie_name"];
        if($searched_movie_name != ""){
            searchForMovies($searched_movie_name);
        }else{
            getAllMovies();
        }
    }

}


?>



</body>
