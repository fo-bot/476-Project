<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $_POST["product_id"] ?? "";
    $price     = $_POST["price"] ?? "";
    $quantity  = $_POST["quantity"] ?? "";
    $status    = $_POST["status"] ?? "";

    // Basic validation
    if (!is_numeric($price) || !is_numeric($quantity) || strlen($status) !== 1 || !is_numeric($productId)) {
        echo "❌ Invalid input. Please check your data.";
        exit;
    }

    $sql = "UPDATE InventoryTable SET Price = ?, Quantity = ?, Status = ? WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("diss", $price, $quantity, $status, $productId);

    if ($stmt->execute()) {
        echo "✅ Product updated successfully.";
    } else {
        echo "❌ Error updating product: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Please submit the update form.";
}
?>
