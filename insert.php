<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipe_app";

// Get data from POST request
$id  = $_POST['id'];
$title = $_POST['title'];
$ingredients = $_POST['ingredients'];
$instructions = $_POST['instructions'];
// Set created_at to the current date and time
$created_at = date('Y-m-d H:i:s');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$sql = "INSERT INTO recipes (id, title, ingredients, instructions, created_at) VALUES ('$id', '$title', '$ingredients', '$instructions', '$created_at')";

if ($conn->query($sql) === TRUE) {
    echo "New recipe created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
