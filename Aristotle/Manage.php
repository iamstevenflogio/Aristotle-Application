<?php
// First git change
// Database configuration
$host = 'localhost';
$dbname = 'goal_management';
$username = 'root'; // default username for localhost
$password = ''; // default password for localhost

// Create a new PDO instance
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form data are present
    if(isset($_POST['goal-name'], $_POST['priority-level'], $_POST['notification-frequency'])) {
        // Escape and assign the form data to variables
        $goalName = $_POST['goal-name'];
        $priorityLevel = $_POST['priority-level'];
        $notificationFrequency = $_POST['notification-frequency'];

        // Prepare SQL statement
        $sql = "INSERT INTO goals (goal_name, priority_level, notification_frequency) VALUES (:goal_name, :priority_level, :notification_frequency)";
        
        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':goal_name', $goalName);
        $stmt->bindParam(':priority_level', $priorityLevel);
        $stmt->bindParam(':notification_frequency', $notificationFrequency);

        // Execute the statement
        try {
            $stmt->execute();
            //echo "New record created successfully";
        } catch(PDOException $e) {
            echo "Error: " . $sql . "<br>" . $e->getMessage();
        }
    }
}

// Closes the database connection
$conn = null;
?>
	
	<!DOCTYPE html>
	<html>
	<head>
		<title>Goal Management System</title>
		//<link rel="stylesheet" href="styles.css"> <!-- Link to the CSS file provided -->
	</head>
		<body>
		
			<!-- Goals Counter -->
		<div id="goals-counter-container">
			<div id="goal-counter">
				<div id="easy-counter" class="counter-item easy">
					Easy Goals Completed: <span id="count-easy">0</span>
				</div>
				<div id="challenge-counter" class="counter-item challenge">
					Challenge Goals Completed: <span id="count-challenge">0</span>
				</div>
				<div id="extreme-counter" class="counter-item extreme">
					Extreme Goals Completed: <span id="count-extreme">0</span>
				</div>
			</div>
		</div>
			<div id="goal-management-container">
				<h1>Your Current Goals</h1>
				
				<!-- List of Current Goals -->
				<div id="current-goals">
					<!-- Placeholder for goals, to be dynamically filled -->
					<!-- Up to six goals -->
				</div>
				
				<!-- Add New Goal Button -->
				<button id="add-goal-btn" >Add New Goal</button>

				<!-- Edit Goals and Show Analytics Buttons -->
				<button id="edit-goals-btn"  >Edit Goals</button>
				<button id="show-analytics-btn" onclick="window.location.href='Ana.php';">Show Analytics</button>
			</div>
			
			
			<!-- The Modal -->
		<div id="myModal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
				<div class="modal-header">
					<span class="close">&times;</span>
					<h2>What Goal do you want to set?</h2>
				</div>
				<div class="modal-body">
					<form action= 'Manage.php' method = "POST">
						<div class="form-group">
							<label for="goal-name">Name of Goal:</label>
							<input type="text" id="goal-name" name="goal-name" required>
						</div>
						<div class="form-group">
							<label for="priority-level">Priority Level:</label>
							<select id="priority-level" name="priority-level">
								<option value="High">High</option>
								<option value="Medium">Medium</option>
								<option value="Low">Low</option>
							</select>
						</div>
						<div class="form-group">
							<label for="notification-frequency">Notification Frequency:</label>
							<select id="notification-frequency" name="notification-frequency" required>
								<option value="Easy">Easy (Once a day)</option>
								<option value="Challenge">Challenge (Twice a day)</option>
								<option value="Extreme">Extreme (Thrice a day)</option>
							</select>
						</div>
						<button type="submit" id="modalSave" class="btn-primary">Save Goal</button>
					</form>
				</div>
			</div>

		</div>
			
			

			<!-- Additional styles inspired by the images provided -->
			<style>
					#goals-counter-container {
						padding: 5px;
						margin-bottom: 100px; /* Space between counters and goals */
						display: flex;
						
						position: relative; /* or absolute, fixed, etc. */
						top: -250px;
						left: -230px;
						
						gap: 10px;
						margin-left: 400px; /* Adjust the value as needed */
					}

					.counter-item {
						padding: 10px;
						border-radius: 8px;
						margin: 10px; /* Spacing between counters */
						color: white;
						font-weight: bold;
						box-shadow: 0px 0px 5px #ccc;
						flex: 1; /* Ensure equal width for all counters */
						display: flex;
						justify-content: center;
						align-items: center;
					}

					.easy {
						background-color: #90EE90; /* Light green for Easy */
					}

					.challenge {
						background-color: #FFA500; /* Orange for Challenge */
					}

					.extreme {
						background-color: #FFB6C1; /* Light red for Extreme */
					}
			
					#goal-management-container {
						text-align: center;
						background: #E6E6FA; /* Light purple background as in the second picture provided */
						padding: 20px;
						border-radius: 8px;
						box-shadow: 0px 0px 10px #ccc;
						max-width: 600px;
						margin-left: -600px;
					}
				
				
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

				#current-goals {
					display: flex;
					flex-direction: column;
					gap: 10px;
					margin-bottom: 20px;
				}

				.goal-item {
					background: #F0E68C; /* Khaki background for goals */
					padding: 10px;
					border-radius: 5px;
				}

				#add-goal-btn,
				#edit-goals-btn,
				#show-analytics-btn {
					padding: 10px 20px;
					margin: 10px;
					border: none;
					border-radius: 5px;
					cursor: pointer;
					transition: background-color 0.3s;
				}

				#add-goal-btn {
					background-color: #32CD32; /* Lime Green */
					color: white;
				}

				#edit-goals-btn {
					background-color: #FFA07A; /* Light Salmon */
					color: white;
				}

				#show-analytics-btn {
					background-color: #1E90FF; /* Dodger Blue */
					color: white;
				}

				#add-goal-btn:hover,
				#edit-goals-btn:hover,
				#show-analytics-btn:hover {
					opacity: 0.9;
				}
				
					/* Modal content container styling */
					
					.modal {
					display: none; /* Hidden by default */
					position: fixed; /* Stay in place */
					z-index: 1; /* Sit on top */
					left: 0;
					top: 0;
					width: 100%; /* Full width */
					height: 100%; /* Full height */
					overflow: auto; /* Enable scroll if needed */
					background-color: rgb(0,0,0); /* Fallback color */
					background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
				}
					
				.modal-content {
					background-color: #fefefe; /* White background */
					margin: auto; /* Center the modal */
					padding: 20px; /* Padding around the content */
					border: 1px solid #888; /* Border around the modal */
					width: 80%; /* Width of the modal */
					box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* Shadow effect */
					border-radius: 5px; /* Rounded corners */
				}

				
			</style>
		
