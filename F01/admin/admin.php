<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "olympics";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['table'])) {
    $action = $_POST['action'];
    $table = $_POST['table'];
    $id = intval($_POST['id']);
    
    switch ($table) {
        case 'athletes':
            handleAthletes($conn, $action, $id);
            break;
        case 'stories':
            handleStories($conn, $action, $id);
            break;
        case 'users':
            handleUsers($conn, $action, $id);
            break;
    }

    echo $stmt->affected_rows > 0 ? "<p>Action completed successfully!</p>" : "<p>Error: " . $conn->error . "</p>";
}

function handleAthletes($conn, $action, $id) {
    if ($action === 'delete') {
        $stmt = $conn->prepare("DELETE FROM athletes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } elseif ($action === 'update') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $stmt = $conn->prepare("UPDATE athletes SET name = ?, description = ?, image = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $description, $image, $id);
        $stmt->execute();
    }
}

function handleStories($conn, $action, $id) {
    if ($action === 'approve' || $action === 'reject') {
        $status = $action === 'approve' ? 'approved' : 'rejected';
        $stmt = $conn->prepare("UPDATE stories SET status = ? WHERE story_id = ?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
    } elseif ($action === 'delete') {
        $stmt = $conn->prepare("DELETE FROM stories WHERE story_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}

function handleUsers($conn, $action, $id) {
    if ($action === 'delete') {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } elseif ($action === 'update') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $username, $email, $id);
        $stmt->execute();
    }
}

$sqlAthletes = "SELECT * FROM athletes";
$resultAthletes = $conn->query($sqlAthletes);

$sqlStories = "SELECT * FROM stories";
$resultStories = $conn->query($sqlStories);

$sqlUsers = "SELECT * FROM users";
$resultUsers = $conn->query($sqlUsers);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f7fc; margin: 0; padding: 0; }
        h1 { text-align: center; margin-top: 20px; color: #333; }
        h2 { color: #007bff; padding-left: 15px; }

        table { width: 90%; margin: 20px auto; border-collapse: collapse; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 10px; text-align: center; }
        th { background-color: #007bff; color: white; }
        td img { max-height: 50px; border-radius: 5px; }
        td button { padding: 5px 10px; background-color: #007bff; color: white; border: none; cursor: pointer; border-radius: 3px; }
        td button:hover { background-color: #0056b3; }

        #athleteForm { display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); }
        input[type="text"], textarea { width: 100%; padding: 10px; margin: 10px 0; border-radius: 3px; border: 1px solid #ccc; }
        button[type="submit"] { background-color: #28a745; color: white; border: none; cursor: pointer; padding: 10px 20px; border-radius: 5px; }
        button[type="submit"]:hover { background-color: #218838; }
    </style>
</head>
<body>
<h1>Admin Dashboard</h1>

<h2>Athletes</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $resultAthletes->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><img src="<?php echo $row['image']; ?>" alt="Image"></td>
        <td>
            <button onclick="openAthleteForm(<?php echo $row['id']; ?>, '<?php echo $row['name']; ?>', '<?php echo $row['description']; ?>', '<?php echo $row['image']; ?>')">Update</button>
            <form action="admin.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="table" value="athletes">
                <button type="submit" name="action" value="delete">Delete</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<h2>Stories</h2>
<table>
    <tr>
        <th>Story ID</th>
        <th>User ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $resultStories->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['story_id']; ?></td>
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['content']; ?></td>
        <td><img src="<?php echo $row['image']; ?>" width="100"></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <form action="admin.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['story_id']; ?>">
                <input type="hidden" name="table" value="stories">
                <button type="submit" name="action" value="approve">Approve</button>
            </form>
            <form action="admin.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['story_id']; ?>">
                <input type="hidden" name="table" value="stories">
                <button type="submit" name="action" value="reject">Reject</button>
            </form>
            <form action="admin.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['story_id']; ?>">
                <input type="hidden" name="table" value="stories">
                <button type="submit" name="action" value="delete">Delete</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<h2>Users</h2>
<table>
    <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $resultUsers->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
            <form action="admin.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="table" value="users">
                <button type="submit" name="action" value="delete">Delete</button>
            </form>
            <form action="admin.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="table" value="users">
                <button type="submit" name="action" value="update">Update</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

<div id="athleteForm">
    <h2>Edit Athlete</h2>
    <form action="admin.php" method="POST">
        <input type="hidden" name="id" id="athleteId">
        <input type="hidden" name="table" value="athletes">
        <label>Name: <input type="text" name="name" id="athleteName"></label>
        <label>Description: <textarea name="description" id="athleteDescription"></textarea></label>
        <label>Image URL: <input type="text" name="image" id="athleteImage"></label>
        <button type="submit" name="action" value="update">Save Changes</button>
        <button type="button" onclick="closeAthleteForm()">Close</button>
    </form>
</div>

<script>
    function openAthleteForm(id, name, description, image) {
        document.getElementById('athleteId').value = id;
        document.getElementById('athleteName').value = name;
        document.getElementById('athleteDescription').value = description;
        document.getElementById('athleteImage').value = image;
        document.getElementById('athleteForm').style.display = 'block';
    }

    function closeAthleteForm() {
        document.getElementById('athleteForm').style.display = 'none';
    }
</script>
</body>
</html>
