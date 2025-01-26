<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "olympics";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = intval($_POST['user_id']); // Assuming you pass the user's ID
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $status = 'pending'; // Default status

    // Handle file upload
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageDir = 'uploads/';
        $imagePath = $imageDir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            $imagePath = $conn->real_escape_string($imagePath);
        } else {
            echo "Failed to upload image.";
            $imagePath = null;
        }
    }

    // Insert story into the database
    $sql = "INSERT INTO stories (user_id, title, content, image, status) VALUES ('$user_id', '$title', '$content', '$imagePath', '$status')";
    if ($conn->query($sql) === TRUE) {
        echo "Story submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
