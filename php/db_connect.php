<?php
// Database credentials
$host = 'localhost';
$user = 'root';
$password = 'Root@123';
$dbname = 'InventoryDB';

// Create a new MySQLi connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
