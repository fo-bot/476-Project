USE InventoryDB;

DELETE FROM InventoryTable;

INSERT INTO InventoryTable (ProductID, ProductName, Quantity, Price, Status, SupplierName)
SELECT 
    P.ProductID,
    P.ProductName,
    P.Quantity,
    P.Price,
    P.Status,
    S.SupplierName
FROM ProductTable P
JOIN SupplierTable S ON P.SupplierID = S.SupplierID
ORDER BY P.ProductID ASC;
