<?php
// fetch_goals.php

// Set up the database connection
$host = 'localhost';
$dbname = 'goal_management';
$username = 'root'; // default username for localhost
$password = ''; // default password for localhost

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare the SELECT statement
    $stmt = $conn->prepare("SELECT goal_name, priority_level, notification_frequency FROM goals");
    $stmt->execute();
    
    // Fetch all goals
    $goals = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Send back the goals as JSON
    header('Content-Type: application/json');
    echo json_encode($goals);

} catch(PDOException $e) {
    // If there is an error in the database connection or query, return an error message
    http_response_code(500);
    echo json_encode(array("message" => "Internal Server Error: " . $e->getMessage()));
}
?>
