<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipe_app";
$id = $_POST['id'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}



$sql = "DELETE FROM recipes WHERE id='$id'";

if($conn->query($sql) === TRUE){
    echo "The recipe deleted successfully";
}else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}




$conn->close();


?>
