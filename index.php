<?php
include 'db.php';  // Include the database connection
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    
    </head>
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