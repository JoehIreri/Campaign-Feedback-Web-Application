<?php
// Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

$conn = new mysqli($servername, $username, $password, $dbname);

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrievingcd  feedback data
$sql = "SELECT name, email, feedback, rating, submission_date FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Displaying my data in a table
    echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Feedback</th><th>Rating</th><th>Date</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["feedback"] . "</td><td>" . $row["rating"] . "</td><td>" . $row["submission_date"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No feedback found";
}

$conn->close();
