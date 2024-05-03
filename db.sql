-- Create the DB
DROP DATABASE IF EXISTS db;
CREATE DATABASE db;
USE db;

-- Create the User table
CREATE TABLE User (
    UserID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(127) NOT NULL,
    Password TEXT NOT NULL,
    Email VARCHAR(127) NOT NULL,
    Role VARCHAR(63) NOT NULL
);

-- Create the Customer table
CREATE TABLE Customer (
    CustomerID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(127) NOT NULL,
    Address VARCHAR(127),
    Payment VARCHAR(63),
    UserID INT NOT NULL,
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);

-- Create the Artist table
CREATE TABLE Artist (
    ArtistID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(127) NOT NULL,
    Bio TEXT,
    PortfolioURL VARCHAR(127),
    UserID INT NOT NULL,
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);

-- Create the Artwork table
CREATE TABLE Artwork (
    ArtworkID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Category VARCHAR(63) NOT NULL,
    Title VARCHAR(127) NOT NULL,
    Description TEXT NOT NULL,
    Price DECIMAL(10,2) NOT NULL,
    ArtistID INT NOT NULL,
    FOREIGN KEY (ArtistID) REFERENCES Artist(ArtistID)
);

-- Create the Order table
CREATE TABLE `Order` (
    OrderID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    OrderDate DATE NOT NULL,
    Status VARCHAR(63) NOT NULL,
    CustomerID INT NOT NULL,
    ArtworkID INT,
    FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID),
    FOREIGN KEY (ArtworkID) REFERENCES Artwork(ArtworkID)
);

-- Create the Supplier table
CREATE TABLE Supplier (
    SupplierID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(127) NOT NULL,
    Address VARCHAR(127),
    WebsiteURL VARCHAR(127),
    UserID INT NOT NULL,
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);

-- Insert sample account
INSERT INTO User (Username, Password, Email, Role) VALUES
('johndoe24', '202cb962ac59075b964b07152d234b70', 'johndoe@example.org', 'Customer'),
('kristina32', '202cb962ac59075b964b07152d234b70', 'kristina@example.org', 'Artist');

INSERT INTO Customer (Name, Address, Payment, UserID) VALUES
('John Doe', '223 Rd, Cork, Ireland, T12 D232', UUID(), 1);

INSERT INTO Artist (Name, Bio, PortfolioURL, UserID) VALUES
('Kristina B. Nelson', "Hi I'm Kristina.", 'https://kristina.example.org', 2);

-- Insert sample order
INSERT INTO `Order` (OrderDate, Status, CustomerID, ArtworkID) VALUES
('2023-05-01', 'Finished', 1, NULL),
('2023-06-03', 'Finished', 1, NULL),
('2024-05-01', 'Shipping', 1, NULL);
