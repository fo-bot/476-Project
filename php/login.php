<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    // Simulated login check (replace with DB lookup later)
    $valid_user = "admin";
    $valid_pass = "admin123";

    if ($username === $valid_user && $password === $valid_pass) {
        echo "✅ Login successful!";
    } else {
        echo "❌ Invalid username or password.";
    }
} else {
    echo "Please submit the form.";
}
?>
