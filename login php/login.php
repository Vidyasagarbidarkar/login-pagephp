<?php
// Establish a MySQL database connection (replace with your credentials)


$conn = new mysqli('localhost', 'root', '', 'test');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginEmail = $_POST["loginEmail"];
    $loginPassword = $_POST["loginPassword"];

    $sql = "SELECT * FROM users WHERE email='$loginEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($loginPassword, $row["password"])) {
            echo "Login successful!";
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?>
