<?php
include 'db.php';

if (isset($_POST['subadd'])) {

    $task = $_POST["task-name"];
    
    $ins_sql = "INSERT INTO tasks (taskname)
    VALUES ('$task')";
if ($conn->query($ins_sql) === TRUE) {
header("Location: index.php? task_added=true");
    exit();
} else {
echo " Error:  . $ins_sql. $conn->error " ;
}
}
?>