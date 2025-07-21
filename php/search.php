<?php
require_once 'db_connect.php';

$term = trim($_GET['term'] ?? '');

$sql = "SELECT InventoryID, ProductID, ProductName, Quantity, Price, Status, SupplierName
        FROM InventoryTable
        WHERE ProductName LIKE ? OR ProductID LIKE ?
        ORDER BY InventoryID ASC";

$stmt = $conn->prepare($sql);
$searchTerm = "%$term%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();

$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Search Results</title>
</head>
<body>
    <h2>Search Results for: "<?= htmlspecialchars($term) ?>"</h2>

    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>Inventory ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Supplier Name</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['InventoryID']) ?></td>
                <td><?= htmlspecialchars($row['ProductID']) ?></td>
                <td><?= htmlspecialchars($row['ProductName']) ?></td>
                <td><?= htmlspecialchars($row['Quantity']) ?></td>
                <td><?= htmlspecialchars($row['Price']) ?></td>
                <td><?= htmlspecialchars($row['Status']) ?></td>
                <td><?= htmlspecialchars($row['SupplierName']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>

</body>
</html>

