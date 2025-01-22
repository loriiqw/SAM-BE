<?php
$conn = new mysqli("localhost", "root", "", "olympics");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = 4;

$sql = "SELECT name, description, image FROM athletes LIMIT $offset, $limit";
$result = $conn->query($sql);

$athletes = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $athletes[] = [
      'name' => htmlspecialchars($row['name']),
      'description' => htmlspecialchars($row['description']),
      'image' => htmlspecialchars($row['image']),
    ];
  }
}

$sqlCount = "SELECT COUNT(*) AS total FROM athletes";
$resultCount = $conn->query($sqlCount);
$row = $resultCount->fetch_assoc();
$totalAthletes = $row['total'];

$moreAthletes = ($offset + count($athletes) < $totalAthletes);

$conn->close();

echo json_encode([
  'athletes' => $athletes,
  'moreAthletes' => $moreAthletes,
]);
?>
