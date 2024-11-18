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
    <style>
       * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            text-align: center;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .updt {
            padding: 10px;
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .updt:hover {
            background-color: #45a049;
        }

        .cancel {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cancel a {
            color: white;
            text-decoration: none;
        }

        .cancel:hover {
            background-color: #c82333;
        }
    </style>
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