<script>
// Get the modal and other related elements
var modal = document.getElementById('myModal');
var btn = document.getElementById('add-goal-btn');
var editBtn = document.getElementById('edit-goals-btn');
var span = document.getElementsByClassName('close')[0];
var saveBtn = document.getElementById('modalSave');

// Function to toggle delete buttons
function toggleDeleteButtons() {
    var goals = document.querySelectorAll('.goal-item');
    goals.forEach(function(goal, index) {
        // This assumes goalName is a direct child text node of .goal-item.
        var goalName = goal.childNodes[0].nodeValue.trim().split(" - ")[0];
        
        if (!goal.querySelector('.delete-btn')) {
            var deleteBtn = document.createElement('span');
            deleteBtn.className = 'delete-btn';
            deleteBtn.style.color = 'red';
            deleteBtn.style.cursor = 'pointer';
            deleteBtn.textContent = ' x';
            deleteBtn.onclick = function() {
                deleteGoal(goalName);
            };
            goal.appendChild(deleteBtn);
        }
    });
}

// Function to check if there are goals and toggle the visibility of the 'Edit Goals' button
function checkGoals() {
    var goals = document.querySelectorAll('.goal-item');
    editBtn.style.display = goals.length > 0 ? 'inline-block' : 'none';
}

// When the user clicks the edit button, toggle delete buttons
editBtn.onclick = function() {
    toggleDeleteButtons();
};

