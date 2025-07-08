CREATE DATABASE IF NOT EXISTS InventoryDB;
USE InventoryDB;

CREATE TABLE SupplierTable (
    SupplierID INT PRIMARY KEY,
    SupplierName VARCHAR(100),
    Address VARCHAR(255),
    Phone VARCHAR(20),
    Email VARCHAR(100)
);

CREATE TABLE ProductTable (
    ProductID INT,
    ProductName VARCHAR(100),
    Description VARCHAR(255),
    Price DECIMAL(10,2),
    Quantity INT,
    Status CHAR(1),
    SupplierID INT,
    FOREIGN KEY (SupplierID) REFERENCES SupplierTable(SupplierID)
);

CREATE TABLE InventoryTable (
    ProductID INT,
    ProductName VARCHAR(100),
    Quantity INT,
    Price DECIMAL(10,2),
    Status CHAR(1),
    SupplierName VARCHAR(100)
);
