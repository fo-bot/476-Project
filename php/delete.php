<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inventoryId = $_POST["inventory_id"] ?? "";

    if (!is_numeric($inventoryId)) {
        echo "❌ Invalid Inventory ID.";
        exit;
    }

    $sql = "DELETE FROM InventoryTable WHERE InventoryID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $inventoryId);

    if ($stmt->execute()) {
        echo ($stmt->affected_rows > 0)
            ? "✅ Inventory record $inventoryId deleted successfully."
            : "⚠️ No matching record found.";
    } else {
        echo "❌ Error deleting product: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Please submit the delete form.";
}
?>
