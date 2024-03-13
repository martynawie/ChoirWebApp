-- database
CREATE DATABASE Choir;

-- Table for user information
CREATE TABLE member (
    email VARCHAR(100) PRIMARY KEY,
    fName VARCHAR(50),
    lName VARCHAR(50),
    password VARCHAR(30),
    memberAddress VARCHAR(100),
    phoneNumber VARCHAR(10),
    dateJoined DEFAULT CURRENT_DATE,
    birthDate DATE,
    voice VARCHAR(30),
    scheduleDay VARCHAR(15),
    is_admin BOOLEAN DEFAULT 0
);

-- Inserting user data
INSERT INTO member (email, fName, lName, password, memberAddress, phoneNumber, dateJoined, birthDate, voice, scheduleDay, is_admin)
VALUES
    ('admin@mercy.edu', 'Admin', 'Admin', 'Zaq12wsx', 'Mercy', '3473874418', '2024-03-09', '1995-10-26', 'Soprano I', 'Monday', 1);