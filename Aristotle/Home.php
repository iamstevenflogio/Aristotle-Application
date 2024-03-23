<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Aristotle</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif; /* Updated font */
            background: #C3FF80; /* Updated green border color */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .outer-container {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 48px;
            box-sizing: border-box;
        }
        .welcome-container {
            height: 100%;
            background: #FFFFFF; /* Updated blue color to light gray */
            color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border-radius: 0px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        .welcome-brand {
            font-size: 64px;
            margin-bottom: 20px;
			color: #4E60FF;
        }
        .welcome-message {
            font-size: 26px;
            margin-bottom: 30px;
            color: #000000; 
			font-weight: bold;
        }
        .start-button {
            background-color: #FFD84E;
            color: #FFFFFF;
            border: none;
            padding: 15px 30px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
        }
        .start-button:hover {
            background-color: #e6c542;
        }
    </style>
</head>
<body>
    <div class="outer-container">
        <div class="welcome-container">
            <div class="welcome-brand">ARISTOTLE</div>
            <p class="welcome-message">The prime productivity analysis application!</p> <!-- Updated text -->
            <button onclick="window.location.href='Signup.php';" class="start-button">Get Started</button>
        </div>
    </div>
</body>
</html>
