USE InventoryDB;

INSERT INTO InventoryTable (ProductID, ProductName, Quantity, Price, Status, SupplierName)
SELECT ProductID, ProductName, Quantity, Price, Status, SupplierName
FROM ProductTable;
