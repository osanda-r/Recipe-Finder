<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipe_app";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all recipes
$sql = "SELECT * FROM recipes";
$result = $conn->query($sql);
?>



<?php
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-image: url('Images/img2.jpg'); background-size: cover; background-position: center; background-attachment: fixed; margin: 0;">

    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>
        
        <p>Welcome to the Recipe Finder. Use the links below to manage recipes:</p>
        <br>
        
        <div class="dashboard-links">
            <a href="insert.html" class="dashboard-button">Add New Recipe</a>
            <a href="delete.html" class="dashboard-button">Delete Recipe</a>
            <a href="update.html" class="dashboard-button">Update Recipe</a>
            <a href="search.html" class="dashboard-button">Search Recipe</a>
        </div>
    </div>

</body>
</html>
