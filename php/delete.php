<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $_POST["product_id"] ?? "";

    if (!is_numeric($productId)) {
        echo "❌ Invalid Product ID.";
        exit;
    }

    $sql = "DELETE FROM InventoryTable WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "✅ Product ID $productId deleted successfully.";
        } else {
            echo "⚠️ No matching product found.";
        }
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Please submit the delete form.";
}
?>
