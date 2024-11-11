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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Recipes</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-image: url('Images/img3.jpg'); background-size: cover; background-position: center; background-attachment: fixed; margin: 0;">
    <div class="container">
        <h1>All Recipes</h1>

        <!-- Display Recipes in a Grid View -->
        <div class="recipe-grid">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="recipe-card">
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p><strong>Ingredients:</strong> <?php echo htmlspecialchars($row['ingredients']); ?></p>
                        <p><strong>Instructions:</strong> <?php echo htmlspecialchars($row['instructions']); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No recipes available.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php $conn->close(); ?>

    <?php
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

</body>
</html>
