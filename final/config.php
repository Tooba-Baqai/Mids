<?php

$server = "localhost";
$user = "root";
$password = "";
$database_name = "new_pottery"; // Ensure this matches the database name

// Establish a connection to the database
$conn = mysqli_connect($server, $user, $password, $database_name);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Connection successful
// Uncomment this line if you want to check the connection
// echo "Connected successfully to the database.";
?>
