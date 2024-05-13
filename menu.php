<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="menu-flex-container">
        <!-- Individual Profile Information Box -->
        <div class="menu-flex-box">
            <h2>My Profile</h2>
            <p>Information about you</p>
            <a href="profile.php">Go</a>
        </div>

        <?php 
        include("connect.php");
        include("functions.php");
        session_start();

        // Check if the user is logged in
        $user_data = check_login($connect);

        // Additional sections visible only for admin users
        if ($user_data && $user_data['is_admin'] == 1) {
            ?>
            <!-- Admin Only: Members Management Box -->
            <div class="menu-flex-box">
                <h2>Members</h2>
                <p>See all the members with option to delete a member.</p>
                <a href="members.php">Go</a>
            </div>

            <div class="menu-flex-box">
                <h2>Attendance Management</h2>
                <p>Check members attendance.</p>
                <a href="checkAttendance.php">Go</a>
            </div>
            
            <!-- 
            <div class="menu-flex-box">
                <h2>Voice Sections</h2>
                <p>Create and manage different voice sections within the choir.</p>
                <a href="voice_sections.php">Go</a>
            </div>


            <div class="menu-flex-box">
                <h2>Playlist Management</h2>
                <p>Create, edit, and organize playlists for rehearsals and events.</p>
                <a href="playlist_management.php">Go</a>
            </div>

            
            <div class="menu-flex-box">
                <h2>Soloists</h2>
                <p>Identify and manage soloists for specific songs.</p>
                <a href="soloists_management.php">Go</a>
            </div> -->

        <?php } ?>

        <!-- General User Access: Song Library Box -->
        <div class="menu-flex-box">
            <h2>Song Library</h2>
            <p>Catalog of songs with details like title, author and composer.</p>
            <a href="songs.php">Go</a>
        </div>

        <div class="menu-flex-box">
            <h2>Schedule</h2>
            <p>Monitor schedule meetings</p>
            <a href="schedule.php">Go</a>
        </div>

        <div class="menu-flex-box">
            <h2>Attendance</h2>
            <p>Monitor your attendance. </p>
            <a href="attendance.php">Go</a>
        </div>

        <!-- 
        <div class="menu-flex-box">
            <h2>Event Tracking</h2>
            <p>Schedule and track choir events with details on date, time, location, and associated playlist.</p>
            <a href="event_tracking.php">Go</a>
        </div>

        <div class="menu-flex-box">
            <h2>Rehearsal Schedule</h2>
            <p>Plan and display rehearsal schedules with information on date, time, and location for both Monday and Thursday rehearsals.</p>
            <a href="rehearsal_schedule.php">Go</a>
        </div> -->
        <!-- General User Access: Attendance Management Box -->

    </div>
            <!-- Logout Link -->
            <a href="logout.php" class="logout-link">Logout</a>
</body>
</html>
