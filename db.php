<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agad.db";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE) {
    echo "Error creating database: " . $conn->error;
} else {

}
$conn = $conn = new mysqli($servername, $username, $password, $dbname);
$table_sql = "CREATE TABLE IF NOT EXISTS tasks (
    id INT(15) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    taskname VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
if ($conn->query($table_sql) === FALSE) {
    echo "Error creating table: " . $conn->error . "<br>";
} else {
    
}

?>