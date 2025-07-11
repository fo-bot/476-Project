CREATE DATABASE IF NOT EXISTS InventoryDB;
USE InventoryDB;

CREATE TABLE SupplierTable (
    SupplierName VARCHAR(100) PRIMARY KEY,
    Address VARCHAR(255),
    Phone VARCHAR(30),
    Email VARCHAR(100)
);

CREATE TABLE ProductTable (
    ProductID INT,
    ProductName VARCHAR(100),
    Description VARCHAR(255),
    Price DECIMAL(10,2),
    Quantity INT,
    Status CHAR(1),
    SupplierName VARCHAR(100),
    FOREIGN KEY (SupplierName) REFERENCES SupplierTable(SupplierName)
);

CREATE TABLE InventoryTable (
    ProductID INT,
    ProductName VARCHAR(100),
    Quantity INT,
    Price DECIMAL(10,2),
    Status CHAR(1),
    SupplierName VARCHAR(100)
);
