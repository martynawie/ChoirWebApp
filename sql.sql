-- database
CREATE DATABASE Choir2;

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
    songID INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    artist VARCHAR(75)
    composer VARCHAR(75)
);

-- Table for playlists
CREATE TABLE playlists (
    playlistID INT AUTO_INCREMENT PRIMARY KEY,
    playlistNumber VARCHAR(20)
);

-- Table for soloist
CREATE TABLE soloist (
    soloistID INT AUTO_INCREMENT PRIMARY KEY,
    songID INT,
    FOREIGN KEY (songID) REFERENCES songs(songID), 
    email VARCHAR(100),
    FOREIGN KEY (email) REFERENCES member(email),
    solo VARCHAR(100)
);


-- Table for rehearsal attendance
CREATE TABLE Attendance (
    attendanceID INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    FOREIGN KEY (email) REFERENCES member(email),
    rehearsalDate VARCHAR(75),
    attendanceValue BOOLEAN DEFAULT 0,
    rehearsalLocation VARCHAR(100)
);

-- Table for events
CREATE TABLE events (
    eventID INT AUTO_INCREMENT PRIMARY KEY,
    eventDate DATE,
    eventTime TIME,
    playlistID VARCHAR(100),
    FOREIGN KEY (playlistID) REFERENCES playlists(playlistID)
);

INSERT INTO Songs(title, artist, composer)
VALUES 
    ('Summertime','Ella Fitzgerald','George Gershwin'),
    ('A Tisket A Tasket','Ella Fitzgerald','Van Alexander'),
    ('The Trolley Song','Judy Garland','Hugh Martin and Ralph Blane'),
    ('Boogie Woogie Bugle Boy','The Andrews Sister','Don Rave and Hughie Prince'),
    ('Mr. Sandman','The Chordettes','Pat Ballard'),
    ('Fever','Peggy Lee','Peggy Lee'),
    ('Where The Boys Are','Connie Francis','Howard Greenfield and Neil Sedaka'),
    ('Crazy','Patsy Cline','Willie Nelson'),
    ('It"s My Party','Lesley Gore','Wally Gold'),
    ('Dancing In The Street','Martha and The Vandellas','Marvin Gaye'),
    ('What the World Needs Now','Jackie DeShannon','Hal David'),
    ('Respect','Aretha Franklin','Otis Redding'),
    ('Piece of My Heart','Janis Joplin','Jerry Ragovoy and Bert Berns'),
    ('Stop! In The Name of Love','The Supremes','Brian Holland'),
    ('Both Sides Now','Joni Mitchell','Joni Mitchell'),
    ('Make Your Own Kind of Music','Mama Cass Elliot','Barry Mann and Cynthia Weil'),
    ('We"ve Only Just Begun','Karen Carpenter','Roger Nichols and Paul Williams'),
    ('I Feel the Earth Move','Carole King','Carole King'),
    ('Nine to Five','Dolly Parton','Dolly Parton'),
    ('Evergreen','Barbara Streisand','Barbara Streisand'),
    ('It"s So Easy/When Will I Be Loved','Linda Ronstadt','Buddy Holly'),
    ('Dreams','Stevie Nicks','Stevie Nicks'),
    ('Walking on Sunshine','Katrina and The Waves', 'Kimberly Rews'),
    ('Holiday','Madonna','Curtis Hudson and Lisa Stevens-Crowder'),
    ('What"s Love Got to Do With It','Tina Turner','Graham Lyle and Terry Britten'),
    ('Turn Back Time','Cher','Diane Warren'),
    ('All I Wanna Do','Sheryl Crow','Sheryl Crow'),
    ('Dreaming of You','Selena','Franne Gold and Tom Snow'),
    ('Because You Loved Me','Celine Dion','Diane Warren'),
    ('Foolish Games','Jewel','Jewel'),
    ('How Do I Live','LeAnn Rimes','Diane Warren'),
    ('You"re Still the One','Shania Twain','Shania Twain'),
    ('Say My Name','Destiny"s Child','Rodney Jenkins'),
    ('Toxic','Britney Spears','Cathy Dennis'),
    ('Beatiful','Christina Aguilera','Linda Perry'),
    ('If I Ain"t Got You','Alicia Keys','Alicia Keys'),
    ('Breakaway','Kelly Clarkson','Avril Lavigne'),
    ('Umbrella','Rihanna','Jay-Z'),
    ('Single Ladies','Beyonce','Beyonce'),
    ('Love Story','Taylor Swift','Taylor Swift'),
    ('Party in the USA','Miley Cyrus','Claude Kelly'),
    ('Someone Like You','Adele','Adele'),
    ('Born This Way','Lady Gaga','Lady Gaga'),
    ('Try','Pink','Busbee and Ben West'),
    ('Roar','Katy Perry','Katy Perry'),
    ('Brave','Sara Bareilles','Sara Bareilles'),
    ('Unstoppable','Sia','Sia')
    ('God Bless America','Kate Smith','Irving Berlin'),
    ('The Star Spangled Banner','USA National Anthem','Francis Scott Key');
