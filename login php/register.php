<?php
// Establish a MySQL database connection (replace with your credentials)


$conn = new mysqli("localhost", "root", "", "test");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process registration form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO users (name, email, password, address, phone) VALUES ('$name', '$email', '$password', '$address', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
