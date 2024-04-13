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
    dateJoined DATE,
    birthDate DATE,
    voice VARCHAR(30),
    scheduleDay VARCHAR(15),
    is_admin BOOLEAN DEFAULT 0
);

-- Inserting user data
INSERT INTO member (email, fName, lName, password, memberAddress, phoneNumber, dateJoined, birthDate, voice, scheduleDay, is_admin)
VALUES
    ('admin@mercy.edu', 'Admin', 'Admin', 'Zaq12wsx', 'Mercy', '3473874418', '2024-03-09', '1995-10-26', 'Soprano I', 'Monday', 1);

-- Table for songs
CREATE TABLE songs (
    songID VARCHAR(100) PRIMARY KEY,
    title VARCHAR(100),
    composer VARCHAR(75)
);

-- Table for playlists
CREATE TABLE playlists (
    playlistID VARCHAR(100) PRIMARY KEY,
    playlistNumber VARCHAR(20)
);

-- Table for soloist
CREATE TABLE soloist (
    songID VARCHAR(100) FOREIGN KEY, --How do we use a fk?
    email VARCHAR(100) FOREIGN KEY,
    solo VARCHAR(100)
);

-- Table for user emergency contact
CREATE TABLE emergencyInfo (
    email VARCHAR(100) FOREIGN KEY,
    contactPhone VARCHAR(10),
    contactfName VARCHAR(100),
    contactlName VARCHAR (100),
    contactRelation VARCHAR (30)
);

-- Table for voice section (do we need this twice?)
CREATE TABLE songs (
    sectionID VARCHAR(20) PRIMARY KEY,
    voice VARCHAR(50) FOREIGN KEY
);

-- Table for rehearsal attendance
CREATE TABLE Attendance (
    attendanceID VARCHAR(100) PRIMARY KEY,
    email VARCHAR(100) FOREIGN KEY,
    rehearsalDate VARCHAR(75),
    attendanceValue BOOLEAN DEFAULT 0,
    rehearsalLocation VARCHAR(100)
);

-- Table for events
CREATE TABLE events (
    eventID VARCHAR(100) PRIMARY KEY,
    eventDate VARCHAR(100),
    eventTime VARCHAR(75),
    playlistID VARCHAR(100) FOREIGN KEY
);