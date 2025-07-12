<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $_POST["product_id"] ?? "";

    if (!is_numeric($productId)) {
        echo "Invalid Product ID.";
        exit;
    }

    $sql = "DELETE FROM InventoryTable WHERE ProductID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        echo ($stmt->affected_rows > 0)
            ? "Inventory record $productId deleted successfully."
            : "No matching record found.";
    } else {
        echo "Error deleting product: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Please submit the delete form.";
}
?>
