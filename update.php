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



$sql = "UPDATE recipes SET id='$id',title='$title',ingredients='$ingredients',instructions='$instructions',created_at='$created_at' WHERE id='$id'";

if($conn->query($sql) === TRUE){
    echo "Recipe updated successfully";
}else{
    
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>
