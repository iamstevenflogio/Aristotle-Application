<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARISTOTLE - Signup/Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif;
            background: #C3FF80;
            display: flex;
            align-items: center;
            justify-content: space-between; /* Aligns content to the sides */
        }
        .container {
            width: 300px; /* Smaller width for the container */
            padding: 24px;
            background: #FFFFFF;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            border-radius: 5px; /* Rounded corners */
            display: flex; /* Enables flexbox */
            flex-direction: column; /* Stacks children vertically */
            justify-content: center; /* Centers children vertically */
            align-items: center; /* Centers children horizontally */
        }
        .brand {
            font-size: 64px;
            color: #4E60FF;
            margin-bottom: 20px;
        }
        .message {
            font-size: 26px;
            color: #000000;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .form-input {
            width: 100%; /* Takes the full width of the container */
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }
        .action-button {
            width: 100%; /* Matches the input width */
            background-color: #FFD84E;
            color: #FFFFFF;
            border: none;
            padding: 15px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .action-button:hover {
            background-color: #e6c542;
        }
        .content {
            margin-left: 320px; /* Adjust the margin-left as desired */
            text-align: left; /* Aligns text to the left */
            padding-left: 20px; /* Space from the left edge */
        }
        .forgot-password {
            font-size: 16px;
            color: #4E60FF; /* Aristotle color */
            cursor: pointer;
        }
        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="brand">ARISTOTLE</div>
        <p class="message">Your LIFE CHANGING habits start here!</p>
    </div>
    <div class="container">
        <input type="email" placeholder="Email" class="form-input">
        <input type="password" placeholder="Password" class="form-input">
        <button class="action-button" onclick="window.location.href='Manage.php';">Login</button>
        <button class="action-button" onclick="window.location.href='register.php';">Create New Account</button>
        <p class="forgot-password" onclick="window.location.href='forgot_password.php';">Forgot Password?</p>
    </div>
</body>
</html>
