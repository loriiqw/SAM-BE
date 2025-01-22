<?php
$servername = "localhost";  // Database server
$username = "root";         // Database username
$password = "";             // Database password (default is empty for local environments)
$dbname = "olympics";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
