<?php
// Include your database connection code here (connect.php)
$host = 'localhost';
$dbname = 'goal_management';
$username = 'root'; // default username for localhost
$password = ''; // default password for localhost

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['goal-name'])) {
        $goalName = $_POST['goal-name'];

        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM goals WHERE goal_name = :goal_name");
        $stmt->bindParam(':goal_name', $goalName);
        $stmt->execute();

        echo "Goal deleted successfully";
    }
	
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>
