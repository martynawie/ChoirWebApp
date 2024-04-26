<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }

        .box {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 15px;
            text-align: center;
            width: 45%; 
        }

        .box a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="box">
            <h2>Member Management</h2>
            <p>Manage member profiles with attributes such as name, contact details, birthdate, address, join date, seasons performed, voice part, section, and rehearsal day.</p>
            <a href="internships.php">Go</a>
        </div>

        <div class="box">
            <h2>Voice Sections</h2>
            <p>Create and manage different voice sections within the choir.</p>
            <a href="internships.php">Go</a>
        </div>

        <div class="box">
            <h2>Song Library</h2>
            <p>Catalog of songs with details like title, composer, difficulty level, and playlists.</p>
            <a href="internships.php">Go</a>
        </div>

        <div class="box">
            <h2>Playlist Management</h2>
            <p>Create, edit, and organize playlists for rehearsals and events.</p>
            <a href="internships.php">Go</a>
        </div>

        <div class="box">
            <h2>Soloists:</h2>
            <p>Identify and manage soloists for specific songs.</p>
            <a href="internships.php">Go</a>
        </div>

        <div class="box">
            <h2>Event Tracking:</h2>
            <p>Schedule and track choir events with details on date, time, location, and associated playlist.</p>
            <a href="internships.php">Go</a>
        </div>

        <div class="box">
            <h2>Attendance Management:</h2>
            <p>Monitor member attendance with options for in-person and virtual attendance</p>
            <a href="internships.php">Go</a>
        </div>

        <div class="box">
            <h2>Rehearsal Schedule:</h2>
            <p>Plan and display rehearsal schedules with information on date, time, and location for both Monday and Thursday rehearsals.</p>
            <a href="internships.php">Go</a>
        </div>

    </div>
</body>
</html>
