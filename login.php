<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipe_app";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username']; // Store the username in session
            header("Location: index.html"); // Redirect to the homepage or dashboard
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "No user found with that username.";
    }

    $conn->close();
}
?>
