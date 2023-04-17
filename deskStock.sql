CREATE DATABASE deskStock;

USE deskStock;

-- Create Login table
CREATE TABLE users (
    user_id int PRIMARY KEY,
    email nvarchar(255) NOT NULL,
    password nvarchar(255) NOT NULL
);

-- Create Products table
CREATE TABLE Products (
    product_id int PRIMARY KEY,
    product_name nvarchar(255) NOT NULL,
    price float NOT NULL,
    quantity int NOT NULL,
    vendor nvarchar(255) NOT NULL
);

