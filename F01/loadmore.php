<?php
    $conn = new mysqli("localhost", "root", "", "olympics");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, description, image FROM athletes LIMIT 4, 8"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $imagePath = htmlspecialchars($row["image"]);  
            echo "<div class='col'>";
            echo "<div class='card h-100'>";
            echo "<img src='/SAM-BE/F01/" . $imagePath . "' class='card-img-top' alt='Athlete Image'>";
            echo "<div class='card-body text-center'>";
            echo "<h5 class='card-title text-primary'>" . htmlspecialchars($row["name"]) . "</h5>"; 
            echo "<p class='card-text text-muted'>" . htmlspecialchars($row["description"]) . "</p>"; 
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p class='text-center'>No more athletes found</p>"; 
    }

    $conn->close();
?>