// When the user clicks the 'Add New Goal' button, open the modal 
btn.onclick = function() {
    modal.style.display = 'block';
};

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = 'none';
};

// Function to add a new goal to the list and to the database
function addNewGoal() {
    var goalNameInput = document.getElementById('goal-name');
    var priorityLevelSelect = document.getElementById('priority-level');
    var notificationFrequencySelect = document.getElementById('notification-frequency');
    
    var goalName = goalNameInput.value.trim();
    var priorityLevel = priorityLevelSelect.value;
    var notificationFrequency = notificationFrequencySelect.value;

    if (goalName) {
        var formData = new FormData();
        formData.append('goal-name', goalName);
        formData.append('priority-level', priorityLevel);
        formData.append('notification-frequency', notificationFrequency);

        fetch('Manage.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(() => {
            fetchGoals();
        })
        .catch(error => {
            console.error('Error:', error);
        });

        goalNameInput.value = '';
        priorityLevelSelect.value = 'High'; // Reset to default value if needed
        notificationFrequencySelect.value = 'Easy'; // Reset to default value if needed
        modal.style.display = 'none';
    }
}
function deleteGoal(goalName) {
    // Confirm before deleting
    if (!confirm(`Are you sure you want to delete the goal: ${goalName}?`)) {
        return;
    }

    // Prepare the data to send
    var formData = new FormData();
    formData.append('goal-name', goalName);

    // Send the delete request
    fetch('delete_goal.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(() => {
        // After deleting, fetch the updated list of goals
        fetchGoals();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
// Function to fetch goals from the database and display them
function fetchGoals() {
    fetch('http://localhost/Aristotle/fetch_goals.php')
    .then(response => response.json())
    .then(goals => {
        const goalsContainer = document.getElementById('current-goals');
        goalsContainer.innerHTML = ''; // Clear existing goals

        // Iterate over each goal and create elements to display them
        goals.forEach(goal => {
            const goalDiv = document.createElement('div');
            goalDiv.classList.add('goal-item');
            goalDiv.textContent = `${goal.goal_name} - Priority: ${goal.priority_level} - Frequency: ${goal.notification_frequency}`;

            // Determine the number of notification boxes based on the frequency
            const notificationCount = getNotificationCount(goal.notification_frequency);

            // Append the notification boxes to the goalDiv
            for (let i = 0; i < notificationCount; i++) {
                const notificationBox = createNotificationBox(goal.goal_name);
                goalDiv.appendChild(notificationBox);
            }

            goalsContainer.appendChild(goalDiv);
        });

        checkGoals(); // Check if the edit button should be displayed
    })
    .catch(error => {
        console.error('Error fetching goals:', error);
    });
	
}

function getNotificationCount(frequency) {
    const frequencyMap = {
        'Easy': 1,
        'Challenge': 2,
        'Extreme': 3
    };
    return frequencyMap[frequency] || 0;
}

function createNotificationBox(goalDiv, goalName, frequency) {
    const notificationBox = document.createElement('div');
    const doneButton = document.createElement('button');
    doneButton.textContent = 'Done';
    doneButton.onclick = function() {
        // Remove this Done button
        notificationBox.remove();
        
        // Decrease the remaining notifications count
        goalDiv.remainingNotifications--;
        
        // If all Done buttons are clicked, delete the goal and update counters
        if (goalDiv.remainingNotifications === 0) {
            deleteGoal(goalName);
            goalCounters[frequency]++;
            updateGoalCounters();
        }
    };

    notificationBox.appendChild(doneButton);
    return notificationBox;
}

// Attach the event listener to the save button for adding a new goal
saveBtn.onclick = function(event) {
    event.preventDefault();
    addNewGoal();
};


// Call fetchGoals on page load to display goals immediately
document.addEventListener('DOMContentLoaded', fetchGoals);
</script>



		
		</body>
	</html>

