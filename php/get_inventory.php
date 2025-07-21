<?php
require_once "db_connect.php";

$sql = "SELECT * FROM InventoryTable ORDER BY InventoryID ASC";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    echo "<p>No inventory records found.</p>";
} else {
    echo "<table>
        <thead>
            <tr>
                <th>Inventory ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Supplier Name</th>
            </tr>
        </thead>
        <tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['InventoryID']}</td>
                <td>{$row['ProductID']}</td>
                <td>{$row['ProductName']}</td>
                <td>{$row['Quantity']}</td>
                <td>{$row['Price']}</td>
                <td>{$row['Status']}</td>
                <td>{$row['SupplierName']}</td>
              </tr>";
    }
    echo "</tbody></table>";
}
$conn->close();
?>
