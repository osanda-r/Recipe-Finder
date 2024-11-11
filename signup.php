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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate the input to make sure no field is empty
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill all the fields!";
        exit();
    }

    // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        echo "This email is already registered. Please use a different email.";
    } else {
        // Hash the password before saving
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['username'] = $username; // Store the username in session
            echo "Registration successful!";
            header("Location: login.html"); // Redirect to login page after registration
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
