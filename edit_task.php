<?php
include 'db.php';

// Check if ID is provided
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Select task query
  $sql = "SELECT * FROM tasks WHERE id = '$id'";
  $result = $conn->query($sql);

  // Check if task exists
  if ($result->num_rows > 0) {
    $task = $result->fetch_assoc();
  } else {
    echo "Task not found";
    exit;
  }
}

// Update task
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $task_name = $_POST['task_name'];
  $sql = "UPDATE tasks SET taskname = '$task_name' WHERE id = '$id'";

  // Execute query
  if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit();
  } else {
    echo "Error updating task: " . $conn->error;
  }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
  </head>
  <body>
    <div>
<h2>Edit Task</h2>
<form method="POST">
  <input type="text" size="10"name="task_name" value="<?php echo $task['taskname']; ?>" required>
  <button class="updt" type="submit">Update Task</button>
  <br>
  <button class="cancel"type="submit"><a href="index.php">Cancel</a></button>
</form>
</div>
</body>
</html>