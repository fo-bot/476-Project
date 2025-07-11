<?php
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inventoryId = $_POST["inventory_id"] ?? "";
    $price       = $_POST["price"] ?? "";
    $quantity    = $_POST["quantity"] ?? "";
    $status      = $_POST["status"] ?? "";

    if (!is_numeric($price) || !is_numeric($quantity) || strlen($status) !== 1 || !is_numeric($inventoryId)) {
        echo "Invalid input. Please check your data.";
        exit;
    }

    $sql = "UPDATE InventoryTable SET Price = ?, Quantity = ?, Status = ? WHERE InventoryID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dssi", $price, $quantity, $status, $inventoryId);

    if ($stmt->execute()) {
        echo ($stmt->affected_rows > 0)
            ? "Inventory record $inventoryId updated successfully."
            : "No record updated. Please check the Inventory ID.";
    } else {
        echo "Error updating product: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Please submit the update form.";
}
?>
