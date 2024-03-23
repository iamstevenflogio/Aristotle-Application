<!DOCTYPE html>
<html>
<head>
    <title>Analytics - Goal Management System</title>
    <link rel="stylesheet" href="styles.css"> <!-- Ensure you have this CSS file -->
</head>
<body>

    <!-- Analytics Container -->
    <div id="analytics-container">
        <h1>Your Habit Completion Analytics!</h1>

        <!-- Habit Cards -->
        <div id="habit-cards-container">
            <!-- PHP could dynamically generate these cards -->
            <div class="habit-card">
                <h3>Study Physics</h3>
                <!-- Progress chart or bar would go here -->
                <!-- Placeholder for demonstration -->
                <div class="progress-bar"></div>
            </div>
            <div class="habit-card">
                <h3>Yoga</h3>
                <!-- Progress chart or bar would go here -->
                <div class="progress-bar"></div>
            </div>
            <div class="habit-card">
                <h3>Attend Class</h3>
                <!-- Progress chart or bar would go here -->
                <div class="progress-bar"></div>
            </div>
            <!-- ... more cards ... -->
        </div>

        <!-- Back to Current Goals Button -->
        <a href="Manage.php" id="back-to-goals-btn">Back to Current Goals</a>
    </div>

    <!-- Navigation Bar -->
    <div id="navbar">
        <!-- Placeholder icons for demonstration -->
        <a href="Home.php"><img src="home-icon.png" alt="Home"></a>
        <a href="Search.php"><img src="search-icon.png" alt="Search"></a>
        <a href="Favorites.php"><img src="favorites-icon.png" alt="Favorites"></a>
    </div>

    <!-- Additional styles could be directly included here or linked through a CSS file -->
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif;
            background: #C3FF80; /* Or any other color or image */
        }

        #analytics-container {
            text-align: center;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #ffffff; /* White background */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .habit-card {
            background: #f0f0f0; /* Light grey */
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .progress-bar {
            width: 100%; /* Placeholder for progress bar */
            height: 20px; /* Placeholder height */
            background: #32CD32; /* Placeholder color */
            border-radius: 5px;
        }

        #back-to-goals-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #6a5acd; /* Purple */
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        #navbar {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #333;
            padding: 10px 0;
            text-align: center;
        }

        #navbar a img {
            height: 30px; /* Placeholder size */
        }

        /* ... Other styles ... */
    </style>

</body>
</html>
