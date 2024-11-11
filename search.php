<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipe_app";
$id  = $_POST['id'];
$title = $_POST['title'];
$ingredients = $_POST['ingredients'];
$instructions = $_POST['instructions'];
$created_at = $_POST['created_at'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}


echo "Search successfully";
$sql = "SELECT * FROM recipes WHERE id='$id'";
$result = $conn->query($sql);

if($result->num_rows > 0){
    echo "The record already exists";
    while($row = $result->fetch_assoc()){
        echo "Recipe ID: " . $row["id"] . "<br>";
        echo "Recipe title: " . $row["title"] . "<br>";
        echo "Ingredients: " . $row["ingredients"] . "<br>";
        echo "Instructions: " . $row["instructions"] . "<br>";
        echo "Time: " . $row["created_at"] . "<br>";
        
    }
} else {
    echo "0 results";
}

$conn->close();

?>
