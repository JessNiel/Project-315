<?php
include 'db.php';  // Include the database connection
$sql = "SELECT * FROM tasks ORDER BY created_at DESC";  // Query to get tasks ordered by creation time
$result = $conn->query($sql);  // Execute the query
if (isset($_GET['task_added']) && $_GET['task_added'] == 'true') {
    echo "<script>alert('Task added successfully!');</script>";
}
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

        h1, h2 {
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .edit {
            color: #007bff;
            text-decoration: none;
        }

        .edit:hover {
            text-decoration: underline;
        }

        .del {
            color: #dc3545;
            text-decoration: none;
        }

        .del:hover {
            text-decoration: underline;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    </head>
    <div class="container">
    <h1>Task List</h1>
      <table>
        <tr><th>Task Name</th></tr>
<?php if ($result->num_rows > 0): ?>
<?php 
while ($task = $result->fetch_assoc()): 
?>
        <tr><td><?php echo $task['taskname'];?> 
        </td>
        <td><a class="edit" href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a></td>
        <td><a class="del" href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a></td>
        </tr>
        
<?php endwhile; ?>
 <?php else: ?>
          <tr><td colspan="3">No tasks</td></tr>
        <?php endif; ?>
</table>
</div>
<div>
   <h2>
      Add Task
    </h2>
  
      <form method="POST" action="add_task.php" >
          
      <input type="text" size="10" name="task-name" required placeholder="Enter Task"/>
      <button type="submit" name="subadd">
        Add Task
      </button>
    </form>
</div>
  </body>
</html>